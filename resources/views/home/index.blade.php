@include('home.layout.head')
@include('home.layout.header')
<section class="bg-half-170 bg-primary d-table w-100"
    style="background: url('{{ asset('home') }}/assets/images/insurance/bg.png') center center;">
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-lg-12">
                <div class="title-heading text-center">
                    <h1 class="heading title-dark text-white mb-3">Basement Menu</h1>

                    <div class="row mt-4 pt-2">
                        <div class="col-lg-2 col-md-4 col-6 mt-4 pt-2">
                            <div class="card features feature-primary explore-feature border-0 rounded text-center">
                                <div class="card-body">
                                    <div class="icons rounded-circle shadow-lg d-inline-block">
                                        <img src="{{ asset('home') }}/assets/images/insurance/health.svg"
                                            class="avatar avatar-md-sm" alt="">
                                    </div>
                                    <div class="content mt-3">
                                        <h6 class="mb-0">
                                            <a href="javascript:void(0)"
                                            class="title text-dark"
                                            onclick="checkLogin('pengajuan')">
                                            Pengajuan
                                            </a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-2 col-md-4 col-6 mt-4 pt-2">
                            <div class="card features feature-primary explore-feature border-0 rounded text-center">
                                <div class="card-body">
                                    <div class="icons rounded-circle shadow-lg d-inline-block">
                                        <img src="{{ asset('home') }}/assets/images/insurance/term-life.svg"
                                            class="avatar avatar-md-sm" alt="">
                                    </div>
                                    <div class="content mt-3">
                                        <h6 class="mb-0">
                                            <a href="javascript:void(0)"
                                            class="title text-dark"
                                            onclick="checkLogin('persetujuan')">
                                            Persetujuan
                                            </a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-2 col-md-4 col-6 mt-4 pt-2">
                            <div class="card features feature-primary explore-feature border-0 rounded text-center">
                                <div class="card-body">
                                    <div class="icons rounded-circle shadow-lg d-inline-block">
                                        <img src="{{ asset('home') }}/assets/images/insurance/family-health.svg"
                                            class="avatar avatar-md-sm" alt="">
                                    </div>
                                    <div class="content mt-3">
                                        <h6 class="mb-0">
                                            <a href="javascript:void(0)"
                                            class="title text-dark"
                                            onclick="checkLogin('konsultasi')">
                                            Konsultasi
                                            </a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-2 col-md-4 col-6 mt-4 pt-2">
                            <div class="card features feature-primary explore-feature border-0 rounded text-center">
                                <div class="card-body">
                                    <div class="icons rounded-circle shadow-lg d-inline-block">
                                        <img src="{{ asset('home') }}/assets/images/insurance/investment.svg"
                                            class="avatar avatar-md-sm" alt="">
                                    </div>
                                    <div class="content mt-3">
                                        <h6 class="mb-0">
                                            <a href="javascript:void(0)"
                                            class="title text-dark"
                                            onclick="checkLogin('monitoring')">
                                            Monitoring
                                            </a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-2 col-md-4 col-6 mt-4 pt-2">
                            <div class="card features feature-primary explore-feature border-0 rounded text-center">
                                <div class="card-body">
                                    <div class="icons rounded-circle shadow-lg d-inline-block">
                                        <img src="{{ asset('home') }}/assets/images/insurance/car.svg"
                                            class="avatar avatar-md-sm" alt="">
                                    </div>
                                    <div class="content mt-3">
                                        <h6 class="mb-0">
                                            <a href="javascript:void(0)"
                                            class="title text-dark"
                                            onclick="checkLogin('evaluasi')">
                                            Evaluasi
                                            </a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                        <div class="col-lg-2 col-md-4 col-6 mt-4 pt-2">
                            <div class="card features feature-primary explore-feature border-0 rounded text-center">
                                <div class="card-body">
                                    <div class="icons rounded-circle shadow-lg d-inline-block">
                                        <img src="{{ asset('home') }}/assets/images/insurance/bike.svg"
                                            class="avatar avatar-md-sm" alt="">
                                    </div>
                                    <div class="content mt-3">
                                        <h6 class="mb-0">
                                            <a href="javascript:void(0)"
                                            class="title text-dark"
                                            onclick="checkLogin('penilaian')">
                                            Penilaian
                                            </a>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->
                </div>
            </div><!--end col-->
        </div><!--end row-->
    </div> <!--end container-->
