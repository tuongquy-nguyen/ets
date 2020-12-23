@component('mail::message')
# Thông báo

{{-- Giảng viên <strong>{{ $teacher }}</strong> vừa tạo một tiến trình mới trong học phần mà bạn đang học. --}}

@component('mail::panel')
<div class="row">
    <div class="col-lg-8">
        <button type="button" class="btn-icon-clipboard">
          <div>
            <i class="ni ni-hat-3"></i>
            <span>Tiến trình: <strong>{{ $data->title }}</strong></span>
          </div>
        </button>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <button type="button" class="btn-icon-clipboard">
          <div>
            <i class="ni ni-hat-3"></i>
            <span>Ngày bắt đầu: <strong>{{ Carbon\Carbon::parse($data->start_date)->format('d/m/Y') }}</strong></span>
          </div>
        </button>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <button type="button" class="btn-icon-clipboard">
          <div>
            <i class="ni ni-hat-3"></i>
            <span>Ngày kết thúc: <strong>{{ Carbon\Carbon::parse($data->end_date)->format('d/m/Y') }}</strong></span>
          </div>
        </button>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <button type="button" class="btn-icon-clipboard">
          <div>
            <i class="ni ni-hat-3"></i>
            <span>Nhiệm vụ: </span>
          </div>
        </button>
    </div>
</div>
{{ $data->mission }}

@endcomponent

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}


Được gửi từ Education Tracking System,<br>
{{ config('app.name') }}
@endcomponent
