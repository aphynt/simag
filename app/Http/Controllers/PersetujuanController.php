<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\File;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PersetujuanController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();

        $data = DB::table('pengajuan as pj')
        ->leftJoin('users as us', 'pj.user_id', 'us.id')
        ->leftJoin('users as us2', 'pj.disetujui_oleh', 'us2.id')
        ->select(
            'pj.id',
            'pj.user_id',
            'pj.uuid',
            'us.name',
            'us.nim',
            'pj.statusenabled',
            'pj.tanggal_pengajuan',
            'pj.tanggal_selesai',
            'pj.nama_perusahaan',
            'pj.alasan_magang',
            'pj.kompetensi_ilmu',
            'us2.name as disetujui_oleh',
            'us2.role as role_penyetujuan',
            'pj.jenis_magang',
            'pj.status',
            'pj.keterangan',
            'pj.no_surat',
            'pj.tanggal_surat',
        )
        ->where('pj.statusenabled', true);
        if (in_array($user->role, ['mahasiswa'])) {
            $data->where('pj.user_id', $user->id);
        }

        $data = $data->get();

        return view('dashboard.persetujuan.index', compact('data'));
    }

    public function detail($uuid)
    {

        $data = DB::table('pengajuan as pj')
        ->leftJoin('users as us', 'pj.user_id', 'us.id')
        ->select(
            'pj.id',
            'pj.user_id',
            'pj.uuid',
            'us.name',
            'us.nim',
            'us.semester',
            'pj.statusenabled',
            'pj.tanggal_pengajuan',
            'pj.tanggal_selesai',
            'pj.nama_perusahaan',
            'pj.bagian_perusahaan',
            'pj.alamat_perusahaan',
            'pj.alasan_magang',
            'pj.kompetensi_ilmu',
            'pj.jenis_magang',
            'pj.setuju',
            'pj.status',
            'pj.file_pendukung',

        )
        ->where('pj.statusenabled', true)
        ->where('pj.uuid', $uuid)
        ->first();

        return view('dashboard.persetujuan.detail', compact('data'));
    }

    public function download($uuid)
    {
        $cekData = Pengajuan::where('uuid', $uuid)->first();

        if (!in_array($cekData->status, ['Disetujui', 'Diverifikasi'])) {
            return redirect()->back()->with('info', 'Maaf, pengajuan magang belum disetujui');
        }

        if($cekData->no_surat == null){
            return redirect()->back()->with('info', 'Maaf, No. Surat belum ada, harap menghubungi staff');
        }

        $data = DB::table('pengajuan as pj')
        ->leftJoin('users as us', 'pj.user_id', 'us.id')
        ->select(
            'pj.id',
            'pj.user_id',
            'pj.uuid',
            'us.name',
            'us.nim',
            'us.semester',
            'us.program_studi',
            'us.no_hp',
            'pj.statusenabled',
            'pj.tanggal_pengajuan',
            'pj.tanggal_selesai',
            'pj.nama_perusahaan',
            'pj.bagian_perusahaan',
            'pj.alamat_perusahaan',
            'pj.alasan_magang',
            'pj.kompetensi_ilmu',
            'pj.jenis_magang',
            'pj.setuju',
            'pj.status',
            'pj.file_pendukung',
            'pj.no_surat',
            'pj.tanggal_surat',

        )
        ->where('pj.statusenabled', true)
        ->where('pj.uuid', $uuid)
        ->first();

        if($data == null){
            return redirect()->back()->with('info', 'Maaf, data tidak ditemukan');
        }else {
            $item = $data;

            $qrTempFolder = storage_path('app/qr-temp');
            if (!File::exists($qrTempFolder)) {
                File::makeDirectory($qrTempFolder, 0755, true);
            }

            $fileName = 'qrcode' . $item->uuid . '.png';
            $filePath = $qrTempFolder . DIRECTORY_SEPARATOR . $fileName;

            QrCode::size(150)->format('png')->generate(route('verified.index', ['encodedNik' => base64_encode($item->uuid)]), $filePath);
            $item->qrcode = $filePath;
        }

        if($data->jenis_magang == 'Magang Mandiri'){

            // return view('dashboard.persetujuan.suratPengantar', compact('data'));

            $pdf = PDF::loadView('dashboard.persetujuan.suratPengantar', compact('data'));
            return $pdf->download('Surat Pengantar.pdf');
        }else{

            // return view('dashboard.persetujuan.suratRekomendasi', compact('data'));

            $pdf = PDF::loadView('dashboard.persetujuan.suratRekomendasi', compact('data'));
            return $pdf->download('Surat Rekomendasi.pdf');
        }

    }

    public function updateNoSurat(Request $request, $uuid)
    {
        try {
            $pengajuan = Pengajuan::where('uuid', $uuid)->firstOrFail();
            $pengajuan->update([
                'no_surat'  => $request->no_surat,
                'tanggal_surat'  => $request->tanggal_surat,
                'updated_at'  => now(),
            ]);

            return redirect()->back()->with('success', 'Berhasil menambahkan No. Surat');
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error', 'Gagal menambahkan No. Surat: ' . $th->getMessage());
        }
    }

    public function verifikasi(Request $request, $uuid)
    {
        $request->validate([
            'keterangan' => 'required|string',
        ]);

        try {
            $pengajuan = Pengajuan::where('uuid', $uuid)->firstOrFail();

            $pengajuan->update([
                'status'      => 'Disetujui',
                'keterangan'  => $request->keterangan,
                'updated_at'  => now(),
            ]);

            // Monitoring::create([
            //     'uuid'            => (string) Uuid::uuid4()->toString(),
            //     'statusenabled'   => true,
            //     'uuid_pengajuan'  => $pengajuan->uuid,
            //     'judul'           => $request->judul,
            //     'file'            => $request->file,
            // ]);

            return redirect()->route('persetujuan.index')->with('success', 'Pengajuan magang diverifikasi.');

        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Verifikasi gagal: ' . $th->getMessage());
        }


    }

    public function tolak(Request $request, $uuid)
    {
        $request->validate([
            'keterangan' => 'required|string',
        ]);

        Pengajuan::where('uuid', $uuid)->update([
            'status'      => 'Ditolak',
            'keterangan'  => $request->keterangan,
            'updated_at'  => now(),
        ]);

        return redirect()->route('persetujuan.index')->with('success', 'Pengajuan magang ditolak.');
    }

    public function approve(Request $request, $uuid)
    {

        Pengajuan::where('uuid', $uuid)->update([
            'disetujui_oleh'      => Auth::user()->id,
            'setuju'  => true,
            'status'      => 'Disetujui',
        ]);

        return redirect()->route('persetujuan.index')->with('success', 'Pengajuan magang diapprove.');
    }
}
