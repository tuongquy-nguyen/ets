    <!-- Topnav -->
    <nav id="navbar-main" class="navbar navbar-horizontal navbar-transparent navbar-main navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand"  href="#">
            <img src="{{ asset('img/logo-ets.png') }}">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="navbar-collapse navbar-custom-collapse collapse" id="navbar-collapse">
            <div class="navbar-collapse-header">
              <div class="row">
                <div class="col-6 collapse-brand ">
                  <a class="w-100" href="#">
                    <img class="brand-logo img-fluid" src="{{ asset('img/logo-ets.png') }}">
                  </a>
                </div>
                <div class="col-6 collapse-close">
                  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                  </button>
                </div>
              </div>
            </div>
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a href="../../pages/dashboards/dashboard.html" class="nav-link font-weight-bold text-uppercase">
                  Tiến độ
                </a>
              </li>
              <li class="nav-item">
                <a href="../../pages/examples/pricing.html" class="nav-link font-weight-bold text-uppercase">
                  <span class="nav-link-inner--text">Học phần</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../pages/examples/login.html" class="nav-link font-weight-bold text-uppercase">
                  <span class="nav-link-inner--text">Lớp</span>
                </a>
              </li>
              <li class="nav-item">
                <a href="../../pages/examples/register.html" class="nav-link font-weight-bold text-uppercase">
                  <span class="nav-link-inner--text">Tài khoản</span>
                </a>
              </li>
            </ul>
            <hr class="d-lg-none" />
            <ul class="navbar-nav align-items-center ml-auto ml-md-0">
                <li class="nav-item dropdown">
                  <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                      <span class="avatar avatar-sm rounded-circle">
                        <img alt="" src="{{ asset('img/student/' . session('profile') ) }}">
                      </span>
                      <div class="media-body ml-2 d-none d-lg-block">
                        <span class="mb-0 text-sm  font-weight-bold">{{ session('name') }}</span>
                      </div>
                    </div>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header noti-title">
                      <h6 class="text-overflow m-0">Xin chào {{ session('name', 'Sinh viên') }}</h6>
                    </div>
                    <div class="dropdown-divider"></div>
                    <a href="http://ets.test/logout" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                      <i class="ni ni-user-run"></i>
                      <span>Đăng xuất</span>
                      <form id="logout-form" action="http://ets.test/logout" method="POST" style="display: none;">
                        @csrf
                          {{-- <input type="hidden" name="_token" value="v0QVrRpVKeP2pm4KHALBo3z8Njrh57UMaIjjuftg"> --}}
                        </form>
                    </a>
                  </div>
                </li>
              </ul>
          </div>
        </div>
      </nav>
