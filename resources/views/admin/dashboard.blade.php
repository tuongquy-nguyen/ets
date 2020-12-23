@extends('admin.layouts.app')
@section('h4')
<h4 class="display-3 h2 text-white d-inline-block mb-0">Bảng tổng quan</h4>
@endsection
@section('status')
    <!-- Card stats -->
    <div class="row">
        <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
            <div class="row">
                <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Số lượng sinh viên</h5>
                <span class="h2 font-weight-bold mb-0">120</span>
                </div>
                <div class="col-auto">
                <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                    <i class="ni ni-active-40"></i>
                </div>
                </div>
            </div>
            <p class="mt-3 mb-0 text-sm">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                <span class="text-nowrap">Since last month</span>
            </p>
            </div>
        </div>
        </div>
        <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
            <div class="row">
                <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Số lượng giảng viên</h5>
                <span class="h2 font-weight-bold mb-0">21</span>
                </div>
                <div class="col-auto">
                <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                    <i class="ni ni-chart-pie-35"></i>
                </div>
                </div>
            </div>
            <p class="mt-3 mb-0 text-sm">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                <span class="text-nowrap">Since last month</span>
            </p>
            </div>
        </div>
        </div>
        <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
            <div class="row">
                <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Số lượng các học phần</h5>
                <span class="h2 font-weight-bold mb-0">27</span>
                </div>
                <div class="col-auto">
                <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                    <i class="ni ni-money-coins"></i>
                </div>
                </div>
            </div>
            <p class="mt-3 mb-0 text-sm">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                <span class="text-nowrap">Since last month</span>
            </p>
            </div>
        </div>
        </div>
        <div class="col-xl-3 col-md-6">
        <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
            <div class="row">
                <div class="col">
                <h5 class="card-title text-uppercase text-muted mb-0">Các lớp sinh hoạt</h5>
                <span class="h2 font-weight-bold mb-0">4</span>
                </div>
                <div class="col-auto">
                <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                    <i class="ni ni-chart-bar-32"></i>
                </div>
                </div>
            </div>
            <p class="mt-3 mb-0 text-sm">
                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                <span class="text-nowrap">Since last month</span>
            </p>
            </div>
        </div>
        </div>
    </div>
@endsection
@section('title')
    Dashboard
@endsection
