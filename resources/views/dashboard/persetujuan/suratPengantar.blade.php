<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Pengantar</title>
    <style>
    * {
        box-sizing: border-box;
        font-family: 'Times New Roman', Times, serif;
    }

    html, body {
        margin: 0;
        padding: 0;
    }

    /* DOMPDF BACA INI – JANGAN DI DALAM @media print */
    @page {
        margin-top: 0.5cm;
        margin-left: 2.54cm;
        margin-right: 2.54cm;
        margin-bottom: 2.54cm;
        /* size tidak wajib kalau sudah setPaper di PHP */
        /* size: legal portrait; */
    }

    /* Jangan pakai width/height fix cm di body untuk dompdf */
    body {
        text-align: center;
        font-size: 12pt;
    }

    header {
        display:flex;
        justify-content: space-between;
        align-items: center;
    }

    /* h3 {
        line-height: 27px;
    } */

    space {
        width:50%;
        display:block;
    }

    .row {
        text-align: left;
        width:100%;
    }

    .line {
        width:100%;
        height:7px;
        border-top: 4px solid black;
        border-bottom: 2px solid black;
        margin-top:10px;
    }

    .address{
        font-size: 10px;
        line-height: 13px;
        margin-bottom:15px;
    }

    .isisurat{
        text-align: justify;
        margin-top:20px;
    }

    .idenitas{
        margin-top:20px;
        text-align: center;
    }

    .cc{
        margin-top: 10px;
        margin-bottom:15px;
    }

    .prakata{
        margin-bottom:20px;
    }

    .intruksi{
        margin-top:20px;
    }

    .titimangsa{
        display:flex;
        justify-content: space-between;
        margin-top:40px;
    }

    .right{
        display:flex;
    }

    .date{
        display:flex;
        flex-direction: column;
    }

    footer{
        display:block;
        width:100%;
        text-align: left;
        margin-top: 20px;
    }
</style>

</head>
@php
    use Carbon\Carbon;

    $mulai  = Carbon::parse($data->tanggal_pengajuan)->translatedFormat('d F Y');
    $selesai = Carbon::parse($data->tanggal_selesai)->translatedFormat('d F Y');

    $durasiBulan = Carbon::parse($data->tanggal_pengajuan)->diffInMonths(Carbon::parse($data->tanggal_selesai));
    $durasiHari = Carbon::parse($data->tanggal_pengajuan)->diffInDays(Carbon::parse($data->tanggal_selesai));
@endphp

<body>
    <header>
        <img src="logo.png" alt="logo disini" width="100%">
        <space></space>
        <div class="row">
            <h5>YAYASAN WAKAF UMI</h5>
            <h5>UNIVERSITAS MUSLIM INDONESIA</h5>
            <h5>FAKULTAS ILMU KOMPUTER</h5>
        </div>
    </header>
    <div class="line"></div>
    <main>
        <div class="address">
            <p>Jln. Urip Sumohardjo Km.05 Gedung Fakultas Ilmu Komputer Lt.I Kampus II UMI Tlp.(0411) 449775-453308-453818, Fax (0411) - 453009 Makassar 90231</p>
            <p>website: fikom.umi.ac.id, email: fikom@umi.ac.id</p>
        </div>
        <br>
        <h4><i>Bismillahir Rahmanir Rahiim</i></h4>
        <br>
        <div class="isisurat">
            <div class="idenitas">
                <table>
                    <tr>
                        <td>Nomor</td>
                        <td>:</td>
                        <td>……../B.02/TI/FIK-UMI/……../20</td>
                    </tr>
                    <tr>
                        <td>Lampiran</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Perihal</td>
                        <td>:</td>
                        <td>Pengantar Magang Mandiri</td>
                    </tr>
                </table>
            </div>
            <br>
            <br>
            <div class="cc">
                Kepada Yth :<br>
                <p><b>Dekan Fakultas Ilmu Komputer</b></p>
                <p>Di-Makassar</p>
            </div>
            <br>
            <div class="open">
                <p><i>Assalamualaikum Warahmatullahi Wabarakatuh</i></p>
            </div>
            <div class="prakata">
                <p>Dengan	Rahmat Allah SWT., kami sampaikan kepada bapak/ibu, bahwa mahasiswa tersebut dibawah ini.</p>
            </div>
            <div class="data">
                <table>
                    <tr>
                        <td>Nama</td>
                        <td>: {{ $data->name }}</td>
                        <td></td>
                        <td><b></b></td>
                    </tr>
                    <tr>
                        <td>NIM</td>
                        <td>: {{ $data->nim }}</td>
                        <td></td>
                        <td><b></b></td>
                    </tr>
                    <tr>
                        <td>Prodi</td>
                        <td>: {{ $data->program_studi }}</td>
                        <td></td>
                        <td><b></b></td>
                    </tr>
                    <tr>
                        <td>Nomor HP</td>
                        <td>: {{ $data->no_hp }}</td>
                        <td></td>
                        <td><b></b></td>
                </table>
            </div>
            <div class="intruksi">
                <p>Mengajukan permohonan agar dapat diberikan surat pengantar yang ditujukan kepada:</p>
                <br>
                <table>
                    <tr>
                        <td>Nama Perusahaan</td>
                        <td>: {{ $data->nama_perusahaan }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Bagian</td>
                        <td>: {{ $data->bagian_perusahaan }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>: {{ $data->alamat_perusahaan }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Tujuan</td>
                        <td>:</td>
                        <td></td>
                    </tr>
                </table>
                <br>
                <p>
                    Untuk melakukan magang selama {{ $durasiBulan }} bulan terhitung mulai tanggal
                    {{ $mulai }} sampai {{ $selesai }}.
                </p>

            </div>
            <br>
            <br>
            <div class="closing">
                <p>Demikian surat pengantar ini, atas perhatian dan kerjasamanya diucapkan terima kasih.</p>
            </div>
            <p><i>Wallahu Waliyyut Taufiq Walhidayah</i></p>
        </div>
        <div class="titimangsa">
            <div class="left"></div>
            <div class="right">
                <div class="date">
                    <p>Makassar, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
                    <p>Ketua Program Studi Informatika</p>
                    <br>
                    <br>
                    <br>
                    <p><b>Tasrif Hasanuddin, S.T.,M.Cs.</b></p>
                    <p>NIDN : 0910126901</p>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <p><u>Tembusan Yth,</u></p>
        <ol style="padding-left:20px">
            <li>Ketua Prodi Teknik Informatika</li>
            <li>Arsip</li>
        </ol>
    </footer>
</body>
{{-- <script>
    window.print();
</script> --}}
</html>
