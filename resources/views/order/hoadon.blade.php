@extends('layouts.admin')

@section('title')
    <title>Tạo hóa đơn</title>
@endsection
@section('home')
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('thongtinthanhvien') }}" class="nav-link">Home</a>
    </li>
@endsection
@section('dangxuat')
    <ul class="navbar-nav ml-right">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('dangxuatthanhvien') }}" class="nav-link">Đăng xuất</a>
        </li>
    </ul>
@endsection
@section('quan')
    <a href="{{ route('dangnhapquan') }}" class="brand-link">
        <img src="{!! asset($thanhvien->hinhquan) !!}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ $thanhvien->tenquan }}</span>
    </a>
@endsection
@section('avatar')
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{!! asset($thanhvien->hinhtv) !!}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="{{ route('thongtinthanhvien') }}" class="d-block">{{ $thanhvien->hoten }}</a>
        </div>
    </div>
@endsection

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('thongtinthanhvien') }}">Thông tin thành
                                    viên</a>
                            </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">
                        <form action="{{ route('xemban') }}" method="get">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Chọn khu vực</label>
                                <select class="form-control" name="idkhuvuc">
                                    @foreach ($khuvuc as $key => $row)
                                        @if ($row->id == $idkhuvuc)
                                            <option value="{{ $row->id }}" selected>{{ $row->tenkhuvuc }}</option>
                                        @else
                                            <option value="{{ $row->id }}">{{ $row->tenkhuvuc }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Xem bàn</button>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-12">
                        @if ($errors->any())
                            <h3>{{ $errors->first() }}</h3>
                        @endif
                    </div>

                    @foreach ($ban as $key => $row)

                        @if ($row->trangthai == 0)
                            <div class="card" style="width: 114px; height: 285px;">
                                <form action="{{ route('taohoadon') }}" method="get">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="idkhuvuc" value="{{ $idkhuvuc }}">
                                    <input type="hidden" name="idban" value="{{ $row->id }}">
                                    <input type="image" src="{{ asset('storage/hinhanh/banranh.jpg') }}" alt="Submit"
                                        width="114px" height="100px">
                                </form>
                                <form action="{{ route('taohoadon') }}" method="get">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="idkhuvuc" value="{{ $idkhuvuc }}">
                                    <input type="hidden" name="idban" value="{{ $row->id }}">
                                    <input
                                        style="font-weight:bold; color:green; font-size:35px; text-align:center; background-color:white; border:none"
                                        type="submit" value="{{ Str::limit($row->tenban, 6, '..') }}">
                                </form>
                            </div>
                        @elseif($row->trangthai==1)
                            <div class="card" style="width: 114px; height: 285px;">
                                <a href="{{ route('tamtinhhoadon', ['id' => $row->id]) }}">
                                    <img class="card-img-top" src="{{ asset('storage/hinhanh/banban.jpg') }}"
                                        alt="Card image cap" width="100px" height="105px">
                                </a>
                                <a href="{{ route('tamtinhhoadon', ['id' => $row->id]) }}"
                                    style="font-weight:bold; color:red; font-size:35px; text-align:center;">
                                    {{ Str::limit($row->tenban, 6, '..') }}
                                </a>
                                <button class="btn btn-primary btn-sm"><a
                                        href="{{ route('doimonhoadon', ['id' => $row->id]) }}"
                                        style="font-weight:bold; color:black; font-size:22px; text-align:center;">Đổi
                                        món</a></button>
                                <button class="btn btn-warning btn-sm"><a
                                        href="{{ route('doibanhoadon', ['id' => $row->id]) }}"
                                        style="font-weight:bold; color:black; font-size:22px; text-align:center;">Đổi
                                        bàn</a></button>
                                <!--idban-->
                                <button stype="button" class="btn btn-danger  btn-sm">
                                    <a href="{{ route('deletehoadon', ['id' => $row->id]) }}">
                                        <i class="fas fa-trash-alt" style="font-size:30px; color:black; text-align:center;"></i>
                                    </a>
                                </button>

                            </div>
                        @endif

                    @endforeach



                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
