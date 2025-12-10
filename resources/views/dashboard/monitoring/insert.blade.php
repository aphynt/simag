@include('dashboard.layout.head', ['title' => 'Monitoring Magang'])
@include('dashboard.layout.switcher')
@include('dashboard.layout.loader')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')

<div class="main-content app-content">
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
            <div>
                <h1 class="page-title fw-medium fs-18 mb-0">Monitoring Magang</h1>
            </div>
        </div>
        <!-- Page Header Close -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <form action="{{ route('monitoring.post') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">NIM</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->nim }}" readonly>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Nama Mahasiswa</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->name }}" readonly>
                                </div>
                                <hr>

                                <div class="col-md-6">
                                    <label for="judul" class="form-label">Judul</label>
                                    <input type="text" class="form-control" id="judul" name="judul" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="pengajuanMagang" class="form-label">Instansi Magang</label>
                                    <select class="form-select" name="uuid_pengajuan" id="pengajuanMagang">
                                        @foreach ($pengajuan as $pg)

                                            <option value="{{ $pg->uuid }}">{{ $pg->nama_perusahaan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="keterangan" class="form-label">Keterangan</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="10" required></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="file" class="form-label">File</label>
                                    <input type="file" class="form-control" id="file" name="file" required>
                                </div>

                                <button href="#" type="submut"  class="btn btn-success">Submit</button>

                            </div>
                        </form>{{-- /.row g-3 --}}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@include('dashboard.layout.footer')
