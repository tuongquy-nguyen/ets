@extends('admin.layouts.app')
@section('title')
    Khoa & Ngành
@endsection
@section('h4')
<h4 class="display-3 h2 text-white d-inline-block mb-0">Khoa & Ngành</h4>
@endsection
@section('content')
<div class="card">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Danh sách Khoa & Ngành học</h3>
            </div>
            <div class="col text-right">
              <button class="btn btn-success" data-toggle="modal" data-target="#modalAddFaculty" >Thêm mới</button>
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
            <th class="text-left" scope="col">Tên</th>
            <th scope="col">Thuộc về khoa</th>
            <th scope="col">Ngày tạo</th>
            <th scope="col">Cập nhật lần cuối</th>
            <th scope="col">Hành động</th>
        </tr>
        </thead>
        <tbody>
        @php
            $stt = 1;
        @endphp
        @forelse ($faculties as $faculty)
        <tr>
            <th class="text-center" scope="row">{{ $stt }}</th>
            <td>{{ $faculty->name }}</td>
            <td class="text-center">{{ $faculty->belong_to }}</td>
            <td class="text-center">{{ $faculty->created_at }}</td>
            <td class="text-center">{{ $faculty->updated_at }}</td>
            <td>
                <form action="{{ route('faculty.destroy', [$faculty->id]) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                <div class="col text-center">
                    <button type="button" data-toggle="modal" data-target="#modalEditFaculty"
                    data-name="{{ $faculty->name }}"
                    data-id="{{ $faculty->id }}"
                    data-parent_id="{{ $faculty->parent_id }}"
                    class="btn btn-primary edit">Cập nhật</button>
                    <button type="button" name="" data-id='{{ $faculty->id }}' data-target="#modalDeleteFaculty" data-toggle="modal" class="btn btn-danger delete">Xóa</button>
                </div>
                </form>
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
<div class="modal fade" id="modalAddFaculty" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Thêm mới</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form action="{{ route('faculty.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Tên</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="" placeholder="">
              </div>
              <div class="form-group">
                <label for="name">Thuộc về khoa (Để trống nếu đã là khoa)</label>
                <select name="parent_id" id="parent_id" class="form-control">
                    <option value="">Đã là khoa</option>
                    @foreach ($supers as $super)
                        <option value="{{ $super->id }}">{{ $super->name }}</option>
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

  <!--Edit Modal -->
<div class="modal fade" id="modalEditFaculty" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Cập nhật</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form action="{{ route('faculty.update','test') }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Tên</label>
                <input type="text" class="form-control" name="name" id="data-name" aria-describedby="" placeholder="">
              </div>
              <div class="form-group">
                <label for="parent_id">Thuộc về khoa (Để trống nếu đã là khoa)</label>
                <select name="parent_id" id="data-parent_id" class="form-control">
                    @foreach ($supers as $super)
                        <option value="{{ $super->id }}">{{ $super->name }}</option>
                    @endforeach
                </select>
                <input type="hidden" name="faculty_id" id="faculty_id">
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
<div class="modal fade" id="modalDeleteFaculty" tabindex="-1" aria-labelledby="modalDeleteFaculty" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('faculty.destroy', 'test') }}" method="post">
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
