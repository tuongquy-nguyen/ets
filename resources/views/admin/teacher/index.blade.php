@extends('admin.layouts.app')
@section('title')
    Giảng viên
@endsection
@section('h4')
<h4 class="display-3 h2 text-white d-inline-block mb-0">Giảng viên</h4>
@endsection
@section('content')
<div class="card">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Danh sách Giảng viên</h3>
            </div>
            <div class="col text-right">
              <button class="btn btn-success" data-toggle="modal" data-target="#modalAddTeacher" >Thêm mới</button>
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
            <th class="text-left" scope="col">Họ và Tên</th>
            <th class="text-left" scope="col">Ảnh đại diện</th>
            <th scope="col">Địa chỉ Email</th>
            <th scope="col">Giới tính</th>
            <th class="text-left" scope="col">Khoa</th>
            <th class="text-left" scope="col">Ngày sinh</th>
            <th scope="col">Ngày tạo</th>
            <th scope="col">Cập nhật lần cuối</th>
            <th scope="col">Hành động</th>
        </tr>
        </thead>
        <tbody>
        @php
            $stt = 1;
        @endphp
        @forelse ($teachers as $teacher)
        <tr>
            <th class="text-center" scope="row">{{ $stt }}</th>
            <td>{{ $teacher->name }}</td>
            <td><img src="{{ asset('img/teacher/' . $teacher->profile) }}" alt="" width="120" height="120"></td>
            <td>{{ $teacher->email }}</td>
            <td>{{ $teacher->gender }}</td>
            <td>{{ $teacher->teacher }}</td>
            <td>{{ $teacher->dob }}</td>
            <td class="text-center">{{ $teacher->created_at }}</td>
            <td class="text-center">{{ $teacher->updated_at }}</td>
            <td>
                <div class="col text-center">
                    <button type="button" data-toggle="modal" data-target="#modalEditTeacher"
                    data-name="{{ $teacher->name }}"
                    data-teacher_id="{{ $teacher->id }}"
                    data-gender = "{{ $teacher->gender }}"
                    data-profile = "{{ $teacher->profile }}"
                    data-faculty_id = "{{ $teacher->faculty_id }}"
                    data-dob = "{{ $teacher->dob }}"
                    data-birthplace = "{{ $teacher->birthplace }}"
                    data-nationality = "{{ $teacher->nationality }}"
                    data-folk = "{{ $teacher->folk }}"
                    data-religion = "{{ $teacher->religion }}"
                    data-id_card_no = "{{ $teacher->id_card_no }}"
                    data-id_card_date = "{{ $teacher->id_card_date }}"
                    data-id_card_place = "{{ $teacher->id_card_place }}"
                    data-address = "{{ $teacher->address }}"
                    data-email = "{{ $teacher->email }}"
                    class="btn btn-primary edit-teacher">Cập nhật</button>
                    <button type="button" name="" data-id='{{ $teacher->id }}' data-target="#modalDeleteTeacher" data-toggle="modal" class="btn btn-danger delete">Xóa</button>
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
<div class="modal fade" id="modalAddTeacher" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Thêm mới</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form action="{{ route('teacher.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                  <label for="name">Họ và tên</label>
                  <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group">
                  <label for="gender">Giới tính</label>
                  <select class="form-control" name="gender" id="gender">
                    <option id="#old_gender" value="" hidden>Chọn giới tính</option>
                    <option value="1">Nam</option>
                    <option value="0">Nữ</option>
                    <option value="2">Khác</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="faculty_id">Khoa</label>
                  <select class="form-control" name="faculty_id" id="faculty_id">
                    @foreach ($faculties as $faculty)
                        <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="folk">Dân tộc</label>
                  <input type="text" class="form-control" name="folk" id="folk" aria-describedby="helpId" placeholder="">
                </div>
              </div>
              {{-- ====================================== --}}
              <div class="col-4">
                <div class="form-group">
                  <label for="email">Địa chỉ email</label>
                  <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelpId" placeholder="">
                </div>

                <div class="form-group">
                  <label for="dob">Ngày sinh</label>
                  <input type="date" name="dob" id="" class="form-control">
                </div>

                <div class="form-group">
                  <label for="birthplace">Nơi sinh</label>
                  <input type="text" class="form-control" name="birthplace" id="birthplace" aria-describedby="helpId" placeholder="">
                </div>

                <div class="form-group">
                  <label for="religion">Tôn giáo</label>
                  <input type="text" class="form-control" name="religion" id="religion" aria-describedby="helpId" placeholder="">
                </div>
              </div>
            {{-- ======================================== --}}
              <div class="col-3">
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
            {{-- ==================================================== --}}
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <label for="id_card_no">Số CMND/CCCD</label>
                  <input type="text" class="form-control" name="id_card_no" id="id_card_no" aria-describedby="" placeholder="">
                </div>
              </div>
              {{-- ============================ --}}
              <div class="col-3">
                <div class="form-group">
                  <label for="id_card_date">Ngày cấp</label>
                  <input type="date" class="form-control" name="id_card_date" id="id_card_date" aria-describedby="" placeholder="">
                </div>
              </div>
              {{-- ================================= --}}
              <div class="col-3">
                <div class="form-group">
                  <label for="id_card_place">Nơi cấp</label>
                  <input type="text" class="form-control" name="id_card_place" id="id_card_place" aria-describedby="helpId" placeholder="">
                </div>
              </div>
            </div>
          {{-- =========================================================== --}}
          <div class="form-group">
            <label for="address">Địa chỉ thường trú</label>
            <textarea class="form-control" name="address" id="address" rows="3"></textarea>
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
<div class="modal fade" id="modalEditTeacher" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Cập nhật thông tin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form action="{{ route('teacher.update', 'test') }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
          <input type="hidden" name="teacher_id" id="teacher_id">
          <div class="row">
            <div class="col-4">
              <div class="form-group">
                <label for="name">Họ và tên</label>
                <input type="text" class="form-control" name="name" id="data-name" aria-describedby="helpId" placeholder="">
              </div>
              <div class="form-group">
                <label for="gender">Giới tính</label>
                <select class="form-control" name="gender" id="data-gender">
                  <option hidden>Chọn giới tính</option>
                  <option value="1">Nam</option>
                  <option value="0">Nữ</option>
                  <option value="2">Khác</option>
                </select>
              </div>
              <div class="form-group">
                <label for="faculty_id">Khoa</label>
                <select class="form-control" name="faculty_id" id="data-faculty_id">
                  @foreach ($faculties as $faculty)
                      <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                <label for="folk">Dân tộc</label>
                <input type="text" class="form-control" name="folk" id="data-folk" aria-describedby="helpId" placeholder="">
              </div>
            </div>
            {{-- ====================================== --}}
            <div class="col-4">
              <div class="form-group">
                <label for="email">Địa chỉ email</label>
                <input disabled type="email" class="form-control" name="email" id="data-email" aria-describedby="emailHelpId" placeholder="">
              </div>

              <div class="form-group">
                <label for="dob">Ngày sinh</label>
                <input type="date" name="dob" id="data-dob" class="form-control">
              </div>

              <div class="form-group">
                <label for="birthplace">Nơi sinh</label>
                <input type="text" class="form-control" name="birthplace" id="data-birthplace" aria-describedby="helpId" placeholder="">
              </div>

              <div class="form-group">
                <label for="religion">Tôn giáo</label>
                <input type="text" class="form-control" name="religion" id="data-religion" aria-describedby="helpId" placeholder="">
              </div>
            </div>
          {{-- ======================================== --}}
            <div class="col-3">
              <div class="card" style="width: 18rem;">
                <img id="card-img-top" class="card-img-top" style="height: 250px" src="" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">Ảnh đại diện</h5>
                  <div class="form-group">
                    <input type="file" class="form-control-file" name="updateprofile" id="updateprofile" placeholder="" aria-describedby="fileHelpId">
                    <input type="hidden" name="old_profile" id="old_profile">
                  </div>
                </div>
              </div>
            </div>
          </div>
          {{-- ==================================================== --}}
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="id_card_no">Số CMND/CCCD</label>
                <input type="text" class="form-control" name="id_card_no" id="data-id_card_no" aria-describedby="" placeholder="">
              </div>
            </div>
            {{-- ============================ --}}
            <div class="col-3">
              <div class="form-group">
                <label for="id_card_date">Ngày cấp</label>
                <input type="date" class="form-control" name="id_card_date" id="data-id_card_date" aria-describedby="" placeholder="">
              </div>
            </div>
            {{-- ================================= --}}
            <div class="col-3">
              <div class="form-group">
                <label for="id_card_place">Nơi cấp</label>
                <input type="text" class="form-control" name="id_card_place" id="data-id_card_place" aria-describedby="helpId" placeholder="">
              </div>
            </div>
          </div>
        {{-- =========================================================== --}}
        <div class="form-group">
          <label for="address">Địa chỉ thường trú</label>
          <textarea class="form-control" name="address" id="data-address" rows="3"></textarea>
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
<div class="modal fade" id="modalDeleteTeacher" tabindex="-1" aria-labelledby="modalDeleteTeacher" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('teacher.destroy', 'test') }}" method="POST">
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
