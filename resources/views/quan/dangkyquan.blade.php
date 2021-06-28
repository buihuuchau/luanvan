<!DOCTYPE html>
<html>
<head>
	<title>Đăng ký quán</title>
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
					@if($errors->any())
						<h3>{{$errors->first()}}</h3>
					@endif
					<div class="form-group">
					<label>Tài khoản:</label>
					<input required="true" type="text" class="form-control" name="accquan">
					</div>

					<div class="form-group">
					<label>Mật khẩu:</label>
					<input type="password" class="form-control" placeholder="mật khẩu phải chứa 8 ký tự trở lên có ít nhất một số và một chữ hoa và chữ thường"
						id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="pwdquan" required>
					</div>

					<div class="form-group">
					<label>Nhập lại mật khẩu:</label>
					<input type="password" class="form-control" id="confirm_password" name="rpwdquan" required>
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
					<label>Website:</label>
					<input required="true" type="url" class="form-control" name="website" pattern="https?://.+" placeholder="http:// or https://">
					</div>

					<div class="form-group">
					<label>Số điện thoại:</label>
					<input required="true" type="tel" class="form-control" name="sdtquan" placeholder="0123456789" pattern="[0-9]{10}">
					</div>

					<div class="form-group">
					<label>Ngày thành lập:</label>
					<input required="true" type="date" class="form-control" name="ngaythanhlap">
					</div>

					<div class="col text-center">
					<button class="btn btn-danger">Đăng ký quán</button>
					</div>
				</form>
			</div>
			<div class="col text-center">
				<a href="{{ route('dangnhapquan')}}"><button class="btn btn-primary">Đã có tài khoản quán</button></a>
			</div>
		</div>
	</div>
</body>

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

</html>