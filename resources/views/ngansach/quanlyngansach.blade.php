@extends('layouts.admin')

@section('title')
  <title>Quản lý ngân sách</title>
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
                <h1 class="m-0">Các chức năng hiện có</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Thông tin thành viên</a></li>
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
			
            {{-- form nhap ngay --}}
            <div class="col-sm-4">
                <div class="card">
                    <form action="{{route('quanlynhaphang')}}" method="post">
                        {{csrf_field()}}
                        <label>Từ:</label>
                        <input type="date" name="tungay" class="form-control">
                        <label>Đến:</label>
                        <input type="date" name="denngay" class="form-control">
                        <div style="text-align:center"><button type="submit" class="btn btn-primary">Quản lý nhập hàng</button></div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <form action="{{route('quanlybanhang')}}" method="post">
                        {{csrf_field()}}
                        <label>Từ:</label>
                        <input type="date" name="tungay" class="form-control">
                        <label>Đến:</label>
                        <input type="date" name="denngay" class="form-control">
                        <div style="text-align:center"><button type="submit" class="btn btn-primary">Quản lý bán hàng</button></div>
                    </form>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <form action="{{route('quanlyluong')}}" method="post">
                        {{csrf_field()}}
                        <label>Từ:</label>
                        <input type="date" name="tungay" class="form-control">
                        <label>Đến:</label>
                        <input type="date" name="denngay" class="form-control">
                        <div style="text-align:center"><button type="submit" class="btn btn-primary">Quản lý lương nhân viên</button></div>
                    </form>
                </div>
            </div>
            {{-- form nhap ngay --}}



            {{-- xuly quanlynhaphang --}}
            @if($kho!=null)
            <div class="col-sm-12"><h1 style="text-align:center">Thống kê nhập hàng</h1></div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending">No.</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >TÊN NGUYÊN LIỆU</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >ĐƠN GIÁ</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >ĐƠN VỊ TÍNH</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >SỐ LƯỢNG</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >THÀNH TIỀN</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >NGÀY NHẬP</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >NGÀY HẾT</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >TRẠNG THÁI</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($kho as $key => $row)
                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0">{{$key+1}}</td>
                                    <td>{{$row->tennguyenlieu}}</td>
                                    <td>{{number_format("$row->dongia",0,",",".");}}</td>
                                    <td>{{$row->donvitinh}}</td>
                                    <td>{{number_format("$row->soluong",0,",",".");}}</td>
                                    <td>{{number_format("$row->thanhtien",0,",",".");}}</td>
                                    <td>{{$row->ngaynhap}}</td>
                                    <td>{{$row->ngayhet}}</td>
                                    @if($row->trangthai==1)
                                        <td  bgcolor="lightgreen">Còn hàng</td>
                                    @elseif($row->trangthai== 2)
                                        <td  bgcolor="yellow">Sắp hết, cần kiểm tra</td>
                                    @elseif($row->trangthai== 0)
                                        <td  bgcolor="lightpink">Hết hàng</td>
                                    @endif
                                </tr>
                            @endforeach
                            <tr>
                                <th>Nhập hàng:<br>{{$tungay}}->{{$denngay}}</th>
                                <th>{{number_format("$tong",0,",",".");}}</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >THÁNG 1</th>
                                    <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >THÁNG 2</th>
                                    <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >THÁNG 3</th>
                                    <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >THÁNG 4</th>
                                    <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >THÁNG 5</th>
                                    <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >THÁNG 6</th>
                                    <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >THÁNG 7</th>
                                    <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >THÁNG 8</th>
                                    <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >THÁNG 9</th>
                                    <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >THÁNG 10</th>
                                    <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >THÁNG 11</th>
                                    <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >THÁNG 12</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd">
                                    @foreach ($total as $key => $row)
                                    <td>{{number_format("$row",0,",",".");}}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
            <canvas id="myChart">></canvas>
            </div>
            @endif
            {{-- xuly quanlynhaphang --}}


            {{-- xuly quanlybanhang --}}
            @if($hoadonluu!=null)
            <div class="col-sm-12"><h1 style="text-align:center">Thống kê bán hàng</h1></div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending">IDHD</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >T.GIAN</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >K.VỰC</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >BÀN</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >N.VIÊN</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >K.HÀNG</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >SĐT</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >GIẢM GIÁ</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >THÀNH TIỀN</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($hoadonluu as $key => $row)
                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0">{{$row->idhoadon}}</td>
                                    <td>{{$row->thoigian}}</td>
                                    <td>{{$row->tenkhuvuc}}</td>
                                    <td>{{$row->tenban}}</td>
                                    <td>{{$row->tenthanhvien}}</td>
                                    <td>{{$row->tenkhachhang}}</td>
                                    <td>{{$row->sdtkh}}</td>
                                    <td>{{number_format("$row->giamgia",0,",",".");}}</td>
                                    <td>{{number_format("$row->thanhtien",0,",",".");}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <th>Bán hàng:<br>{{$tungay}}->{{$denngay}}</th>
                                <th>Tổng giảm giá:</th>
                                <th>{{number_format("$tonggiamgia",0,",",".");}}</th>
                                <th>Tổng thu nhập:</th>
                                <th>{{number_format("$tongthanhtien",0,",",".");}}</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >Thống kê</th>
                                    <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >Th.1</th>
                                    <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >Th.2</th>
                                    <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >Th.3</th>
                                    <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >Th.4</th>
                                    <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >Th.5</th>
                                    <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >Th.6</th>
                                    <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >Th.7</th>
                                    <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >Th.8</th>
                                    <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >Th.9</th>
                                    <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >Th.10</th>
                                    <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >Th.11</th>
                                    <th class="" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >Th.12</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd">
                                    <th>Giảm giá</th>
                                    @foreach ($totalgiamgia as $key => $row)
                                    <td>{{number_format("$row",0,",",".");}}</td>
                                    @endforeach
                                </tr>
                                <tr class="odd">
                                    <th>Thành tiền</th>
                                    @foreach ($totalthanhtien as $key => $row)
                                    <td>{{number_format("$row",0,",",".");}}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
            <canvas id="myChart2">></canvas>
            </div>

            
            <div class="col-sm-6">
                <div class="col-sm-12"><h1 style="text-align:center">Các món bán chạy</h1></div>
                <div class="card">
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >TÊN MÓN</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >SỐ LƯỢNG</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >TỈ LỆ</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($banchay as $key => $row)
                                <tr class="odd">
                                    <td>{{$row['tenmon']}}</td>
                                    <td>{{number_format($row['soluong'],0,",",".")}}</td>
                                    @if($tongmon == 0)
                                    <td>0%</td>
                                    @else
                                    <td>{{number_format($row['soluong']/$tongmon*100,2,",",".")}}%</td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="col-sm-12"><h1 style="text-align:center">Nhân viên tích cực</h1></div>
                <div class="card">
                    <div class="card-body">
                        <table id="example3" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example3_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" >HỌ TÊN</th>
                                    <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" >SỐ HĐ</th>
                                    <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1" colspan="1" >TỈ LỆ</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($nhanvien as $key => $row)
                                <tr class="odd">
                                    <td>{{$row['tenthanhvien']}}</td>
                                    <td>{{number_format($row['sohoadon'],0,",",".")}}</td>
                                    @if($tonghoadon == 0)
                                    <td>0%</td>
                                    @else
                                    <td>{{number_format($row['sohoadon']/$tonghoadon*100,2,",",".")}}%</td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            @endif        
            {{-- xuly quanlybanhang --}}


            {{-- xuly quanlyluongnhanvien --}}
            @if($luong!=null)
            <div class="col-sm-12"><h1 style="text-align:center">Thống kê lương nhân viên</h1></div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending">No.</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >HỌ TÊN</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >CHỨC VỤ</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >CÓ MẶT</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >VẮNG</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >TỔNG SỐ BUỔI</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >LƯƠNG</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >THAO TÁC</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($luong as $key => $row)
                                <tr class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0">{{$key+1}}</td>
                                    <td>{{$row['hoten']}}</td>
                                    <td>{{$row['chucvu']}}</td>
                                    <td>{{$row['comat']}}</td>
                                    <td>{{$row['vang']}}</td>
                                    <td>{{number_format($row['sobuoi'],0,",",".")}}</td>
                                    <td>{{number_format($row['thulao'],0,",",".")}}</td>
                                    <td>
                                        <form action="{{route('chitietluong')}}" method="get">
                                            {{csrf_field()}}
                                            <input type="hidden" name="id" value="{{$row['id']}}">
                                            <button type="submit" class="btn btn-success">Xem chi tiết</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <th>Tính lương:<br>{{$tungay}}->{{$denngay}}</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endif
            {{-- xuly quanlyluongnhanvien --}}

            

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
{{-- Ve bieu do --}}
    {{-- bieudo nhaphang --}}
    @if($kho != null)
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script>
        var xValues = ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"];
        var yValues = [{{$thang1}},{{$thang2}},{{$thang3}},{{$thang4}},{{$thang5}},{{$thang6}},{{$thang7}},{{$thang8}},{{$thang9}},{{$thang10}},{{$thang11}},{{$thang12}},0];
        var barColors = ["red", "orange","yellow","green","blue","brown","purple","pink","red","orange","yellow","green"];
        
        new Chart("myChart", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
            backgroundColor: barColors,
            data: yValues
            }]
        },
        options: {
            legend: {display: false},
            title: {
            display: true,
            text: "Thống kê theo tháng trong năm"
            }
        }
        });
    </script>
    @endif
    {{-- bieudo nhaphang --}}

    {{-- bieudo banhang --}}
    @if($hoadonluu != null)
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script>
        var xValues = ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"];
        var yValues = [{{$thang1giamgia}},{{$thang2giamgia}},{{$thang3giamgia}},{{$thang4giamgia}},{{$thang5giamgia}},{{$thang6giamgia}},
            {{$thang7giamgia}},{{$thang8giamgia}},{{$thang9giamgia}},{{$thang10giamgia}},{{$thang11giamgia}},{{$thang12giamgia}},0];
        var yValues2 = [{{$thang1thanhtien}},{{$thang2thanhtien}},{{$thang3thanhtien}},{{$thang4thanhtien}},{{$thang5thanhtien}},{{$thang6thanhtien}},
            {{$thang7thanhtien}},{{$thang8thanhtien}},{{$thang9thanhtien}},{{$thang10thanhtien}},{{$thang11thanhtien}},{{$thang12thanhtien}},0];
        var barColors = ["red", "orange","yellow","green","blue","brown","purple","pink","red","orange","yellow","green"];
        var barColors2 = ["yellow","green","blue","brown","purple","pink","red","orange","yellow","green","red", "orange"];
        
        new Chart("myChart2", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
            backgroundColor: barColors,
            data: yValues
            },{
            backgroundColor: barColors2,
            data: yValues2
            }]
        },
        options: {
            legend: {display: false},
            title: {
            display: true,
            text: "Thống kê theo tháng trong năm"
            }
        }
        });
    </script>
    @endif
    {{-- bieudo banhang --}}
{{-- Ve bieu do end--}}
@endsection