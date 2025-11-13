@include('dashboard.layout.head', ['title' => 'Konsultasi'])
@include('dashboard.layout.switcher')
@include('dashboard.layout.loader')
@include('dashboard.layout.header')
@include('dashboard.layout.sidebar')
<style>
    .modern-file-bubble {
    max-width: 70%;
    padding: 12px;
    border-radius: 14px;
    background: var(--primary01);
    backdrop-filter: blur(6px);
    box-shadow: 0 3px 10px rgba(0,0,0,0.08);
    animation: fadeIn .2s ease-in;
}

.modern-file-bubble.sent {
    background: #e0f1ff;
    border-right: 4px solid #007bff;
}

.modern-file-bubble.received {
    background: #f1f1f1;
    border-left: 4px solid #777;
}

.modern-file-bubble .bubble-content {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

/* FILE CARD */
.file-card {
    display: flex;
    align-items: center;
    background: white !important;
    border-radius: 10px;
    padding: 10px;
    gap: 12px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.07);
    transition: 0.2s ease;
}
.file-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.file-left {
    width: 48px;
    height: 48px;
    border-radius: 12px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size: 24px;
}

/* Middle info */
.file-mid, .file-left,.file-right {
    background: white !important;
}
.file-mid {
    flex: 1 !important;
}
.file-name {
    margin: 0;
    font-weight: 600;
    color: black !important;
}
.file-size {
    color: #666 !important;
    font-size: 12px;
}

/* Download Button */
.btn-download {
    width: 38px;
    height: 38px;
    border-radius: 8px;
    background: #eef;
    display:flex;
    align-items:center;
    justify-content:center;
    transition: 0.2s;
}
.btn-download:hover {
    background: #d5e7ff;
}

