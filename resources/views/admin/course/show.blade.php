@extends('admin.layouts.app')
@section('title')
    Quản lý các học phần
@endsection
@section('h4')
<h2 class="display-4 text-white d-inline-block mb-0">{{ $course->name }}</h2>

@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- Card header -->
                <div class="card-header">
                  <!-- Title -->
                  <h5 class="h3 mb-0">Thông tin học phần: {{ $course->name }}</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <div class="col-lg-12">
                                <button type="button" class="btn-icon-clipboard">
                                  <div>
                                    <i class="ni ni-app"></i>
                                    <span>Tên môn học: <strong>{{ $course->subject }}</strong></span>
                                  </div>
                                </button>
                            </div>
                            <div class="col-lg-12">
                                <button type="button" class="btn-icon-clipboard">
                                  <div>
                                    <i class="ni ni-single-02"></i>
                                    <span>Giảng viên phụ trách: <strong>{{ $course->teacher }}</strong></span>
                                  </div>
                                </button>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="col-lg-12">
                                <button type="button" class="btn-icon-clipboard">
                                  <div>
                                    <i class="ni ni-calendar-grid-58"></i>
                                    <span>Ngày bắt đầu: <strong>{{ $course->start_date->format('d/m/Y') }}</strong></span>
                                  </div>
                                </button>
                            </div>
                            <div class="col-lg-12">
                                <button type="button" class="btn-icon-clipboard">
                                  <div>
                                    <i class="ni ni-hat-3"></i>
                                    <span>Ngày kết thúc: <strong>{{ $course->end_date->format('d/m/Y') }}</strong></span>
                                  </div>
                                </button>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="col-lg-12">
                                <button type="button" class="btn-icon-clipboard">
                                  <div>
                                    <i class="ni ni-square-pin"></i>
                                    <span>Phòng học: <strong>{{ $course->location }}</strong></span>
                                  </div>
                                </button>
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
                                              <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true"><i class="ni ni-cloud-upload-96 mr-2"></i>Các tiến trình của học phần</a>
                                          </li>
                                          <li class="nav-item">
                                              <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false"><i class="ni ni-bell-55 mr-2"></i>Danh sách sinh viên tham gia học phần</a>
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
                                                            <h5 class="h3 mb-0">Các tiến trình của học phần</h5>
                                                          </div>
                                                          <div class="col text-right">
                                                            <button class="btn btn-success add-chapter" data-toggle="modal" data-target="#modalAddChapter" data-course_id="{{ $course->id }}" >Thêm mới</button>
                                                          </div>
                                                      </div>
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <table class="table align-items-center table-flush">
                                                                    <thead class="thead-light text-center">
                                                                    <tr>
                                                                        <th scope="col">STT</th>
                                                                        <th class="text-center" scope="col">Từ ngày</th>
                                                                        <th class="text-center" scope="col">Tới ngày</th>
                                                                        <th scope="col" class="text-left">Tiến trình</th>
                                                                        <th scope="col" class="text-center">Bài tập</th>
                                                                        <th scope="col">Ngày tạo</th>
                                                                        <th scope="col">Hành động</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @php
                                                                        $stt = 1;
                                                                    @endphp
                                                                    @forelse ($chapters as $chapter)
                                                                    <tr>
                                                                        <th class="text-center" scope="row">{{ $stt }}</th>
                                                                        <th class="text-center" scope="row"><strong>{{ $chapter->start_date->format('d/m/Y') }}</strong></th>
                                                                        <th class="text-center" scope="row"><strong>{{ $chapter->end_date->format('d/m/Y') }}</strong></th>
                                                                        <td>{{ $chapter->title }}</td>
                                                                        @if ($chapter->homework_status == 'Có bài tập')
                                                                            <td class="text-center"><a href="#" class="badge badge-pill badge-default">{{ $chapter->homework_status }}</a></td>
                                                                        @else
                                                                            <td class="text-center"><a href="#" class="badge badge-pill badge-info">{{ $chapter->homework_status }}</a></td>
                                                                        @endif
                                                                        <td class="text-center">{{ $chapter->created_at }}</td>
                                                                        <td>
                                                                            <div class="col text-center">
                                                                                <button type="button" name="" data-id='{{ $chapter->id }}' data-target="#modalShowChapter" data-toggle="modal" class="btn btn-danger delete">Xem</button>
                                                                                <button type="button" data-toggle="modal" data-target="#modalEditChapter"
                                                                                data-title="{{ $chapter->title }}"
                                                                                data-chapter_id="{{ $chapter->id }}"
                                                                                data-mission="{{ $chapter->mission }}"
                                                                                data-start_date="{{ $chapter->start_date->format('Y-m-d') }}"
                                                                                data-end_date="{{ $chapter->end_date->format('Y-m-d') }}"
                                                                                data-homework_file="{{ $chapter->homework_file }}"
                                                                                class="btn btn-primary edit-chapter">Cập nhật</button>
                                                                                <button type="button" name="" data-id='{{ $chapter->id }}' data-target="#modalDeleteChapter" data-toggle="modal" class="btn btn-danger delete">Xóa</button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    @php
                                                                        $stt++;
                                                                    @endphp

                                                                    @empty
                                                                        <h4>Không tìm thấy kết quả nào!</h4>
                                                                    @endforelse
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                              </div>



                                              <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                                <!-- Title -->
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <h5 class="h3 mb-0">Danh sách sinh viên tham gia học phần</h5>
                                                      </div>
                                                      <div class="col text-right">
                                                        {{-- <button class="btn btn-success add-chapter" data-toggle="modal" data-target="#modalAddChapter" data-course_id="{{ $course->id }}" >Thêm mới</button> --}}
                                                      </div>
                                                  </div>
                                                <div class="card-body">
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
                                                                    <th scope="col">Ngày tạo</th>
                                                                    <th scope="col">Hành động</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @php
                                                                    $stt2 = 1;
                                                                @endphp
                                                                @forelse ($enrollments as $enrollment)
                                                                <tr>
                                                                    <th class="text-center" scope="row">{{ $stt2 }}</th>
                                                                    <td class="text-center"><img src="{{ asset('img/student/' . $enrollment->profile) }}" alt="profile" width="80" height="80" class="text-center"></td>
                                                                    <th class="text-center" scope="row"><strong>{{ $enrollment->name }}</strong></th>
                                                                    <th class="text-center" scope="row">{{ $enrollment->student_no }}</th>
                                                                    <td>{{ $enrollment->vgender }}</td>
                                                                    <td class="text-center">{{ $enrollment->actclass }}</td>
                                                                    <td class="text-center">{{ $enrollment->created_at }}</td>
                                                                    <td>
                                                                        <div class="col text-center">
                                                                            <button type="button" name="" data-id='{{ $chapter->id }}' data-target="#modalShowChapter" data-toggle="modal" class="btn btn-danger delete">Xem</button>
                                                                            <button type="button" data-toggle="modal" data-target="#modalEditChapter"
                                                                            data-title="{{ $chapter->title }}"
                                                                            data-chapter_id="{{ $chapter->id }}"
                                                                            data-mission="{{ $chapter->mission }}"
                                                                            data-start_date="{{ $chapter->start_date->format('Y-m-d') }}"
                                                                            data-end_date="{{ $chapter->end_date->format('Y-m-d') }}"
                                                                            data-homework_file="{{ $chapter->homework_file }}"
                                                                            class="btn btn-primary edit-chapter">Cập nhật</button>
                                                                            <button type="button" name="" data-id='{{ $enrollment->id }}' data-target="#modalDeleteEnrollment" data-toggle="modal" class="btn btn-danger delete">Xóa</button>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                @php
                                                                    $stt2++;
                                                                @endphp

                                                                @empty
                                                                    <h4>Không tìm thấy kết quả nào!</h4>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="modalAddChapter" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Thêm tiến trình mới</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form action="{{ route('chapter.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="course_id" class="course_id">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                              <label for="start_date">Ngày bắt đầu</label>
                              <input type="date" class="form-control" name="start_date" id="start_date" aria-describedby="" placeholder="">
                            </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <label for="end_date">Ngày kết thúc</label>
                            <input type="date" class="form-control" name="end_date" id="end_date" aria-describedby="" placeholder="">
                          </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                              <label for="title">Tên tiến trình</label>
                              <input type="text" class="form-control" name="title" id="title" aria-describedby="" placeholder="">
                            </div>
                            <div class="form-group">
                              <label for="mission">Mục tiêu & Nhiệm vụ</label>
                              <textarea class="form-control" name="mission" id="mission" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                              <label for="homework_file">Bài tập về nhà (Nếu có)</label>
                              <input type="file" class="form-control-file" name="homework_file" id="homework_file" placeholder="" aria-describedby="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
          <button type="submit" class="btn btn-success">Thêm</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!--EDIT Modal -->
