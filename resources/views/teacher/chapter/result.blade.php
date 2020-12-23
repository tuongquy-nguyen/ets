@extends('teacher.layouts.app')
@section('title')
    {{ $chapter->title }}
@endsection
@section('heading')
<!-- Header -->
<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url({{ asset('img/subject/' . $course->profile) }}); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-info opacity-5"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
      <div class="row">
        <div class="col-lg-12 col-md-10">
          <h1 class="display-2 text-white">{{ $chapter->title }}</h1>
        </div>
      </div>
    </div>
  </div>

@endsection
@section('content')
<div class="row">
    <div class="col-xl-12 order-xl-2">
        <div class="card">
            <!-- Card header -->
            <div class="card-header">
              <!-- Title -->
              <h5 class="h3 mb-0">Thông tin tiến trình</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <div class="col-lg-12">
                            <button type="button" class="btn-icon-clipboard">
                              <div>
                                <i class="ni ni-calendar-grid-58"></i>
                                <span>Ngày bắt đầu: <strong>{{ $chapter->start_date->format('d/m/Y') }}</strong></span>
                              </div>
                            </button>
                        </div>
                        <div class="col-lg-12 mt-5">
                            <button type="button" class="btn-icon-clipboard">
                              <div>
                                <i class="ni ni-hat-3"></i>
                                <span>Ngày kết thúc: <strong>{{ $chapter->end_date->format('d/m/Y') }}</strong></span>
                              </div>
                            </button>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="col-lg-12">
                            {{-- <button type="button" class="btn-icon-clipboard">
                              <div>
                                <i class="ni ni-square-pin"></i>
                                <span>Nhiệm vụ: <strong>{{ $chapter->mission }}</strong></span>
                              </div>
                            </button> --}}
                            <label for="mission"><strong>Nhiệm vụ:</strong></label>
                            <textarea readonly name="mission" class="btn-icon-clipboard text-left" id="" cols="30" rows="7">{{ $chapter->mission }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

          </div>
      </div>


</div>
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                              <div class="nav-wrapper">
                                  <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                      <li class="nav-item">
                                          <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>Danh sách sinh viên đã hoàn thành</a>
                                      </li>
                                      <li class="nav-item">
                                          <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-bell-55 mr-2"></i>Danh sách sinh viên chưa hoàn thành tiến độ</a>
                                      </li>
                                  </ul>
                              </div>
                              <div class="card shadow">
                                  <div class="card-body">
                                      <div class="tab-content" id="myTabContent">
                                          <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                                  <!-- Title -->
                                                  <div class="row align-items-center">
                                                    <div class="col">
                                                        <h5 class="h3 mb-0">Các sinh viên đã hoàn thành</h5>
                                                      </div>
                                                  </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        @php
                                                            $checkmark = true;
                                                        @endphp
                                                        <div class="col-12">
                                                            <form method="POST" action="{{ route('mark.store') }}">
                                                            @csrf
                                                            <input type="hidden" name="chapter_id" value="{{ $chapter->id }}">
                                                            <table id="table-chapter" class="table align-items-center table-flush">
                                                                <thead class="thead-light text-center">
                                                                <tr>
                                                                    <th scope="col">STT</th>
                                                                    <th class="text-center" scope="col">Ảnh đại diện</th>
                                                                    <th class="text-left" scope="col">Họ và tên</th>
                                                                    <th scope="col" class="text-left">Mã sinh viên</th>
                                                                    <th scope="col" class="text-center">Bài tập</th>
                                                                    <th scope="col" class="text-center">Hoàn thành vào lúc</th>
                                                                    <th class="text-center">Đánh giá điểm</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @php
                                                                    $stt = 1;
                                                                @endphp
                                                                @forelse ($dones as $done)
                                                                <tr>
                                                                    <th class="text-center" scope="row">{{ $stt }}</th>
                                                                    <td class="text-center"><img src="{{ asset('img/student/' . $done->profile) }}" alt="profile" width="80" height="80" class="text-center"></td>
                                                                    <th class="text-left" scope="row">{{ $done->name}}</th>
                                                                    <th class="text-left" scope="row">{{ $done->student_no }}</th>
                                                                    <th class="text-center" scope="row">
                                                                        @if ($done->homework_file != null)
                                                                            <a name="" id="" class="btn-icon-clipboard old_homework text-center" href="/storage/{{ $done->homework_file }}" role="button">Tải xuống</a>
                                                                        @else
                                                                            <a name="" id="" class="btn-icon-clipboard old_homework text-center" href="javascript:void(0)" role="button">Không có bài tập</a>
                                                                        @endif

                                                                    </th>
                                                                    <td class="text-center">{{ Carbon\Carbon::parse($done->complete_time)->format('d/m/Y') }}</td>
                                                                    <td class="text-center">
                                                                            @if (isset($done->mark))
                                                                                <strong>{{ $done->mark }}</strong>
                                                                            @else
                                                                                <input type="text" class="form-control" name="{{ $done->process_id }}[]" id="" placeholder="Điểm" required>
                                                                                @php
                                                                                    $checkmark = false;
                                                                                @endphp
                                                                            @endif
                                                                    </td>
                                                                </tr>
                                                                @php
                                                                    $stt++;
                                                                @endphp

                                                                @empty
                                                                    <h4>Không có sinh viên nào hoàn thành tiến độ!</h4>
                                                                @endforelse
                                                                </tbody>
                                                            </table>

                                                            {{-- <div class="row mt-2">
                                                                <div class="col-12 d-flex justify-content-center">
                                                                    <div class="text-center">
                                                                        {{ $chapters->links() }}
                                                                    </div>
                                                                </div>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    @if ($checkmark)
                                                        <button type="button" class="btn btn-danger disabled">Xác nhận điểm</button>
                                                    @else
                                                        <button type="submit" class="btn btn-danger">Xác nhận điểm</button>
                                                    @endif

                                                </div>
                                            </form>
                                          </div>



                                          <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                            <!-- Title -->
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <h5 class="h3 mb-0">Danh sách sinh viên chưa hoàn thành</h5>
                                                  </div>
                                                  <div class="col text-right">
                                                    <a name="" id="" class="btn btn-warning" href="{{ route('alert', ['course'=>$course->id, 'chapter'=>$chapter->id]) }}" role="button">Gửi cảnh báo</a>
                                                  </div>
                                              </div>
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <table id="table-chapter" class="table align-items-center table-flush">
                                                            <thead class="thead-light text-center">
                                                            <tr>
                                                                <th scope="col">STT</th>
                                                                <th class="text-center" scope="col">Ảnh đại diện</th>
                                                                <th class="text-center" scope="col">Họ và tên</th>
                                                                <th scope="col" class="text-left">Mã sinh viên</th>
                                                                <th scope="col" class="text-left">Hành động</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @php
                                                                $stt = 1;
                                                            @endphp
                                                            @forelse ($notdones as $notdone)
                                                            <tr>
                                                                <th class="text-center" scope="row">{{ $stt }}</th>
                                                                <td class="text-center"><img src="{{ asset('img/student/' . $notdone->profile) }}" alt="profile" width="80" height="80" class="text-center"></td>
                                                                <th class="text-center" scope="row">{{ $notdone->name }}</th>
                                                                <td class="text-left">{{ $notdone->student_no }}</td>
                                                                <td class="text-center">{{ $notdone->student_no }}</td>
                                                            </tr>
                                                            @php
                                                                $stt++;
                                                            @endphp

                                                            @empty
                                                                <h4>Không có sinh viên nào chưa hoàn thành tiến độ này!</h4>
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
                        </div>
                    </div>
                    <div class="card-footer">
                        <a name="" id="" class="btn btn-primary" href="{{ route('course.teacherShow', ['course'=>$course->id]) }}" role="button">Trở về các tiến trình</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
