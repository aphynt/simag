@include('dashboard.layout.head', ['title' => 'Detail Pengajuan'])
@include('dashboard.layout.switcher')
@include('dashboard.layout.loader')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')

<div class="main-content app-content">
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
            <div>
                <h1 class="page-title fw-medium fs-18 mb-0">Detail Pengajuan</h1>
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

                            <div class="col-md-12">
                                <label for="alamatInstansi" class="form-label">Alamat Perusahaan/Instansi</label>
                                <input type="text" class="form-control" id="alamatInstansi"
                                       name="alamatInstansi"
                                       value="{{ $data->alamat_perusahaan }}"
                                       readonly>
                            </div>

                            <div class="col-12">
                                <label for="alasanMagang" class="form-label">Alasan Magang</label>
                                <textarea class="form-control" id="alasanMagang" name="alasanMagang"
                                          style="height: 200px;" readonly>{{ $data->alasan_magang }}</textarea>
                            </div>

                            <div class="col-md-6">
                                <label for="kompetensiIlmu" class="form-label">Kompetensi Ilmu</label>
                                <input type="text" class="form-control" id="kompetensiIlmu"
                                       name="kompetensiIlmu"
                                       value="{{ $data->kompetensi_ilmu }}"
                                       readonly>
                            </div>

                            <div class="col-md-6">
                                <label for="semester" class="form-label">Semester</label>
                                <input type="text" class="form-control" id="semester"
                                       value="{{ $data->semester }}"
                                       readonly>
                            </div>

                            <div class="col-md-6">
                                <label for="jenisMagang" class="form-label">Jenis Magang</label>
                                <input type="text" class="form-control" id="jenisMagang"
                                       value="{{ $data->jenis_magang }}"
                                       readonly>
                            </div>

                            @if (!empty($data->file_pendukung))
                                <div class="col-md-12">
                                    <label class="form-label">File Pendukung Saat Ini</label>
                                    <div class="border rounded p-2">
                                        <iframe
                                            src="{{ asset('storage/' . $data->file_pendukung) }}"
                                            width="100%"
                                            height="700"
                                            style="border:none;">
                                        </iframe>

                                        <a href="{{ asset('storage/' . $data->file_pendukung) }}"
                                           target="_blank"
                                           class="btn btn-sm btn-primary mt-2">
                                            Buka di Tab Baru
                                        </a>
                                    </div>
                                </div>
                            @endif

                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="checkbox"
                                           id="gridCheck3"
                                           name="setuju"
                                           @if ($data->setuju) checked @endif
                                           disabled>
                                    <label class="form-check-label" for="gridCheck3">
                                        Saya telah mengisi formulir ini dengan jujur, dan apabila terdapat kesalahan
                                        data, saya bersedia bertanggung jawab atas kebenaran informasi yang telah saya isi.
                                    </label>
                                </div>
                            </div>

                            @if ($data->status == 'Diajukan' && (Auth::user()->role == 'wd3' || Auth::user()->role == 'prodi'))
                            <div class="col-12 mt-3 d-flex gap-2">
                                {{-- Tombol Verifikasi --}}
                                <button type="button"
                                        class="btn btn-success"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalVerifikasi">
                                    <i class="ri-check-double-line me-1"></i>
                                    Verifikasi
                                </button>

                                {{-- Tombol Tolak --}}
                                <button type="button"
                                        class="btn btn-danger"
                                        data-bs-toggle="modal"
                                        data-bs-target="#modalTolak">
                                    <i class="ri-close-circle-line me-1"></i>
                                    Tolak
                                </button>
                            </div>
                            @endif

                            {{-- MODAL VERIFIKASI --}}
                            <div class="modal fade" id="modalVerifikasi" tabindex="-1" aria-labelledby="modalVerifikasiLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="POST" action="{{ route('persetujuan.verifikasi', $data->uuid) }}">
                                            @csrf
                                            @method('PUT')

                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalVerifikasiLabel">
                                                    <i class="ri-check-double-line me-1 text-success"></i>
                                                    Verifikasi Pengajuan
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="keteranganVerifikasi" class="form-label">Keterangan</label>
                                                    <textarea name="keterangan"
                                                            id="keteranganVerifikasi"
                                                            class="form-control"
                                                            rows="3"
                                                            placeholder="Tuliskan catatan/verifikasi untuk pengajuan ini..."
                                                            required></textarea>
                                                </div>
                                                {{-- Jika mau kirim status via form juga --}}
                                                <input type="hidden" name="status" value="diverifikasi">
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

                            {{-- MODAL TOLAK --}}
                            <div class="modal fade" id="modalTolak" tabindex="-1" aria-labelledby="modalTolakLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="POST" action="{{ route('persetujuan.tolak', $data->uuid) }}">
                                            @csrf
                                            @method('PUT')

                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalTolakLabel">
                                                    <i class="ri-close-circle-line me-1 text-danger"></i>
                                                    Tolak Pengajuan
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label for="keteranganTolak" class="form-label">Keterangan Penolakan</label>
                                                    <textarea name="keterangan"
                                                            id="keteranganTolak"
                                                            class="form-control"
                                                            rows="3"
                                                            placeholder="Tuliskan alasan penolakan pengajuan ini..."
                                                            required></textarea>
                                                </div>
                                                <input type="hidden" name="status" value="ditolak">
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button"
                                                        class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                    Batal
                                                </button>
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="ri-close-line me-1"></i>
                                                    Simpan Penolakan
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
