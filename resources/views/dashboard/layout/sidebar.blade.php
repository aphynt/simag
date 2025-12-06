<aside class="app-sidebar sticky" id="sidebar">

    <!-- Start::main-sidebar-header -->
    <div class="main-sidebar-header">
        <a href="index.html" class="header-logo">
            <img src="{{ asset('logo') }}/LogoFikom_Putih.png" alt="logo"
                class="desktop-logo">
            <img src="{{ asset('logo') }}/LogoFikom_Putih.png" alt="logo"
                class="toggle-dark">
            <img src="{{ asset('logo') }}/LogoFikom_Putih.png" alt="logo"
                class="desktop-dark">
            <img src="{{ asset('logo') }}/LogoFikom_Putih.png" alt="logo"
                class="toggle-logo">
            <img src="{{ asset('logo') }}/LogoFikom_Putih.png" alt="logo"
                class="toggle-white">
            <img src="{{ asset('logo') }}/LogoFikom_Putih.png" alt="logo"
                class="desktop-white">
        </a>
    </div>
    <!-- End::main-sidebar-header -->

    <!-- Start::main-sidebar -->
    <div class="main-sidebar" id="sidebar-scroll">

        <!-- Start::nav -->
        <nav class="main-menu-container nav nav-pills flex-column sub-open">
            <div class="slide-left" id="slide-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191" width="24" height="24"
                    viewBox="0 0 24 24">
                    <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z"></path>
                </svg>
            </div>
            <ul class="main-menu">
                <!-- Start::slide__category -->
                <li class="slide__category"><span class="category-name">Main</span></li>
                <!-- End::slide__category -->
                <li class="slide">
                    <a href="{{ route('dashboard.index') }}" class="side-menu__item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <span class="side-menu__label">Dashboard</span>
                    </a>
                </li>
                <li class="slide__category"><span class="category-name">Menu</span></li>
                <li class="slide">
                    <a href="{{ route('pengajuan.index') }}" class="side-menu__item">
                        <!-- ICON PENGAJUAN (DOCUMENT ADD) -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        <span class="side-menu__label">Pengajuan</span>
                    </a>
                </li>

                <li class="slide">
                    <a href="{{ route('persetujuan.index') }}" class="side-menu__item">
                        <!-- ICON PERSETUJUAN (CHECK BADGE) -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12l2 2 4-4m5 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span class="side-menu__label">Persetujuan</span>
                    </a>
                </li>

                <li class="slide">
                    <a href="{{ route('konsultasi.index') }}" class="side-menu__item">
                        <!-- ICON KONSULTASI (CHAT BUBBLE) -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7.5 8.25h9m-9 3h6m-10.125 6L3 21l1.875-3a9 9 0 1116.125-5.25" />
                        </svg>
                        <span class="side-menu__label">Konsultasi</span>
                    </a>
                </li>

                <li class="slide">
                    <a href="icons.html" class="side-menu__item">
                        <!-- ICON MONITORING (BAR CHART) -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 3v18h18M7.5 15V9m4.5 6v-3m4.5 3V6" />
                        </svg>
                        <span class="side-menu__label">Monitoring</span>
                    </a>
                </li>

                <li class="slide">
                    <a href="icons.html" class="side-menu__item">
                        <!-- ICON EVALUASI (CLIPBOARD CHECK) -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12l2 2 4-4m2-2V7a2 2 0 00-2-2h-1.5a2.5 2.5 0 00-5 0H7a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V9z" />
                        </svg>
                        <span class="side-menu__label">Evaluasi</span>
                    </a>
                </li>

                <li class="slide">
                    <a href="icons.html" class="side-menu__item">
                        <!-- ICON PENILAIAN (STAR) -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.48 3.499a.562.562 0 011.04 0l1.71 4.38a.563.563 0 00.475.35l4.708.36c.499.038.704.677.322.988l-3.622 2.97a.563.563 0 00-.182.557l1.146 4.578a.563.563 0 01-.84.61l-4.004-2.385a.563.563 0 00-.586 0L6.243 18.77a.563.563 0 01-.84-.61l1.146-4.578a.563.563 0 00-.182-.557l-3.622-2.97a.563.563 0 01.322-.988l4.708-.36a.563.563 0 00.475-.35l1.71-4.38z" />
                        </svg>
                        <span class="side-menu__label">Penilaian</span>
                    </a>
                </li>

                <li class="slide__category"><span class="category-name">Auth</span></li>
                <li class="slide">
                    <a href="{{ route('user.index') }}" class="side-menu__item">
                        <!-- ICON SETTINGS (GEAR) -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M10.5 6h3m-7.364 2.636l2.121 2.121m9.193-2.121l-2.121 2.121M6 10.5v3m12-3v3m-9.879 4.879l2.121-2.121m4.242 2.121l-2.121-2.121M12 9a3 3 0 110 6 3 3 0 010-6z" />
                        </svg>
                        <span class="side-menu__label">Settings</span>
                    </a>
                </li>
                <li class="slide">
                    <a href="{{ route('logout') }}" class="side-menu__item">
                        <!-- ICON LOGOUT -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 side-menu__icon" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l3 3m0 0l-3 3m3-3H3" />
                        </svg>
                        <span class="side-menu__label">Logout</span>
                    </a>
                </li>
            </ul>
            <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                    width="24" height="24" viewBox="0 0 24 24">
                    <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z"></path>
                </svg></div>
        </nav>
        <!-- End::nav -->

    </div>
    <!-- End::main-sidebar -->

</aside>

