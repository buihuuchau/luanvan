@extends('layouts.admin')

@section('title')
    <title>Chỉnh sửa bàn</title>
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
                        <h1 class="m-0">Đổi bàn</h1>
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
                        <form action="{{ route('doikhuvuchoadon') }}" method="get">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $id }}">
                            <input type="hidden" name="idbancu" value="{{ $idbancu }}">
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
                                <button type="submit" class="btn btn-primary">Đổi khu vực</button>
                            </div>
                        </form>
                    </div>

                    @foreach ($ban as $key => $row)

                        <div class="card" style="width: 114px; height: 162px;">
                            <form action="{{ route('dodoibanhoadon') }}" method="get">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $id }}">
                                <input type="hidden" name="idkhuvuc" value="{{ $idkhuvuc }}">
                                <input type="hidden" name="idbancu" value="{{ $idbancu }}">
                                <input type="hidden" name="idban" value="{{ $row->id }}">
                                <input type="image" src="{{ asset('storage/hinhanh/banranh.jpg') }}" alt="Submit"
                                    width="114px" height="100px">
                            </form>
                            <form action="{{ route('dodoibanhoadon') }}" method="get">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $id }}">
                                <input type="hidden" name="idkhuvuc" value="{{ $idkhuvuc }}">
                                <input type="hidden" name="idbancu" value="{{ $idbancu }}">
                                <input type="hidden" name="idban" value="{{ $row->id }}">
                                <input style="font-weight:bold; color:green; font-size:35px; text-align:center; background-color:white; border:none;"
                                    type="submit" value="{{ Str::limit($row->tenban, 6, '..') }}">
                            </form>
                        </div>

                    @endforeach

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

@endsection
