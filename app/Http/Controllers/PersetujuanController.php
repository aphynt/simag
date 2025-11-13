<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersetujuanController extends Controller
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
            'pj.status',
            'pj.keterangan',
        )
        ->where('pj.statusenabled', true)->get();

        return view('dashboard.persetujuan.index', compact('data'));
    }
}
