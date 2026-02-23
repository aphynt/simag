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

                @php
                    $status = $data->status_disetujui;

                    if ($status === 'Ditolak') {
                        $badgeClass = 'bg-danger';
                        $label = 'Ditolak';
                    } elseif ($status === 'Terverifikasi') {
                        $badgeClass = 'bg-success';
                        $label = 'Terverifikasi';
                    } elseif ($data->role_penyetuju === 'prodi') {
                        $badgeClass = 'bg-info';
                        $label = 'Menunggu WD3';
                    } else {
                        $badgeClass = 'bg-warning';
                        $label = 'Menunggu Verifikasi Prodi';
                    }
                @endphp

                <span class="badge {{ $badgeClass }}" style="font-size:22px; padding:6px 10px;">
                    {{ $label }}
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
                        <textarea class="form-control" rows="5" readonly>{{ $data->keterangan }}</textarea>
                    </div>

                    <div class="col-md-12">
                        @if (!empty($data->file))
                        <label class="form-label">Dokumentasi ({{ $data->keterangan_file }})</label>
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
                        @endif
                        @if ($data->keterangan_evaluasi != null)
                            <div class="alert svg-primary alert-primary alert-dismissible fade show custom-alert-icon shadow-sm" role="alert">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1.5rem" viewBox="0 0 24 24" width="1.5rem" fill="#000000"><path d="M0 0h24v24H0z" fill="none"/><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/></svg>
                                    {{ $data->keterangan_evaluasi }}
                            </div>
                        @endif
                    </div>


                    {{-- TOMBOL VERIFIKASI --}}
                    @php
                        $roleLogin = Auth::user()->role;
                        $penyetuju = $data->role_penyetuju;
                        $statusFinal = in_array($data->status_disetujui, ['Terverifikasi','Ditolak']);
                    @endphp

                    @if (!$statusFinal)

                        {{-- PRODI --}}
                        @if ($roleLogin === 'prodi' && !$penyetuju)
                            <div class="col-12 mt-3">
                                <button type="button" class="btn btn-success"
                                    data-bs-toggle="modal"
                                    data-bs-target="#verifikasi{{ $data->uuid }}">
                                    Verifikasi (Prodi)
                                </button>

                                <button type="button" class="btn btn-danger"
                                    data-bs-toggle="modal"
                                    data-bs-target="#verifikasiTolak{{ $data->uuid }}">
                                    Tolak
                                </button>
                            </div>
                        @endif

                        {{-- WD3 --}}
                        @if ($roleLogin === 'wd3' && $penyetuju === 'prodi')
                            <div class="col-12 mt-3">
                                <button type="button" class="btn btn-success"
                                    data-bs-toggle="modal"
                                    data-bs-target="#verifikasi{{ $data->uuid }}">
                                    Verifikasi (WD3)
                                </button>

                                <button type="button" class="btn btn-danger"
                                    data-bs-toggle="modal"
                                    data-bs-target="#verifikasiTolak{{ $data->uuid }}">
                                    Tolak
                                </button>
                            </div>
                        @endif

                    @endif

                </div>
            </div>
        </div>

        {{-- MODAL VERIFIKASI --}}
        @include('dashboard.evaluasi.modal.verifikasi')
        @include('dashboard.evaluasi.modal.verifikasiTolak')
        @endforeach

    </div>
</div>

@include('dashboard.layout.footer')
