@extends('layouts.admin')

@section('title')
  <title>Sửa thực đơn</title>
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

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Thêm thực đơn</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('thongtinthanhvien')}}">Thông tin thành viên</a></li>
                <li class="breadcrumb-item"><a href="{{route('quanlythucdon')}}">Quản lý thực đơn</a></li>
                <li class="breadcrumb-item"><a href="">Thêm thực đơn</a></li>
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

            <form action="{{route('doeditthucdon')}}" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
				@if($errors->any())
					<h3>{{$errors->first()}}</h3>
				@endif
                <input type="hidden" name="id" value="{{$thucdon->id}}">
                <img src="{!!asset($thucdon->hinhmon)!!}" alt="" width="25%" height="25%">
                <div class="form-group">
                    <label>Chọn loại món</label>
                    <select class="form-control" name="loaimon">
                        @if($thucdon->loaimon==1)
                        <option value="1" selected>Món nước</option>
                        <option value="2">Món ăn</option>
                        <option value="3">Món phụ</option>
                        @elseif($thucdon->loaimon==2)
                        <option value="1">Món nước</option>
                        <option value="2" selected>Món ăn</option>
                        <option value="3">Món phụ</option>
                        @elseif($thucdon->loaimon==3)
                        <option value="1">Món nước</option>
                        <option value="2">Món ăn</option>
                        <option value="3" selected>Món phụ</option>
                        @endif
                        
                    </select>
                </div>
                <div class="form-group">
                    <label>Tên món</label>
                    <input type="text" class="form-control" name="tenmon" value="{{$thucdon->tenmon}}" required>
                </div>
                <div class="form-group">
                    <label>Đơn giá</label>
                    <input type="number" class="form-control" name="dongia" value="{{$thucdon->dongia}}" required>
                </div>
                <div class="form-group">
					<label>Hình ảnh món:</label>
					<input type="file" class="form-control" name="hinhmon">
				</div>
                <div class="form-group">
                    <label>Mô tả</label>
                    <input type="text" class="form-control" name="mota" value="{{$thucdon->mota}}" required><br>
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
