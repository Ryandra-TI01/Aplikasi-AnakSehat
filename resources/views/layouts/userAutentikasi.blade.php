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

  <body style="background-color: white">
      @yield('content')

    <!-- Core JS -->
    @include('admin.partials.script')
    <!-- / Core JS -->
   
  </body>
</html>
