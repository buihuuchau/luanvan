@extends('layouts.admin')

@section('title')
  <title>Thêm vai trò</title>
@endsection
@section('home')
	<li class="nav-item d-none d-sm-inline-block">
		<a href="{{route('thongtinquan')}}" class="nav-link">Home</a>
    </li>
@endsection
@section('dangxuat')
	<ul class="navbar-nav ml-right">
      	<li class="nav-item d-none d-sm-inline-block">
        	<a href="{{route('dangxuatquan')}}" class="nav-link">Đăng xuất</a>
      	</li>
    </ul>
@endsection
@section('quan')
	<a href="" class="brand-link">
  		<img src="{{$quan->hinhquan}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      	<span class="brand-text font-weight-light">{{$quan->tenquan}}</span>
	</a>
@endsection

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Thêm vai trò</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('thongtinquan')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('quanlyvaitro')}}">Quản lý vai trò</a></li>
                <li class="breadcrumb-item"><a href="">Thêm vai trò</a></li>
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

            <form action="{{route('doaddvaitro')}}" method="post" class="row">
				{{csrf_field()}}
				@if($errors->any())
					<h3>{{$errors->first()}}</h3>
				@endif
                <div class="form-group col-md-12">
                    <label>Tên vai trò</label>
                    <input type="text" class="form-control" name="tenvaitro" required><br>
                </div>

                <table class="table col-md-3">
                    <thead>
                        <tr>
                        <th scope="col">Xem</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quyen as $key => $row)
                            @if(($key+4)%4==0)
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="{{$row->id}}" name="idquyen[]" value="{{$row->id}}">
                                        <label class="custom-control-label" for="{{$row->id}}">{{$row->tenquyen}}</label>
                                    </div>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                <table class="table col-md-3">
                    <thead>
                        <tr>
                        <th scope="col">Thêm</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quyen as $key => $row)
                            @if(($key+4)%4==1)
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="{{$row->id}}" name="idquyen[]" value="{{$row->id}}">
                                        <label class="custom-control-label" for="{{$row->id}}">{{$row->tenquyen}}</label>
                                    </div>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                <table class="table col-md-3">
                    <thead>
                        <tr>
                        <th scope="col">Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quyen as $key => $row)
                            @if(($key+4)%4==2)
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="{{$row->id}}" name="idquyen[]" value="{{$row->id}}">
                                        <label class="custom-control-label" for="{{$row->id}}">{{$row->tenquyen}}</label>
                                    </div>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                <table class="table col-md-3">
                    <thead>
                        <tr>
                        <th scope="col">Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quyen as $key => $row)
                            @if(($key+4)%4==3)
                            <tr>
                                <td>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="{{$row->id}}" name="idquyen[]" value="{{$row->id}}">
                                        <label class="custom-control-label" for="{{$row->id}}">{{$row->tenquyen}}</label>
                                    </div>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>

                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
