@extends('layouts.admin')

@section('title')
  <title>Thông tin quán</title>
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
	<a href="#" class="brand-link">
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
                <h1 class="m-0">Thông tin quán</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('thongtinquan')}}">Thông tin quán</a></li>
				<li class="breadcrumb-item"><a href="{{route('dangxuatquan')}}">Đăng xuất</a></li>
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
			<!DOCTYPE html>
			<html>
			<head>
				<title>Registation Form * Form Tutorial</title>
				<!-- Latest compiled and minified CSS -->
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

				<!-- jQuery library -->
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

				<!-- Popper JS -->
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

				<!-- Latest compiled JavaScript -->
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
			</head>
			<body>
				<div class="container">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h2 class="text-center">Thông tin chi tiết</h2>
						</div>
						<div class="panel-body">
							<form action="{{ route('suathongtinquan')}}" method="post" enctype="multipart/form-data">
								{{csrf_field()}}
								<img src="{{$quan->hinhquan}}" alt="" width="30%" height="30%">

								<div class="form-group">
								<label>Tên quán:</label>
								<input required="true" type="text" class="form-control" name="tenquan" value="{{$quan->tenquan}}">
								</div>

								<div class="form-group">
								<label>Hình ảnh quán:</label>
								<input type="file" class="form-control" name="hinhquan">
								</div>

								<div class="form-group">
								<label>Địa chỉ quán:</label>
								<input required="true" type="text" class="form-control" name="diachiquan" value="{{$quan->diachiquan}}">
								</div>

								<div class="form-group">
								<label>Website:</label>
								<input required="true" type="url" class="form-control" name="website" pattern="https?://.+" value="{{$quan->website}}">
								</div>

								<div class="form-group">
								<label>Số điện thoại:</label>
								<input required="true" type="tel" class="form-control" name="sdtquan" value="{{$quan->sdtquan}}" pattern="[0-9]{10}">
								</div>

								<div class="form-group">
								<label>Ngày thành lập:</label>
								<input	class="form-control" value="{{$quan->ngaythanhlap}}" disabled>
								</div>
								<div class="col text-center">
								<button class="btn btn-warning">Lưu chỉnh sửa</button>
								</div>
							</form>		
						</div>
					</div>
					<br><br><br><br><br>
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h2 class="text-center">Đổi mật khẩu</h2>
						</div>
						<div class="panel-body">
							<form action="{{ route('doimatkhauquan')}}" method="post" enctype="multipart/form-data">
								{{csrf_field()}}
								@if($errors->any())
									<h3>{{$errors->first()}}</h3>
								@endif
								<div class="form-group">
								<label>Mật khẩu cũ:</label>
								<input required="true" type="password" class="form-control" name="opwdquan">
								</div>

								<div class="form-group">
								<label>Mật khẩu mới:</label>
								<input type="password" class="form-control" placeholder="mật khẩu phải chứa 8 ký tự trở lên có ít nhất một số và một chữ hoa và chữ thường"
									id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="npwdquan" required>
								</div>

								<div class="form-group">
								<label>Nhập lại mật khẩu mới:</label>
								<input type="password" class="form-control" id="confirm_password" name="rnpwdquan" required>
								</div>
								<div class="col text-center">
								<button class="btn btn-warning">Đổi mật khẩu</button>
								</div>
							</form>		
						</div>
					</div>
				</div>
			</body>
			</html>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script>
	var password = document.getElementById("password"),
	confirm_password = document.getElementById("confirm_password");

	function validatePassword(){
		if(password.value != confirm_password.value) {
			confirm_password.setCustomValidity("2 mật khẩu khâc nhau");
		}
		else {
			confirm_password.setCustomValidity('');
		}
	}
	password.onchange = validatePassword;
	confirm_password.onkeyup = validatePassword;
</script>

@endsection
