@include('dashboard.layout.head', ['title' => 'Persetujuan'])
@include('dashboard.layout.switcher')
@include('dashboard.layout.loader')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')



<div class="main-content app-content">
                <div class="container-fluid">

                    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
                        <div>
                            <h1 class="page-title fw-medium fs-18 mb-0">Persetujuan</h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card custom-card">
                                <div class="card-header">
                                    <div class="card-title">
                                        Informasi Persetujuan
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="responsiveDataTable" class="table table-bordered text-nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>NIM</th>
                                                <th>Jenis Pengajuan</th>
                                                <th>Status</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $d)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $d->name }}</td>
                                                    <td>{{ $d->nim }}</td>
                                                    <td>{{ $d->jenis_magang }}</td>
                                                    <td>
                                                        @if ($d->status == 'Diajukan')
                                                        <span class="btn btn-outline-secondary btn-wave">{{ $d->status }}</span>
                                                        @elseif ($d->status == 'Disetujui' || $d->status == 'Diverifikasi')
                                                        <span class="btn btn-outline-success btn-wave">{{ $d->status }}</span>
                                                        @else
                                                        <span class="btn btn-outline-danger btn-wave">{{ $d->status }}</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $d->keterangan }}</td>
                                                    <td>
                                                        @if (in_array($d->status, ['Disetujui', 'Diverifikasi']))

                                                            @if ($d->jenis_magang === 'Magang Mandiri')
                                                                <a href="{{ route('persetujuan.download', $d->uuid) }}"
                                                                class="btn btn-dark label-btn rounded-pill">
                                                                    <i class="ri-file-download-line label-btn-icon me-2 rounded-pill"></i>
                                                                    Unduh Surat Pengantar
                                                                </a>
                                                            @else
                                                                <a href="{{ route('persetujuan.download', $d->uuid) }}"
                                                                class="btn btn-dark label-btn rounded-pill">
                                                                    <i class="ri-download-2-line label-btn-icon me-2 rounded-pill"></i>
                                                                    Unduh Surat Rekomendasi
                                                                </a>
                                                            @endif

                                                        @endif
                                                        <a href="{{ route('persetujuan.detail', $d->uuid) }}" class="btn btn-info label-btn rounded-pill">
                                                            <i class="ri-spam-2-line label-btn-icon me-2 rounded-pill"></i>
                                                            Detail
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
@include('dashboard.layout.footer')
