<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class PengajuanController extends Controller
{
    //
    public function index()
    {
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
        )
        ->where('pj.statusenabled', true);
        $user = Auth::user();
        if ($user->role === 'mahasiswa') {
            $data->where('pj.user_id', $user->id);
        }
        if($user->role == 'prodi'){
            $data->where('us.program_studi', $user->program_studi);
        }
        $data = $data->get();

        return view('dashboard.pengajuan.index', compact('data'));
    }

    public function insert()
    {
        $uuidPengajuanTerakhir = DB::table('pengajuan')
        ->where('user_id', Auth::id())
        ->latest('created_at')
        ->value('uuid');

        $dokumen = DB::table('monitoring')
        ->where('uuid_pengajuan', $uuidPengajuanTerakhir)
        ->whereIn('judul', [
            'Logbook Magang',
            'Sertifikat Magang',
            'Laporan Akhir',
        ])
        ->orderBy('created_at', 'desc')
        ->get()
        ->unique('judul');

        $dokumen2 = DB::table('monitoring')
        ->where('uuid_pengajuan', $uuidPengajuanTerakhir)
        ->whereIn('judul', [
            'Logbook Magang',
        ])
        ->orderBy('created_at', 'desc')
        ->get()
        ->unique('judul');

        $punyaLogbook = $dokumen->where('judul', 'Logbook Magang')->isNotEmpty();
        $punyaSertifikat = $dokumen->where('judul', 'Laporan Akhir')->isNotEmpty();

        $semuaTerverifikasi = $dokumen2->every(function ($item) {
            return $item->status_disetujui === 'Terverifikasi';
        });

        if ($uuidPengajuanTerakhir) {

            if (!$punyaLogbook || !$punyaSertifikat) {
                return back()->with(
                    'info',
                    'Maaf, Anda belum melengkapi dokumen atau belum terverifikasi di laman pengajuan.'
                );
            }

            if (!$semuaTerverifikasi) {
                return back()->with(
                    'info',
                    'Silahkan melengkapi dokumen (logbook, sertifikat, laporan akhir) untuk diverifikasi agar dapat mengajukan magang berikutnya.'

                );
            }
        }

        if(Auth::user()->program_studi == null && Auth::user()->no_hp == null && Auth::user()->semester == null){
            return redirect()->route('user.index')->with('info', 'Maaf, silakan lengkapi profile terlebih dahulu!');
        }
        return view('dashboard.pengajuan.insert');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $user = Auth::user();

        $filePath = null;
        if ($request->hasFile('filePendukung')) {
            $filePath = $request->file('filePendukung')->store('filePengajuan', 'public');
        }

        $pengajuan = Pengajuan::create([
            'user_id'           => $user->id,
            'uuid' => (string) Uuid::uuid4()->toString(),
            'statusenabled' => true,
            'tanggal_pengajuan' => $request->tanggalPengajuan,
            'tanggal_selesai'   => $request->tanggalSelesai,
            'nama_perusahaan'   => $request->namaPerusahaan,
            'bagian_perusahaan'   => $request->bagianPerusahaan,
            'alamat_perusahaan'   => $request->alamatInstansi,
            'alasan_magang'     => $request->alasanMagang,
            'kompetensi_ilmu'   => $request->kompetensiIlmu,
            'jenis_magang'   => $request->jenisMagang,
            'file_pendukung'    => $filePath,
            'setuju'            => true,
            'status'            => 'Diajukan',
        ]);

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil dikirim.');
    }

    public function edit($uuid)
    {
        $cekData = DB::table('pengajuan as pj')->where('pj.uuid', $uuid)
        ->first();

        if($cekData->status = 'Diajukan'){
            return redirect()->back()->with('info', 'Pengajuan ini telah di progress, mohon menunggu atau membuat ulang pengajuan');
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
            'pj.statusenabled',
            'pj.tanggal_pengajuan',
            'pj.tanggal_selesai',
            'pj.alasan_magang',
            'pj.kompetensi_ilmu',
            'pj.jenis_magang',
            'pj.file_pendukung',
        )
        ->where('pj.statusenabled', true)
        ->where('pj.uuid', $uuid)
        ->first();

        return view('dashboard.pengajuan.edit', compact('data'));
    }

    public function update(Request $request, $uuid)
    {
        try {
                $pengajuan = Pengajuan::where('uuid', $uuid)->first();
                $filePath = $pengajuan->file_pendukung;
                if ($request->hasFile('filePendukung')) {
                    // Jika ada file baru, simpan dan update file path
                    $filePath = $request->file('filePendukung')->store('filePengajuan', 'public');
                }

                // Update pengajuan dengan data baru
                $pengajuan->update([
                    'statusenabled' => true,
                    'tanggal_pengajuan' => $request->tanggalPengajuan,
                    'tanggal_selesai' => $request->tanggalSelesai,
                    'alasan_magang' => $request->alasanMagang,
                    'kompetensi_ilmu' => $request->kompetensiIlmu,
                    'jenis_magang' => $request->jenisMagang,
                    'file_pendukung' => $filePath,
                    'setuju' => true,
                    'status' => 'Diajukan',
                ]);

            return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil diupdate!');
        } catch (\Throwable $th) {
            return redirect()->route('pengajuan.index')->with('info', 'Pengajuan gagal diupdate! ' . $th->getMessage());
        }
    }

    public function delete($uuid)
    {
        try {
            Pengajuan::where('uuid', $uuid)
        ->update(['statusenabled' => 0]);

        return redirect()->back()->with('success', 'Pengajuan berhasil dihapus!');
        } catch (\Throwable $th) {

           return redirect()->back()->with('info', 'Pengajuan gagal dihapus! ' . $th->getMessage());
        }
    }
}
