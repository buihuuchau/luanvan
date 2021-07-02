@extends('layouts.admin')

@section('title')
  <title>Sửa ca làm</title>
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
  		<img src="{!!asset($thanhvien->hinhquan)!!}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      	<span class="brand-text font-weight-light">{{$thanhvien->tenquan}}</span>
	</a>
@endsection
@section('avatar')
	<div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          	<img src="{!!asset($thanhvien->hinhtv)!!}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          	<a href="{{route('thongtinthanhvien')}}" class="d-block">{{$thanhvien->hoten}}</a>
        </div>
    </div>
@endsection
@section('chucnang')
	<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          	<li class="nav-item">
            	<a href="{{route('quanlykhuvuc')}}" class="nav-link">
              	<i class="nav-icon fas fa-th"></i>
              	<p>
               		Quản lý khu vực
              	</p>
            	</a>
          	</li>
              <li class="nav-item">
            	<a href="{{route('quanlyban')}}" class="nav-link">
              	<i class="nav-icon fas fa-th"></i>
              	<p>
               		Quản lý bàn
              	</p>
            	</a>
          	</li>
        </ul>
    </nav>
@endsection

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Sửa ca làm</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('thongtinthanhvien')}}">Thông tin thành viên</a></li>
                <li class="breadcrumb-item"><a href="{{route('quanlycalam')}}">Quản lý ca làm</a></li>
                <li class="breadcrumb-item"><a href="">Sửa ca làm</a></li>
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

            <form action="{{route('doeditcalam')}}" method="post">
				{{csrf_field()}}
				@if($errors->any())
					<h3>{{$errors->first()}}</h3>
				@endif
                <input type="hidden" name="id" value="{{$calam->id}}">
                <div class="form-group">
                    <label>Tên ca làm</label>
                    <input type="text" class="form-control" name="tencalam" value="{{$calam->tencalam}}" required><br>
                    <label>Từ giờ</label>
                    <input type="time" class="form-control" name="tu" value="{{$calam->tu}}" required><br>
                    <label>Đến giờ</label>
                    <input type="time" class="form-control" name="den" value="{{$calam->den}}" required><br>

                    <button type="submit" class="btn btn-primary">Lưu chỉnh sửa</button>
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
