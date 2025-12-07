@include('dashboard.layout.head', ['title' => 'Users'])
@include('dashboard.layout.switcher')
@include('dashboard.layout.loader')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')



<div class="main-content app-content">
                <div class="container-fluid">

                    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
                        <div>
                            <h1 class="page-title fw-medium fs-18 mb-0">Users</h1>
                        </div>

                        <div class="btn-list">
                            <a href="javascript:void(0)"
                                class="btn btn-primary btn-wave me-0"
                                data-bs-toggle="modal"
                                data-bs-target="#modalTambahUser">
                                    <i class="ri-user-follow-line me-1"></i> Tambah User
                            </a>
                            @include('dashboard.user.modal.insert')
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card custom-card">
                                @include('notification.alert')
                                <div class="card-header">
                                    <div class="card-title">
                                        Informasi Pengguna
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="responsiveDataTable" class="table table-bordered text-nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIP/NIM</th>
                                                <th>Nama</th>
                                                <th>Role</th>
                                                <th>No. Handphone</th>
                                                <th>Email</th>
                                                <th>Avatar</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->nim }}</td>
                                                    <td>{{ $item->name }}</td>
                                                    <td>
                                                        @switch($item->role)
                                                            @case('wd3')
                                                                WD III
                                                                @break

                                                            @case('prodi')
                                                                Prodi
                                                                @break

                                                            @case('mahasiswa')
                                                                Mahasiswa
                                                                @break

                                                            @case('admin')
                                                                Admin
                                                                @break

                                                            @case('pembuatan')
                                                                Pembuatan
                                                                @break

                                                            @default
                                                                {{ ucfirst($item->role) }}
                                                        @endswitch
                                                    </td>
                                                    <td>{{ $item->no_hp }}</td>
                                                    <td>{{ $item->email }}</td>
                                                    <td>
                                                        @if($item->avatar)
                                                            <img src="{{ asset('profile/' . $item->avatar) }}"
                                                                alt="Avatar"
                                                                class="rounded-circle"
                                                                width="45" height="45">
                                                        @else
                                                            <span class="text-muted">Tidak ada</span>
                                                        @endif
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
