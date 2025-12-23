@include('dashboard.layout.head', ['title' => 'Detail Evaluasi Magang'])
@include('dashboard.layout.switcher')
@include('dashboard.layout.loader')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')

<div class="main-content app-content">
    <div class="container-fluid">

        {{-- PAGE HEADER --}}
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb mb-4">
            <h1 class="page-title fw-medium fs-18 mb-0">
                Detail Evaluasi Magang
            </h1>
        </div>

        {{-- DATA MAHASISWA --}}
        <div class="card custom-card mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0">Data Mahasiswa</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">NIM</label>
                        <input type="text" class="form-control" value="{{ $user->nim }}" readonly>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Nama Mahasiswa</label>
                        <input type="text" class="form-control" value="{{ $user->name }}" readonly>
                    </div>
                </div>
            </div>
        </div>

        {{-- LIST MONITORING --}}
        @foreach ($monitorings as $index => $data)
        <div class="card custom-card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <h6 class="mb-0">
                        Evaluasi #{{ $index + 1 }}
                    </h6>
                    <small class="text-muted">
                        Tanggal Submit:
                        {{ \Carbon\Carbon::parse($data->tgl_submit)->format('d M Y') }}
                    </small>
                </div>

                <span class="badge {{ $data->status == 1 ? 'bg-success' : 'bg-warning' }}">
                    {{ $data->status == 1 ? 'Terverifikasi' : 'Menunggu Verifikasi' }}
                </span>
            </div>

            <div class="card-body">
                <div class="row g-3">

                    <div class="col-md-4">
                        <label class="form-label">Jenis Magang</label>
                        <input type="text" class="form-control"
                               value="{{ $data->jenis_magang }}" readonly>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Nama Perusahaan</label>
                        <input type="text" class="form-control"
                               value="{{ $data->nama_perusahaan }}" readonly>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Lokasi Magang</label>
                        <input type="text" class="form-control"
                               value="{{ $data->lokasi_magang }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Bagian</label>
                        <input type="text" class="form-control"
                               value="{{ $data->bagian_perusahaan }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Alamat Perusahaan</label>
                        <input type="text" class="form-control"
                               value="{{ $data->alamat_perusahaan }}" readonly>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Judul</label>
                        <input type="text" class="form-control"
                               value="{{ $data->judul }}" readonly>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Keterangan</label>
                        <textarea class="form-control" rows="5" readonly>
                            {{ $data->keterangan }}
                        </textarea>
                    </div>

                    @if (!empty($data->file))
                    <div class="col-md-12">
                        <label class="form-label">Dokumentasi</label>
                        <div class="border rounded p-2">
                            <iframe
                                src="{{ asset('storage/' . $data->file) }}"
                                width="100%"
                                height="500"
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

                    {{-- TOMBOL VERIFIKASI --}}
                    @if ($data->status == 0 && Auth::user()->role == 'prodi')
                    <div class="col-12 mt-3">
                        <button type="button"
                                class="btn btn-success"
                                data-bs-toggle="modal"
                                data-bs-target="#verifikasi{{ $data->uuid }}">
                            <i class="ri-check-double-line me-1"></i>
                            Verifikasi
                        </button>
                    </div>
                    @endif

                </div>
            </div>
        </div>

        {{-- MODAL VERIFIKASI --}}
        <div class="modal fade" id="verifikasi{{ $data->uuid }}" tabindex="-1">
            <div class="modal-dialog">
                <form method="POST"
                      action="{{ route('evaluasi.verifikasi', $data->uuid) }}"
                      class="modal-content">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title">
                            Verifikasi Evaluasi
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Keterangan Verifikasi</label>
                            <textarea name="keterangan_evaluasi"
                                      class="form-control"
                                      rows="4"
                                      required></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal">
                            Batal
                        </button>
                        <button type="submit"
                                class="btn btn-success">
                            Simpan Verifikasi
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @endforeach

    </div>
</div>

@include('dashboard.layout.footer')
