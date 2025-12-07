<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing: border-box;
            font-family: 'Times New Roman', Times, serif;
        }
         @media print {
            body {
                /* margin: 0; */
                /* display: block !important;
                text-align: left !important;
                place-content: unset !important;
                place-content: unset !important;align-items: unset !important;
                justify-content: unset !important; */
                box-shadow: none;
                font-size: x-large;

            }
            @page {
                orientation: portrait;
                size: Legal;
                margin-top:0.5cm;
                margin-left:2.54cm;
                margin-right:2.54cm;
                margin-bottom:2.54cm;
                /* margin-left: 0.254in;
                margin-right:0.254in;
                margin-bottom: 0.254in;
                margin-top: 0.254in;
                width:21.59cm;
                height:33.02cm; */
            }

        }

        header{
            display:flex;
            justify-content: space-between;
            align-items: center;
            /* place-content: center; */
        }
        H3{
            line-height: 27px;
        }
        body{
            width:21.59cm;
            height:33.02cm;
            /* place-content: center; */
            align-items: center;
            text-align: center;
        }
        space{
            width:50%;
        }
        .row{
            text-align: left;
            width:100%;
        }
        .line{
            width:100%;
            height:7px;
            border-top: 4px solid black;
            border-bottom: 2px solid black;
            margin-top:10px;
        }
        small{
            font-size: 10px;
            line-height: 2px;
        }
        br{
            line-height: 2px;
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
        .idenitas h3{
            line-height :10px;
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
        }
        table#titimangsa tr{
            text-align:left;
        }
        footer{
            display:block;
            width:100%;
            text-align: left;
        }

    </style>
</head>
<body>
    <header>
        <img src="logo.png" alt="logo disini" width="100%">
        <space></space>
        <div class="row">
            <h3>YAYASAN WAKAF UMI</h3>
            <h3>UNIVERSITAS MUSLIM INDONESIA</h3>
            <h3>FAKULTAS ILMU KOMPUTER</h3>
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
                <h3 style="text-transform: uppercase;text-decoration:underline;">Surat Rekomendasi</h3>
                <p>Nomor :276/H.34/FIK-UMI/VI/2025</p>
            </div>
            <br>
            <br>
            <div class="cc">
                Kepada Yth :<br>
                <p><b>Kepala Kesyahbandaran dan Otoritas Pelabuhan Utama ( KSOP ) Makassar</b></p>
            </div>
            <br>
            <div class="open">
                <p><i>Assalamualaikum Warahmatullahi Wabarakatuh</i></p>
            </div>
            <div class="prakata">
                <p>Dengan Rahmat Allah SWT., yang bertandatangan di bawah ini Pimpinan Fakultas Ilmu Komputer Universitas Muslim Indonesia merekomendasikan kepada ;</p>
            </div>
            <div class="data">
                <table>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td></td>
                        <td><b>Andi Farisah Zhafarina Ridwan</b></td>
                    </tr>
                    <tr>
                        <td>NIM</td>
                        <td>:</td>
                        <td></td>
                        <td><b>21081010124</b></td>
                    </tr>
                    <tr>
                        <td>Prodi</td>
                        <td>:</td>
                        <td></td>
                        <td><b>Sistem Informasi</b></td>
                    </tr>
                    <tr>
                        <td>Nomor HP</td>
                        <td>:</td>
                        <td></td>
                        <td><b>08123456789</b></td>
                </table>
            </div>
            <div class="intruksi">
                <p>Untuk melaksanakan kegiatan magang mandiri selama 2 bulan terhitung mulai tanggal 1 Juli 2025 Sampai 31 Agustus 2025 yang bertempat Kantor KPU Kota Makassar Alamat : Jln. Perumnas Raya  Manggala Kec.Manggala Kota Makassar Sulawesi-selatan 90234 dengan ketentuan sebagai berikut :</p>
                <br>
                <ol style="padding-left:20px">
                    <li>Mentaati Kriteria Statuta UMI.</li>
                    <li>Senantiasa menjaga nama baik Almamater.</li>
                    <li>Senantiasa menjalin silaturrahim dan Ukhuwah Islamiyah.</li>
                    <li>Mentaati Peraturan Per Undang-Undangan yang berlaku.</li>
                    <li>Melaporkan secara tertulis kepada Pimpinan Fakultas setelah selesai kegiatan tersebut.</li>
                    <li>Tetap melaksanakan kewajiban akademik pada semester yang berjalan terhitung sejak jadwal magang berlangsung. </li>
                </ol>
            </div>
            <br>
            <br>
            <div class="closing">
                <p>Demikian surat rekomendasi ini dibuat dan diberikan kepada yang bersangkutan untuk dipergunakan sebagaimana mestinya.</p>
            </div>
            <p><i>Wallahu Waliyyut Taufiq Walhidayah</i></p>
        </div>
        <div class="titimangsa">
            <div class="left"></div>
            <div class="right">
                <div class="date">
                    <table id="titimangsa">
                        <tr style="line-height: 15px;">
                            <td>Makassar,</td>
                            <td><u>22 Dzuhijah</u></td>
                            <td><u>1446 H</u></td>
                        </tr>
                        <tr style="line-height: 15px;">
                            <td></td>
                            <td>18 Mei</td>
                            <td>2025 M</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr  style="line-height: 15px;">
                            <td>An. Dekan</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr  style="line-height: 15px;">
                            <td></td>
                            <td>Wakil Dekan III</td>
                            <td></td>
                        </tr>
                        <tr  style="line-height: 15px;">
                            <td></td>
                            <td>Bidang Kemahasiswaan dan Alumn</td>
                            <td></td>
                        </tr>
                        <tr style="height:85px">
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr  style="line-height: 15px;">
                            <td></td>
                            <td><b><u>Poetri Lestari L.B,S.Kom.,MT.,MTA</u></b></td>
                            <td></td>
                        </tr>
                        <tr  style="line-height: 15px;">
                            <td></td>
                            <td>Nips : 114090894</td>
                            <td></td>
                        </tr>
                    </table>
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
</html>
