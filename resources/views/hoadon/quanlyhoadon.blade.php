@extends('layouts.admin')

@section('title')
  <title>Quản lý hóa đơn</title>
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
                <h1 class="m-0">Quản lý hóa đơn</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('thongtinthanhvien')}}">Thông tin thành viên</a></li>
                <li class="breadcrumb-item"><a href="">Quản lý hóa đơn</a></li>
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
				<div class="card">
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
							<thead>
								<tr role="row">
									<th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending">No.</th>
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >STT HD</th>
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >THỜI GIAN</th>
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >TÊN KV</th>
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >TÊN BÀN</th>
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >TÊN TV</th>
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >TÊN KH</th>
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >SĐT KH</th>
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >GIẢM GIÁ</th>
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >THÀNH TIỀN</th>
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >THAO TÁC</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($hoadonluu as $key => $row)
                                @if($row->tenkhuvuc != null)
								<tr class="odd">
									<td class="dtr-control sorting_1" tabindex="0">{{$key+1}}</td>
									<td>{{$row->idhoadon}}</td>
									<td>{{$row->thoigian}}</td>
									<td>{{$row->tenkhuvuc}}</td>
									<td>{{$row->tenban}}</td>
									<td>{{$row->tenthanhvien}}</td>
									<td>{{$row->tenkhachhang}}</td>
									<td>{{$row->sdtkh}}</td>
									<td>{{$row->giamgia}}</td>
									<td>{{$row->thanhtien}}</td>						
									<td>
										<a href="{{route('xemhoadon',['id'=>$row->idhoadon])}}">XEM HÓA ĐƠN</a><br>
									</td>
								</tr>
                                @endif
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
