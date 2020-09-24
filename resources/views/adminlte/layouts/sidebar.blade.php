<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link d-flex align-items-center justify-content-center">
        {{-- <span class="brand-text font-weight-light"><i class="fab fa-laravel fa-2x"></i>
            {{ config('app.name', 'Laravel') }}</span> --}}
        <img src="/images/logo.jpg" />
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> Dashboard </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('jadwal') }}" class="nav-link">
                    <i class="nav-icon fa fa-calendar"></i>
                        <p> Jadwal Siswa </p>
                    </a>
                </li>
              
                
                @if (Auth::user()->level == 2)
                <li class="nav-item">
                    <a href="{{ route('absen') }}" class="nav-link">
                        <i class="nav-icon far fa-calendar-check"></i>
                        <p> Absen Siswa  </p>
                    </a>
                </li>
                @endif

                @if (Auth::user()->level == 1)
                <li class="nav-item">
                    <a href="{{ route('absensi') }}" class="nav-link">
                        <i class="nav-icon far fa-calendar-check"></i>
                        <p> Data Absensi </p>
                    </a>
                </li>
                @endif
             
                <li class="nav-item">
                    <a href="{{ route('siswa') }}" class="nav-link">
                    <i class="nav-icon fa fa-users"></i>
                        <p> Data Siswa </p>
                    </a>
                </li>

                </li>
                @if (Auth::user()->level == 1)
                <li class="nav-item">
                    <a href="{{ route('bank') }}" class="nav-link">
                    <i class="nav-icon fa fa-credit-card"></i>
                        <p> Akun Bank </p>
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('evaluasi') }}" class="nav-link">
                        <i class="nav-icon far fa-newspaper"></i>
                        <p> Evaluasi Siswa </p>
                    </a>
                </li>

                
                @if (Auth::user()->level == 1)
                <li class="nav-item">
                    <a href="{{ route('nilai') }}" class="nav-link">
                        <i class="nav-icon far fa-file-alt"></i>
                        <p> Data Nilai Siswa </p>
                    </a>
                </li>
                @endif

                <li class="nav-item">
                    <a href="{{ route('upload') }}" class="nav-link">
                    <i class="nav-icon fa fa-credit-card"></i>
                        <p> Konfirmasi Pembayaran </p>
                    </a>
                </li>
                
                @if (Auth::user()->level == 1)
                <li class="nav-item">
                    <a href="{{ route('users') }}" class="nav-link">
                    <i class="nav-icon fa fa-user"></i>
                        <p>Data User </p>
                    </a>
                </li>
                @endif
                
                @if (Auth::user()->level == 1)
                        <li class="nav-header">Laporan</li>
                        <li class="nav-item has-treeview">
                         <a href="#" class="nav-link">
                         <i class='nav-icon far fa-folder-open'></i>
                        <p>
                            LAPORAN
                            <i class="fas fa-angle-left right"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('laporan.laporan-siswa') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Data Siswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('laporan.laporan-absensi') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Data Absensi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('laporan.laporan-pembayaran') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Data Pembayaran</p>
                            </a>
                        </li>
                       
                        <li class="nav-item">
                            <a href="{{ route('laporan.laporan-nilai') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Laporan Nilai Siswa</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>