@include('dashboard.layout.head', ['title' => 'Penilaian Magang'])
@include('dashboard.layout.switcher')
@include('dashboard.layout.loader')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')

<div class="main-content app-content">
                <div class="container-fluid">

                    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
                        <div>
                            <h1 class="page-title fw-medium fs-18 mb-0">Penilaian Magang</h1>
                        </div>
                        @if (Auth::user()->role == 'mahasiswa')
                        <div class="btn-list">
                            <a href="{{ route('pengajuan.insert') }}" class="btn btn-primary btn-wave me-0">
                                <i class="ri-share-forward-line me-1"></i> Ajukan
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
                                                <th>Nama</th>
                                                <th>NIM</th>
                                                <th>Jenis Pengajuan</th>
                                                <th>Status Penilaian</th>
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
                                                    <td>@if($d->status_nilai == null)
                                                        Belum ada
                                                        @else
                                                        {{ $d->rekomendasi }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @php
                                                            $canEdit = Auth::user()->role == 'wd3' || Auth::user()->role == 'prodi';
                                                        @endphp

                                                        <a href="{{ route('penilaian.detail', $d->uuid ) }}"
                                                            class="btn btn-secondary label-btn {{ $canEdit ? '' : 'disabled' }}">
                                                                <i class="ri-eye-line label-btn-icon me-2"></i>
                                                                Detail
                                                        </a>
                                                    </td>
                                                </tr>
                                            @include('dashboard.pengajuan.modal.delete')
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
