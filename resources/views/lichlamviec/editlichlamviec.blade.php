@extends('layouts.admin')

@section('title')
  <title>Thêm lịch làm việc</title>
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
                <h1 class="m-0">Thêm lịch làm việc</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('thongtinthanhvien')}}">Thông tin thành viên</a></li>
                <li class="breadcrumb-item"><a href="{{route('quanlylichlamviec')}}">Quản lý lịch làm việc</a></li>
                <li class="breadcrumb-item"><a href="">Thêm lịch làm việc</a></li>
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
        
            <div class="col-sm-5">
                <h3>Các nhân viên của quán</h3>
                <h5>Check để thêm vào DS</h5>
                <form action="{{route('addlichlamviec')}}" method="get">
                    {{csrf_field()}}
                    <input type="hidden" name="idcalam" value="{{$idcalam}}">
                    <input type="hidden" name="idkhuvuc" value="{{$idkhuvuc}}">
                    <input type="hidden" name="thoigian" value="{{$thoigian}}">
                    @foreach ($thanhvien2 as $key2 => $row2)
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" name="idthanhvien[]" value="{{$row2->id}}" id="a{{$row2->id}}">
                        <label class="custom-control-label" for="a{{$row2->id}}">
                            {{$row2->hoten}}/{{Str::limit($row2->namsinh,4,"")}}/{{$row2->tenvaitro}}
                        </label>
                    </div> 
                    @endforeach
                    <button type="submit" class="btn btn-primary ">Thêm</button>
                </form>
            </div>

            <div class="col-sm-5">
                <h3>Các nhân viên đã được chọn</h3><br>
                <h5>Check để xóa khỏi DS</h5>
                <form action="{{route('changelichlamviec')}}" method="get">
                    {{csrf_field()}}
                    <input type="hidden" name="idcalam" value="{{$idcalam}}">
                    <input type="hidden" name="idkhuvuc" value="{{$idkhuvuc}}">
                    <input type="hidden" name="thoigian" value="{{$thoigian}}">
                    @foreach ($lichlamviec as $key => $row)
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" name="idthanhvien[]" value="{{$row->id}}" id="b{{$row->id}}">
                            <label class="custom-control-label" for="b{{$row->id}}">
                            {{$row->hoten}}/{{Str::limit($row->namsinh,4,"")}}/{{$row->tenvaitro}}
                            </label>
                        </div> 
                    @endforeach
                    <button type="submit" class="btn btn-danger ">Xóa</button>
                </form>
            </div>
            
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
