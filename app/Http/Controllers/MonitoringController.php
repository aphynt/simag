<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

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
            'mt.lokasi_magang',
            'mt.judul',
            'mt.status',
            'mt.keterangan',
            )
        ->where('pg.statusenabled', true)
        ->get();

        return view('dashboard.monitoring.index', compact('data'));
    }

    public function insert()
    {
        $pengajuan = Pengajuan::where('statusenabled', true)
        ->where('user_id', Auth::user()->id)
        ->whereIn('status', ['Diverifikasi', 'Disetujui'])->get();


        return view('dashboard.monitoring.insert', compact('pengajuan'));
    }

    public function post(Request $request)
    {
        // dd($request->all());

        try {

            $filePath = null;
            if ($request->hasFile('file')) {
                $filePath = $request->file('file')->store('fileMonitoring', 'public');
            }

            Monitoring::create([
                'uuid' => (string) Uuid::uuid4()->toString(),
                'statusenabled' => true,
                'uuid_pengajuan' => $request->uuid_pengajuan,
                'judul' => $request->judul,
                'lokasi_magang' => $request->lokasi_magang,
                'keterangan' => $request->keterangan,
                'status' => false,
                'file' => $filePath,
            ]);

            return redirect()->route('monitoring.index')->with('success', 'Berhasil menambahkan data');

        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Gagal menambahkan data: ' . $th->getMessage());
        }
    }


}
