@extends('layouts.admin')

@section('title')
  <title>Sửa nguyên liệu</title>
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
                <h1 class="m-0">Sửa nguyên liệu</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('thongtinthanhvien')}}">Thông tin thành viên</a></li>
                <li class="breadcrumb-item"><a href="{{route('quanlynguyenlieu')}}">Quản lý nguyên liệu</a></li>
                <li class="breadcrumb-item"><a href="">Sửa nguyên liệu</a></li>
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

            <form action="{{route('doeditnguyenlieu')}}" method="post">
				{{csrf_field()}}
				@if($errors->any())
					<h3>{{$errors->first()}}</h3>
				@endif
                <input type="hidden" name="id" value="{{$nguyenlieu->id}}">
                <div class="form-group">
                    <label>Tên nguyên liệu</label>
                    <input type="text" class="form-control" name="tennguyenlieu" value="{{$nguyenlieu->tennguyenlieu}}" required><br>
                    <label>Xuất xứ</label>
                    <input type="text" class="form-control" name="xuatxu" value="{{$nguyenlieu->xuatxu}}" required><br>
                    <label>Đơn vị tính</label>
                    <input type="text" class="form-control" name="donvitinh" value="{{$nguyenlieu->donvitinh}}" required><br>

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
