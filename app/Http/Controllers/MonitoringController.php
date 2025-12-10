<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonitoringController extends Controller
{
    //
    public function index()
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
            'pg.jenis_magang',
            'mt.judul',
            'mt.keterangan',
            )
        ->where('pg.statusenabled', true)
        ->get();

        return view('dashboard.monitoring.index', compact('data'));
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
            )
        ->where('pg.statusenabled', true)
        ->where('mt.uuid', $uuid)
        ->first();

        return view('dashboard.monitoring.detail', compact('data'));
    }
}
