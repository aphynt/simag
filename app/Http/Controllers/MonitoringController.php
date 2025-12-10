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
            'mt.judul',
            'mt.status',
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
                'keterangan' => $request->keterangan,
                'status' => false,
                'file' => $filePath,
            ]);

            return redirect()->route('monitoring.index')->with('success', 'Berhasil menambahkan data');

        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Gagal menambahkan data: ' . $th->getMessage());
        }
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

        return view('dashboard.monitoring.detail', compact('data'));
    }

    public function verifikasi(Request $request, $uuid)
    {
        try {
            $monitoring = Monitoring::where('uuid', $uuid)->firstOrFail();

            $monitoring->update([
                'status'      => 1,
                'keterangan_evaluasi'  => $request->keterangan_evaluasi
            ]);

            return redirect()->route('monitoring.index')->with('success', 'Data berhasil diverifikasi.');

        } catch (\Throwable $th) {
            return redirect()->back()->with('info', 'Verifikasi gagal: ' . $th->getMessage());
        }


    }
}
