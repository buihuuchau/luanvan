<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập quán</title>
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
				<h2 class="text-center">Đăng nhập quán</h2>
			</div>
			<div class="panel-body">
				<form action="{{ route('dodangnhapquan')}}" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
					@if($errors->any())
						<h3>{{$errors->first()}}</h3>
					@endif
					<div class="form-group">
					<label>Tài khoản:</label>
					<input required="true" type="text" class="form-control" name="accquan">
					</div>
					<div class="form-group">
					<label>Mật khẩu:</label>
					<input required="true" type="password" class="form-control" name="pwdquan">
					</div>
					<div class="col text-center">
					<button class="btn btn-success">Đăng nhập quán</button>
					</div>
				</form>
			</div>
			<div class="col text-center">
				<a href="{{ route('dangkyquan')}}"><button class="btn btn-danger">Chưa có tài khoản quán</button></a>
			</div>
		</div>
	</div>
</body>
</html>