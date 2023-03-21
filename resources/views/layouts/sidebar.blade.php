    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin.dashboard' ? '' : 'collapsed'}}" href="{{route('admin.dashboard')}}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li><!-- End Dashboard Nav -->

             <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin.pengalaman_kerja.index' ? '' : 'collapsed'}}" href="{{route('admin.pengalaman_kerja.index')}}">
                    <i class="bi bi-journal-text"></i>
                    <span>Pengalaman Kerja</span>
                </a>
            </li>
             <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'admin.pendidikan.index' ? '' : 'collapsed'}}" href="{{route('admin.pendidikan.index')}}">
                    <i class="bi bi-journal-text"></i>
                    <span>Pendidikan</span>
                </a>
            </li>

        </ul>

    </aside><!-- End Sidebar-->