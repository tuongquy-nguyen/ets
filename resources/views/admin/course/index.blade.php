@extends('admin.layouts.app')
@section('title')
    Quản lý các học phần
@endsection
@section('h4')
<h2 class="display-3 text-white d-inline-block mb-0">Học phần</h2>
@endsection
@section('content')
<div class="card">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Danh sách các học phần</h3>
            </div>
            <div class="col text-right">
              <button class="btn btn-success" data-toggle="modal" data-target="#modalAddCourse" >Thêm mới</button>
            </div>
        </div>
        <div class="row">
            @include('common.errors')
        </div>
    </div>
    <div class="table-responsive">
    <!-- Projects table -->
    <table class="table align-items-center table-flush">
        <thead class="thead-light text-center">
        <tr>
            <th scope="col">STT</th>
            <th class="text-left" scope="col">Tên học phần</th>
            <th scope="col" class="text-left">Thuộc môn học</th>
            <th scope="col" class="text-left">Giảng viên</th>
            <th scope="col">Ngày bắt đầu</th>
            <th scope="col">Ngày kết thúc</th>
            <th scope="col">Phòng học</th>
            <th scope="col">Ngày tạo</th>
            <th scope="col">Hành động</th>
        </tr>
        </thead>
        <tbody>
        @php
            $stt = 1;
        @endphp
        @forelse ($courses as $course)
        <tr>
            <th class="text-center" scope="row">{{ $stt }}</th>
            <td>{{ $course->name }}</td>
            <td>{{ $course->subject }}</td>
            <td>{{ $course->teacher }}</td>
            <td class="text-center">{{ $course->start_date->format('d/m/Y') }}</td>
            <td class="text-center">{{ $course->end_date->format('d/m/Y') }}</td>
            <td class="text-center">{{ $course->location }}</td>
            <td class="text-center">{{ $course->created_at }}</td>
            <td>
                <div class="col text-center">
                  <a name="" id="" class="btn btn-primary" href="{{ route('course.show', $course->id) }}" role="button">Xem</a>
                    <button type="button" data-toggle="modal" data-target="#modalEditCourse"
                    data-name="{{ $course->name }}"
                    data-course_id="{{ $course->id }}"
                    data-subject_id="{{ $course->subject_id }}"
                    data-teacher_id="{{ $course->teacher_id }}"
                    data-start_date="{{ $course->start_date }}"
                    data-end_date="{{ $course->end_date }}"
                    data-location="{{ $course->location }}"
                    class="btn btn-primary edit-course">Cập nhật</button>
                    <button type="button" name="" data-id='{{ $course->id }}' data-target="#modalDeleteCourse" data-toggle="modal" class="btn btn-danger delete">Xóa</button>
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




<!-- Modal -->
<div class="modal fade" id="modalAddCourse" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Thêm học phần</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form action="{{ route('course.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                      <label for="subject_id">Chọn môn học</label>
                      <select class="form-control" name="subject_id" id="subject_id" onchange="getName();">
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Tên học phần</label>
                        <input type="text" class="form-control" name="name" id="name" aria-describedby="" placeholder="">
                      </div>
                      <div class="form-group">
                        <label for="teacher_id">Giảng viên giảng dạy</label>
                        <select name="teacher_id" id="teacher_id" class="form-control">
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                      </div>
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
                                <label for="location">Tại phòng học</label>
                                <input type="text" class="form-control" name="location" id="location" aria-describedby="" placeholder="">
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

<div class="modal fade" id="modalEditCourse" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Cập nhật học phần</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form action="{{ route('course.update', 'course') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <input type="hidden" name="id" id="course_id">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                      <label for="subject_id">Chọn môn học</label>
                      <select class="form-control" name="subject_id" id="data-subject_id" onchange="getName2()">
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Tên học phần</label>
                        <input type="text" class="form-control" name="name" id="data-name" aria-describedby="" placeholder="">
                      </div>
                      <div class="form-group">
                        <label for="teacher_id">Giảng viên giảng dạy</label>
                        <select name="teacher_id" id="data-teacher_id" class="form-control">
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="row">
                          <div class="col-6">
                              <div class="form-group">
                                <label for="start_date">Ngày bắt đầu</label>
                                <input type="date" class="form-control" name="start_date" id="data-start_date" aria-describedby="" placeholder="">
                              </div>
                          </div>
                          <div class="col-6">
                            <div class="form-group">
                              <label for="end_date">Ngày kết thúc</label>
                              <input type="date" class="form-control" name="end_date" id="data-end_date" aria-describedby="" placeholder="">
                            </div>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-12">
                              <div class="form-group">
                                <label for="location">Tại phòng học</label>
                                <input type="text" class="form-control" name="location" id="data-location" aria-describedby="" placeholder="">
                              </div>
                          </div>
                      </div>
                </div>
            </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy bỏ</button>
          <button type="submit" class="btn btn-success">Cập nhật</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!--DESTROY Modal -->
<div class="modal fade" id="modalDeleteCourse" tabindex="-1" aria-labelledby="modalDeleteCourse" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('course.destroy', 'test') }}" method="POST">
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