</style>
<div class="main-content app-content">
                <div class="container-fluid">


                    <!-- Page Header -->
                    <div class="d-flex align-items-center justify-content-between page-header-breadcrumb flex-wrap gap-2">
                        <div>

                            <h1 class="page-title fw-medium fs-18 mb-0">Konsultasi</h1>
                        </div>

                    </div>
                    <!-- Page Header Close -->

                    <div class="main-chart-wrapper gap-lg-2 gap-0 mb-2 d-lg-flex">
                        <div class="chat-info border">
                            <div class="chat-search p-3 border-bottom">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search Chat" aria-describedby="button-addon01">
                                    <button aria-label="button" class="btn btn-primary-light" type="button" id="button-addon01">
                                        <i class="ri-search-line"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane show active border-0 chat-users-tab" id="users-tab-pane"
                                    role="tabpanel" aria-labelledby="users-tab" tabindex="0">
                                    <ul class="list-unstyled mb-0 mt-2 chat-users-tab" id="chat-msg-scroll">
                                        {{-- <li class="pb-0">
                                            <p class="text-muted fs-11 fw-medium mb-2 op-7">ACTIVE CHATS</p>
                                        </li>
                                        <li class="checkforactive">
                                            <a href="javascript:void(0);" onclick="changeTheInfo(this,'Rashid Khan','5','online')">
                                                <div class="d-flex align-items-top">
                                                    <div class="me-1 lh-1">
                                                        <span class="avatar avatar-md online me-2">
                                                            <img  src="{{ asset('dash') }}/build/assets/images/faces/5.jpg" alt="img">
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <p class="mb-0 fw-medium">
                                                            Rashid Khan <span
                                                                class="float-end text-muted fw-normal fs-11">11:12PM</span>
                                                        </p>
                                                        <p class="fs-12 mb-0">
                                                            <span class="chat-msg text-truncate">Hey!! you are there? &#128522;</span>
                                                                    <span
                                                                        class="badge bg-primary2 rounded-pill float-end">3</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="chat-msg-unread checkforactive">
                                            <a href="javascript:void(0);" onclick="changeTheInfo(this,'Jamison Jen','2','online')">
                                                <div class="d-flex align-items-top">
                                                    <div class="me-1 lh-1">
                                                        <span class="avatar avatar-md online me-2">
                                                            <img  src="{{ asset('dash') }}/build/assets/images/faces/2.jpg" alt="img">
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <p class="mb-0 fw-medium">
                                                            Jamison Jen <span
                                                                class="float-end text-muted fw-normal fs-11">06:52AM</span>
                                                        </p>
                                                        <p class="fs-12 mb-0 chat-msg-typing ">
                                                            <span class="chat-msg text-truncate">Typing...</span>
                                                            <span class="chat-read-icon float-end align-middle"><i
                                                                    class="ri-check-double-fill"></i></span>
                                                            <span class="chat-read-icon float-end align-middle"><i
                                                                    class="ri-check-double-fill"></i></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="checkforactive" >
                                            <a href="javascript:void(0);" onclick="changeTheInfo(this,'Andy Max','10','online')">
                                                <div class="d-flex align-items-top">
                                                    <div class="me-1 lh-1">
                                                        <span class="avatar avatar-md online me-2">
                                                            <img  src="{{ asset('dash') }}/build/assets/images/faces/10.jpg" alt="img">
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <p class="mb-0 fw-medium">
                                                            Andy Max <span
                                                                class="float-end text-muted fw-normal fs-11">10:15AM</span>
                                                        </p>
                                                        <p class="fs-12 mb-0">
                                                            <span class="chat-msg text-truncate">Great! I am happy to here this from you. &#9749;</span>
                                                            <span class="chat-read-icon float-end align-middle"><i
                                                                    class="ri-check-double-fill"></i></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="checkforactive active">
                                            <a href="javascript:void(0);" onclick="changeTheInfo(this,'Kerina Cherish','6','online')">
                                                <div class="d-flex align-items-top">
                                                    <div class="me-1 lh-1">
                                                        <span class="avatar avatar-md online me-2">
                                                            <img src="{{ asset('dash') }}/build/assets/images/faces/6.jpg" alt="img">
                                                        </span>
                                                    </div>
                                                    <div class="flex-fill">
                                                        <p class="mb-0 fw-medium">
                                                            Kerina Cherish <span
                                                                class="float-end text-muted fw-normal fs-11">03:15PM</span>
                                                        </p>
                                                        <p class="fs-12 mb-0">
                                                            <span class="chat-msg text-truncate">Looking forward about the matter</span>
                                                            <span class="chat-read-icon float-end align-middle"><i
                                                                    class="ri-check-double-fill"></i></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </a>
                                        </li> --}}
                                       <li class="pb-0">
                                            <p class="text-muted fs-11 fw-medium mb-2 op-7">ALL CHATS</p>
                                        </li>
                                        @foreach ($allUser as $u)
                                            <li class="chat-inactive" data-user-id="{{ $u->id }}">
                                                <a href="javascript:void(0);" onclick="openChat({{ $u->id }})">
                                                    <div class="d-flex align-items-top">
                                                        <div class="me-2">
                                                            <span class="avatar avatar-md {{ $u->is_online ? 'online' : 'offline' }}">
                                                                <img src="/profile/{{ $u->avatar }}" alt="img">
                                                            </span>
                                                        </div>
                                                        <div class="flex-fill">
                                                            <p class="mb-0 fw-medium">
                                                                {{ $u->name }}
                                                                <span class="float-end text-muted fs-11">
                                                                    {{ $u->lastMessage ? $u->lastMessage->created_at->format('d-m-Y H:i') : '' }}
                                                                </span>
                                                            </p>
                                                            <p class="fs-12 mb-0 text-truncate">
                                                                {{ $u->lastMessage ? $u->lastMessage->message : 'Belum ada pesan' }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="main-chat-area border">
                            <div class="d-flex align-items-center border-bottom main-chat-head flex-wrap">
                                <span class="avatar avatar-md chatstatusperson me-2 lh-1">
                                        {{-- <img class="chatimageperson" src="" alt="img"> --}}
                                    </span>
                                <div class="flex-fill">
                                    <p class="mb-0 fw-medium fs-14 lh-1">
                                        <a href="javascript:void(0);" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" class="chatnameperson responsive-userinfo-open"></a>
                                    </p>
                                    <p class="text-muted mb-0 chatpersonstatus"></p>
                                </div>
                                <div class="d-flex flex-wrap rightIcons gap-2">
                                    <button aria-label="button" type="button" class="btn btn-icon btn-primary1-light my-0  btn-sm">
                                        <i class="ti ti-phone"></i>
                                    </button>
                                    <button aria-label="button" type="button" class="btn btn-icon btn-primary2-light my-0 btn-sm d-none d-sm-block">
                                        <i class="ti ti-video"></i>
                                    </button>
                                    <button aria-label="button" type="button" class="btn btn-icon btn-outline-light  responsive-userinfo-open btn-sm">
                                        <i class="ti ti-user-circle" id="responsive-chat-close"></i>
                                    </button>
                                    <div class="dropdown">
                                        <button aria-label="button" class="btn btn-icon btn-primary3-light  btn-wave waves-light btn-sm waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-user-3-line me-1"></i>Profile</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-format-clear me-1"></i>Clear Chat</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-user-unfollow-line me-1"></i>Delete User</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-user-forbid-line me-1"></i>Block User</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-error-warning-line me-1"></i>Report</a></li>
                                        </ul>
                                    </div>
                                    <button aria-label="button" type="button" class="btn btn-icon btn-primary-light my-0 responsive-chat-close btn-sm">
                                        <i class="ri-close-line"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="chat-content" id="main-chat-content" style="height: 90%">
                                <ul class="list-unstyled" style="overflow-y: scroll;height: 100% !important">
                                    <div class="" style="width: 100%;height: 100%;border-radius:4px;display:flex;justify-content: center;align-items: center">
                                        <div class="spinner-grow" role="status">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>
                                </ul>
                            </div>
                           <div class="chat-footer">
                                <a aria-label="anchor" class="btn btn-primary1-light me-2 btn-icon btn-send" href="javascript:void(0)" onclick="document.getElementById('file-input').click()">
                                    <i class="ri-attachment-2"></i>
                                </a>
                                <input type="file" id="file-input" style="display: none" accept="image/*,.pdf,.doc,.docx,.xls,.xlsx,.txt" onchange="handleFileSelect(event)">
                                <a aria-label="anchor" class="btn btn-icon me-2 btn-primary2 emoji-picker" href="javascript:void(0)">
                                    <i class="ri-emotion-line"></i>
                                </a>
                                <input class="form-control chat-message-space" id="chat-input" placeholder="Type your message here..." type="text">
                                <a aria-label="anchor" class="btn btn-primary ms-2 btn-icon btn-send" href="javascript:void(0)" onclick="sendMessage()">
                                    <i class="ri-send-plane-2-line"></i>
                                </a>
                            </div>
                        </div>

                    </div>

                    <!-- Start::chat user details offcanvas -->
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight">
                        <div class="offcanvas-body">
                            <button type="button" class="btn btn-sm btn-icon btn-outline-light border" data-bs-dismiss="offcanvas"
                                aria-label="Close"><i class="ri-close-line lh-1 align-center"></i></button>
                            <div class="chat-user-details" id="chat-user-details">
                                <div class="text-center mb-4">
                                    <span class="avatar avatar-rounded online avatar-xxl me-2 mb-3 chatstatusperson">
                                        <img class="chatimageperson" src="{{ asset('dash') }}/build/assets/images/faces/2.jpg" alt="img">
                                    </span>
                                    <p class="mb-1 fs-15 fw-medium text-dark lh-1 chatnameperson">Jamison Jen</p>
                                    <p class="fs-12 text-muted"><span class="chatnameperson">jamisonjen0114</span>@gmail.com</p>
                                    <p class="text-center mb-0 d-flex gap-2 flex-wrap">
                                        <button type="button" aria-label="button" class="btn btn-primary-light btn-wave flex-fill"><i
                                                class="ri-phone-line me-2 align-middle"></i>Call</button>
                                        <button type="button" aria-label="button" class="btn btn-primary1-light btn-wave flex-fill"><i
                                                class="ri-video-add-line me-2 align-middle"></i>Video Call</button>
                                        <button type="button" aria-label="button" class="btn btn-info-light btn-wave flex-fill"><i
                                                class="ri-chat-1-line me-2 align-middle"></i>Message</button>
                                    </p>
                                </div>
                                <div class="mb-4 pt-2">
                                    <div class="fw-medium mb-4">Shared Files
                                        <span class="badge bg-primary2 ms-1 rounded-pill">17</span>
                                        <span class="float-end fs-11"><a href="javascript:void(0);" class="fs-12 text-muted"> View All<i class="ti ti-arrow-narrow-right ms-1"></i> </a></span>
                                    </div>
                                    <ul class="shared-files list-unstyled">
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="me-2 bg-primary-transparent rounded-circle">
                                                    <span class="shared-file-icon">
                                                        <i class="ti ti-file-text text-primary"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-fill">
                                                    <p class="fs-12 fw-medium mb-0">notification.pdf</p>
                                                    <p class="mb-0 text-muted fs-11">15,Dec 2024 - 12:45PM</p>
                                                </div>
                                                <div class="fs-18">
                                                    <a aria-label="anchor" href="javascript:void(0)"><i class="ri-download-2-line text-muted"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="me-2 bg-secondary-transparent rounded-circle">
                                                    <span class="shared-file-icon">
                                                        <i class="ri-image-line text-secondary"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-fill">
                                                    <p class="fs-12 fw-medium mb-0">Image_file1.Jpg</p>
                                                    <p class="mb-0 text-muted fs-11">03,Oct 2024 - 03:20AM</p>
                                                </div>
                                                <div class="fs-18">
                                                    <a aria-label="anchor" href="javascript:void(0)"><i class="ri-download-2-line text-muted"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="me-2 bg-success-transparent rounded-circle">
                                                    <span class="shared-file-icon">
                                                        <i class="ri-image-line text-success"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-fill">
                                                    <p class="fs-12 fw-medium mb-0">Imagefile_12.Jpg</p>
                                                    <p class="mb-0 text-muted fs-11">19,Oct 2024 - 01:23PM</p>
                                                </div>
                                                <div class="fs-18">
                                                    <a aria-label="anchor" href="javascript:void(0)"><i class="ri-download-2-line text-muted"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex align-items-center">
                                                <div class="me-2 bg-orange-transparent rounded-circle">
                                                    <span class="shared-file-icon">
                                                        <i class="ri-video-line text-orange"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-fill">
                                                    <p class="fs-12 fw-medium mb-0">Video-rec-20-10-2021.MP4</p>
                                                    <p class="mb-0 text-muted fs-11">13,May 2024 - 16:25AM</p>
                                                </div>
                                                <div class="fs-18">
                                                    <a href="javascript:void(0)"><i class="ri-download-2-line text-muted"></i></a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="mb-0 pt-2">
                                    <div class="fw-medium mb-4">Photos & Media
                                        <span class="badge bg-primary3 ms-1 rounded-pill">15</span>
                                        <span class="float-end fs-11"><a href="javascript:void(0);" class="fs-12 text-muted"> View All<i class="ti ti-arrow-narrow-right ms-1"></i> </a></span>
                                    </div>
                                    <div class="row gy-3">
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <a href="{{ asset('dash') }}/build/assets/images/media/media-40.jpg" class="glightbox card mb-0" data-gallery="gallery1">
                                                <img src="{{ asset('dash') }}/build/assets/images/media/media-40.jpg" alt="image" >
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <a href="{{ asset('dash') }}/build/assets/images/media/media-41.jpg" class="glightbox card mb-0" data-gallery="gallery1">
                                                <img src="{{ asset('dash') }}/build/assets/images/media/media-41.jpg" alt="image" >
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <a href="{{ asset('dash') }}/build/assets/images/media/media-42.jpg" class="glightbox card mb-0" data-gallery="gallery1">
                                                <img src="{{ asset('dash') }}/build/assets/images/media/media-42.jpg" alt="image" >
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <a href="{{ asset('dash') }}/build/assets/images/media/media-43.jpg" class="glightbox card mb-0" data-gallery="gallery1">
                                                <img src="{{ asset('dash') }}/build/assets/images/media/media-43.jpg" alt="image" >
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <a href="{{ asset('dash') }}/build/assets/images/media/media-44.jpg" class="glightbox card mb-0" data-gallery="gallery1">
                                                <img src="{{ asset('dash') }}/build/assets/images/media/media-44.jpg" alt="image" >
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <a href="{{ asset('dash') }}/build/assets/images/media/media-45.jpg" class="glightbox card mb-0" data-gallery="gallery1">
                                                <img src="{{ asset('dash') }}/build/assets/images/media/media-45.jpg" alt="image" >
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <a href="{{ asset('dash') }}/build/assets/images/media/media-46.jpg" class="glightbox card mb-0" data-gallery="gallery1">
                                                <img src="{{ asset('dash') }}/build/assets/images/media/media-46.jpg" alt="image" >
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <a href="{{ asset('dash') }}/build/assets/images/media/media-60.jpg" class="glightbox card mb-0" data-gallery="gallery1">
                                                <img src="{{ asset('dash') }}/build/assets/images/media/media-60.jpg" alt="image" >
                                            </a>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                            <a href="{{ asset('dash') }}/build/assets/images/media/media-61.jpg" class="glightbox card mb-0" data-gallery="gallery1">
                                                <img src="{{ asset('dash') }}/build/assets/images/media/media-61.jpg" alt="image" >
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End::chat user details offcanvas -->


                </div>
            </div>
@include('dashboard.layout.footer')
<script>
    let userId = "{{ Auth::user()->id }}";
    let currentChatUserId = null; // Track user yang sedang di-chat
    console.log(userId);
    
    document.getElementById("chat-input").addEventListener("keyup", function(e){
        if(e.key === "Enter"){
            sendMessage();
        }
    });

    let selectedFile = null;
    let firstLoad = true;

    // Fungsi untuk handle file selection
    function handleFileSelect(event) {
        selectedFile = event.target.files[0];
        if (selectedFile) {
            // Tampilkan preview atau nama file
            const fileName = selectedFile.name;
            document.getElementById('chat-input').placeholder = `File: ${fileName}`;
            
        }
    }

    // Fungsi untuk mendapatkan icon berdasarkan tipe file
    function getFileIcon(fileType, fileName) {
        if (fileType.startsWith('image/')) {
            return 'ri-image-line';
        }
        
        const ext = fileName.split('.').pop().toLowerCase();
        switch (ext) {
            case 'pdf':
                return 'ri-file-text-line';
            case 'doc':
            case 'docx':
                return 'ri-file-word-line';
            case 'xls':
            case 'xlsx':
                return 'ri-file-excel-line';
            case 'txt':
                return 'ri-file-text-line';
            default:
                return 'ri-file-line';
        }
    }

    // Fungsi untuk mendapatkan class warna berdasarkan tipe file
    function getFileColorClass(fileType, fileName) {
        if (fileType.startsWith('image/')) {
            return 'bg-secondary-transparent';
        }
        
        const ext = fileName.split('.').pop().toLowerCase();
        switch (ext) {
            case 'pdf':
                return 'bg-danger-transparent';
            case 'doc':
            case 'docx':
                return 'bg-primary-transparent';
            case 'xls':
            case 'xlsx':
                return 'bg-success-transparent';
            case 'txt':
                return 'bg-info-transparent';
            default:
                return 'bg-warning-transparent';
        }
    }
    
    async function openChat(targetUserId) {
        currentChatUserId = targetUserId;
        
        document.querySelectorAll('.chat-inactive, .checkforactive').forEach(li => {
            li.classList.remove('active', 'checkforactive');
            li.classList.add('chat-inactive');
        });
        event.target.closest('li').classList.remove('chat-inactive');
        event.target.closest('li').classList.add('checkforactive', 'active');
        
        await loadUserDetail(targetUserId);
        
        await loadMessages(targetUserId);
        
        document.querySelector('.main-chat-area').style.display = 'block';
    }

    // Fungsi untuk load detail user (foto, nama, dll)
    async function loadUserDetail(targetUserId) {
        try {
            const response = await fetch(`/api/users/${targetUserId}`);
            const user = await response.json();
            
            document.querySelectorAll('.chatnameperson').forEach(el => {
                el.textContent = user.name;
            });
            
            // Update gambar di HEADER CHAT (main-chat-head)
            const headerAvatar = document.querySelector('.main-chat-head .chatstatusperson');
            if (headerAvatar) {
                headerAvatar.innerHTML = '';
                const img = document.createElement('img');
                img.className = 'chatimageperson';
                img.src = `/profile/${user.avatar}`;
                img.alt = 'img';
                headerAvatar.appendChild(img);
                
                headerAvatar.classList.remove('online', 'offline');
                headerAvatar.classList.add(user.is_online ? 'online' : 'offline');
            }
            
            const offcanvasAvatar = document.querySelector('#offcanvasRight .chatstatusperson');
            if (offcanvasAvatar) {
                const offcanvasImg = offcanvasAvatar.querySelector('.chatimageperson');
                if (offcanvasImg) {
                    offcanvasImg.src = `/profile/${user.avatar}`;
                }
                offcanvasAvatar.classList.remove('online', 'offline');
                offcanvasAvatar.classList.add(user.is_online ? 'online' : 'offline');
            }
            
            // Update status text
            const statusText = document.querySelector('.chatpersonstatus');
            if (statusText) {
                statusText.textContent = user.is_online ? 'online' : 'offline';
            }
            
            // Update email di offcanvas (jika ada)
            const emailElement = document.querySelector('#offcanvasRight .text-muted');
            if (emailElement && user.email) {
                emailElement.innerHTML = `<span class="chatnameperson">${user.name}</span>@gmail.com`;
            }
            
        } catch (error) {
            console.error('Error loading user detail:', error);
        }
    }

    // Fungsi untuk mengirim pesan (text dan file)
    async function sendMessage() {
        if (!currentChatUserId) {
            alert('Pilih user untuk memulai chat');
            return;
        }

        let text = document.getElementById("chat-input").value.trim();
        
        // Jika tidak ada text dan tidak ada file, return
        if (!text && !selectedFile) {
            return;
        }

        try {
            let result;
            
            if (selectedFile) {
                console.log('file bang')
                // Kirim file menggunakan FormData
                result = await sendFileMessage(text);
            } else {
                console.log('gadacok')
                // Kirim text biasa
                result = await sendTextMessage(text);
            }
            
            console.log(result);
            
            // Reset form
            document.getElementById("chat-input").value = "";
            document.getElementById("chat-input").placeholder = "Type your message here...";
            document.getElementById('file-input').value = '';
            selectedFile = null;
            
            // Refresh messages
            loadMessages(currentChatUserId);
            
        } catch (error) {
            console.error('Error sending message:', error);
            alert('Error sending message');
        }
    }

    // Fungsi untuk kirim text message
    async function sendTextMessage(text) {
        const response = await fetch('/api/messages/send', {
            method: 'POST',
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify({
                message: text,
                from_user_id: parseInt(userId),
                to_user_id: currentChatUserId
            })
        });
        return await response.json();
    }

    // Fungsi untuk kirim file message
    async function sendFileMessage(text = '') {
        const formData = new FormData();
        formData.append('file', selectedFile);
        formData.append('from_user_id', userId);
        formData.append('to_user_id', currentChatUserId);
        formData.append('message', text);
        formData.append('_token', '{{ csrf_token() }}');

        const response = await fetch('/api/messages/send-file', {
            method: 'POST',
            body: formData
        });
        return await response.json();
    }
    
    function limitWords(text, maxWords = 11) {
        if (!text) return '';
        
        const words = text.trim().split(/\s+/);
        if (words.length <= maxWords) {
            return text;
        }
        
        return words.slice(0, maxWords).join(' ') + '...';
    }

    async function loadMessages(targetUserId = null) {
        if (!targetUserId && !currentChatUserId) return;
        
        const userToLoad = targetUserId || currentChatUserId;
        
        try {
            const response = await fetch(`/api/messages/${userId}/${userToLoad}`);
            const messages = await response.json();

            let chatBox = document.querySelector("#main-chat-content ul");
            chatBox.innerHTML = "";

            if (messages.length === 0) {
                chatBox.innerHTML = `
                    <div style="width: 100%;height: 100%;display:flex;justify-content: center;align-items: center;color:#999;">
                        <p>Belum ada pesan. Mulai percakapan!</p>
                    </div>
                `;
                return;
            }

            messages.forEach(msg => {
                const isSent = msg.from_user_id == userId;
                  
            if (msg.file_path) {
                // Message dengan file
                const isImage = msg.file_type && msg.file_type.startsWith('image/');
                console.log('file : ' , isImage)
                const fileIcon = getFileIcon(msg.file_type || '', msg.file_name || 'file');
                const fileColorClass = getFileColorClass(msg.file_type || '', msg.file_name || 'file');
                
                chatBox.innerHTML += isSent ? `
                <li class="chat-item-end">
                    <div class="chat-list-inner">
                        <div class="me-3">
                            <div class="main-chat-msg">
                                <div style="width: 100%">
                                    ${isImage ? `
                                        <div class="file-message">
                                            <img src="/storage/${msg.file_path}" alt="${msg.file_name}" style="max-width: 200px; max-height: 200px; border-radius: 8px; cursor: pointer" onclick="openImagePreview('/storage/${msg.file_path}')">
                                        </div>
                                    ` : `
                                        <div class="file-card">
                                            <div class="file-left ${fileColorClass}">
                                                <i class="${fileIcon} fs-3"></i>
                                            </div>
                                            <div class="file-mid">
                                                <p class="file-name">${escapeHtml(limitWords(msg.file_name, 4))}</p>
                                                <small class="file-size">${formatFileSize(msg.file_size)}</small>
                                            </div>
                                            <a href="/storage/${msg.file_path}" download="${msg.file_name}" class="btn-download">
                                                <i class="ri-download-line"></i>
                                            </a>
                                        </div>
                                    `}
                                    ${msg.message ? `<p class="mb-0 mt-2">${escapeHtml(msg.message)}</p>` : ''}
                                </div>
                            </div>
                            <span class="chatting-user-info">
                                <span class="msg-sent-time"><span class="chat-read-mark align-middle d-inline-flex"><i
                                            class="ri-check-double-line"></i></span>${msg.formatted_date}</span> You
                            </span>
                        </div>
                        <div class="chat-user-profile">
                            <span class="avatar avatar-md online">
                                <img src="/profile/${msg.sender.avatar}" alt="img">
                            </span>
                        </div>
                    </div>
                </li>
                ` : `
                <li class="chat-item-start">
                    <div class="chat-list-inner">
                        <div class="chat-user-profile">
                            <span class="avatar avatar-md online chatstatusperson">
                                <img class="chatimageperson" src="/profile/${msg.sender.avatar}" alt="img">
                            </span>
                        </div>
                        <div class="ms-3">
                            <div class="main-chat-msg">
                                <div>
                                    ${isImage ? `
                                        <div class="file-message">
                                            <img src="/storage/${msg.file_path}" alt="${msg.file_name}" style="max-width: 200px; max-height: 200px; border-radius: 8px; cursor: pointer" onclick="openImagePreview('/storage/${msg.file_path}')">
                                        </div>
                                    ` : `
                                        <div class="file-card">
                                            <div class="file-left ${fileColorClass}">
                                                <i class="${fileIcon} fs-3"></i>
                                            </div>
                                            <div class="file-mid">
                                                <p class="file-name">${escapeHtml(limitWords(msg.file_name, 4))}</p>
                                                <small class="file-size">${formatFileSize(msg.file_size)}</small>
                                            </div>
                                            <a href="/storage/${msg.file_path}" download="${msg.file_name}" class="btn-download">
                                                <i class="ri-download-line"></i>
                                            </a>
                                        </div>
                                    `}
                                    ${msg.message ? `<p class="mb-0 mt-2">${escapeHtml(msg.message)}</p>` : ''}
                                </div>
                            </div>
                            <span class="chatting-user-info">
                                <span class="chatnameperson">${escapeHtml(msg.sender.name)}</span> <span class="msg-sent-time">${msg.formatted_date}</span>
                            </span>
                        </div>
                    </div>
                </li>
                `;
            } else {
                console.log('gada')
                // Message text biasa
                chatBox.innerHTML += isSent ? `
                <li class="chat-item-end">
                    <div class="chat-list-inner">
                        <div class="me-3">
                            <div class="main-chat-msg">
                                <div style="width: 100%">
                                    <p class="mb-0">${escapeHtml(msg.message)}</p>
                                </div>
                            </div>
                            <span class="chatting-user-info">
                                <span class="msg-sent-time"><span class="chat-read-mark align-middle d-inline-flex"><i
                                            class="ri-check-double-line"></i></span>${msg.formatted_date}</span> You
                            </span>
                        </div>
                        <div class="chat-user-profile">
                            <span class="avatar avatar-md online">
                                <img src="/profile/${msg.sender.avatar}" alt="img">
                            </span>
                        </div>
                    </div>
                </li>
                ` : `
                <li class="chat-item-start">
                    <div class="chat-list-inner">
                        <div class="chat-user-profile">
                            <span class="avatar avatar-md online chatstatusperson">
                                <img class="chatimageperson" src="/profile/${msg.sender.avatar}" alt="img">
                            </span>
                        </div>
                        <div class="ms-3">
                            <div class="main-chat-msg">
                                <div>
                                    <p class="mb-0">${escapeHtml(msg.message)}</p>
                                </div>
                            </div>
                            <span class="chatting-user-info">
                                <span class="chatnameperson">${escapeHtml(msg.sender.name)}</span> <span class="msg-sent-time">${msg.formatted_date}</span>
                            </span>
                        </div>
                    </div>
                </li>
                `;
            }
            });

            const isAtBottom = chatBox.scrollHeight - chatBox.scrollTop <= chatBox.clientHeight + 80;

            // Kalau first load → selalu scroll ke bawah
            if (firstLoad) {
                chatBox.scrollTop = chatBox.scrollHeight;
                firstLoad = false;
            }
            // Kalau bukan first load, scroll hanya jika user memang di bawah
            else if (isAtBottom) {
                chatBox.scrollTop = chatBox.scrollHeight;
            }


        } catch (error) {
            console.error('Error loading messages:', error);
        }
    }
    

    // Fungsi untuk format file size
    function formatFileSize(bytes) {
        if (bytes === 0) return '0 Bytes';
        const k = 1024;
        const sizes = ['Bytes', 'KB', 'MB', 'GB'];
        const i = Math.floor(Math.log(bytes) / Math.log(k));
        return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
    }

    // Fungsi untuk preview image (modal sederhana)
    function openImagePreview(src) {
        const modal = document.createElement('div');
        modal.style.position = 'fixed';
        modal.style.top = '0';
        modal.style.left = '0';
        modal.style.width = '100%';
        modal.style.height = '100%';
        modal.style.backgroundColor = 'rgba(0,0,0,0.8)';
        modal.style.display = 'flex';
        modal.style.justifyContent = 'center';
        modal.style.alignItems = 'center';
        modal.style.zIndex = '9999';
        modal.style.cursor = 'pointer';
        
        const img = document.createElement('img');
        img.src = src;
        img.style.maxWidth = '90%';
        img.style.maxHeight = '90%';
        img.style.objectFit = 'contain';
        img.style.borderRadius = '8px';
        
        modal.appendChild(img);
        modal.onclick = function() {
            document.body.removeChild(modal);
        };
        
        document.body.appendChild(modal);
    }

    // Helper function untuk escape HTML
    function escapeHtml(text) {
        const map = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        };
        return text.replace(/[&<>"']/g, m => map[m]);
    }

    // Auto refresh messages setiap 3 detik (hanya jika ada chat aktif)
    setInterval(() => {
        if (currentChatUserId) {
            loadMessages(currentChatUserId);
        }
    }, 3000);

    // Load pertama kali (tampilkan pesan kosong)
    document.querySelector("#main-chat-content ul").innerHTML = `
        <div style="width: 100%;height: 100%;display:flex;justify-content: center;align-items: center;color:#999;">
            <p>Pilih user untuk memulai percakapan</p>
        </div>
    `;
</script>