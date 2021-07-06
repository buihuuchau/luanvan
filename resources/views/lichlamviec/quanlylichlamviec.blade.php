@extends('layouts.admin')

@section('title')
  <title>Quản lý lịch làm việc</title>
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
                <h1 class="m-0">Quản lý lịch làm việc</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('thongtinthanhvien')}}">Thông tin thành viên</a></li>
                <li class="breadcrumb-item"><a href="">Quản lý lịch làm việc</a></li>
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

                <div class="col-md-6">
                    <h4>Lịch làm việc của ngày:</h4>
                    <h3>{{$date}}</h3>
                    <form action="{{route('xemlichlamviec')}}" method="get">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Ngày: </label>
                            <input type="date" name="thoigian" value="{{$date}}"required>
                            <button type="submit" class="btn btn-primary">Kiểm tra</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <h4>Copy lịch làm việc từ ngày sang ngày:</h4>
                    <h3><br></h3>
                    <form action="{{route('copylichlamviec')}}" method="get">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Từ ngày: </label>
                            <input type="date" name="tungay" value="{{$date}}"required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <label>Sang ngày: </label>
                            <input type="date" name="sangngay" value=""required>
                            <button type="submit" class="btn btn-primary">Copy</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-12">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">CA LÀM / KHU VỰC</th>
                            @foreach ($khuvuc as $key => $row)
                            <th scope="col">{{$row->tenkhuvuc}}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($calam as $key2 => $row2)
                        <tr>
                            <th scope="row">{{$row2->tencalam}}<br>{{$row2->tu}}->{{$row2->den}}</th>
                            @foreach ($khuvuc as $key => $row)
                            <td>
                                <form action="{{route('editlichlamviec')}}" method="get">
                                    {{csrf_field()}}
                                    <input type="hidden" name="thoigian" value="{{$date}}">
                                    <input type="hidden" name="idkhuvuc" value="{{$row->id}}">
                                    <input type="hidden" name="idcalam" value="{{$row2->id}}">
                                    <button class="btn btn-warning" type="submit"><i class="fas fa-edit"></i>Sửa</button>
                                </form>
                                @foreach ($lichlamviec as $key3 => $row3)
                                    @if($row3->idkhuvuc == $row->id && $row3->idcalam == $row2->id)
                                        @if($row3->diemdanh==0)
                                            <a style="color:red" href="{{route('diemdanhcomatlichlamviec',['id'=>$row3->id])}}">{{$row3->hoten}}--->Vắng mặt </a><br>
                                        @else
                                            <a style="color:green" href="{{route('diemdanhvangmatlichlamviec',['id'=>$row3->id])}}">{{$row3->hoten}}--->Có mặt </a><br>
                                        @endif
                                    @endif
                                @endforeach
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection