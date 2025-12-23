@include('dashboard.layout.head', ['title' => 'Evaluasi Magang'])
@include('dashboard.layout.switcher')
@include('dashboard.layout.loader')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')

<div class="main-content app-content">
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
            <div>
                <h1 class="page-title fw-medium fs-18 mb-0">Evaluasi Magang</h1>
            </div>
        </div>
        <!-- Page Header Close -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-body">
                        {{-- Kalau ini hanya detail (read-only), form tidak wajib.
                             Kalau nanti mau dijadikan form aksi (setujui/tolak), tinggal bungkus dengan <form> --}}
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">NIM</label>
                                <input type="text" class="form-control" value="{{ $data->nim }}" readonly>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Nama Mahasiswa</label>
                                <input type="text" class="form-control" value="{{ $data->name }}" readonly>
                            </div>

                            <div class="col-md-6">
                                <label for="tanggalPengajuan" class="form-label">Tanggal Pengajuan</label>
                                <input type="date" class="form-control" id="tanggalPengajuan"
                                       name="tanggalPengajuan"
                                       value="{{ $data->tanggal_pengajuan }}"
                                       readonly>
                            </div>

                            <div class="col-md-6">
                                <label for="tanggalSelesai" class="form-label">Tanggal Rencana Selesai</label>
                                <input type="date" class="form-control" id="tanggalSelesai"
                                       name="tanggalSelesai"
                                       value="{{ $data->tanggal_selesai ?? $data->tanggal_pengajuan }}"
                                       readonly>
                            </div>

                            <div class="col-md-6">
                                <label for="namaPerusahaan" class="form-label">Nama Perusahaan/Instansi</label>
                                <input type="text" class="form-control" id="namaPerusahaan"
                                       name="namaPerusahaan"
                                       value="{{ $data->nama_perusahaan }}"
                                       readonly>
                            </div>

                            <div class="col-md-6">
                                <label for="bagianPerusahaan" class="form-label">Bagian di Perusahaan</label>
                                <input type="text" class="form-control" id="bagianPerusahaan"
                                       name="bagianPerusahaan"
                                       value="{{ $data->bagian_perusahaan }}"
                                       readonly>
                            </div>

                            <div class="col-md-6">
                                <label for="alamatInstansi" class="form-label">Alamat Perusahaan/Instansi</label>
                                <input type="text" class="form-control" id="alamatInstansi"
                                       name="alamatInstansi"
                                       value="{{ $data->alamat_perusahaan }}"
                                       readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="jenisMagang" class="form-label">Jenis Magang</label>
                                <input type="text" class="form-control" id="jenisMagang"
                                       value="{{ $data->jenis_magang }}"
                                       readonly>
                            </div>
                            <hr>
                            <div class="col-md-12">
                                <label for="judul" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="judul"
                                       value="{{ $data->judul }}"
                                       readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <textarea type="text" class="form-control" id="keterangan" rows="10"
                                       readonly>{{ $data->keterangan }}</textarea>
                            </div>
                            @if (!empty($data->file))
                                <div class="col-md-12">
                                    <label class="form-label">Dokumentasi Pendukung</label>
                                    <div class="border rounded p-2">
                                        <iframe
                                            src="{{ asset('storage/' . $data->file) }}"
                                            width="100%"
                                            height="700"
                                            style="border:none;">
                                        </iframe>

                                        <a href="{{ asset('storage/' . $data->file) }}"
                                           target="_blank"
                                           class="btn btn-sm btn-primary mt-2">
                                            Buka di Tab Baru
                                        </a>
                                    </div>
                                </div>
                            @endif
                            {{-- @if ($data->status == 0 && (Auth::user()->role == 'wd3' || Auth::user()->role == 'prodi')) --}}
                            @if ($data->status == 0 && Auth::user()->role == 'prodi')
                            <div class="col-12 mt-3 d-flex gap-2">
                                {{-- Tombol Verifikasi --}}
                                <button type="button"
                                        class="btn btn-success"
                                        data-bs-toggle="modal"
                                        data-bs-target="#verifikasiEvaluasi">
                                    <i class="ri-check-double-line me-1"></i>
                                    Verifikasi
                                </button>
                            </div>
                            @endif

                            <div class="modal fade" id="verifikasiEvaluasi" tabindex="-1" aria-labelledby="verifikasiEvaluasi" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="POST" action="{{ route('evaluasi.verifikasi', $data->uuid) }}">
                                            @csrf


                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalVerifikasiLabel">
                                                    <i class="ri-check-double-line me-1 text-success"></i>
                                                    Verifikasi
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="keteranganVerifikasi" class="form-label">Keterangan</label>
                                                    <textarea name="keterangan_evaluasi"
                                                            id="keteranganVerifikasi"
                                                            class="form-control"
                                                            rows="3"
                                                            placeholder="Tuliskan catatan/verifikasi untuk data ini..."
                                                            required></textarea>
                                                </div>

                                            </div>

                                            <div class="modal-footer">
                                                <button type="button"
                                                        class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                    Batal
                                                </button>
                                                <button type="submit" class="btn btn-success">
                                                    <i class="ri-check-line me-1"></i>
                                                    Simpan Verifikasi
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> {{-- /.row g-3 --}}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@include('dashboard.layout.footer')
