@include('dashboard.layout.head', ['title' => 'Evaluasi'])
@include('dashboard.layout.switcher')
@include('dashboard.layout.loader')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')



<div class="main-content app-content">
                <div class="container-fluid">

                    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
                        <div>
                            <h1 class="page-title fw-medium fs-18 mb-0">Evaluasi</h1>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card custom-card">
                                <div class="card-body">
                                    <table id="responsiveDataTable" class="table table-bordered text-nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>NIM</th>
                                                <th>Nama</th>
                                                <th>Total Data</th>
                                                <th>Last Submit</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $row->nim }}</td>
                                                <td>{{ $row->name }}</td>
                                                <td>{{ $row->total_monitoring }}</td>
                                                <td>{{ $row->last_submit }}</td>
                                                <td>
                                                    <a href="{{ route('evaluasi.user', $row->user_id) }}"
                                                    class="btn btn-info btn-sm">
                                                        Lihat Data
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
