@extends('student.layouts.app')
@section('title')
    Trang chủ
@endsection
@section('heading')
<!-- Header -->
<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(../../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
      <div class="row">
        <div class="col-lg-7 col-md-10">
            @php
                $name = explode(' ', $student->name)
            @endphp
          <h1 class="display-2 text-white">Xin chào {{ end($name) }}!</h1>
          <p class="text-white mt-0 mb-5">Chào mừng bạn đến với Hệ thống theo dõi tiến trình giáo dục. Click vào nút dưới đây để xem ngay nhé!</p>
          <a href="#my-course" class="btn btn-neutral">Bắt đầu ngay</a>
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
                <img src="{{ asset('img/student/' . $student->profile) }}" class="rounded-circle">
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
                  <span class="heading">{{ $student->name }}</span>
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
                {{ $student->address }}<span class="font-weight-light"></span>
            </h5>
            <div class="h5 font-weight-300">
              <i class="ni location_pin mr-2"></i>Lớp: {{ $class->name }}
            </div>
            <div class="h5 mt-4">
              <i class="ni business_briefcase-24 mr-2"></i>Sinh viên
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
                          <span>Họ và tên: <strong>{{ $student->name }}</strong></span>
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
                            <span>Lớp sinh hoạt: <strong>{{ $class->name }}</strong></span>
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
                            <i class="ni ni-notification-70"></i>
                            <span>Cố vấn học tập: <strong>{{ $class->teacher }}</strong></span>
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
                            <i class="ni ni-calendar-grid-58"></i>
                            <span>Ngày tham gia: <strong>{{ $student->created_at->format('d/m/Y') }}</strong></span>
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
                            <i class="ni ni-book-bookmark"></i>
                            <span>Ngành học: <strong>{{ $class->faculty }}</strong></span>
                          </div>
                        </button>
                  </div>
                </div>
              </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-xl-8 order-xl-1">
      <div class="row">
        <div class="col-lg-6">
          <div class="card bg-gradient-info border-0">
            <!-- Card body -->
            <div class="card-body mb-4">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0 text-white">Học phần đang tham gia</h5>
                  <span class="h2 font-weight-bold mb-0 text-white">{{ $count_course->countcourse }} Học phần</span>
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
            <div class="card-body mb-4">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0 text-white">Nhiệm vụ & Bài tập</h5>
                  @if (isset($notdone))
                  <span class="h2 font-weight-bold mb-0 text-white">{{ $notdone->chapter_not_done }} tiến trình đang đợi</span>
                  @else
                  <span class="h2 font-weight-bold mb-0 text-white">0 tiến trình đang đợi</span>
                  @endif
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
      <div class="card" id="my-course">
        <div class="card-header">
          <div class="row align-items-center">
            <div class="col-8">
              <h3 class="mb-0">Các học phần của tôi </h3>
            </div>
            <div class="col-4 text-right">

            </div>
          </div>
        </div>
        <div class="card-body">
            <div class="row">
                @forelse ($mycourses as $mycourse)
                    <div class="col-4">
                        <div class="card">
                            <!-- Card image -->
                            <img class="card-img-top" src="{{ asset('img/subject/' . $mycourse->profile) }}" height="200px" alt="Image placeholder">
                            <!-- List group -->

                            <!-- Card body -->
                            <div class="card-body">
                            <h3 class="card-title mb-3">{{ $mycourse->name }}</h3>
                            <p class="card-text mb-4"></p>
                            <a href="{{ route('course.studentShow', [
                                'course' => $mycourse->id,
                                'student' => session('student_id'),
                            ]) }}" class="btn btn-primary">Xem</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-primary" role="alert">
                        <strong>Không có học phần để hiển thị</strong>
                    </div>
                @endforelse


            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
