@extends('admin.layouts.app')
@section('title')
    Lớp sinh hoạt
@endsection
@section('h4')
<h2 class="h2 text-white d-inline-block mb-0 display-3">Lớp sinh hoạt</h2>
@endsection
@section('content')
<div class="card">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Danh sách các lớp</h3>
            </div>
            <div class="col text-right">
              <button class="btn btn-success" data-toggle="modal" data-target="#modalAddActClass" >Thêm mới</button>
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
            <th class="text-left" scope="col">Tên lớp</th>
            <th scope="col">Thuộc về khoa</th>
            <th scope="col">Cố vấn học tập</th>
            <th scope="col">Ngày tạo</th>
            <th scope="col">Cập nhật lần cuối</th>
            <th scope="col">Hành động</th>
        </tr>
        </thead>
        <tbody>
        @php
            $stt = 1;
        @endphp
        @forelse ($actclasses as $actclass)
        <tr>
            <th class="text-center" scope="row">{{ $stt }}</th>
            <td>{{ $actclass->name }}</td>
            <td class="text-center">{{ $actclass->faculty }}</td>
            <td class="text-center">{{ $actclass->teacher }}</td>
            <td class="text-center">{{ $actclass->created_at }}</td>
            <td class="text-center">{{ $actclass->updated_at }}</td>
            <td>
                <div class="col text-center">
                    <button type="button" data-toggle="modal" data-target="#modalEditActClass"
                    data-name="{{ $actclass->name }}"
                    data-id="{{ $actclass->id }}"
                    data-faculty_id = "{{ $actclass->faculty_id }}"
                    data-teacher_id = "{{ $actclass->teacher_id }}"
                    class="btn btn-primary edit-actclass">Cập nhật</button>
                    <button type="button" name="" data-id='{{ $actclass->id }}' data-target="#modalDeleteActClass" data-toggle="modal" class="btn btn-danger delete">Xóa</button>
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
<div class="modal fade" id="modalAddActClass" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Thêm lớp mới</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form action="{{ route('actclass.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Tên lớp</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="" placeholder="">
              </div>
              <div class="form-group">
                <label for="faculty_id">Ngành học</label>
                <select name="faculty_id" id="faculty_id" class="form-control">
                    @foreach ($faculties as $faculty)
                        <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="teacher_id">Cố vấn học tập</label>
                <select name="teacher_id" id="teacher_id" class="form-control">
                    @foreach ($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                    @endforeach
                </select>
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
<div class="modal fade" id="modalEditActClass" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Cập nhật thông tin lớp</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="{{ route('actclass.update', 'actclass') }}" method="POST">
          @csrf
          @method('PATCH')
          <input type="hidden" name="actclass_id" id="actclass_id">
          <div class="form-group">
              <label for="name">Tên lớp</label>
              <input type="text" class="form-control" name="name" id="data-name" aria-describedby="" placeholder="">
            </div>
            <div class="form-group">
              <label for="faculty_id">Ngành học</label>
              <select name="faculty_id" id="data-faculty_id" class="form-control">
                  @foreach ($faculties as $faculty)
                      <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="teacher_id">Cố vấn học tập</label>
              <select name="teacher_id" id="data-teacher_id" class="form-control">
                  @foreach ($teachers as $teacher)
                      <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                  @endforeach
              </select>
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
<div class="modal fade" id="modalDeleteActClass" tabindex="-1" aria-labelledby="modalDeleteActClass" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('actclass.destroy', 'test') }}" method="POST">
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
