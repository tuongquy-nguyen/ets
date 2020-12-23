@component('mail::message')
# Xin chào, {{ $data->name }}

Tài khoản của bạn đã được quản trị viên thêm vào hệ thống ETS!
<br>
Email: <strong>{{ $data->email }}</strong>
<br>
Mật khẩu của bạn là: <strong>{{ explode('@', $data->email)[0] }}</strong>


Xin cảm ơn,
Education Tracking System<br>
{{ config('app.name') }}
@endcomponent
