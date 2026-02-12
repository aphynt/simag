<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Surat Rekomendasi</title>

    <style>
        /* =========================
   DOMPDF FRIENDLY CSS
========================= */

        @page {
            size: legal portrait;
            margin-top: 0.5cm;      /* kecilkan */
            margin-left: 2.54cm;
            margin-right: 2.54cm;
            margin-bottom: 2.54cm;
        }
        *{
            margin-top:0;
            padding-top:0;
        }

        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 12pt;
            margin: 0;
            padding: 0;
            color: #000;
        }

        .header-table,
        .header-table tr,
        .header-table td{
            margin-top:20px !important;
            padding-top:0 !important;
        }

        /* Hilangkan margin default heading */
        .header-text h3{
            margin-top:0;
            margin-bottom:0;
            line-height:18px;   /* tetap rapi tapi rapat */
        }

        /* Logo jangan nambah space atas */
        .logo{
            display:block;
            margin-top:0;
        }

        .logo{
            width:130px;
            margin:0;
            padding:0;
            display:inline-block;
        }
        .logoumi{
            width: 30px;
        }

        .header-text {
            text-align: left;
        }

        .header-text h3 {
            margin: 0;
            line-height: 18px;
        }

        table {
            border-collapse: collapse;
        }

        td,
        th {
            padding: 1px 3px;
            /* super tipis */
            line-height: 1.1;
            /* rapat tapi masih terbaca */
        }

        /* ---------- LINE ---------- */
        .line {
            width: 100%;
            height: 6px;
            border-top: 3px solid #000;
            border-bottom: 2px solid #000;
            margin: 10px 0;
        }

        /* ---------- ADDRESS ---------- */
        .address {
            font-size: 9pt;
            line-height: 12pt;
            text-align: center;
            margin-bottom: 10px;
        }

        /* ---------- CONTENT ---------- */
        .center {
            text-align: center;
        }

        .justify {
            text-align: justify;
        }

        .mt-10 {
            margin-top: 10px;
        }

        .mt-20 {
            margin-top: 20px;
        }

        .mt-30 {
            margin-top: 30px;
        }

        .identity h3 {
            margin: 0;
            text-transform: uppercase;
            text-decoration: underline;
        }

        .table-data {
            margin-top: 10px;
            width: 100%;
        }

        .table-data td {
            padding: 2px 4px;
            vertical-align: top;
        }

        .list {
            margin-left: 20px;
        }

        .signature-table {
            margin-top: 40px;
        }

        .signature-table table {
            border-collapse: collapse;
        }

        .signature-table td {
            padding: 2px 4px;
            line-height: 1.2;
            vertical-align: top;
        }

        .footer {
            margin-top: 30px;
            font-size: 11pt;
        }

    </style>
</head>
@php
use Carbon\Carbon;

Carbon::setLocale('id');

$mulaiCarbon   = Carbon::parse($data->tanggal_pengajuan);
$selesaiCarbon = Carbon::parse($data->tanggal_selesai);

$mulai   = $mulaiCarbon->translatedFormat('d F Y');
$selesai = $selesaiCarbon->translatedFormat('d F Y');

