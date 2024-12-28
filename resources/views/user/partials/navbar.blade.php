<nav
class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
id="layout-navbar">
<div class="layout-menu-toggle navbar-nav align-items-xl-center me-4 me-xl-0 d-xl-none">
  {{-- <a class="nav-item nav-link px-0 me-xl-6" href="javascript:void(0)">
    <i class="bx bx-menu bx-md"></i>
  </a> --}}
</div>

<div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
  <!-- logo -->
  <div class="navbar-nav align-items-center" style="width:20%;">
    <div class="nav-item d-flex align-items-center">
      <img src="{{asset('admin/assets/img/logo-rpl.jpeg')}}" alt="logo" class="w-px-40 h-auto rounded-circle">
      <span class="fw-bold ms-2">AnakSehat</span>
    </div>
  </div>
  <!-- /logo -->  
  <ul class="d-flex align-items-center m-auto list-unstyled justify-content-around">
    <li style="width: 150px">
      <a href="/home" class="d-flex justify-content-center align-items-center s">
        <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M6 19h3v-6h6v6h3v-9l-6-4.5L6 10zm-2 2V9l8-6l8 6v12h-7v-6h-2v6zm8-8.75"/></svg>
        <span>Home</span>
      </a>
    </li>
    <li style="width: 150px">
      <a href="/profile-anak" class="d-flex justify-content-center align-items-center">
        <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 320 512"><path fill="currentColor" d="M96 64a64 64 0 1 1 128 0a64 64 0 1 1-128 0m48 320v96c0 17.7-14.3 32-32 32s-32-14.3-32-32V287.8L59.1 321c-9.4 15-29.2 19.4-44.1 10s-19.5-29.1-10.1-44l39.9-63.3C69.7 184 113.2 160 160 160s90.3 24 115.2 63.6l39.9 63.4c9.4 15 4.9 34.7-10 44.1s-34.7 4.9-44.1-10l-21-33.3V480c0 17.7-14.3 32-32 32s-32-14.3-32-32v-96z"/></svg>
        <span>Profile</span>
      </a>
      </li>
    <li style="width: 150px">
      <a href="/article" class="d-flex justify-content-center align-items-center">
        <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M14 9.9V8.2q.825-.35 1.688-.525T17.5 7.5q.65 0 1.275.1T20 7.85v1.6q-.6-.225-1.213-.337T17.5 9q-.95 0-1.825.238T14 9.9m0 5.5v-1.7q.825-.35 1.688-.525T17.5 13q.65 0 1.275.1t1.225.25v1.6q-.6-.225-1.213-.338T17.5 14.5q-.95 0-1.825.225T14 15.4m0-2.75v-1.7q.825-.35 1.688-.525t1.812-.175q.65 0 1.275.1T20 10.6v1.6q-.6-.225-1.213-.338T17.5 11.75q-.95 0-1.825.238T14 12.65m-1 4.4q1.1-.525 2.213-.788T17.5 16q.9 0 1.763.15T21 16.6V6.7q-.825-.35-1.713-.525T17.5 6q-1.175 0-2.325.3T13 7.2zM12 20q-1.2-.95-2.6-1.475T6.5 18q-1.05 0-2.062.275T2.5 19.05q-.525.275-1.012-.025T1 18.15V6.1q0-.275.138-.525T1.55 5.2q1.175-.575 2.413-.888T6.5 4q1.45 0 2.838.375T12 5.5q1.275-.75 2.663-1.125T17.5 4q1.3 0 2.538.313t2.412.887q.275.125.413.375T23 6.1v12.05q0 .575-.487.875t-1.013.025q-.925-.5-1.937-.775T17.5 18q-1.5 0-2.9.525T12 20"/></svg>
        <span>Artikel</span>
      </a>
    </li>
    <li style="width: 150px">
      <a href="/doctor-anak" class="d-flex justify-content-center align-items-center">
        <svg class="me-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 15 15"><path fill="currentColor" d="M5.5 7A2.5 2.5 0 0 1 3 4.5v-2a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v2a3.49 3.49 0 0 0 1.51 2.87A4.4 4.4 0 0 1 5 10.5a3.5 3.5 0 1 0 7 0v-.57a2 2 0 1 0-1 0v.57a2.5 2.5 0 0 1-5 0a4.4 4.4 0 0 1 1.5-3.13A3.49 3.49 0 0 0 9 4.5v-2A1.5 1.5 0 0 0 7.5 1H7a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v2A2.5 2.5 0 0 1 5.5 7m6 2a1 1 0 1 1 0-2a1 1 0 0 1 0 2"/></svg>
        <span>Chat Dokter</span>
      </a>
    </li>

  </ul>
  <ul class="navbar-nav flex-row align-items-center ms-auto">
    <!-- Place this tag where you want the button to render. -->
    <li class="nav-item lh-1 me-4 d-flex align-items-center">
      <a href="/consultation">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M5 18v3.766l1.515-.909L11.277 18H16c1.103 0 2-.897 2-2V8c0-1.103-.897-2-2-2H4c-1.103 0-2 .897-2 2v8c0 1.103.897 2 2 2zM4 8h12v8h-5.277L7 18.234V16H4z"/><path fill="currentColor" d="M20 2H8c-1.103 0-2 .897-2 2h12c1.103 0 2 .897 2 2v8c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2"/></svg>
      </a>
    </li>

    <!-- User -->
    <li class="nav-item navbar-dropdown dropdown-user dropdown">
      <a
        class="nav-link dropdown-toggle hide-arrow p-0"
        href="javascript:void(0);"
        data-bs-toggle="dropdown">
        <div class="avatar avatar-online">
          <img src="{{asset('admin/assets/img/avatars/1.png')}}" alt class="w-px-40 h-auto rounded-circle" />
        </div>
      </a>
      <ul class="dropdown-menu dropdown-menu-end">
        <li>
          <a class="dropdown-item" href="#">
            <div class="d-flex">
              <div class="flex-shrink-0 me-3">
                <div class="avatar avatar-online">
                  <img src="{{asset('admin/assets/img/avatars/1.png')}}" alt class="w-px-40 h-auto rounded-circle" />
                </div>
              </div>
              <div class="flex-grow-1">
                <h6 class="mb-0">{{Auth::user()->name}}</h6>
                <small class="text-muted">{{Auth::user()->role}}</small>
              </div>
            </div>
          </a>
        </li>
        <li>
          <div class="dropdown-divider my-1"></div>
        </li>
        <li>
          @if (Auth::user('doctor'))
          <a class="dropdown-item" href="profile">
          @else
          <a class="dropdown-item" href="/profile">
          @endif
            <i class="bx bx-user bx-md me-3"></i><span>My Profile</span>
          </a>
        </li>
        <li>
          <div class="dropdown-divider my-1"></div>
        </li>
        <li>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
          <button type="submit" class="dropdown-item" href="javascript:void(0);">
            <i class="bx bx-power-off bx-md me-3"></i><span>Log Out</span>
          </button>
          </form>

        </li>
      </ul>
    </li>
    <!--/ User -->
  </ul>
</div>
</nav>