@include('dashboard.layout.head', ['title' => 'Monitoring'])
@include('dashboard.layout.switcher')
@include('dashboard.layout.loader')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')



<div class="main-content app-content">
                <div class="container-fluid">

                    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
                        <div>
                            <h1 class="page-title fw-medium fs-18 mb-0">Monitoring</h1>
                        </div>
                        @if (Auth::user()->role == 'mahasiswa')
                        <div class="btn-list">
                            <a href="{{ route('monitoring.insert') }}" class="btn btn-primary btn-wave me-0">
                                <i class="ri-add-line me-1"></i> Tambah data
                            </a>
                        </div>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <table id="responsiveDataTable" class="table table-bordered text-nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Hari/Tanggal</th>
                                                <th>NIM</th>
                                                <th>Nama</th>
                                                <th>Jenis Magang</th>
                                                <th>Judul</th>
                                                <th>Status</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $d)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($d->tgl_submit)->translatedFormat('l, d F Y') }}</td>
                                                    <td>{{ $d->nim }}</td>
                                                    <td>{{ $d->name }}</td>
                                                    <td>{{ $d->jenis_magang }}</td>
                                                    <td>{{ $d->judul }}</td>
                                                    <td>
                                                        @if ($d->status == 1)
                                                            Diverifikasi
                                                        @else
                                                            Belum Diverifikasi
                                                        @endif
                                                    </td>
                                                    <td>{{ $d->keterangan }}</td>

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
