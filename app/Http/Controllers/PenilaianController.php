<?php

namespace App\Http\Controllers;

use App\Models\Penilaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class PenilaianController extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();

        // $query = DB::table('pengajuan as pj')
        //     ->leftJoin('users as us', 'pj.user_id', '=', 'us.id')
        //     ->leftJoin('penilaian as pn', 'pj.uuid', '=', 'pn.uuid_pengajuan')
        //     ->select(
        //         'pj.uuid',
        //         'pj.user_id',
        //         'us.name',
        //         'us.nim',
        //         'pj.jenis_magang',
        //         'pj.statusenabled',
        //         'pn.status as status_nilai',
        //         'pn.rekomendasi'
        //     )
        //     ->where('pj.statusenabled', true);



        // // Mahasiswa hanya melihat magangnya sendiri
        // if ($user->role === 'mahasiswa') {
        //     $query->where('pj.user_id', $user->id);
        // }

        // $data = $query->get();

        $data = DB::table('monitoring as mt')
            ->leftJoin('pengajuan as pg', 'mt.uuid_pengajuan', '=', 'pg.uuid')
            ->leftJoin('users as us', 'pg.user_id', '=', 'us.id')
            ->select(
                'us.id as user_id',
                'pg.uuid',
                'us.nim',
                'us.name',
                DB::raw('COUNT(mt.uuid) as total_monitoring'),
                DB::raw('MAX(mt.created_at) as last_submit')
            )
            ->where('pg.statusenabled', true)
            ->groupBy('us.id', 'pg.uuid', 'us.nim', 'us.name');
            if ($user->role === 'mahasiswa') {
                $data->where('user_id', $user->id);
            }

        $data = $data->get();

        return view('dashboard.penilaian.index', compact('data'));
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

        $item = DB::table('penilaian as pn')
        ->leftJoin('pengajuan as pg', 'pn.uuid_pengajuan', 'pg.uuid')
        ->leftJoin('users as us', 'pn.penilai_id', 'us.id')
        ->select(
            'pn.uuid_pengajuan',
            'us.nim',
            'us.name',
            'pg.nama_perusahaan',
            'pg.bagian_perusahaan',
            'pn.penilai_name',
            'pn.created_at',
            'pn.kehadiran',
            'pn.sikap',
            'pn.teknis',
            'pn.problem_solving',
            'pn.kerja_tim',
            'pn.penyelesaian_tugas',
            'pn.laporan',
            'pn.nilai_akhir',
            'pn.rekomendasi',
            'pn.komentar',
            'pn.file_feedback',
        )->where('uuid_pengajuan',$uuid)->first();

        if($item == null){
            return view('dashboard.penilaian.form', compact('data'))->with('info', 'Maaf, penilaian pada magang tersebut belum ada, silakan mengisi form penilaian ini');
        }
        return view('dashboard.penilaian.detail', compact('item'));
    }

    public function simpan(Request $request, $uuid)
    {
        // dd($request->all());
        // Validasi
        $request->validate([
            'kehadiran'            => 'nullable|integer|between:1,5',
            'sikap'                => 'nullable|integer|between:1,5',
            'teknis'               => 'nullable|integer|between:1,5',
            'problem_solving'      => 'nullable|integer|between:1,5',
            'kerja_tim'            => 'nullable|integer|between:1,5',
            'penyelesaian_tugas'   => 'nullable|integer|between:1,5',
            'laporan'              => 'nullable|integer|between:1,5',
            'komentar'             => 'nullable|string',
            'rekomendasi'          => 'nullable|in:Lulus,Perbaikan,Tidak Lulus',
            'file_feedback'        => 'nullable|file|mimes:pdf,doc,docx,zip,jpg,jpeg,png|max:5120', // max 5MB
            'status'               => 'nullable|in:0,1',
        ]);

        try {
            $kriteria = [
                $request->kehadiran,
                $request->sikap,
                $request->teknis,
                $request->problem_solving,
                $request->kerja_tim,
                $request->penyelesaian_tugas,
                $request->laporan,
            ];

            // Filter null & hitung rata-rata
            $kriteria_filtered = array_filter($kriteria, fn($v) => !is_null($v));

            $nilaiAkhir = null;
            if (count($kriteria_filtered) > 0) {
                $nilaiAkhir = array_sum($kriteria_filtered) / count($kriteria_filtered);
            }

            $fileFeedbackPath = null;
            if ($request->hasFile('file_feedback')) {
                $fileFeedbackPath = $request->file('file_feedback')->store('penilaian_feedback', 'public');
            }

            $save = Penilaian::create([
                'uuid' => (string) Uuid::uuid4()->toString(),
                'uuid_pengajuan'       => $uuid,
                'judul'                => $request->judul,

                'kehadiran'            => $request->kehadiran,
                'sikap'                => $request->sikap,
                'teknis'               => $request->teknis,
                'problem_solving'      => $request->problem_solving,
                'kerja_tim'            => $request->kerja_tim,
                'penyelesaian_tugas'   => $request->penyelesaian_tugas,
                'laporan'              => $request->laporan,

                'nilai_akhir'          => $nilaiAkhir,
                'rekomendasi'          => $request->rekomendasi,
                'komentar'             => $request->komentar,

                'file_feedback'        => $fileFeedbackPath,
                'penilai_id'           => Auth::id(),
                'penilai_name'         => Auth::user()->name ?? null,
                'status'               => 1,
            ]);

            return redirect()->route('penilaian.index')->with('success', 'Penilaian berhasil disimpan!');
        } catch (\Throwable $th) {

            return redirect()->back()->with('info', 'Penilaian gagal disimpan: ' . $th->getMessage());
        }
    }
}
