<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Surat Pengantar</title>

<style>
/* =========================
   DOMPDF FRIENDLY CSS
========================= */

@page{
    size: legal portrait;
    margin-top:0.5cm;
    margin-left:2.54cm;
    margin-right:2.54cm;
    margin-bottom:0.54cm;
}

body{
    font-family:"Times New Roman", Times, serif;
    font-size:12pt;
    margin:0;
    padding:0;
    color:#000;
    text-align:center;
}

/* ---------- HEADER ---------- */
.header-table{
    width:100%;
    border-collapse:collapse;
}
.header-table td{
    vertical-align:middle;
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
.header-text{
    text-align:left;
}
.header-text h5{
    margin:0;
    line-height:18px;
    font-size: 14pt;
}
table {
    border-collapse: collapse;
}

td, th {
    padding: 1px 3px;   /* super tipis */
    line-height: 1.1;  /* rapat tapi masih terbaca */
}

/* ---------- LINE ---------- */
.line{
    width:100%;
    height:6px;
    border-top:3px solid #000;
    border-bottom:2px solid #000;
    margin:10px 0;
}

/* ---------- ADDRESS ---------- */
.address{
    font-size:9pt;
    line-height:12pt;
    margin-bottom:12px;
}

/* ---------- CONTENT ---------- */
.justify{ text-align:justify; }
.center{ text-align:center; }

.mt-10{ margin-top:10px; }
.mt-20{ margin-top:20px; }
.mt-30{ margin-top:30px; }

.identity{
    text-align:left;     /* paksa kiri */
}

.identity table{
    margin-left:0;       /* hilangkan auto center */
}

.mt-20{
    text-align:left;     /* untuk blok Kepada Yth */
}

/* .identity td{
    padding:2px 6px;
} */

.data-table,
.info-table{
    width:100%;
    margin-top:10px;
}
.data-table td,
.info-table td{
    padding:2px 4px;
    vertical-align:top;
}

.signature-table{
    width:100%;
    margin-top:40px;
}
.signature-table td{
    vertical-align:top;
}

/* ---------- FOOTER ---------- */
.footer{
    margin-top:25px;
    font-size:11pt;
    text-align:left;
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
        <h5>YAYASAN WAKAF UMI</h5>
        <h5>UNIVERSITAS MUSLIM INDONESIA</h5>
        <h5>FAKULTAS ILMU KOMPUTER</h5>
        <h5>PROGRAM STUDI {{ Str::upper($data->program_studi) }}</h5>
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
<div class="identity mt-20">
<table>
<tr>
    <td>Nomor</td><td>:</td><td>{{ $data->no_surat }}</td>
</tr>
<tr>
    <td>Lampiran</td><td>:</td><td>-</td>
</tr>
<tr>
    <td>Perihal</td><td>:</td><td><b>Pengantar {{ $data->jenis_magang }}</b></td>
</tr>
</table>
</div>

<div class="mt-20">
    <p>Kepada Yth :</p>
    <p><b>Dekan Fakultas Ilmu Komputer</b></p>
    <p>Di - Makassar</p>
</div>

<p class="mt-20"><i>Assalamualaikum Warahmatullahi Wabarakatuh</i></p>

<p class="justify mt-10">
Dengan Rahmat Allah SWT., kami sampaikan kepada Bapak/Ibu bahwa mahasiswa tersebut di bawah ini:
</p>

<table class="data-table">
<tr>
    <td width="90">Nama</td><td width="10">:</td>
    <td>{{ $data->name }}</td>
</tr>
<tr>
    <td>NIM</td><td>:</td>
    <td>{{ $data->nim }}</td>
</tr>
<tr>
    <td>Prodi</td><td>:</td>
    <td>{{ $data->program_studi }}</td>
</tr>
<tr>
    <td>Nomor HP</td><td>:</td>
    <td>{{ $data->no_hp }}</td>
</tr>
</table>

<div class="mt-20">
<p class="justify">
Mengajukan permohonan agar dapat diberikan surat pengantar yang ditujukan kepada:
</p>

<table class="info-table">
<tr>
    <td width="130">Nama Perusahaan</td><td width="10">:</td>
    <td>{{ $data->nama_perusahaan }}</td>
</tr>
<tr>
    <td>Bagian</td><td>:</td>
    <td>{{ $data->bagian_perusahaan }}</td>
</tr>
<tr>
    <td>Alamat</td><td>:</td>
    <td>{{ $data->alamat_perusahaan }}</td>
</tr>
<tr>
    <td>Tujuan</td><td>:</td>
    <td>Melaksanakan kegiatan {{ $data->jenis_magang }} sebagai bagian dari pemenuhan persyaratan akademik</td>
</tr>
</table>

<p class="justify mt-10">
Untuk melakukan magang selama {{ $bulan }} bulan {{ $hari }} hari terhitung mulai tanggal
{{ $mulai }} sampai {{ $selesai }}.
</p>
</div>

<p class="justify mt-20">
Demikian surat pengantar ini, atas perhatian dan kerja samanya kami ucapkan terima kasih.
</p>

<p><i>Wallahu Waliyyut Taufiq Walhidayah</i></p>

<!-- ================= SIGNATURE ================= -->
<table class="signature-table">
<tr>
    <td width="60%"></td>
    <td>
        <p>Makassar, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
        <p>Ketua Program Studi</p>
        <p>@if ($data->qrcode != null)<img src="{{ $data->qrcode }}" style="max-width: 70px;">@endif</p>
        <p><b>@if ($data->program_studi == 'Teknik Informatika')
            Tasrif Hasanuddin, S.T., M.Cs.
                    @else
            Herman, S.Kom., M.Cs., MTA
                    @endif
                </b></p>
        <p>NIDN : 0910126901</p>
    </td>
</tr>
</table>

<!-- ================= FOOTER ================= -->
<div class="footer">
    <p><u>Tembusan Yth,</u></p>
    <ol style="margin-left:20px">
        <li>Ketua Prodi {{ $data->program_studi }}</li>
        <li>Arsip</li>
    </ol>
</div>

</body>
</html>
