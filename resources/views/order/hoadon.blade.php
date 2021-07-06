@extends('layouts.admin')

@section('title')
  <title>Tạo hóa đơn</title>
@endsection
@section('home')
	<li class="nav-item d-none d-sm-inline-block">
		<a href="{{route('thongtinquan')}}" class="nav-link">Home</a>
    </li>
@endsection
@section('dangxuat')
	<ul class="navbar-nav ml-right">
      	<li class="nav-item d-none d-sm-inline-block">
        	<a href="{{route('dangxuatthanhvien')}}" class="nav-link">Đăng xuất</a>
      	</li>
    </ul>
@endsection
@section('quan')
	<a href="{{route('dangnhapquan')}}" class="brand-link">
  		<img src="{{$thanhvien->hinhquan}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      	<span class="brand-text font-weight-light">{{$thanhvien->tenquan}}</span>
	</a>
@endsection
@section('avatar')
	<div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          	<img src="{{$thanhvien->hinhtv}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          	<a href="{{route('thongtinthanhvien')}}" class="d-block">{{$thanhvien->hoten}}</a>
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
                <h1 class="m-0">Hóa đơn</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('thongtinthanhvien')}}">Thông tin thành viên</a></li>
                <li class="breadcrumb-item"><a href="#">Hóa đơn</a></li>
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
                <form action="{{route('xemban')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Chọn khu vực</label>
                        <select class="form-control" name="idkhuvuc">
                        @foreach($khuvuc as $key => $row)
                        @if($row->id == $idkhuvuc)
                        <option value="{{$row->id}}" selected>{{$row->tenkhuvuc}}</option>
                        @else
                        <option value="{{$row->id}}">{{$row->tenkhuvuc}}</option>
                        @endif
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">Xem bàn</button>
                    </div>
                </form>
            </div>
			
            @foreach($ban as $key => $row)
            <span class="border border-success">
            <form action="" method="post">

            <img src="/storage/hinhanh/ban.png" class="rounded-circle" width="150px" height="100px">
            <h3 style="text-align: center">{{$row->tenban}}</h3><br>
            <button type="submit">Tạo hóa đơn</button>
            </form>
            <a href="{{route('taohoadon')}}"></a>
            
            </span>
            @endforeach

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection