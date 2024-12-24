<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="index.html" class="app-brand-link">
        <span class="app-brand-logo demo">
          <img style="width: 50px" src="{{asset('admin/assets/img/logo-rpl.jpeg')}}" alt="logo">
        </span>
        <span class="app-brand-text demo menu-text fw-bold ms-1">AnakSehat</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm d-flex align-items-center justify-content-center"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <li class="menu-item {{ Request::is('admin/dashboard-admin') ? 'open active' : '' }}">
        <a
          href="{{ route('dashboard-admin') }}"
          class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-smile"></i>
          <div class="text-truncate" data-i18n="Email">Dashboard</div>
        </a>
      </li>
      <li class="menu-item {{Request::is('admin/pengguna') ? 'open active' : ''}}">
        <a
          href="{{ route('indexPengguna') }}"
          class="menu-link">
          <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><rect width="24" height="24" fill="none"/><circle cx="9" cy="8.5" r="1.5" fill="currentColor" opacity="0.3"/><path fill="currentColor" d="M4.34 17h9.32c-.84-.58-2.87-1.25-4.66-1.25s-3.82.67-4.66 1.25" opacity="0.3"/><path fill="currentColor" d="M9 12c1.93 0 3.5-1.57 3.5-3.5S10.93 5 9 5S5.5 6.57 5.5 8.5S7.07 12 9 12m0-5c.83 0 1.5.67 1.5 1.5S9.83 10 9 10s-1.5-.67-1.5-1.5S8.17 7 9 7m0 6.75c-2.34 0-7 1.17-7 3.5V19h14v-1.75c0-2.33-4.66-3.5-7-3.5M4.34 17c.84-.58 2.87-1.25 4.66-1.25s3.82.67 4.66 1.25zm11.7-3.19c1.16.84 1.96 1.96 1.96 3.44V19h4v-1.75c0-2.02-3.5-3.17-5.96-3.44M15 12c1.93 0 3.5-1.57 3.5-3.5S16.93 5 15 5c-.54 0-1.04.13-1.5.35c.63.89 1 1.98 1 3.15s-.37 2.26-1 3.15c.46.22.96.35 1.5.35"/></svg>
          <div class="text-truncate" data-i18n="Email">Pengguna</div>
        </a>
      </li>
      <li class="menu-item {{Request::is('admin/doctor') ? 'open active' : ''}}">
        <a
          href="{{ route('indexDokter') }}"
          target=""
          class="menu-link">
          <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48"><rect width="48" height="48" fill="none"/><g fill="none"><rect width="38" height="26" x="5" y="16" stroke="currentColor" stroke-linejoin="round" stroke-width="4" rx="3"/><path fill="currentColor" d="M19 8h10V4H19zm11 1v7h4V9zm-12 7V9h-4v7zm11-8a1 1 0 0 1 1 1h4a5 5 0 0 0-5-5zM19 4a5 5 0 0 0-5 5h4a1 1 0 0 1 1-1z"/><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M18 29h12m-6-6v12"/></g></svg>          
          <div class="text-truncate" data-i18n="Email">Dokter</div>
        </a>
      </li>
    </ul>
  </aside>