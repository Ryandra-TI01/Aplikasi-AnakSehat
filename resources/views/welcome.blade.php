
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta
          name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    
        <title>AnakSehat</title>
    
        <meta name="description" content="" />
    
        <!-- Favicon -->
        <link rel="icon" type="image/x-icon" href="{{asset('admin/assets/img/favicon/favicon.ico')}}" />
    
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
          href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
          rel="stylesheet" />
    
        <link rel="stylesheet" href="{{asset('admin/assets/vendor/fonts/boxicons.css')}}" />
    
        <!-- Core CSS -->
        <link rel="stylesheet" href="{{asset('user/css/core.css')}}" class="template-customizer-core-css" />
        <link rel="stylesheet" href="{{asset('admin/assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
        <link rel="stylesheet" href="{{asset('admin/assets/css/demo.css')}}" />
    
        <!-- Vendors CSS -->
        <link rel="stylesheet" href="{{asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
        <link rel="stylesheet" href="{{asset('admin/assets/vendor/libs/apex-charts/apex-charts.css')}}" />
    
        <!-- Page CSS -->
    
        <!-- Helpers -->
        <script src="{{asset('admin/assets/vendor/js/helpers.js')}}"></script>
        <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
        <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
        <script src="{{asset('admin/assets/js/config.js')}}"></script>
      </head>
      <style>
        body {
            background-color: white !important; 
        }
      </style>
    <body class="font-sans bg-white">
        <div class="container mt-10">
            <header class="d-flex justify-content-center py-3">
            @if (Route::has('login'))
              <ul class="nav nav-pills">
                @auth('web')
                    <li class="nav-item"><a href="{{ url('/dashboard') }}" class="nav-link" >Dashboard</a></li>
                @else
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Log In</a></li>
                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                @endauth
                @auth('doctor')
                    <li class="nav-item"><a href="{{ url('/dashboard-doctor') }}" class="nav-link" >Dashboard Doctor</a></li>
                @else
                    <li class="nav-item"><a href="{{ route('doctor.login') }}" class="nav-link">Log In Doctor</a></li>
                    <li class="nav-item"><a href="{{ route('doctor.register') }}" class="nav-link">Register Doctor</a></li>
                @endauth
                @auth('admin')
                    <li class="nav-item"><a href="{{ route('dashboard.admin') }}" class="nav-link">Dashboard Admin</a></li>
                @else
                    <li class="nav-item"><a href="{{ route('admin.login') }}" class="nav-link">Log In Admin</a></li>
                    <li class="nav-item"><a href="{{ route('admin.register') }}" class="nav-link">Register Admin</a></li>
                @endauth
              </ul>
            @endif
            </header>
        </div>
        <div class="px-4 py-5 my-5 text-center">
            <div>
                <img class="d-block mx-auto mb-4" src="{{ asset('user/img/logo.png') }}" alt="AnakSehat Logo" width="250px" height="auto">
                <h4 class=" text-body-emphasis">Welcome to</h4>
                <h2>AnakSehat</h2>
            </div>
        </div>
        <div class="rounded-circle overflow-hidden" style="position: absolute; bottom: 10%; right: 10%;z-index: -10;">
            <img class="object-fit:cover" style="width: 400px; height:auto;z-index: -10;"  src="https://img.freepik.com/premium-vector/medical-social-worker-helps-patients_701961-8588.jpg?ga=GA1.1.2068343353.1734100778&semt=ais_hybrid" alt="">
        </div>
        <div class="rounded-circle overflow-hidden" style="position: absolute; bottom: 10%; left: 8%; z-index: -10;">
            <img class="object-fit:cover" style="width: 400px; height:auto; z-index: -10;"  src="https://img.freepik.com/premium-vector/immunization-kids-abstract-concept-vector-illustration_107173-33853.jpg?ga=GA1.1.2068343353.1734100778&semt=ais_hybrid" alt="">
        </div>
        
        <script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        </script>
    </body>
</html>

