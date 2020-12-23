@extends('student.layouts.app')
@section('title')
    Tài khoản
@endsection
@section('heading')
<!-- Header -->
<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(../../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-info opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
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
        <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Thông tin cá nhân </h3>
                </div>
                <div class="col-4 text-right">
                  <a href="#!" class="btn btn-sm btn-primary change-password" data-target="#modalChangePassword" data-toggle="modal" data-user_id ="{{ $student->user_id }}" >Đổi mật khẩu?</a>
                </div>
              </div>
            </div>
            <div class="card-body">
                <div class="row">
                    @include('common.errors')
                </div>
              <form>
                <h6 class="heading-small text-muted mb-4">Thông tin tài khoản</h6>
                <div class="pl-lg-4">
                  <div class="row">

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Họ và tên</label>
                        <input type="text" id="input-username" class="form-control-plaintext" placeholder="Username" value="{{ $student->name }}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Địa chỉ email</label>
                        <input type="email" id="input-email" class="form-control-plaintext" placeholder="{{ $student->email }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Mã sinh viên</label>
                        <input type="text" id="input-first-name" class="form-control-plaintext" placeholder="" value="{{ $student->student_no }}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-last-name">Ngày sinh</label>
                        <input type="date" id="input-last-name" class="form-control" placeholder="Last name" value="{{ $student->dob }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Giới tính</label>
                          <select class="form-control" name="gender" id="">
                            <option hidden value="{{ $student->gender }}">{{ $student->vgender }}</option>
                            <option value="1">Nam</option>
                            <option value="0">Nữ</option>
                            <option value="2">Khác</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Lớp sinh hoạt</label>
                        <input type="text" id="input-country" class="form-control-plaintext" placeholder="" value="{{ $class->name }}">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Nơi sinh</label>
                        <input type="text" value="{{ $student->birthplace }}" id="input-postal-code" class="form-control" placeholder="Nơi sinh của bạn">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Số CMND</label>
                        <input type="text" id="input-city" value="{{ $student->id_card_no }}" class="form-control" placeholder="Số CMND/CCCD" required  max="10">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Ngày cấp</label>
                        <input type="date" id="input-country" class="form-control" placeholder="Ngày cấp CMND/CCCD"  value="{{ $student->id_card_date }}">
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Nơi cấp</label>
                        <input type="text" value="{{ $student->id_card_place }}" id="input-postal-code" class="form-control" placeholder="Nơi cấp CMND/CCCD">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Họ và tên Cha</label>
                        <input type="text" id="input-city" class="form-control" placeholder="Họ & tên Cha" value="{{ $student->father_name }}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Số điện thoại</label>
                        <input type="te;" id="input-country" class="form-control" placeholder="Số điện thoại Cha" value="{{ $student->father_phone }}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-city">Họ và tên Mẹ</label>
                        <input type="text" id="input-city" class="form-control" placeholder="Họ & tên Mẹ" value="{{ $student->mother_name }}">
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Số điện thoại</label>
                        <input type="tel" id="input-country" class="form-control" placeholder="Số điện thoại Mẹ" value="{{ $student->mother_phone }}">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="pl-lg-4">
                  <div class="form-group">
                    <label class="form-control-label">Địa chỉ thường trú</label>
                    <textarea rows="4" class="form-control" placeholder="Địa chỉ thường trú của bạn">{{ $student->address }}</textarea>
                  </div>
                </div>
              </form>
            </div>
          </div>
    </div>
  </div>

  <div class="modal fade" id="modalChangePassword" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">

            <div class="modal-body p-0">
                <div class="card bg-secondary border-0 mb-0">
                    <div class="card-header bg-transparent pb-5">
                        <div class="text-muted text-center mt-2">Thay đổi mật khẩu</div>
                    </div>
                    <div class="card-body px-lg-5 py-lg-5">
                        <form action="{{ route('user.update', 'user') }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="user_id" class="user_id">
                            <div class="form-group mb-3">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" name="password" placeholder="Mật khẩu mới" type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="Nhập lại mật khẩu" name="password_confirmation" type="password">
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary my-4">Đổi mật khẩu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

  </div>
@endsection
