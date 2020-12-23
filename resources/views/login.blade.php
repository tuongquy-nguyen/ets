<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>ETS Admin - Đăng nhập</title>
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

<body class="bg-default">
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
              <h1 class="text-white">Xin chào!</h1>
              <p class="text-lead text-white">Đăng nhập vào hệ thống quản lý theo dõi giáo dục.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Sử dụng tài khoản được cấp để đăng nhập</small>
              </div>
              <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control" placeholder="Địa chỉ email" value="{{ old('email') }}" id="email" name="email" required autocomplete="email" autofocus>
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input id="password" name="password" class="form-control" placeholder="Mật khẩu" type="password">
                  </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  {{-- <input class="custom-control-input" name="remember" id="remember" value=""  type="input" >
                  <label class="custom-control-label" for=" customCheckLogin">
                    <span class="text-muted">Ghi nhớ đăng nhập</span>
                  </label> --}}
                  {{-- <div class="form-check">
                    <label class="form-check-label">
                      <input type="checkbox" class="form-check-input" name="remember" value="1" id="remember" value="checkedValue" checked>
                      Ghi nhớ đăng nhập
                    </label>
                  </div> --}}
                  <div class="form-group row">
                    <div class="">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Đăng nhập</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
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