</section><!--end section-->
<div class="position-relative">
    <div class="shape overflow-hidden text-color-white">
        <svg viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!-- Hero End -->

<!-- Start -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card features feature-primary feature-full-bg rounded p-4 bg-light position-relative overflow-hidden border-0">
                    <span class="h1 icon-color">
                        <i class="uil uil-briefcase"></i>
                    </span>
                    <div class="card-body p-0 content">
                        <h5>Pengajuan Magang</h5>
                        <p class="para text-muted mb-0">Aplikasi ini memungkinkan mahasiswa untuk mengajukan permohonan magang sesuai dengan jurusan mereka.</p>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-4 col-md-6 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                <div class="card features feature-primary feature-full-bg rounded p-4 bg-light position-relative overflow-hidden border-0">
                    <span class="h1 icon-color">
                        <i class="uil uil-rocket"></i>
                    </span>
                    <div class="card-body p-0 content">
                        <h5>Tujuan Pengajuan</h5>
                        <p class="para text-muted mb-0">Memudahkan mahasiswa untuk memilih tempat magang yang relevan dan mendukung pengembangan karir mereka.</p>
                    </div>
                </div>
            </div><!--end col-->

            <div class="col-lg-4 col-md-6 col-12 mt-4 mt-lg-0 pt-2 pt-lg-0">
                <div class="card features feature-primary feature-full-bg rounded p-4 bg-light position-relative overflow-hidden border-0">
                    <span class="h1 icon-color">
                        <i class="uil uil-crosshairs"></i>
                    </span>
                    <div class="card-body p-0 content">
                        <h5>Proses Persetujuan</h5>
                        <p class="para text-muted mb-0">Prodi akan memeriksa dan menyetujui pengajuan magang mahasiswa untuk memastikan kesesuaian dengan kurikulum.</p>
                    </div>
                </div>
            </div><!--end col-->
<!--end col-->
        </div><!--end row-->
    </div><!--end container-->

    <div class="container mt-100 mt-60">
        <div class="row align-items-center">
            <div class="col-lg-5 col-md-6 mt-4 pt-2">
                <img src="{{ asset('home') }}/assets/images/illustrator/services.svg" alt="">
            </div><!--end col-->

            <div class="col-lg-7 col-md-6 mt-4 pt-2">
                <div class="section-title ms-lg-5">
                    <h4 class="title mb-4">Pengajuan Magang</h4>
                    <p class="text-muted">Aplikasi ini memudahkan mahasiswa untuk mengajukan permohonan magang yang akan diproses oleh program studi.</p>
                    <ul class="list-unstyled text-muted">
                        <li class="mb-1"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Pengajuan magang oleh mahasiswa</li>
                        <li class="mb-1"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Proses verifikasi oleh program studi</li>
                        <li class="mb-1"><span class="text-primary h5 me-2"><i class="uil uil-check-circle align-middle"></i></span>Persetujuan untuk melanjutkan magang</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@include('home.layout.footer')
<script>
    function checkLogin(menu) {
        @if (Auth::check())
            if(menu === 'pengajuan') {
                window.location.href = "{{ route('pengajuan.index') }}";
            } else if(menu === 'persetujuan') {
                window.location.href = "{{ route('persetujuan.index') }}";
            } else if(menu === 'konsultasi') {
                window.location.href = "{{ route('konsultasi.index') }}";
            } else if(menu === 'monitoring') {
                window.location.href = "{{ route('monitoring.index') }}";
            } else if(menu === 'evaluasi') {
                window.location.href = "{{ route('evaluasi.index') }}";
            } else if(menu === 'penilaian') {
                window.location.href = "{{ route('penilaian.index') }}";
            }
        @else
            Swal.fire({
                title: "Anda belum login!",
                text: "Silakan login untuk melanjutkan.",
                icon: "warning",
                button: "Tutup",
            });
        @endif
    }
</script>
