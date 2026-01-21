<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>{{ config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ================= CDN CSS ================= -->
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Remix Icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- SweetAlert2 -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">

    <style>
        body{
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg,#0d6efd,#6610f2);
            min-height:100vh;
            display:flex;
            align-items:center;
            justify-content:center;
        }

        .verify-card{
            background:#fff;
            border-radius:18px;
            padding:40px 35px;
            max-width:520px;
            width:100%;
            box-shadow:0 20px 50px rgba(0,0,0,.15);
            text-align:center;
            animation:fadeIn .6s ease;
        }

        @keyframes fadeIn{
            from{opacity:0;transform:translateY(20px)}
            to{opacity:1;transform:translateY(0)}
        }

        .logo{
            max-width:280px;
            margin-bottom:25px;
        }

        .badge-success{
            background:#e8f9f1;
            color:#198754;
            padding:8px 14px;
            border-radius:30px;
            font-weight:600;
            display:inline-block;
            margin-bottom:15px;
        }

        .user-info{
            background:#f8f9fa;
            border-radius:12px;
            padding:20px;
            margin:25px 0;
            text-align:left;
        }

        .user-info p{
            margin:0 0 8px;
            font-size:14px;
        }

        .user-info span{
            font-weight:600;
            color:#0d6efd;
        }

        .btn-close-page{
            background:#dc3545;
            border:none;
            color:#fff;
            padding:10px 22px;
            border-radius:8px;
            font-weight:600;
            transition:.2s;
        }
        .btn-close-page:hover{
            background:#bb2d3b;
        }
    </style>
</head>

<body>

<div class="verify-card">

    <h4 class="fw-bold text-dark mt-2">Data Tervalidasi</h4>
    <p class="text-muted mb-3">
        Informasi pengguna telah berhasil diverifikasi dan disimpan dalam sistem.
    </p>

    <!-- USER INFO -->
    {{-- <div class="user-info">
        <p><strong>Nama</strong> : <span>{{ $user->name }}</span></p>
        <p><strong>NIK</strong> : <span>{{ $user->nik }}</span></p>
        <p><strong>Jabatan</strong> : <span>{{ $user->role }}</span></p>
    </div> --}}

    <!-- ACTION -->
    <button onclick="tutupHalaman()" class="btn-close-page">
        <i class="ri-close-circle-line me-1"></i> Tutup Halaman
    </button>

</div>

<!-- ================= CDN JS ================= -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
function tutupHalaman(){
    Swal.fire({
        title: 'Tutup halaman?',
        text: 'Halaman ini akan ditutup.',
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: 'Ya, tutup',
        cancelButtonText: 'Batal'
    }).then((result)=>{
        if(result.isConfirmed){
            window.close();
        }
    });
}
</script>

</body>
</html>
