@extends('student.layouts.app')
@section('title')
    {{ $course->name }}
@endsection
@section('heading')
<!-- Header -->
<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{ asset('img/subject/' . $course->profile) }}); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-5"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
      <div class="row">
        <div class="col-lg-12 col-md-10">
          <h1 class="display-2 text-white">{{ $course->name }}</h1>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('content')
<div class="row">
    <div class="col-xl-4 order-xl-2">
      <!-- Progress track -->
      <div class="card">
        <!-- Card header -->
        <div class="card-header">
          <!-- Title -->
          <h5 class="h3 mb-0">Thông tin học phần</h5>
        </div>
        <!-- Card body -->
        <div class="card-body">
          <!-- List group -->
          <ul class="list-group list-group-flush list my--3">
            <li class="list-group-item px-0">
              <div class="row align-items-center">
                <div class="col-lg-12">
                    <button type="button" class="btn-icon-clipboard" data-original-title="" title="">
                      <div>
                        <i class="ni ni-app"></i>
                        <span>Tên môn học: <strong>{{ $course->subject }}</strong></span>
                      </div>
                    </button>
                </div>
              </div>
            </li>
            <li class="list-group-item px-0">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <button type="button" class="btn-icon-clipboard" data-original-title="" title="">
                          <div>
                            <i class="ni ni-single-02"></i>
                            <span>Giảng viên phụ trách: <strong>{{ $course->teacher }}</strong></span>
                          </div>
                        </button>
                    </div>
                </div>
              </li>
              <li class="list-group-item px-0">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <button type="button" class="btn-icon-clipboard" data-original-title="" title="">
                          <div>
                            <i class="ni ni-calendar-grid-58"></i>
                            <span>Ngày bắt đầu: <strong>{{ $course->start_date->format('d/m/Y') }}</strong></span>
                          </div>
                        </button>
                    </div>
                </div>
              </li>
              <li class="list-group-item px-0">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <button type="button" class="btn-icon-clipboard" data-original-title="" title="">
                          <div>
                            <i class="ni ni-hat-3"></i>
                            <span>Ngày kết thúc: <strong>{{ $course->end_date->format('d/m/Y') }}</strong></span>
                          </div>
                        </button>
                    </div>
                </div>
              </li>
              <li class="list-group-item px-0">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <button type="button" class="btn-icon-clipboard" data-original-title="" title="">
                          <div>
                            <i class="ni ni-square-pin"></i>
                            <span>Phòng học: <strong>{{ $course->location }}</strong></span>
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
            <div class="nav-wrapper">
                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-hat-3 mr-2"></i>Các tiến trình của học phần này</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-circle-08 mr-2"></i>Danh sách sinh viên</a>
                    </li>
                </ul>

            {{-- <div class="row align-items-center">
                <div class="col-8">
                <h3 class="mb-0">Các tiến trình </h3>
                </div>
                <div class="col-4 text-right">

                </div>
            </div> --}}
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                    <div class="row ">
                        <div class="col-12 scroll">
                            @forelse ($chapters as $chapter)
                                @if ($chapter->start_date > Carbon\Carbon::now())
                                <div class="card bg-gradient-default d-flex justify-content-center mr-5 ml-5">
                                    <!-- Card body -->
                                    <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0 text-white">Chưa tới hạn</h5>
                                        <span class="h1 font-weight-bold mb-0 text-white">{{ $chapter->title }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <button class="btn icon icon-shape bg-white text-dark rounded-circle shadow view-chapter" data-toggle="modal" data-target="#modalViewChapter2"
                                            data-title="{{ $chapter->title }}"
                                            data-course_id="{{ $chapter->course_id }}"
                                            data-process_id="{{ $chapter->process_id }}"
                                            data-enrollment_id="{{ $chapter->enrollment_id }}"
                                            data-chapter_id="{{ $chapter->id }}"
                                            data-mission="{{ $chapter->mission }}"
                                            data-start_date="{{ Carbon\Carbon::parse($chapter->start_date)->format('Y-m-d') }}"
                                            data-end_date="{{ Carbon\Carbon::parse($chapter->end_date)->format('Y-m-d') }}"
                                            data-homework_file="{{ $chapter->homework_file }}"
                                            data-status = "9">
                                            <i class="fas fa-eye-slash"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-lg">
                                        <span class="badge badge-pill badge-md badge-default">{{ Carbon\Carbon::parse($chapter->start_date)->format('d/m/Y') }} - {{ Carbon\Carbon::parse($chapter->end_date)->format('d/m/Y') }}</span>
                                    </p>
                                </div>
                                </div>
                                @elseif (($chapter->start_date < Carbon\Carbon::now() && $chapter->end_date > Carbon\Carbon::now()) && $chapter->status == 0)
                                    <div class="card bg-gradient-primary d-flex justify-content-center mr-5 ml-5">
                                        <!-- Card body -->
                                        <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0 text-white">Đang diễn ra</h5>
                                            <span class="h1 font-weight-bold mb-0 text-white">{{ $chapter->title }}</span>
                                            </div>
                                            <div class="col-auto">
                                            <button class="btn icon icon-shape bg-white text-dark rounded-circle shadow view-chapter" data-toggle="modal" data-target="#modalViewChapter"
                                            data-title="{{ $chapter->title }}"
                                            data-course_id="{{ $chapter->course_id }}"
                                            data-process_id="{{ $chapter->process_id }}"
                                            data-enrollment_id="{{ $chapter->enrollment_id }}"
                                            data-chapter_id="{{ $chapter->id }}"
                                            data-mission="{{ $chapter->mission }}"
                                            data-start_date="{{ Carbon\Carbon::parse($chapter->start_date)->format('Y-m-d') }}"
                                            data-end_date="{{ Carbon\Carbon::parse($chapter->end_date)->format('Y-m-d') }}"
                                            data-homework_file="{{ $chapter->homework_file }}"
                                            data-status = "0">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-lg">
                                            <span class="badge badge-pill badge-md badge-default">{{ Carbon\Carbon::parse($chapter->start_date)->format('d/m/Y') }} - {{ Carbon\Carbon::parse($chapter->end_date)->format('d/m/Y') }}</span>
                                        </p>
                                        </div>
                                    </div>
                                @elseif (($chapter->start_date < Carbon\Carbon::now() && $chapter->end_date > Carbon\Carbon::now()) && $chapter->status == 1)
                                <div class="card bg-gradient-success d-flex justify-content-center mr-5 ml-5">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0 text-white">Đã hoàn thành</h5>
                                            <span class="h1 font-weight-bold mb-0 text-white">{{ $chapter->title }}</span>
                                            </div>
                                            <div class="col-auto">
                                            <button class="btn icon icon-shape bg-white text-dark rounded-circle shadow view-chapter" data-toggle="modal" data-target="#modalViewDoneChapter"
                                            data-title="{{ $chapter->title }}"
                                            data-course_id="{{ $chapter->course_id }}"
                                            data-process_id="{{ $chapter->process_id }}"
                                            data-enrollment_id="{{ $chapter->enrollment_id }}"
                                            data-chapter_id="{{ $chapter->id }}"
                                            data-mission="{{ $chapter->mission }}"
                                            data-start_date="{{ Carbon\Carbon::parse($chapter->start_date)->format('Y-m-d') }}"
                                            data-end_date="{{ Carbon\Carbon::parse($chapter->end_date)->format('Y-m-d') }}"
                                            data-homework_file="{{ $chapter->homework_file }}"
                                            data-status = "1"
                                            data-student_file = "{{ $chapter->studentfiles }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-lg">
                                            <span class="badge badge-pill badge-md badge-default">{{ Carbon\Carbon::parse($chapter->start_date)->format('d/m/Y') }} - {{ Carbon\Carbon::parse($chapter->end_date)->format('d/m/Y') }}</span>
                                            @if (isset($chapter->homework_file))
                                            <span class="badge badge-pill badge-md badge-default">Có bài tập</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                @elseif ($chapter->status == 0 && $chapter->end_date < Carbon\Carbon::now())
                                <div class="card bg-gradient-default d-flex justify-content-center mr-5 ml-5">
                                    <!-- Card body -->
                                    <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0 text-white">Chưa hoàn thành</h5>
                                        <span class="h1 font-weight-bold mb-0 text-white">{{ $chapter->title }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <button class="btn icon icon-shape bg-white text-dark rounded-circle shadow view-chapter" data-toggle="modal" data-target="#modalViewChapter"
                                            data-title="{{ $chapter->title }}"
                                            data-course_id="{{ $chapter->course_id }}"
                                            data-process_id="{{ $chapter->process_id }}"
                                            data-enrollment_id="{{ $chapter->enrollment_id }}"
                                            data-chapter_id="{{ $chapter->id }}"
                                            data-mission="{{ $chapter->mission }}"
                                            data-start_date="{{ Carbon\Carbon::parse($chapter->start_date)->format('Y-m-d') }}"
                                            data-end_date="{{ Carbon\Carbon::parse($chapter->end_date)->format('Y-m-d') }}"
                                            data-homework_file="{{ $chapter->homework_file }}"
                                            data-status = "0">
                                            <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-lg">
                                        <span class="badge badge-pill badge-md badge-default">{{ Carbon\Carbon::parse($chapter->start_date)->format('d/m/Y') }} - {{ Carbon\Carbon::parse($chapter->end_date)->format('d/m/Y') }}</span>
                                    </p>
                                    </div>
                                </div>
                                @elseif ($chapter->complete_time > $chapter->end_date && $chapter->student_id != null)
                                    <div class="card bg-gradient-danger d-flex justify-content-center mr-5 ml-5">
                                        <!-- Card body -->
                                        <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0 text-white">Đã hoàn thành nhưng quá hạn</h5>
                                            <span class="h1 font-weight-bold mb-0 text-white">{{ $chapter->title }}</span>
                                            </div>
                                            <div class="col-auto">
                                            <button class="btn icon icon-shape bg-white text-dark rounded-circle shadow view-chapter" data-toggle="modal" data-target="#modalViewDoneChapter"
                                            data-title="{{ $chapter->title }}"
                                            data-course_id="{{ $chapter->course_id }}"
                                            data-process_id="{{ $chapter->process_id }}"
                                            data-enrollment_id="{{ $chapter->enrollment_id }}"
                                            data-chapter_id="{{ $chapter->id }}"
                                            data-mission="{{ $chapter->mission }}"
                                            data-start_date="{{ Carbon\Carbon::parse($chapter->start_date)->format('Y-m-d') }}"
                                            data-end_date="{{ Carbon\Carbon::parse($chapter->end_date)->format('Y-m-d') }}"
                                            data-homework_file="{{ $chapter->homework_file }}"
                                            data-status = "1"
                                            data-student_file = "{{ $chapter->studentfiles }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-lg">
                                            <span class="badge badge-pill badge-md badge-default">{{ Carbon\Carbon::parse($chapter->start_date)->format('d/m/Y') }} - {{ Carbon\Carbon::parse($chapter->end_date)->format('d/m/Y') }}</span>
                                        </p>
                                        </div>
                                    </div>
                                @else
                                <div class="card bg-gradient-success d-flex justify-content-center mr-5 ml-5">
                                    <!-- Card body -->
                                    <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0 text-white">Đã hoàn thành</h5>
                                        <span class="h1 font-weight-bold mb-0 text-white">{{ $chapter->title }}</span>
                                        </div>
                                        <div class="col-auto">
                                            <button class="btn icon icon-shape bg-white text-dark rounded-circle shadow view-chapter" data-toggle="modal" data-target="#modalViewDoneChapter"
                                            data-title="{{ $chapter->title }}"
                                            data-course_id="{{ $chapter->course_id }}"
                                            data-process_id="{{ $chapter->process_id }}"
                                            data-enrollment_id="{{ $chapter->enrollment_id }}"
                                            data-chapter_id="{{ $chapter->id }}"
                                            data-mission="{{ $chapter->mission }}"
                                            data-start_date="{{ Carbon\Carbon::parse($chapter->start_date)->format('Y-m-d') }}"
                                            data-end_date="{{ Carbon\Carbon::parse($chapter->end_date)->format('Y-m-d') }}"
                                            data-homework_file="{{ $chapter->homework_file }}"
                                            data-status = "1"
                                            data-student_file="{{ $chapter->studentfiles }}">
                                            <i class="fas fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <p class="mt-3 mb-0 text-lg">
                                        <span class="badge badge-pill badge-md badge-default">{{ Carbon\Carbon::parse($chapter->start_date)->format('d/m/Y') }} - {{ Carbon\Carbon::parse($chapter->end_date)->format('d/m/Y') }}</span>
                                    </p>
                                    </div>
                                </div>
                                @endif

                            @empty
                                <h2>Không có dữ liệu</h2>
                            @endforelse


                              {{-- <div class="card bg-gradient-warning d-flex justify-content-center mr-5 ml-5">
                                <!-- Card body -->
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col">
                                      <h5 class="card-title text-uppercase text-muted mb-0 text-white">Đã hoàn thành nhưng quá hạn</h5>
                                      <span class="h1 font-weight-bold mb-0 text-white">Syntax cơ bản</span>
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn icon icon-shape bg-white text-dark rounded-circle shadow">
                                            <i class="ni ni-spaceship"></i>
                                        </button>
                                    </div>
                                  </div>
                                  <p class="mt-3 mb-0 text-lg">
                                    <span class="badge badge-pill badge-md badge-default">06/12/2020 - 10/12/2020</span>
                                  </p>
                                </div>
                              </div>

                              <div class="card bg-gradient-primary d-flex justify-content-center mr-5 ml-5">
                                <!-- Card body -->
                                <div class="card-body">
                                  <div class="row">
                                    <div class="col">
                                      <h5 class="card-title text-uppercase text-muted mb-0 text-white">Đang diễn ra</h5>
                                      <span class="h1 font-weight-bold mb-0 text-white">Thiết lập môi trường</span>
                                    </div>
                                    <div class="col-auto">
                                        <button class="btn icon icon-shape bg-white text-dark rounded-circle shadow">
                                            <i class="ni ni-spaceship"></i>
                                        </button>
                                    </div>
                                  </div>
                                  <p class="mt-3 mb-0 text-lg">
                                    <span class="badge badge-pill badge-md badge-default">13/12/2020 - 30/12/2020</span>
                                  </p>
                                </div>
                              </div> --}}
                        </div>

                    </div>
                </div>
                {{-- ========================================================TAB============================ --}}
                <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                    <div class="row">
                        <div class="col-12">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light text-center">
                                <tr>
                                    <th scope="col">STT</th>
                                    <th class="text-center" scope="col">Ảnh đại diện</th>
                                    <th class="text-center" scope="col">Họ và tên</th>
                                    <th class="text-center" scope="col">Mã sinh viên</th>
                                    <th scope="col" class="text-left">Giới tính</th>
                                    <th scope="col" class="text-center">Lớp</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $stt = 1;
                                    @endphp
                                    @forelse ($enrollments as $enrollment)
                                        <tr>
                                            <th class="text-center" scope="row">{{ $stt }}</th>
                                            <td class="text-center"><img src="{{ asset('img/student/' . $enrollment->profile) }}" alt="profile" width="80" height="80" class="text-center"></td>
                                            <th class="text-center" scope="row"><strong>{{ $enrollment->name }}</strong></th>
                                            <th class="text-center" scope="row">{{ $enrollment->student_no }}</th>
                                            <td>{{ $enrollment->vgender }}</td>
                                            <td class="text-center">{{ $enrollment->actclass }}</td>
                                        </tr>
                                    @empty
                                        <h2>Không có dữ liệu</h2>
                                    @endforelse
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="modalViewDoneChapter" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Thông tin tiến trình</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('process.update', 'chapter') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <input type="hidden" name="course_id" class="course_id">
            <input type="hidden" name="student_id" class="" value="{{ session('student_id') }}">
            <input type="hidden" name="chapter_id" class="chapter_id">
            <input type="hidden" name="enrollment_id" class="enrollment_id">
            <input type="hidden" name="process_id" class="process_id">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                              <label for="start_date"><strong>Ngày bắt đầu</strong></label>
                              <input type="date" class="form-control-plaintext start_date" name="start_date" id="data-start_date" aria-describedby="" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <label for="end_date"><strong>Ngày kết thúc</strong></label>
                            <input type="date" class="form-control-plaintext end_date" name="end_date" id="data-end_date" aria-describedby="" placeholder="" disabled>
                          </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                              <label for="title"><strong>Tên tiến trình</strong></label>
                              <input type="text" class="form-control-plaintext title" name="title" id="data-title" aria-describedby="" placeholder="" disabled>
                            </div>
                            <div class="form-group">
                              <label for="mission"><strong>Mục tiêu & Nhiệm vụ</strong></label>
                              <textarea class="form-control-plaintext mission" name="mission" id="data-mission" rows="4" disabled></textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="old_homework_file" class="old_homework_file">
                                <a name="" id="" class="btn-icon-clipboard old_homework" href="#" role="button">Click chuột vào đây để xem tập tin bài tập</a>
                            </div>
                            <div class="form-group">
                                <a name="" id="" class="btn-icon-clipboard student_file" href="#" role="button">Bài tập về nhà của bạn</a>
                              </div>
                            <div class="form-group">
                                  <label for=""><strong>Trạng thái tiến độ: </strong></label>
                            </div>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                  <input type="radio" name="status" id="status" value="1" autocomplete="off" readonly> Đã hoàn thành
                                </label>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  {{-- =================================== --}}
  <div class="modal fade" id="modalViewChapter" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Thông tin tiến trình</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('process.update', 'chapter') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <input type="hidden" name="course_id" class="course_id">
            <input type="hidden" name="student_id" class="" value="{{ session('student_id') }}">
            <input type="hidden" name="chapter_id" class="chapter_id">
            <input type="hidden" name="enrollment_id" class="enrollment_id">
            <input type="hidden" name="process_id" class="process_id">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                              <label for="start_date"><strong>Ngày bắt đầu</strong></label>
                              <input type="date" class="form-control-plaintext start_date" name="start_date" id="data-start_date" aria-describedby="" placeholder="" readonly>
                            </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <label for="end_date"><strong>Ngày kết thúc</strong></label>
                            <input type="date" class="form-control-plaintext end_date" name="end_date" id="data-end_date" aria-describedby="" placeholder="" disabled>
                          </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                              <label for="title"><strong>Tên tiến trình</strong></label>
                              <input type="text" class="form-control-plaintext title" name="title" id="data-title" aria-describedby="" placeholder="" disabled>
                            </div>
                            <div class="form-group">
                              <label for="mission"><strong>Mục tiêu & Nhiệm vụ</strong></label>
                              <textarea class="form-control-plaintext mission" name="mission" id="data-mission" rows="4" disabled></textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="old_homework_file" class="old_homework_file">
                                <a name="" id="" class="btn-icon-clipboard old_homework" href="#" role="button">Click chuột vào đây để xem tập tin bài tập</a>
                            </div>
                            <div class="form-group">
                                <label for="homework_file"><strong>Bài tập về nhà của bạn: </strong></label>
                                <input type="file" class="form-control-file" name="homework_file" id="data-homework_file" placeholder="" aria-describedby="">
                              </div>
                            <div class="form-group">
                                  <label for=""><strong>Cập nhật trạng thái tiến độ: </strong></label>
                            </div>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                  <input type="radio" name="status" id="status" value="0" autocomplete="off" checked> Chưa hoàn thành
                                </label>
                                <label class="btn btn-secondary">
                                  <input type="radio" name="status" id="status" value="1" autocomplete="off" > Đã hoàn thành
                                </label>
                              </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
          <button type="submit" class="btn btn-success">Cập nhật quá trình</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  {{-- ================================== --}}
  <div class="modal fade" id="modalViewTeacher" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Thông tin giảng viên</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="" method="post" enctype="multipart/form-data">
            @csrf
            {{-- @method('PATCH') --}}
            <div class="row">
                {{-- <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                              <label for="title"><strong>Họ và tên giảng viên: </strong></label>
                              <input type="text" class="form-control-plaintext title" name="title" id="data-title" aria-describedby="" placeholder="" disabled>
                            </div>
                            <div class="form-group">
                              <label for="mission"><strong>Ngày sinh:</strong></label>
                              <textarea class="form-control-plaintext mission" name="mission" id="data-mission" rows="4" disabled></textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="old_homework_file" class="old_homework_file">
                                <a name="" id="" class="btn-icon-clipboard old_homework" href="#" role="button">Click chuột vào đây để xem tập tin bài tập</a>
                            </div>
                            <div class="form-group">
                                <label for="homework_file"><strong>Bài tập về nhà của bạn: </strong></label>
                                <input type="file" class="form-control-file" name="homework_file" id="data-homework_file" placeholder="" aria-describedby="">
                              </div>
                            <div class="form-group">
                                  <label for=""><strong>Cập nhật trạng thái tiến độ: </strong></label>
                            </div>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-secondary active">
                                  <input type="radio" name="status" id="status" value="0" autocomplete="off" checked> Chưa hoàn thành
                                </label>
                                <label class="btn btn-secondary">
                                  <input type="radio" name="status" id="status" value="1" autocomplete="off" > Đã hoàn thành
                                </label>
                              </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-lg-12">
                    <button type="button" class="btn-icon-clipboard" data-original-title="" title="">
                      <div>
                        <i class="ni ni-square-pin"></i>
                        <span>Họ và tên giảng viên: <strong class="">ACC</strong></span>
                      </div>
                    </button>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
          <button type="submit" class="btn btn-success">Cập nhật quá trình</button>
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection
