@extends('student.layouts.app')
@section('title')
    Trang chủ
@endsection
@section('heading')
<!-- Header -->
<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(../../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-warning opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
      <div class="row">
        <div class="col-lg-7 col-md-10">
            @php
                $name = explode(' ', $teacher->name)
            @endphp
          <h1 class="display-2 text-white">Xin chào {{ end($name) }}!</h1>
          <p class="text-white mt-0 mb-5">Chào mừng đến với Hệ thống theo dõi tiến trình giáo dục. Click vào nút dưới đây để quản lý ngay nhé!</p>
          <a href="#!" class="btn btn-neutral">Bắt đầu ngay</a>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('content')
<div class="row">
    <div class="col-xl-4 order-xl-2">
      <div class="card card-profile">
        {{-- <img src="{{ asset('img/student/quy.jpg') }}" alt="Image placeholder" class="card-img-top"> --}}
        <div class="row justify-content-center">
          <div class="col-lg-3 order-lg-2">
            <div class="card-profile-image">
              <a href="#">
                <img src="{{ asset('img/teacher/' . session('profile')) }}" class="rounded-circle">
              </a>
            </div>
          </div>
        </div>
        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
          <div class="d-flex justify-content-between">
            {{-- <a href="#" class="btn btn-sm btn-info mr-4">Connect</a>
            <a href="#" class="btn btn-sm btn-default float-right">Message</a> --}}
          </div>
        </div>
        <div class="card-body pt-0">
          <div class="row">
            <div class="col">
              <div class="card-profile-stats d-flex justify-content-center">
                <div>
                  <span class="heading">{{ $teacher->name }}</span>
                  {{-- <span class="description">Học phần</span> --}}
                </div>
                {{-- <div>
                  <span class="heading">10</span>
                  <span class="description">Photos</span>
                </div>
                <div>
                  <span class="heading">89</span>
                  <span class="description">Comments</span>
                </div> --}}
              </div>
            </div>
          </div>
          <div class="text-center">
            <h5 class="h3">
                {{ $teacher->address }}<span class="font-weight-light"></span>
            </h5>
            <div class="h5 font-weight-300">
              <i class="ni location_pin mr-2"></i>{{ $teacher->faculty }}
            </div>
            <div class="h5 mt-4">
              <i class="ni business_briefcase-24 mr-2"></i>Giảng viên
            </div>
            {{-- <div>
              <i class="ni education_hat mr-2"></i>University of Computer Science
            </div> --}}
          </div>
        </div>
      </div>
      <!-- Progress track -->
      <div class="card">
        <!-- Card header -->
        <div class="card-header">
          <!-- Title -->
          <h5 class="h3 mb-0">Thông tin cá nhân</h5>
        </div>
        <!-- Card body -->
        <div class="card-body">
          <!-- List group -->
          <ul class="list-group list-group-flush list my--3">
            <li class="list-group-item px-0">
              <div class="row align-items-center">
                <div class="col">
                    <button type="button" class="btn-icon-clipboard">
                        <div>
                          <i class="ni ni-single-02"></i>
                          <span>Họ và tên: <strong>{{ $teacher->name }}</strong></span>
                        </div>
                      </button>
                </div>
              </div>
            </li>
            <li class="list-group-item px-0">
                <div class="row align-items-center">
                  <div class="col">
                      <button type="button" class="btn-icon-clipboard">
                          <div>
                            <i class="ni ni-badge"></i>
                            <span>Cố vấn học tập lớp: <strong>{{ $actclass->name }}</strong></span>
                          </div>
                        </button>
                  </div>
                </div>
              </li>
              {{-- <li class="list-group-item px-0">
                <div class="row align-items-center">
                  <div class="col">
                      <button type="button" class="btn-icon-clipboard">
                          <div>
                            <i class="ni ni-notification-70"></i>
                            <span>Giảng viên hướng dẫn: <strong>Nguyễn A</strong></span>
                          </div>
                        </button>
                  </div>
                </div>
              </li> --}}
              <li class="list-group-item px-0">
                <div class="row align-items-center">
                  <div class="col">
                      <button type="button" class="btn-icon-clipboard">
                          <div>
                            <i class="ni ni-calendar-grid-58"></i>
                            <span>Ngày tham gia: <strong>{{ $teacher->created_at->format('d/m/Y') }}</strong></span>
                          </div>
                        </button>
                  </div>
                </div>
              </li>
              {{-- <li class="list-group-item px-0">
                <div class="row align-items-center">
                  <div class="col">
                      <button type="button" class="btn-icon-clipboard">
                          <div>
                            <i class="ni ni-book-bookmark"></i>
                            <span>Ngành học: <strong>Công nghệ thông tin (Ứng dụng phần mềm)</strong></span>
                          </div>
                        </button>
                  </div>
                </div>
              </li> --}}
          </ul>
        </div>
      </div>
    </div>
    <div class="col-xl-8 order-xl-1">
      <div class="row">
        <div class="col-lg-6">
          <div class="card bg-gradient-info border-0">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0 text-white">Tiến trình đã giao</h5>
                  <span class="h2 font-weight-bold mb-0 text-white">19 tiến trình</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                    <i class="ni ni-active-40"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="card bg-gradient-danger border-0">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0 text-white">Số lớp đang phụ trách giảng dạy</h5>
                  <span class="h2 font-weight-bold mb-0 text-white">4 lớp</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                    <i class="ni ni-spaceship"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Các học phần đang phụ trách </h3>
            </div>
            <div class="col-4 text-right">

            </div>
          </div>
        </div>
        <div class="card-body">
            <div class="row">
                @forelse ($courses as $course)
                    <div class="col-4">
                        <div class="card">
                            <!-- Card image -->
                            <img class="card-img-top" src="{{ asset('img/subject/' . $course->profile) }}" height="200px" alt="Image placeholder">
                            <!-- Card body -->
                            <div class="card-body">
                                <h3 class="card-title mb-3">{{ $course->name }}</h3>
                                <p class="card-text mb-4"></p>
                                <a href="{{ route('course.teacherShow', ['course'=>$course->id]) }}" class="btn btn-primary">Xem</a>
                            </div>
                            </div>
                    </div>
                @empty
                    <h2>Không có học phần nào đang giảng dạy!</h2>
                @endforelse


                {{-- <div class="col-4">
                    <div class="card">
                        <!-- Card image -->
                        <img class="card-img-top" src="{{ asset('img/subject/php_8.png') }}" height="200px" alt="Image placeholder">
                        <!-- List group -->

                        <!-- Card body -->
                        <div class="card-body">
                          <h3 class="card-title mb-3">Lập trình web với PHP - Nhóm 2</h3>
                          <p class="card-text mb-4"></p>
                          <a href="#" class="btn btn-primary">Xem</a>
                        </div>
                      </div>
                </div>

                <div class="col-4">
                    <div class="card">
                        <!-- Card image -->
                        <img class="card-img-top" src="{{ asset('img/subject/frontend.jpg') }}" height="200px" alt="Image placeholder">
                        <!-- List group -->

                        <!-- Card body -->
                        <div class="card-body">
                          <h3 class="card-title mb-3">Thiết kế web</h3>
                          <p class="card-text mb-4"></p>
                          <a href="#" class="btn btn-primary">Xem</a>
                        </div>
                      </div>
                </div> --}}


            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
