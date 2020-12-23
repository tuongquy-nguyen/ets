@extends('admin.layouts.app')
@section('title')
    Quản lý sinh viên
@endsection
@section('h4')
<h1 class=" text-white d-inline-block mb-0 display-3">Sinh viên</h1>
@endsection
@section('content')
<div class="card">
    <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Danh sách Sinh viên</h3>
            </div>
            <div class="col text-right">
              <button class="btn btn-success" data-toggle="modal" data-target="#modalAddStudent" >Thêm mới</button>
            </div>
        </div>
        <div class="row">
            @include('common.errors')
        </div>
    </div>
    <div class="table-responsive">
    <!-- Projects table -->
    <table class="table align-items-center table-flush">
        <thead class="thead-light">
        <tr>
            <th scope="col">STT</th>
            <th class="text-left" scope="col">Họ và Tên</th>
            <th class="text-left" scope="col">Ảnh đại diện</th>
            <th scope="col">Địa chỉ Email</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Giới tính</th>
            <th class="text-left" scope="col">Lớp sinh hoạt</th>
            <th scope="col">Ngày tạo</th>
            <th scope="col" class="text-center">Hành động</th>
        </tr>
        </thead>
        <tbody>
        @php
            $stt = 1;
        @endphp
        @forelse ($students as $student)
        <tr>
            <th class="text-center" scope="row">{{ $stt }}</th>
            <td>{{ $student->name }}</td>
            <td><img src="{{ asset('img/student/' . $student->profile) }}" alt="" width="120" height="120"></td>
            <td>{{ $student->email }}</td>
            <td>{{ $student->phone }}</td>
            <td>{{ $student->vgender }}</td>
            <td>{{ $student->actclass }}</td>
            <td>{{ $student->created_at }}</td>
            <td>
                <div class="col text-center">
                    <button type="button" data-toggle="modal" data-target="#modalEditStudent"
                    data-name="{{ $student->name }}"
                    data-student_id="{{ $student->id }}"
                    data-student_no="{{ $student->student_no}}"
                    data-vgender = "{{ $student->vgender }}"
                    data-profile = "{{ $student->profile }}"
                    data-phone = "{{ $student->phone }}"
                    data-actclass_id = "{{ $student->actclass_id }}"
                    data-dob = "{{ $student->dob }}"
                    data-birthplace = "{{ $student->birthplace }}"
                    data-nationality = "{{ $student->nationality }}"
                    data-folk = "{{ $student->folk }}"
                    data-religion = "{{ $student->religion }}"
                    data-id_card_no = "{{ $student->id_card_no }}"
                    data-id_card_date = "{{ $student->id_card_date }}"
                    data-id_card_place = "{{ $student->id_card_place }}"
                    data-father_name = "{{ $student->father_name }}"
                    data-father_phone = "{{ $student->father_phone }}"
                    data-mother_name = "{{ $student->mother_name }}"
                    data-mother_phone = "{{ $student->mother_phone }}"
                    data-address = "{{ $student->address }}"
                    data-email = "{{ $student->email }}"
                    class="btn btn-primary edit-student">Cập nhật</button>
                    <button type="button"
                    name="" data-id='{{ $student->id }}'
                    data-user_id = '{{ $student->user_id }}' data-target="#modalDeleteStudent" data-toggle="modal" class="btn btn-danger delete">Xóa</button>
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
<div class="modal fade" id="modalAddStudent" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Thêm sinh viên mới</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form action="{{ route('student.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="student_id" id="data-student_id">
            <input type="hidden" name="old_profile" id="data-old_profile">
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
                  <label for="faculty_id">Lớp sinh hoạt</label>
                  <select class="form-control" name="actclass_id" id="actclass_id">
                    @foreach ($actclasses as $actclass)
                        <option value="{{ $actclass->id }}">{{ $actclass->name }}</option>
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
                        <label for="phone">Số điện thoại liên hệ</label>
                        <input type="text" class="form-control" name="phone" id="phone" aria-describedby="" placeholder="">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="address">Địa chỉ thường trú</label>
                        <textarea class="form-control" name="address" id="address" rows="1"></textarea>
                    </div>
                </div>
            </div>
            {{-- ==================================================== --}}
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="student_no">Mã sinh viên</label>
                        <input type="text"
                          class="form-control" name="student_no" id="student_no" aria-describedby="helpId" placeholder="">
                    </div>
                </div>

              <div class="col-3">
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
            {{-- ======================================================== --}}
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="father_name">Họ và tên Cha</label>
                        <input type="text" class="form-control" name="father_name" id="father_name" aria-describedby="" placeholder="">
                      </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="father_phone">Số điện thoại:</label>
                        <input type="tel" class="form-control" name="father_phone" id="father_phone" aria-describedby="" placeholder="">
                      </div>
                </div>
                <div class="col-3">
                        <div class="form-group">
                            <label for="mother_name">Họ và tên Mẹ</label>
                        <input type="text" class="form-control" name="mother_name" id="mother_name" aria-describedby="" placeholder="">
                  </div></div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="mother_phone">Số điện thoại:</label>
                        <input type="tel" class="form-control" name="mother_phone" id="mother_phone" aria-describedby="" placeholder="">
                      </div>
                </div>
            </div>

          {{-- =========================================================== --}}
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
<div class="modal fade" id="modalEditStudent" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Cập nhật thông tin sinh viên</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form action="{{ route('student.update', 'student') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <input type="hidden" name="student_id" id="student_id">
            <input type="hidden" name="old_profile" id="old_profile">
            <div class="row">
              <div class="col-4">
                <div class="form-group">
                  <label for="name">Họ và tên</label>
                  <input type="text" class="form-control" name="name" id="data-name" aria-describedby="helpId" placeholder="">
                </div>
                <div class="form-group">
                  <label for="gender">Giới tính</label>
                  <select class="form-control" name="gender" id="data-gender">
                    <option id="#old_gender" value="" hidden>Chọn giới tính</option>
                    <option value="1">Nam</option>
                    <option value="0">Nữ</option>
                    <option value="2">Khác</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="actclass_id">Lớp sinh hoạt</label>
                  <select class="form-control" name="actclass_id" id="data-actclass_id">
                    @foreach ($actclasses as $actclass)
                        <option value="{{ $actclass->id }}">{{ $actclass->name }}</option>
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
                  <input type="email" class="form-control" name="email" id="data-email" aria-describedby="emailHelpId" placeholder="" disabled>
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
                  <img class="card-img-top" src="{{ asset('default.png') }}" height="250px" id="student-profile" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title">Ảnh đại diện</h5>
                    <div class="form-group">
                      <input type="file" class="form-control-file" name="profile" id="data-profile" placeholder="" aria-describedby="fileHelpId">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            {{-- ==================================================== --}}
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="phone">Số điện thoại liên hệ</label>
                        <input type="text" class="form-control" name="phone" id="data-phone" aria-describedby="" placeholder="">
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="address">Địa chỉ thường trú</label>
                        <textarea class="form-control" name="address" id="data-address" rows="1"></textarea>
                    </div>
                </div>
            </div>
            {{-- ==================================================== --}}
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="student_no">Mã sinh viên</label>
                        <input type="text"
                          class="form-control" name="student_no" id="data-student_no" aria-describedby="helpId" placeholder="">
                    </div>
                </div>

              <div class="col-3">
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
            {{-- ======================================================== --}}
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="father_name">Họ và tên Cha</label>
                        <input type="text" class="form-control" name="father_name" id="data-father_name" aria-describedby="" placeholder="">
                      </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="father_phone">Số điện thoại:</label>
                        <input type="tel" class="form-control" name="father_phone" id="data-father_phone" aria-describedby="" placeholder="">
                      </div>
                </div>
                <div class="col-3">
                        <div class="form-group">
                            <label for="mother_name">Họ và tên Mẹ</label>
                        <input type="text" class="form-control" name="mother_name" id="data-mother_name" aria-describedby="" placeholder="">
                  </div></div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="mother_phone">Số điện thoại:</label>
                        <input type="tel" class="form-control" name="mother_phone" id="data-mother_phone" aria-describedby="" placeholder="">
                      </div>
                </div>
            </div>

          {{-- =========================================================== --}}
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
<div class="modal fade" id="modalDeleteStudent" tabindex="-1" aria-labelledby="modalDeleteStudent" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('student.destroy', 'test') }}" method="POST">
        <div class="modal-body">
            @csrf
            @method('DELETE')
            <input type="hidden" id="id" value="id" name="id">
            <input type="hidden" name="user_id" id="user_id">
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
