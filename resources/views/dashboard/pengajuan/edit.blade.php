@include('dashboard.layout.head', ['title' => 'Ajukan Magang'])
@include('dashboard.layout.switcher')
@include('dashboard.layout.loader')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')

<div class="main-content app-content">
    <div class="container-fluid">


        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
            <div>
                <h1 class="page-title fw-medium fs-18 mb-0">Ajukan Magang</h1>
            </div>
        </div>
        <!-- Page Header Close -->

        <!-- Start:: row-1 -->

        <!-- End:: row-4 -->

        <!-- Start:: row-6 -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-body">
                        <form class="row g-3 mt-0" action="{{ route('pengajuan.update', $data->uuid) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-6">
                                <label class="form-label">NIM</label>
                                <input type="text" class="form-control" value="{{ $data->nim }}" readonly disabled>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Nama Mahasiswa</label>
                                <input type="text" class="form-control" value="{{ $data->name }}" readonly disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="tanggalPengajuan" class="form-label">Tanggal Pengajuan</label>
                                <input type="date" class="form-control" id="tanggalPengajuan" name="tanggalPengajuan" value="{{ $data->tanggal_pengajuan }}" readonly disabled required>
                            </div>
                            <div class="col-md-6">
                                <label for="tanggalSelesai" class="form-label">Tanggal Selesai</label>
                                <input type="date" class="form-control" id="tanggalSelesai" name="tanggalSelesai" value="{{ $data->tanggal_selesai }}" required>
                            </div>
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Alasan Magang</label>
                                <textarea class="form-control" style="height: 200px;" name="alasanMagang"
                                    required>{{ $data->alasan_magang }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="kompetensiIlmu" class="form-label">Kompetensi Ilmu</label>
                                <input type="text" class="form-control" id="kompetensiIlmu" name="kompetensiIlmu" value="{{ $data->kompetensi_ilmu }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="semester" class="form-label">Semester</label>
                                <input type="text" class="form-control" id="semester"
                                    value="{{ $data->semester }}" readonly disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="jenisMagang" class="form-label">Jenis Magang</label>
                                <select class="form-select" id="jenisMagang" name="jenisMagang" required>
                                    <option value="{{ $data->jenis_magang }}" selected>{{ $data->jenis_magang }}</option>
                                    <option value="Magang Mandiri">Magang Mandiri</option>
                                    <option value="Magang Berdampak">Magang Berdampak</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="file" class="form-label">Masukkan File Pendukung (jika ada)</label>
                                <input type="file" class="form-control" id="file" name="filePendukung">
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck3" name="setuju"
                                        checked disabled>
                                    <label class="form-check-label" for="gridCheck3">
                                        Saya telah mengisi formulir ini dengan jujur, dan apabila terdapat kesalahan
                                        data, saya bersedia bertanggung jawab atas kebenaran informasi yang telah saya
                                        isi
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- End:: row-6 -->


    </div>
</div>
<script>
    const inputTanggal = document.getElementById('tanggalPengajuan');

    const today = new Date().toISOString().split('T')[0];

    inputTanggal.value = today;

</script>
@include('dashboard.layout.footer')
