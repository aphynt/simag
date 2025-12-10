<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Ramsey\Uuid\Uuid;

class PersetujuanController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();

        $data = DB::table('pengajuan as pj')
        ->leftJoin('users as us', 'pj.user_id', 'us.id')
        ->select(
            'pj.id',
            'pj.user_id',
            'pj.uuid',
            'us.name',
            'us.nim',
            'pj.statusenabled',
            'pj.tanggal_pengajuan',
            'pj.tanggal_selesai',
            'pj.alasan_magang',
            'pj.kompetensi_ilmu',
            'pj.jenis_magang',
            'pj.status',
            'pj.keterangan',
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

        )
        ->where('pj.statusenabled', true)
        ->where('pj.uuid', $uuid)
        ->first();

        if($data->jenis_magang == 'Magang Mandiri'){

            // return view('dashboard.persetujuan.suratPengantar', compact('data'));

            $pdf = PDF::loadView('dashboard.persetujuan.suratPengantar', compact('data'));
            return $pdf->download('Surat Pengantar.pdf');
        }else{
            return view('dashboard.persetujuan.suratRekomendasi', compact('data'));

            // $pdf = PDF::loadView('dashboard.persetujuan.suratRekomendasi', compact('data'));
            // return $pdf->download('Surat Rekomendasi.pdf');
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
}
