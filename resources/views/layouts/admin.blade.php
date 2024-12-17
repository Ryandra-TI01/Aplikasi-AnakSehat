<!doctype html>

<html
  lang="en"
  class="light-style layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
  data-style="light">

  {{-- head --}}
  @include('admin.partials.head')
  {{-- / head --}}

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        
        <!-- Menu -->
        @include('admin.partials.sidebar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">

          <!-- Navbar -->
          @include('admin.partials.navbar')
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">

            <!-- Content -->
            @yield('content')
            <!-- / Content -->

            <!-- Footer -->
            @include('admin.partials.footer')
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <!-- Core JS -->
    @include('admin.partials.script')
    <!-- / Core JS -->
   
  </body>
</html>
