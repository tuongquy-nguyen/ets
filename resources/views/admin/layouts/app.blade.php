 <!DOCTYPE html>
 <html>

 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
   <meta name="author" content="Creative Tim">
   <title>ETS Admin - @yield('title')</title>
   <!-- Favicon -->
   <link rel="icon" href="{{ asset('argon/assets/img/brand/favicon.png') }}" type="image/png">
   <!-- Fonts -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
   <!-- Icons -->
   <link rel="stylesheet" href="{{ asset('argon/assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
   <link rel="stylesheet" href="{{ asset('argon/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
   <!-- Page plugins -->
   <!-- Argon CSS -->
   <link rel="stylesheet" href="{{ asset('argon/assets/css/argon.css') }}?v=1.1.0" type="text/css">

 </head>

<body>
    @include('admin.layouts.sidebar')
    <!-- Main content -->
    <div class="main-content" id="panel">
    @include('admin.layouts.topbar')

<!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        @yield('h4')
                    </div>
                </div>
            @yield('status')
        </div>
    </div>

    </div>
     <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-xl-12">
                    @yield('content')
                </div>
            </div>
       @include('admin.layouts.footer')
     </div>
   </div>
<!-- Argon Scripts -->
<!-- Core -->
<script src="{{ asset('argon/assets/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('argon/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('argon/assets/vendor/js-cookie/js.cookie.js') }}"></script>
<script src="{{ asset('argon/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
<script src="{{ asset('argon/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
<!-- Optional JS -->
<script src="{{ asset('argon/assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('argon/assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
<!-- Argon JS -->
<script src="{{ asset('argon/assets/js/argon.js?v=1.1.0') }}"></script>
<script src="{{ asset('js/master.js') }}"></script>
<!-- Demo JS - remove this in your project -->
<script src="../../assets/js/demo.min.js"></script>
 </body>

 </html>
