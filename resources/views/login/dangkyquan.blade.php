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
				<h2 class="text-center">Đăng ký quán</h2>
			</div>
			<div class="panel-body">
				<form action="{{ route('dodangkyquan')}}" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group">
					<label>Tài khoản:</label>
					<input required="true" type="text" class="form-control" name="accquan">
					</div>
					<div class="form-group">
					<label>Mật khẩu:</label>
					<input required="true" type="password" class="form-control" name="pwdquan">
					</div>
					<div class="form-group">
					<label>Tên quán:</label>
					<input required="true" type="text" class="form-control" name="tenquan">
					</div>
					<div class="form-group">
					<label>Hình ảnh quán:</label>
					<input required="true" type="file" class="form-control" name="hinhquan">
					</div>
					<div class="form-group">
					<label>Địa chỉ quán:</label>
					<input required="true" type="text" class="form-control" name="diachiquan">
					</div>
					<div class="form-group">
					<label>Ngày thành lập:</label>
					<input required="true" type="date" class="form-control" name="ngaythanhlap">
					</div>
					<div class="col text-center">
					<button class="btn btn-danger">Đăng ký</button>
					</div>
				</form>			
			</div>
			<div class="col text-center">
				<a href="{{ route('dangnhapquan')}}"><button class="btn btn-primary">Đăng nhập</button></a>
			</div>
		</div>
	</div>
</body>
</html>