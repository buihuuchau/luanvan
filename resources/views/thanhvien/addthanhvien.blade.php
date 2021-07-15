<!DOCTYPE html>
<html>
<head>
	<title>Thêm thành viên</title>
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
				<h2 class="text-center">Thêm thành viên</h2>
			</div>
			<div class="panel-body">
				<form action="{{ route('doaddthanhvien')}}" method="post" enctype="multipart/form-data">
					{{csrf_field()}}
					@if($errors->any())
						<h3>{{$errors->first()}}</h3>
					@endif
					<div class="form-group">
					<label>Tài khoản thành viên:</label>
					<input required="true" type="text" class="form-control" name="acc">
					</div>

					<div class="form-group">
					<label>Mật khẩu thành viên:</label>
					<input type="password" class="form-control" placeholder="mật khẩu phải chứa 8 ký tự trở lên có ít nhất một số và một chữ hoa và chữ thường"
						id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="pwd" required>
					</div>

					<div class="form-group">
					<label>Nhập lại mật khẩu thành viên:</label>
					<input type="password" class="form-control" id="confirm_password" name="rpwd" required>
					</div>

					<div class="form-group">
					<label>Họ tên thành viên:</label>
					<input required="true" type="text" class="form-control" name="hoten">
					</div>

					<div class="form-group">
					<label>Hình ảnh thành viên:</label>
					<input required="true" type="file" class="form-control" name="hinhtv">
					</div>

                    <div class="form-group">
                    <label>Năm sinh:</label>
                    <input required="true" type="date" class="form-control" name="namsinh">
                    </div>

                    <div class="form-group">
                    <label>Giới tính:</label>
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

					<div class="form-group">
					<label>Địa chỉ thành viên:</label>
					<input required="true" type="text" class="form-control" name="diachi">
					</div>

					<div class="form-group">
					<label>Số điện thoại:</label>
					<input required="true" type="tel" class="form-control" name="sdt" placeholder="0123456789" pattern="[0-9]{10}">
					</div>

					<div class="form-group">
					<label>Ngày vào làm:</label>
					<input required="true" type="date" class="form-control" name="ngayvaolam">
					</div>

                    <div class="form-group">
					<label>Lương/Buổi:</label>
					<input required="true" type="number" class="form-control" name="luong">
					</div>

                    <div class="form-group">
                    <label>Chọn vai trò:</label><br>
                    <select class="form-control"  name="idvaitro" id="idvaitro">
                    @foreach ($vaitro as $key => $row)
                        <option value="{{$row->id}}" checked>{{$row->tenvaitro}}</option>
                    @endforeach
                    </select>
                    </div>

					<div class="col text-center">
					<button class="btn btn-danger">Đăng ký thành viên</button>
					</div>
				</form>
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