<div class="modal fade" id="modalEditChapter" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Cập nhật tiến trình</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form action="{{ route('chapter.update', 'chapter') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id" class="chapter_id">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                              <label for="start_date">Ngày bắt đầu</label>
                              <input type="date" class="form-control start_date" name="start_date" id="data-start_date" aria-describedby="" placeholder="">
                            </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <label for="end_date">Ngày kết thúc</label>
                            <input type="date" class="form-control end_date" name="end_date" id="data-end_date" aria-describedby="" placeholder="">
                          </div>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                              <label for="title">Tên tiến trình</label>
                              <input type="text" class="form-control title" name="title" id="data-title" aria-describedby="" placeholder="">
                            </div>
                            <div class="form-group">
                              <label for="mission">Mục tiêu & Nhiệm vụ</label>
                              <textarea class="form-control mission" name="mission" id="data-mission" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                              <label for="homework_file">Bài tập về nhà (Nếu có)</label>
                              <input type="file" class="form-control-file" name="homework_file" id="data-homework_file" placeholder="" aria-describedby="">
                            </div>
                            <div class="form-group">
                                <input type="hidden" name="old_homework_file" class="old_homework_file">
                                <a name="" id="" class="btn-icon-clipboard old_homework" href="#" role="button">Click vào để xem file bài tập về nhà</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
          <button type="submit" class="btn btn-success">Thêm</button>
        </div>
        </form>
      </div>
    </div>
  </div>

    <!--DESTROY Modal -->
<div class="modal fade" id="modalDeleteChapter" tabindex="-1" aria-labelledby="modalDeleteChapter" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('chapter.destroy', 'test') }}" method="POST">
        <div class="modal-body">
            @csrf
            @method('DELETE')
            <input type="hidden" id="id" value="id" name="id">
          Bạn có muốn xóa bản ghi này?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
          <button type="submit" class="btn btn-danger">Xác nhận xóa</button>
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection
