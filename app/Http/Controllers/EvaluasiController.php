<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvaluasiController extends Controller
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
            'mt.status',
            )
        ->where('pg.statusenabled', true)
        ->get();

        return view('dashboard.evaluasi.index', compact('data'));
    }

}
