@extends('layouts.admin')

@section('title')
  <title>Thông tin thành viên</title>
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
                <h1 class="m-0">Thông tin thành viên</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="">Thông tin thành viên</a></li>
                <li class="breadcrumb-item"><a href="{{route('dangxuatthanhvien')}}">Đăng xuất</a></li>
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
							<div class="row">
								<img src="{{$thanhvien->hinhtv}}" alt="" width="300px" height="300px" style="margin-right: 100px">
								<form action="{{route('chitietluong')}}" method="get">
									<input type="hidden" name="id" value="{{$thanhvien->id}}">
									<input type="image" src="{{asset('storage/hinhanh/lichcongtac.jpg')}}" alt="Submit" width="200px" height="200px">
								</form>
							</div>
							<form action="{{route('suathongtinthanhvien')}}" method="post" enctype="multipart/form-data">
								{{csrf_field()}}
								<div class="form-group">
								<label>Họ tên thành viên:</label>
								<input required="true" type="text" class="form-control" name="hoten" value="{{$thanhvien->hoten}}">
								</div>

								<div class="form-group">
								<label>Hình ảnh thành viên:</label>
								<input type="file" class="form-control" name="hinhtv">
								</div>

								<div class="form-group">
								<label>Năm sinh:</label>
								<input type="date" class="form-control" name="namsinh" value="{{$thanhvien->namsinh}}">
								</div>

								<div class="form-group">
								<label>Giới tính:</label>
								@if($thanhvien->sex==0)
								<div class="form-check">
								<input class="form-check-input" type="radio" name="sex" id="nam" value="0" checked>
								<label class="form-check-label" for="nam">
									Nam
								</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input class="form-check-input" type="radio" name="sex" id="nu" value="1">
								<label class="form-check-label" for="nu">
									Nữ
								</label>
								</div>
								</div>
								@else
								<div class="form-check">
								<input class="form-check-input" type="radio" name="sex" id="nam" value="0">
								<label class="form-check-label" for="nam">
									Nam
								</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<input class="form-check-input" type="radio" name="sex" id="nu" value="1" checked>
								<label class="form-check-label" for="nu">
									Nữ
								</label>
								</div>
								</div>
								@endif

								<div class="form-group">
								<label>Địa chỉ thành viên:</label>
								<input required="true" type="text" class="form-control" name="diachi" value="{{$thanhvien->diachi}}">
								</div>

								<div class="form-group">
								<label>Số điện thoại:</label>
								<input required="true" type="tel" class="form-control" name="sdt" value="{{$thanhvien->sdt}}" pattern="[0-9]{10}">
								</div>

								<div class="form-group">
								<label>Ngày vào làm:</label>
								<input required="true" type="date" class="form-control" name="ngayvaolam" value="{{$thanhvien->ngayvaolam}}" disabled>
								</div>

								<div class="form-group">
								<label>Lương:</label>
								<input required="true" type="number" class="form-control" name="luong" value="{{$thanhvien->luong}}" disabled>
								</div>

								<div class="form-group">
								<label>Vai trò:</label>
								<input type="text" class="form-control" value="{{$thanhvien->tenvaitro}}" disabled>
								</div>

								<div class="col text-center">
								<button class="btn btn-danger">Lưu chỉnh sửa</button>
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
							<form action="{{route('doimatkhau')}}" method="post" enctype="multipart/form-data">
								{{csrf_field()}}
								@if($errors->any())
									<h3>{{$errors->first()}}</h3>
								@endif
								<div class="form-group">
								<label>Mật khẩu cũ:</label>
								<input required="true" type="password" class="form-control" name="opwd">
								</div>

								<div class="form-group">
								<label>Mật khẩu mới:</label>
								<input type="password" class="form-control" placeholder="mật khẩu phải chứa 8 ký tự trở lên có ít nhất một số và một chữ hoa và chữ thường"
									id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="npwd" required>
								</div>

								<div class="form-group">
								<label>Nhập lại mật khẩu mới:</label>
								<input type="password" class="form-control" id="confirm_password" name="rnpwd" required>
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