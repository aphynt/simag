@include('dashboard.layout.head', ['title' => 'Settings'])
@include('dashboard.layout.switcher')
@include('dashboard.layout.loader')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')

<div class="main-content app-content">
    <div class="container-fluid">


        <!-- Page Header -->
        <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
            <div>
                <nav>
                    <ol class="breadcrumb mb-1">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile Settings</li>
                    </ol>
                </nav>
                <h1 class="page-title fw-medium fs-18 mb-0">Profile Settings</h1>
            </div>

        </div>
        <!-- Page Header Close -->

        <!-- Start::row-1 -->
        <div class="row gap-3 justify-content-center">
            <div class="col-xl-9">
                <div class="card custom-card">
                    <ul class="nav nav-tabs tab-style-8 scaleX rounded m-3 profile-settings-tab gap-2" id="myTab4"
                        role="tablist">
                        <li class="nav-item me-1" role="presentation">
                            <button class="nav-link  px-4 bg-primary-transparent active" id="account"
                                data-bs-toggle="tab" data-bs-target="#account-pane" type="button" role="tab"
                                aria-controls="account-pane" aria-selected="true">Akun</button>
                        </li>
                    </ul>
                    <form action="{{ route('user.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="p-3 border-bottom border-top border-block-end-dashed tab-content">
                        <div class="tab-pane show active overflow-hidden p-0 border-0" id="account-pane" role="tabpanel"
                            aria-labelledby="account" tabindex="0">
                            <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-1">
                                <div class="fw-semibold d-block fs-15">Setting Akun :</div>
                            </div>
                            <div class="row gy-3">
                                <div class="col-xl-12">
                                    <div class="d-flex align-items-start flex-wrap gap-3">
                                        <div>
                                            <span class="avatar avatar-xxl">
                                                <img src="{{ asset('profile') }}/{{ Auth::user()->avatar }}" alt="">
                                            </span>
                                        </div>
                                        <div>
                                            <span class="fw-medium d-block mb-2">Gambar Profil</span>
                                            <div class="btn-list mb-1">
                                                <label for="avatar-upload" class="btn btn-sm btn-primary btn-wave">
                                                    <i class="ri-upload-2-line me-1"></i> Ganti Avatar
                                                </label>
                                                <input type="file" id="avatar-upload" name="avatar" style="display:none;" accept="image/jpeg, image/png, image/gif">
                                            </div>
                                            <span class="d-block fs-12 text-muted">Gunakan format JPEG, PNG, atau GIF. Ukuran terbaik: 200x200 piksel. Pastikan ukurannya di bawah 5MB.</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <label for="profile-user-name" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="profile-user-name" value="{{ Auth::user()->name }}" readonly disabled placeholder="Masukkan Name">
                                </div>
                                <div class="col-xl-6">
                                    <label for="profile-email" class="form-label">Email :</label>
                                    <input type="email" class="form-control" id="profile-email" value="{{ Auth::user()->email }}" name="email" placeholder="Masukkan Email" required>
                                </div>
                                <div class="col-xl-6">
                                    <label for="profile-designation" class="form-label">NIM/NIP :</label>
                                    <input type="text" class="form-control" id="profile-designation" value="{{ Auth::user()->nim }}" readonly disabled placeholder="Masukkan NIM/NIP">
                                </div>
                                <div class="col-xl-6">
                                    <label for="profile-profesi" class="form-label">Profesi :</label>
                                    <input type="text" class="form-control" id="profile-profesi" value="{{ Auth::user()->role }}" readonly disabled placeholder="Masukkan Profesi">
                                </div>
                                <div class="col-xl-6">
                                    <label for="program-studi" class="form-label">Program Studi</label>
                                    <select class="form-select" name="program_studi" id="program-studi">
                                        <option value="{{ Auth::user()->program_studi }}" selected>{{ Auth::user()->program_studi }}</option>
                                        <option value="Teknik Informatika">Teknik Informatika</option>
                                        <option value="Sistem Informasi">Sistem Informasi</option>
                                    </select>
                                </div>
                                <div class="col-xl-6">
                                    <label for="no-handphone" class="form-label">No. Handphone</label>
                                    <input type="text" class="form-control" id="no-handphone" name="no_hp" value="{{ Auth::user()->no_hp }}" required placeholder="Masukkan No. Handphone">
                                </div>
                                <div class="col-xl-6">
                                    <label for="semester" class="form-label">Semester Sekarang</label>
                                    <input type="text" class="form-control" id="semester" name="semester" value="{{ Auth::user()->semester }}" required placeholder="Masukkan Semester Sekarang">
                                </div>
                                <div class="col-xl-6">
                                    <label for="ipk" class="form-label">IPK Terakhir</label>
                                    <input type="text" class="form-control" id="ipk" name="ipk" value="{{ Auth::user()->ipk }}" required placeholder="Masukkan IPK Terakhir">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer border-top-0">
                        <div class="btn-list float-end">
                            {{-- <button class="btn btn-primary2 btn-wave">Deactivate Account</button> --}}
                            <button type="submit" class="btn btn-primary btn-wave">Update Profil</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--End::row-1 -->


    </div>
</div>
@include('dashboard.layout.footer')
