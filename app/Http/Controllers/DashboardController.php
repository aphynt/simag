<?php

namespace App\Http\Controllers;

use App\Models\Pengajuan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        // Statistik utama
        $totalPengajuan   = Pengajuan::count();
        $totalDisetujui   = Pengajuan::where('status', 'Disetujui')->count();
        $totalDitolak     = Pengajuan::where('status', 'Ditolak')->count();
        $totalMenunggu    = Pengajuan::whereNotIn('status', ['Disetujui', 'Ditolak'])->count();

        // Jumlah per status (untuk donut chart)
        $statusCounts = Pengajuan::select('status', DB::raw('COUNT(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status');

        // Jumlah per jenis magang (untuk bar chart)
        $jenisMagangCounts = Pengajuan::select('jenis_magang', DB::raw('COUNT(*) as total'))
            ->groupBy('jenis_magang')
            ->pluck('total', 'jenis_magang'); // ['Magang Mandiri' => 5, 'MBKM' => 3, ...]

        // Pengajuan per bulan (untuk area chart)
        $pengajuanPerBulan = Pengajuan::selectRaw("DATE_FORMAT(tanggal_pengajuan, '%Y-%m') as bulan, COUNT(*) as total")
            ->groupBy('bulan')
            ->orderBy('bulan')
            ->get(); // [{bulan: '2025-12', total: 1}, ...]

        // Daftar pengajuan terbaru
        $latestPengajuan = DB::table('pengajuan as pj')
            ->leftJoin('users as us', 'pj.user_id', 'us.id')
            ->select(
                'pj.uuid',
                'us.name',
                'us.nim',
                'pj.nama_perusahaan',
                'pj.bagian_perusahaan',
                'pj.jenis_magang',
                'pj.status',
                'pj.tanggal_pengajuan'
            )
            ->orderBy('pj.created_at', 'desc')
            ->limit(10)
            ->get();

        return view('dashboard.index', compact(
            'totalPengajuan',
            'totalDisetujui',
            'totalDitolak',
            'totalMenunggu',
            'statusCounts',
            'jenisMagangCounts',
            'pengajuanPerBulan',
            'latestPengajuan'
        ));
    }
}