// $durasiBulan = max(
//     1,
//     (int) ceil(
//         $mulaiCarbon->floatDiffInMonths($selesaiCarbon)
//     )
// );
$diff = $mulaiCarbon->diff($selesaiCarbon);
$bulan = ($diff->y * 12) + $diff->m;
$hari  = $diff->d;
$now = Carbon::now();
$masehi = $now->translatedFormat('d F Y');
@endphp
<body>

    <!-- ================= HEADER ================= -->
    <table class="header-table">
        <tr>
            <td style="width:220px; font-size:0;">
                <img src="{{ public_path('logo/umi.png') }}" class="logoumi">
                <img src="{{ public_path('logo/LogoFikom_HitamKuning.png') }}" class="logo">
            </td>
            <td class="header-text">
                <h3>YAYASAN WAKAF UMI</h3>
                <h3>UNIVERSITAS MUSLIM INDONESIA</h3>
                <h3>FAKULTAS ILMU KOMPUTER</h3>
                <h3>PROGRAM STUDI {{ Str::upper($data->program_studi) }}</h3>
            </td>
        </tr>
    </table>

    <div class="line"></div>

    <!-- ================= ADDRESS ================= -->
    <div class="address">
        <p style="font-size: 7pt">Jln. Urip Sumohardjo Km.05 Gedung Fakultas Ilmu Komputer Lt.I Kampus II UMI
            Tlp.(0411) 449775-453308-453818, Fax (0411) 453009 Makassar 90231</p>
        <p>website: fikom.umi.ac.id, email: fikom@umi.ac.id</p>
    </div>

    <p class="center"><i>Bismillahir Rahmanir Rahiim</i></p>

    <!-- ================= CONTENT ================= -->
    <div class="identity center mt-20">
        <h3>Surat Rekomendasi</h3>
        <p>Nomor : {{ $data->no_surat }}</p>
    </div>

    <div class="mt-20">
        <p>Kepada Yth :</p>
        <p><b>{{ $data->nama_perusahaan }}</b></p>
    </div>

    <p class="mt-20"><i>Assalamualaikum Warahmatullahi Wabarakatuh</i></p>

    <p class="justify mt-10">
        Dengan Rahmat Allah SWT., yang bertandatangan di bawah ini Pimpinan Fakultas Ilmu Komputer
        Universitas Muslim Indonesia merekomendasikan kepada :
    </p>

    <table class="table-data">
        <tr>
            <td width="90">Nama</td>
            <td width="10">:</td>
            <td><b>{{ $data->name }}</b></td>
        </tr>
        <tr>
            <td>NIM</td>
            <td>:</td>
            <td><b>{{ $data->nim }}</b></td>
        </tr>
        <tr>
            <td>Prodi</td>
            <td>:</td>
            <td><b>{{ $data->program_studi }}</b></td>
        </tr>
        <tr>
            <td>Nomor HP</td>
            <td>:</td>
            <td><b>{{ $data->no_hp }}</b></td>
        </tr>
    </table>

    <p class="justify mt-20">
        Untuk melaksanakan kegiatan magang mandiri selama {{ $bulan }} bulan {{ $hari }} hari terhitung mulai tanggal
        {{ $mulai }} sampai {{ $selesai }} bertempat di {{ $data->nama_perusahaan }}
        Alamat : {{ $data->alamat_perusahaan }}
        dengan ketentuan sebagai berikut :
    </p>

    <ol class="list">
        <li>Mentaati Kriteria Statuta UMI.</li>
        <li>Menjaga nama baik almamater.</li>
        <li>Menjalin silaturrahim dan ukhuwah Islamiyah.</li>
        <li>Mentaati peraturan perundang-undangan yang berlaku.</li>
        <li>Melaporkan secara tertulis setelah kegiatan selesai.</li>
        <li>Tetap melaksanakan kewajiban akademik selama magang.</li>
    </ol>

    <p class="justify mt-20">
        Demikian surat rekomendasi ini dibuat dan diberikan kepada yang bersangkutan
        untuk dipergunakan sebagaimana mestinya.
    </p>

    <p><i>Wallahu Waliyyut Taufiq Walhidayah</i></p>
    <!-- ================= SIGNATURE ================= -->
    <table class="signature-table" width="100%">
        <tr>
            <!-- kolom kiri kosong -->
            <td width="50%"></td>

            <!-- kolom kanan (isi tanda tangan) -->
            <td width="50%" style="text-align:left">

                <!-- tanggal -->
                <table width="100%">
                    <tr>
                        <td>Makassar,</td>
                        <td>{{ $masehi }}</td>
                    </tr>
                    {{-- <tr>
                        <td></td>
                        <td>{{ $masehi }} M</td>
                    </tr> --}}
                </table>

                <br><br>

                <!-- jabatan -->
                <p>An. Dekan</p>
                <p><b>Wakil Dekan III</b></p>
                <p>Bidang Kemahasiswaan dan Alumni</p>

                <p>@if ($data->qrcode != null)<img src="{{ $data->qrcode }}" style="max-width: 70px;">@endif</p>

                <!-- nama -->
                <p><b><u>Poetri Lestari L.B, S.Kom., MT., MTA</u></b></p>
                <p>NIP : 114090894</p>

            </td>
        </tr>
    </table>


</body>

</html>
