<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use Illuminate\Http\Request;
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
        ->groupBy('us.id', 'us.nim', 'us.name')
        ->get();


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
            ->select(
                'mt.uuid',
                'mt.created_at as tgl_submit',
                'mt.judul',
                'mt.keterangan',
                'mt.file',
                'mt.status',
                'mt.keterangan_evaluasi',
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
            ->orderBy('mt.created_at', 'desc')
            ->get();

        return view('dashboard.evaluasi.user', compact('user', 'monitorings'));
    }

    public function verifikasi(Request $request, $uuid)
    {
        try {
            $evaluasi = Monitoring::where('uuid', $uuid)->firstOrFail();

            $evaluasi->update([
                'status'      => 1,
                'keterangan_evaluasi'  => $request->keterangan_evaluasi
            ]);

            return redirect()->route('evaluasi.index')->with('success', 'Data berhasil diverifikasi.');

        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Verifikasi gagal: ' . $th->getMessage());
        }


    }

}
