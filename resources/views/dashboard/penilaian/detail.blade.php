{{-- resources/views/penilaian/preview-result.blade.php --}}
@include('dashboard.layout.head', ['title' => 'Hasil Penilaian'])
@include('dashboard.layout.switcher')
@include('dashboard.layout.loader')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')

@php
    // Sumber data sekarang dari $item (hasil query DB yang Anda sebutkan)
    $src = $item ?? null;

    // helper kecil untuk ambil value dengan fallback
    function val($src, $key, $fallback = '-') {
        if (!$src) return $fallback;
        if (is_array($src) || $src instanceof \Illuminate\Support\Collection) {
            return $src[$key] ?? $fallback;
        }
        return $src->{$key} ?? $fallback;
    }
@endphp


<div class="main-content app-content">
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2 mb-3">
            <div>
                <h1 class="page-title fw-medium fs-18 mb-0">Hasil Penilaian Magang</h1>
                <small class="text-muted">Ringkasan nilai yang telah dimasukkan.</small>
            </div>

            <div>
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary">
                    <i class="ri-arrow-left-line me-1"></i> Kembali
                </a>
                {{-- jika ingin simpan permanen --}}
                @if(isset($preview))
                    <a href="{{ route('penilaian.simpan.preview') }}" class="btn btn-primary ms-2">Simpan ke Database</a>
                @endif
            </div>
        </div>
        <!-- Page Header Close -->

        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">

                        {{-- Info umum --}}
                        <div class="row mb-3 g-3">
                            <div class="col-md-4">
                                <label class="form-label small text-muted">NIM</label>
                                <div class="form-control-plaintext">{{ val($src, 'nim') }}</div>
                            </div>
                            <div class="col-md-8">
                                <label class="form-label small text-muted">Nama Mahasiswa</label>
                                <div class="form-control-plaintext">{{ val($src, 'name') }}</div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small text-muted">Perusahaan / Instansi</label>
                                <div class="form-control-plaintext">{{ val($src, 'nama_perusahaan') }}</div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small text-muted">Bagian / Departemen</label>
                                <div class="form-control-plaintext">{{ val($src, 'bagian_perusahaan') }}</div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small text-muted">Penilai</label>
                                <div class="form-control-plaintext">{{ val($src, 'penilai_name') }}</div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label small text-muted">Tanggal Penilaian</label>
                                <div class="form-control-plaintext">
                                    {{ val($src, 'created_at', val($src,'tanggal','-')) }}
                                </div>
                            </div>
                        </div>

                        <hr>

                        {{-- Nilai per kriteria --}}
                        <h6 class="mb-3">Nilai Per Kriteria</h6>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="form-label small text-muted">Kehadiran</label>
                                <div class="form-control-plaintext">{{ val($src, 'kehadiran') }}</div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small text-muted">Sikap & Etika Kerja</label>
                                <div class="form-control-plaintext">{{ val($src, 'sikap') }}</div>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small text-muted">Kemampuan Teknis</label>
                                <div class="form-control-plaintext">{{ val($src, 'teknis') }}</div>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label small text-muted">Problem Solving</label>
                                <div class="form-control-plaintext">{{ val($src, 'problem_solving') }}</div>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label small text-muted">Kerja Tim</label>
                                <div class="form-control-plaintext">{{ val($src, 'kerja_tim') }}</div>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label small text-muted">Penyelesaian Tugas</label>
                                <div class="form-control-plaintext">{{ val($src, 'penyelesaian_tugas') }}</div>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label small text-muted">Kualitas Laporan</label>
                                <div class="form-control-plaintext">{{ val($src, 'laporan') }}</div>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label small text-muted">Nilai Akhir (Rata-rata)</label>
                                <div class="form-control-plaintext">
                                    @php
                                        $na = val($src, 'nilai_akhir', '-');
                                        if (is_numeric($na)) {
                                            echo number_format((float) $na, 2);
                                        } else {
                                            echo $na;
                                        }
                                    @endphp
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="form-label small text-muted">Rekomendasi</label>
                                <div class="form-control-plaintext">{{ val($src, 'rekomendasi') }}</div>
                            </div>
                        </div>

                        <hr class="my-3">

                        {{-- Komentar --}}
                        <div class="mb-3">
                            <label class="form-label small text-muted">Komentar / Catatan Pembimbing</label>
                            <div class="border rounded p-3 bg-light">
                                <pre class="mb-0" style="white-space:pre-wrap;word-wrap:break-word;">{{ val($src, 'komentar', '-') }}</pre>
                            </div>
                        </div>

                        {{-- Lampiran --}}
                        <div class="mb-3">
                            <label class="form-label small text-muted">Lampiran Umpan Balik</label>
                            <div>
                                @php $file = val($src, 'file_feedback', null); @endphp
                                @if($file && $file !== '-')
                                    {{-- Tautan buka (asumsi file disimpan di storage/app/public) --}}
                                    <a href="{{ asset('storage/' . $file) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                        <i class="ri-file-paper-line me-1"></i> Buka Lampiran
                                    </a>
                                @else
                                    <div class="form-control-plaintext text-muted">Tidak ada lampiran</div>
                                @endif
                            </div>
                        </div>

                    </div> {{-- /.card-body --}}
                </div>
            </div>

            <div class="col-xl-4">
                {{-- Ringkasan & aksi --}}
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-3">Ringkasan</h6>
                        <dl class="row">
                            <dt class="col-6 small text-muted">Nilai Akhir</dt>
                            <dd class="col-6">{{ is_numeric(val($src,'nilai_akhir')) ? number_format((float)val($src,'nilai_akhir'),2) : val($src,'nilai_akhir') }}</dd>

                            <dt class="col-6 small text-muted">Rekomendasi</dt>
                            <dd class="col-6">{{ val($src,'rekomendasi') }}</dd>

                            <dt class="col-6 small text-muted">Penilai</dt>
                            <dd class="col-6">{{ val($src,'penilai_name') }}</dd>

                            <dt class="col-6 small text-muted">Tanggal</dt>
                            <dd class="col-6">{{ val($src,'created_at') }}</dd>
                        </dl>

                        <div class="d-grid gap-2 mt-3">

                            <a href="{{ route('penilaian.index') }}" class="btn btn-outline-secondary">Kembali ke Daftar</a>
                        </div>
                    </div>
                </div>

                {{-- Tips --}}
                <div class="card mt-3">
                    <div class="card-body small text-muted">
                        <strong>Tips:</strong>
                        <ul class="ps-3 mb-0">
                            <li>Nilai akhir dihitung dari rata-rata kriteria (server akan menghitung ulang saat menyimpan).</li>
                            <li>Gunakan tombol <em>Simpan ke Database</em> hanya jika data preview berasal dari form yang valid.</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@include('dashboard.layout.footer')
