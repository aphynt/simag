{{-- resources/views/penilaian/detail.blade.php (contoh path) --}}
@include('dashboard.layout.head', ['title' => 'Detail Pengajuan'])
@include('dashboard.layout.switcher')
@include('dashboard.layout.loader')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')

<div class="main-content app-content">
    <div class="container-fluid">

        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">

        </div>
        <!-- Page Header Close -->

        <div class="row">
            <div class="col-xl-10">
                <div class="card custom-card">
                    <div class="card-body">

                        {{-- Bagian detail pengajuan (read-only) --}}
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">NIM</label>
                                <input type="text" class="form-control" value="{{ $data->nim }}" readonly>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Nama Mahasiswa</label>
                                <input type="text" class="form-control" value="{{ $data->name }}" readonly>
                            </div>
                        </div> {{-- /.row g-3 --}}

                        <hr class="my-4">

                        {{-- BAGIAN FORM PENILAIAN MAGANG --}}
                        @php
                            // contoh: $evaluation adalah objek penilaian jika sudah ada
                            // misal null jika belum dinilai
                            $fields = [
                                'kehadiran','sikap','teknis','problem_solving','kerja_tim','penyelesaian_tugas','laporan'
                            ];
                        @endphp

                        <h5 class="mb-3">Form Penilaian Magang</h5>

                        @if(isset($evaluation) && $evaluation)
                            {{-- Tampilkan penilaian yang sudah ada (read-only) --}}
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Penilai</label>
                                    <input type="text" class="form-control" value="{{ $evaluation->penilai_name }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Tanggal Penilaian</label>
                                    <input type="text" class="form-control" value="{{ $evaluation->created_at->format('Y-m-d') }}" readonly>
                                </div>

                                @foreach($fields as $field)
                                    <div class="col-md-3">
                                        <label class="form-label">{{ ucwords(str_replace('_',' ', $field)) }}</label>
                                        <input type="text" class="form-control" value="{{ $evaluation->$field }}" readonly>
                                    </div>
                                @endforeach

                                <div class="col-md-4">
                                    <label class="form-label">Nilai Akhir (Rata-rata)</label>
                                    <input type="text" class="form-control" value="{{ number_format($evaluation->nilai_akhir,2) }}" readonly>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label">Rekomendasi</label>
                                    <input type="text" class="form-control" value="{{ $evaluation->rekomendasi }}" readonly>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Komentar / Rekomendasi Pembimbing</label>
                                    <textarea class="form-control" rows="4" readonly>{{ $evaluation->komentar }}</textarea>
                                </div>

                                @if(!empty($evaluation->file_feedback))
                                <div class="col-md-12">
                                    <label class="form-label">Lampiran Umpan Balik</label>
                                    <div class="border rounded p-2">
                                        <a href="{{ asset('storage/' . $evaluation->file_feedback) }}" target="_blank" class="btn btn-sm btn-outline-primary">Buka Lampiran</a>
                                    </div>
                                </div>
                                @endif
                            </div>
                        @else
                            {{-- Form input penilaian (hanya tampil untuk role tertentu, contoh: pembimbing) --}}
                            @if(Auth::user()->role == 'pembimbing' || Auth::user()->role == 'wd3' || Auth::user()->role == 'prodi')
                                <form method="POST" action="{{ route('penilaian.simpan', $data->uuid) }}" enctype="multipart/form-data" id="formPenilaian">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <p class="text-muted small">Beri nilai 1 (Kurang) sampai 5 (Sangat Baik).</p>
                                        </div>

                                        <div class="col-md-3">
                                            <label class="form-label">Kehadiran</label>
                                            <select name="kehadiran" id="kehadiran" class="form-select nilai" required>
                                                <option value="">-- Pilih --</option>
                                                @for($i=1;$i<=5;$i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <label class="form-label">Sikap & Etika Kerja</label>
                                            <select name="sikap" id="sikap" class="form-select nilai" required>
                                                <option value="">-- Pilih --</option>
                                                @for($i=1;$i<=5;$i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <label class="form-label">Kemampuan Teknis</label>
                                            <select name="teknis" id="teknis" class="form-select nilai" required>
                                                <option value="">-- Pilih --</option>
                                                @for($i=1;$i<=5;$i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <label class="form-label">Problem Solving</label>
                                            <select name="problem_solving" id="problem_solving" class="form-select nilai" required>
                                                <option value="">-- Pilih --</option>
                                                @for($i=1;$i<=5;$i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <label class="form-label">Kerja Tim</label>
                                            <select name="kerja_tim" id="kerja_tim" class="form-select nilai" required>
                                                <option value="">-- Pilih --</option>
                                                @for($i=1;$i<=5;$i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <label class="form-label">Penyelesaian Tugas</label>
                                            <select name="penyelesaian_tugas" id="penyelesaian_tugas" class="form-select nilai" required>
                                                <option value="">-- Pilih --</option>
                                                @for($i=1;$i<=5;$i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <label class="form-label">Kualitas Laporan</label>
                                            <select name="laporan" id="laporan" class="form-select nilai" required>
                                                <option value="">-- Pilih --</option>
                                                @for($i=1;$i<=5;$i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <label class="form-label">Nilai Akhir (Rata-rata)</label>
                                            <input type="text" id="nilaiAkhir" name="nilai_akhir" class="form-control" readonly>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Rekomendasi</label>
                                            <select name="rekomendasi" id="rekomendasi" class="form-select" required>
                                                <option value="">-- Pilih --</option>
                                                <option value="Lulus">Lulus</option>
                                                <option value="Perbaikan">Perbaikan</option>
                                                <option value="Tidak Lulus">Tidak Lulus</option>
                                            </select>
                                        </div>

                                        <div class="col-12">
                                            <label class="form-label">Komentar / Catatan Pembimbing</label>
                                            <textarea name="komentar" id="komentar" class="form-control" rows="4" placeholder="Tuliskan komentar atau rekomendasi untuk mahasiswa..." required></textarea>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="form-label">Lampiran Umpan Balik (opsional)</label>
                                            <input type="file" name="file_feedback" class="form-control" accept=".pdf,.doc,.docx,.zip,.jpg,.png">
                                            <small class="text-muted">Ekstensi yg diperbolehkan: pdf, doc, docx, zip, jpg, png</small>
                                        </div>

                                        <div class="col-12 mt-3 d-flex gap-2">
                                            <button type="submit" class="btn btn-success">
                                                <i class="ri-save-line me-1"></i> Simpan Penilaian
                                            </button>
                                            <button type="reset" class="btn btn-secondary" id="btnResetForm">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            @else
                                {{-- Jika bukan penilai, tampilkan pesan --}}
                                <div class="alert alert-info">
                                    Hanya pembimbing atau user dengan hak akses tertentu yang dapat mengisi penilaian magang.
                                </div>
                            @endif
                        @endif {{-- akhir cek $evaluation --}}



                    </div> {{-- /.card-body --}}
                </div>
            </div>
            <div class="col-xl-2">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-3">Panduan Singkat</h6>
                        <ul class="ps-3 small">
                            <li>Isi semua kriteria dengan nilai 1–5 untuk melihat hasil rata-rata.</li>
                            <li>Nilai akhir dihitung otomatis.</li>
                            <li>Preview ini bukan form — data tidak disimpan ke server.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@include('dashboard.layout.footer')

<script>
document.addEventListener('DOMContentLoaded', function () {
    const nilaiInputs = document.querySelectorAll('.nilai');
    const nilaiAkhirInput = document.getElementById('nilaiAkhir');
    const form = document.getElementById('formPenilaian');
    const btnReset = document.getElementById('btnResetForm');

    function hitungRataRata() {
        let sum = 0;
        let count = 0;
        nilaiInputs.forEach(function(el) {
            const v = parseFloat(el.value);
            if (!isNaN(v)) {
                sum += v;
                count++;
            }
        });
        if (count === 0) {
            nilaiAkhirInput.value = '';
            return;
        }
        const avg = sum / count;
        // tampilkan dua angka desimal
        nilaiAkhirInput.value = avg.toFixed(2);
    }

    nilaiInputs.forEach(function(el) {
        el.addEventListener('change', hitungRataRata);
    });

    if (btnReset) {
        btnReset.addEventListener('click', function() {
            setTimeout(hitungRataRata, 50);
        });
    }

    // Validasi sederhana saat submit: pastikan semua field nilai terisi
    if (form) {
        form.addEventListener('submit', function(e) {
            let valid = true;
            nilaiInputs.forEach(function(el) {
                if (el.value === '') valid = false;
            });
            if (!valid) {
                e.preventDefault();
                alert('Mohon isi semua kriteria penilaian (1-5) sebelum menyimpan.');
            }
        });
    }
});
</script>
