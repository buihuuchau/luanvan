@extends('layouts.admin')

@section('title')
  <title>Quản lý kho</title>
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
                <h1 class="m-0">Quản lý kho</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('thongtinthanhvien')}}">Thông tin thành viên</a></li>
                <li class="breadcrumb-item"><a href="">Quản lý kho</a></li>
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

			<div class="col-sm-12">
				<div class="col-md-12 mb-4 text-right">
					<a style="width:44px" class="btn btn-primary" href="{{route('addkho')}}">
						<i class="fas fa-plus"></i></a>
				</div>
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
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >THAO TÁC</th>
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
									@else
										<td  bgcolor="lightpink">Hết hàng</td>
									@endif
									<td>
										@if($row->trangthai==1)
										<a href="{{route('hethangkho',['id'=>$row->id])}}">Hết hàng</a><br>
										@else
										<a href="{{route('conhangkho',['id'=>$row->id])}}">Còn hàng</a><br>
										@endif
										<a href="{{route('deletekho',['id'=>$row->id])}}"
											onclick="return confirm('Bạn có chắc chắn muốn xóa')";>Xóa kho</a>
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
