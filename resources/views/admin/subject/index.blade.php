@extends('admin.layouts.app')
@section('title')
    Quản lý môn học
@endsection
@section('h4')
<h2 class="display-3 text-white d-inline-block mb-0">Môn học</h2>
@endsection
@section('content')
<div class="card">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Danh sách các môn học</h3>
            </div>
            <div class="col text-right">
              <button class="btn btn-success" data-toggle="modal" data-target="#modalAddSubject" >Thêm mới</button>
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
            <th class="text-left" scope="col">Tên môn học</th>
            <th scope="col" class="text-left">Ảnh đại diện</th>
            <th scope="col">Thuộc về khoa</th>
            <th scope="col">Số tín chỉ</th>
            <th scope="col">Ngày tạo</th>
            <th scope="col">Hành động</th>
        </tr>
        </thead>
        <tbody>
        @php
            $stt = 1;
        @endphp
        @forelse ($subjects as $subject)
        <tr>
            <th class="text-center" scope="row">{{ $stt }}</th>
            <td>{{ $subject->name }}</td>
            <td><img src="{{ asset('img/subject/' . $subject->profile) }}" alt="" width="80" height="80" class="text-center"></td>
            <td class="text-center">{{ $subject->faculty }}</td>
            <td class="text-center">{{ $subject->credit }}</td>
            <td class="text-center">{{ $subject->created_at }}</td>
            <td>
                <div class="col text-center">
                    <button type="button" data-toggle="modal" data-target="#modalEditSubject"
                    data-name="{{ $subject->name }}"
                    data-subject="{{ $subject->id }}"
                    data-profile="{{ $subject->profile }}"
                    data-credit="{{ $subject->credit }}"
                    data-faculty_id = "{{ $subject->faculty_id }}"
                    data-description = "{{ $subject->description }}"
                    class="edit-subject btn btn-primary">Cập nhật</button>
                    <button type="button" name="" data-id='{{ $subject->id }}' data-target="#modalDeleteSubject" data-toggle="modal" class="btn btn-danger delete">Xóa</button>
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
<div class="modal fade" id="modalAddSubject" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Thêm môn học mới</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form action="{{ route('subject.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-7">
                    <div class="form-group">
                        <label for="name">Tên môn học</label>
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
                        <label for="credit">Số tín chỉ</label>
                        <input type="text" class="form-control" name="credit" id="credit" aria-describedby="" placeholder="">
                      </div>
                      <div class="form-group">
                        <label for="description">Mô tả môn học</label>
                        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                      </div>
                </div>
                <div class="col-3 offset-1">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset('default.png') }}" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">Ảnh đại diện</h5>
                          <div class="form-group">
                            <input type="file" class="form-control-file" name="profile" id="profile" placeholder="" aria-describedby="fileHelpId">
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
<div class="modal fade" id="modalEditSubject" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Cập nhật thông tin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="{{ route('subject.update', 'subject') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
          <input type="hidden" name="old_profile" id="data-old_profile">
          {{-- <input type="hidden" name="subject" id="data-id"> --}}
          <input type="hidden" name="subject_id" id="subject_id">
          <div class="row">
              <div class="col-7">
                  <div class="form-group">
                      <label for="name">Tên môn học</label>
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
                      <label for="credit">Số tín chỉ</label>
                      <input type="text" class="form-control" name="credit" id="data-credit" aria-describedby="" placeholder="">
                    </div>
                    <div class="form-group">
                      <label for="description">Mô tả môn học</label>
                      <textarea class="form-control" name="description" id="data-description" rows="3"></textarea>
                    </div>
              </div>
              <div class="col-3 offset-1">
                  <div class="card" style="width: 18rem;">
                      <img class="card-img-top" src="{{ asset('default.png') }}" height="250px" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">Ảnh đại diện</h5>
                        <div class="form-group">
                          <input type="file" class="form-control-file" name="profile" id="profile" placeholder="" aria-describedby="fileHelpId">
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
<div class="modal fade" id="modalDeleteSubject" tabindex="-1" aria-labelledby="modalDeleteSubject" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('subject.destroy', 'test') }}" method="POST">
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
