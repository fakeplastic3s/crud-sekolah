    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? '' : 'collapsed' }}" href="/dashboard">
              <i class="bi bi-grid"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('kelas*') ? '' : 'collapsed' }}" href="{{ route('kelas.index') }}">
              <i class="bi bi-door-open"></i>
              <span>Kelas</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('siswa*') ? '' : 'collapsed' }}" href="{{ route('siswa.index') }}">
              <i class="bi bi-person-bounding-box"></i>
              <span>Siswa</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('guru*') ? '' : 'collapsed' }}" href="{{ route('guru.index') }}">
              <i class="bi bi-person-badge"></i>
              <span>Guru</span>
            </a>
          </li>
        </ul>
      </aside>
      <!-- End Sidebar-->