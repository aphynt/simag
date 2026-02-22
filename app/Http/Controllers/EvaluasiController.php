<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EvaluasiController extends Controller
{
    //
    public function index()
    {

        //Data old
        // $data = DB::table('monitoring as mt')
        // ->leftJoin('pengajuan as pg', 'mt.uuid_pengajuan', 'pg.uuid')
        // ->leftJoin('users as us', 'pg.user_id', 'us.id')
        // ->select(
        //     'mt.uuid',
        //     'pg.statusenabled',
        //     'mt.created_at as tgl_submit',
        //     'us.nim',
        //     'us.name',
        //     'pg.jenis_magang',
        //     'mt.judul',
        //     'mt.status',
        //     'mt.keterangan_evaluasi',
        //     )
        // ->where('pg.statusenabled', true)
        // ->get();

        //Data new
        $data = DB::table('monitoring as mt')
        ->leftJoin('pengajuan as pg', 'mt.uuid_pengajuan', '=', 'pg.uuid')
        ->leftJoin('users as us', 'pg.user_id', '=', 'us.id')
        ->select(
            'us.id as user_id',
            'us.nim',
            'us.name',
            DB::raw('COUNT(mt.uuid) as total_monitoring'),
            DB::raw('MAX(mt.created_at) as last_submit')
        )
        ->where('pg.statusenabled', true)
        ->groupBy('us.id', 'us.nim', 'us.name');

        $user = Auth::user();
        if ($user->role === 'mahasiswa') {
            $data->where('pg.user_id', $user->id);
        }
        if($user->role == 'prodi'){
            $data->where('us.program_studi', $user->program_studi);
        }
        $data = $data->orderByDesc('last_submit')->get();



        return view('dashboard.evaluasi.index', compact('data'));
    }

    public function detail($uuid)
    {
        $data = DB::table('monitoring as mt')
        ->leftJoin('pengajuan as pg', 'mt.uuid_pengajuan', 'pg.uuid')
        ->leftJoin('users as us', 'pg.user_id', 'us.id')
        ->select(
            'mt.uuid',
            'pg.statusenabled',
            'mt.created_at as tgl_submit',
            'us.nim',
            'us.name',
            'pg.tanggal_pengajuan',
            'pg.tanggal_selesai',
            'pg.nama_perusahaan',
            'pg.bagian_perusahaan',
            'pg.alamat_perusahaan',
            'pg.alasan_magang',
            'pg.alamat_perusahaan',
            'pg.alamat_perusahaan',
            'pg.jenis_magang',
            'mt.judul',
            'mt.keterangan',
            'mt.file',
            'mt.status',
            )
        ->where('pg.statusenabled', true)
        ->where('mt.uuid', $uuid)
        ->first();

        return view('dashboard.evaluasi.detail', compact('data'));
    }

    public function user($userId)
    {
        $user = DB::table('users')
            ->select('id', 'nim', 'name')
            ->where('id', $userId)
            ->first();

        $monitorings = DB::table('monitoring as mt')
        ->leftJoin('pengajuan as pg', 'mt.uuid_pengajuan', '=', 'pg.uuid')
        ->leftJoin('users as us', 'mt.user_setuju', '=', 'us.id') // <- penyetuju
        ->select(
            'mt.uuid',
            'mt.created_at as tgl_submit',
            'mt.judul',
            'mt.keterangan',
            'mt.file',
            'mt.status',
            'mt.keterangan_evaluasi',
            'mt.status_disetujui',
            'mt.user_setuju',
            'us.role as role_penyetuju',
            'pg.jenis_magang',
            'mt.lokasi_magang',
            'pg.tanggal_pengajuan',
            'pg.tanggal_selesai',
            'pg.nama_perusahaan',
            'pg.bagian_perusahaan',
            'pg.alamat_perusahaan'
        )
        ->where('pg.user_id', $userId)
        ->where('pg.statusenabled', true)
        ->orderByDesc('mt.created_at')
        ->get();

        return view('dashboard.evaluasi.user', compact('user', 'monitorings'));
    }

    public function verifikasi(Request $request, $uuid)
    {
        try {
            $evaluasi = Monitoring::where('uuid', $uuid)->firstOrFail();
            $role = Auth::user()->role;

            // Kalau sudah ditolak, tidak boleh diverifikasi lagi
            if ($evaluasi->status_disetujui === 'Ditolak') {
                return back()->with('info', 'Data sudah ditolak.');
            }

            // =======================
            // STEP 1 - PRODI
            // =======================
            if (!$evaluasi->user_setuju && $role === 'prodi') {

                $evaluasi->update([
                    'user_setuju' => Auth::user()->id,
                    'keterangan_evaluasi' => $request->keterangan_evaluasi,
                    'status_disetujui' => 'Menunggu WD3',
                    'status' => 0
                ]);

                return redirect()->route('evaluasi.index')
                    ->with('success', 'Berhasil diverifikasi Prodi, menunggu WD3.');
            }

            // =======================
            // STEP 2 - WD3 (FINAL)
            // =======================
            if ($evaluasi->user_setuju && $role === 'wd3') {

                $evaluasi->update([
                    'user_setuju' => Auth::user()->id,
                    'keterangan_evaluasi' => $request->keterangan_evaluasi,
                    'status_disetujui' => 'Terverifikasi',
                    'status' => 1
                ]);

                return redirect()->route('evaluasi.index')
                    ->with('success', 'Data berhasil diverifikasi WD3.');
            }

            return back()->with('info', 'Urutan verifikasi tidak sesuai.');

        } catch (\Throwable $th) {
            return back()->with('error', 'Verifikasi gagal: ' . $th->getMessage());
        }
    }

    public function verifikasiTolak(Request $request, $uuid)
    {
        try {
            $evaluasi = Monitoring::where('uuid', $uuid)->firstOrFail();

            $evaluasi->update([
                'user_setuju' => Auth::user()->id,
                'keterangan_evaluasi' => $request->keterangan_evaluasi,
                'status_disetujui' => 'Ditolak',
                'status' => -1 // status final ditolak
            ]);

            return redirect()->route('evaluasi.index')
                ->with('success', 'Data berhasil ditolak.');

        } catch (\Throwable $th) {
            return back()->with('error', 'Tolak gagal: ' . $th->getMessage());
        }
    }

}
