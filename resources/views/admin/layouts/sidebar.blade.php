<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
<div class="scrollbar-inner">
    <!-- Brand -->
    <div class="sidenav-header d-flex align-items-center">
    <a class="navbar-brand" href="#">
        <h3>ETS</h3>
    </a>
    <div class="ml-auto">
        <!-- Sidenav toggler -->
        <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
        <div class="sidenav-toggler-inner">
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
        </div>
        </div>
    </div>
    </div>
    <div class="navbar-inner">
    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Nav items -->
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="#navbar-dashboards" data-toggle="collapse" role="button" aria-expanded="" aria-controls="navbar-dashboards">
            <i class="ni ni-shop text-primary"></i>
            <span class="nav-link-text">Khoa và lớp</span>
            </a>
            <div class="collapse" id="navbar-dashboards">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                <a href="{{ route('faculty.index') }}" class="nav-link">Quản lý khoa & ngành</a>
                </li>
                <li class="nav-item">
                <a href="{{ route('actclass.index') }}" class="nav-link">Quản lý các lớp</a>
                </li>
            </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#navbar-student" data-toggle="collapse" role="button" aria-expanded="" aria-controls="navbar-student">
            <i class="ni ni-shop text-primary"></i>
            <span class="nav-link-text">Giảng viên & Sinh viên</span>
            </a>
            <div class="collapse" id="navbar-student">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                <a href="{{ route('student.index') }}" class="nav-link">Quản lý sinh viên</a>
                </li>
                <li class="nav-item">
                <a href="{{ route('teacher.index') }}" class="nav-link">Quản lý giảng viên</a>
                </li>
            </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#navbar-subject" data-toggle="collapse" role="button" aria-expanded="" aria-controls="navbar-subject  ">
            <i class="ni ni-shop text-primary"></i>
            <span class="nav-link-text">Môn học & Học phần</span>
            </a>
            <div class="collapse" id="navbar-subject">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                <a href="{{ route('subject.index') }}" class="nav-link">Các môn học</a>
                </li>
                <li class="nav-item">
                <a href="{{ route('course.index') }}" class="nav-link">Các học phần</a>
                </li>
            </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#navbar-user" data-toggle="collapse" role="button" aria-expanded="" aria-controls="navbar-user">
            <i class="ni ni-shop text-primary"></i>
            <span class="nav-link-text">Tài khoản & Phân quyền</span>
            </a>
            <div class="collapse" id="navbar-user">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link">Quản lý tài khoản</a>
                </li>
                <li class="nav-item">
                <a href="#" class="nav-link">Phân quyền</a>
                </li>
            </ul>
            </div>
        </li>

        </ul>
    </div>
    </div>
</div>
</nav>
