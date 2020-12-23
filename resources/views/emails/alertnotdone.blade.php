@component('mail::message')
# Thông báo

Hiện đang có tiến trình bạn chưa hoàn thành.
Vui lòng hoàn thành và cập nhật để không bị ảnh hưởng tới kết quả học tập.
<br>
<strong>Thông tin tiến trình:</strong>
<p>{{ $data->title }}</p>
<br>
<strong>Bắt đầu vào:</strong>
<p>{{ $data->start_date }}</p>
<br>
<strong>Kết thúc vào:</strong>
<p>{{ $data->end_date }}</p>
<br>
<strong>Nhiệm vụ:</strong>
<p>{{ $data->mission }}</p>
<br>
<strong>Bạn vui lòng truy cập ETS để xem bài tập của mình</strong>

Xin cảm ơn,
Education Tracking System<br>
{{ config('app.name') }}
@endcomponent
