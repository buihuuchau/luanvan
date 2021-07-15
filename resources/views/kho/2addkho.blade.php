@extends('layouts.admin')

@section('title')
  <title>Thêm kho</title>
@endsection
@section('home')
	<li class="nav-item d-none d-sm-inline-block">
		<a href="{{route('thongtinthanhvien')}}" class="nav-link">Home</a>
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
                <h1 class="m-0">Thêm kho</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('thongtinthanhvien')}}">Thông tin thành viên</a></li>
                <li class="breadcrumb-item"><a href="{{route('quanlykho')}}">Quản lý kho</a></li>
                <li class="breadcrumb-item"><a href="">Thêm kho</a></li>
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

            <form action="{{route('doaddkho')}}" method="post">
				{{csrf_field()}}
                <div class="form-group">
                    <label>Chọn nguyên liệu</label>
                    <select class="form-control" name="idnguyenlieu">
                    @foreach($nguyenlieu as $key => $row)
                        <option value="{{$row->id}}">{{$row->tennguyenlieu}}/{{$row->donvitinh}}-{{$row->xuatxu}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Đơn giá</label>
                    <input type="number" class="form-control" name="dongia" placeholder="Tính tới hàng đơn vị" required><br>
                </div>
                <div class="form-group">
                    <label>Số lượng</label>
                    <input type="number" class="form-control" name="soluong" required><br>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </form>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
