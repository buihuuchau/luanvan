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
                <h1 class="m-0"></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('thongtinthanhvien')}}">Thông tin thành viên</a></li>
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
                <form action="{{route('xemban')}}" method="get">
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

            <div class="col-md-12">
                @if($errors->any())
                    <h3>{{$errors->first()}}</h3>
                @endif
            </div>

            @foreach($ban as $key => $row)

                    @if($row->trangthai==0)
                    <div class="card" style="width: 114px; height: 300px;">
                        <img class="card-img-top" src="storage/hinhanh/banranh.jpg" alt="Card image cap" width="100px" height="100px">
                        <div class="card-body">
                            <a href="" style="font-weight:bold; color:green; font-size:20px;">{{$row->tenban}}</a><br>
                            <form action="{{route('taohoadon')}}" method="get">
                                {{csrf_field()}}
                                <input type="hidden" name="idkhuvuc" value="{{$idkhuvuc}}">
                                <input type="hidden" name="idban" value="{{$row->id}}">
                                <button type="submit" class="btn btn-primary">Tạo HD</button>
                            </form>                    
                        </div>              
                    </div>
                    @elseif($row->trangthai==1)
                    <div class="card" style="width: 114px; height: 300px;">
                        <img class="card-img-top" src="storage/hinhanh/banban.jpg" alt="Card image cap" width="100px" height="100px">
                        <div class="card-body">
                            <a href="" style="font-weight:bold; color:red; font-size:20px;">{{$row->tenban}}</a><br>
                            <a href="{{route('doibanhoadon',['id'=>$row->id])}}" style="font-weight:bold; color:pink; font-size:18px;">Đổi bàn</a><br><!--idban-->
                            <a href="{{route('doimonhoadon',['id'=>$row->id])}}" style="font-weight:bold; color:blue; font-size:18px;">Đổi món</a><br>
                            <a href="" style="font-weight:bold; color:orange; font-size:18px;">Tạm tính</a><br>
                            <a href="" style="font-weight:bold; color:purple; font-size:18px;">Th.Toán</a><br>
                            <a href="{{route('deletehoadon',['id'=>$row->id])}}" style="font-weight:bold; color:black; font-size:18px;">Xóa</a><br>
                        </div>              
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