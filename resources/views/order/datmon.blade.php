@extends('layouts.admin')

@section('title')
  <title>Chỉnh sửa món</title>
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
  		<img src="{!!asset($thanhvien->hinhquan)!!}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      	<span class="brand-text font-weight-light">{{$thanhvien->tenquan}}</span>
	</a>
@endsection
@section('avatar')
	<div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          	<img src="{!!asset($thanhvien->hinhtv)!!}" class="img-circle elevation-2" alt="User Image">
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
                <h1 class="m-0">Đổi món</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('thongtinthanhvien')}}">Thông tin thành viên</a></li>
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

            <div class="col-md-12"><h1 style="text-align:center">MENU</h1></div>
            <div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						<table id="example2" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example2_info">
							<thead>
								<tr role="row">
									{{-- <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending">No.</th> --}}
									<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >TÊN MÓN</th>
									<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >ĐƠN GIÁ</th>
									<th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >THAO TÁC</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" >LOẠI MÓN</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($thucdon as $key => $row)
								<tr class="odd">
									{{-- <td class="dtr-control sorting_1" tabindex="0">{{$key+1}}</td> --}}
									<td>{{$row->tenmon}}</td>
									<td>{{$row->dongia}}</td>
									<td>
                                        <form action="{{route('datmon')}}" method="get">
                                            {{csrf_field()}}
                                            <input type="hidden" name="id" value="{{$id}}"><!--idhoadon-->
                                            <input type="hidden" name="idthucdon" value="{{$row->id}}">
                                            <div class="buttons_added">
                                                <input class="minus is-form" type="button" value="-">
                                                <input aria-label="quantity" class="input-qty" max="100" min="1" name="soluong" type="number" value="1">
                                                <input class="plus is-form" type="button" value="+">
                                                <input type="text" name="ghichu" style="width:100px">
                                                <button type="submit" class="btn btn-primary">Đặt món</button>
                                            </div>
                                        </form>
									</td>
                                    @if($row->loaimon==1)
                                    <td>Món Nước</td>
                                    @elseif($row->loaimon==2)
                                    <td>Món Ăn</td>
                                    @elseif($row->loaimon==3)
                                    <td>Món phụ</td>
                                    @endif
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
            <div class="col-md-12"><h1 style="text-align:center">Các món đã order</h1></div>
            @if($chitiet!=null)
            <div class="col-sm-12">
				<div class="card">
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
							<thead>
								<tr role="row">
									{{-- <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending">No.</th> --}}
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >TÊN MÓN</th>
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >SỐ LƯỢNG</th>
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >GHI CHÚ</th>
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >TRẠNG THÁI</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >LOẠI MÓN</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >ĐƠN GIÁ</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >GIÁ</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($chitiet as $key => $row)
								<tr class="odd">
									{{-- <td class="dtr-control sorting_1" tabindex="0">{{$key+1}}</td> --}}
									<td>{{$row->tenmon}}</td>
									<td>{{$row->soluong}}</td>
                                    @if ($row->trangthai==1)
									<td bgcolor="green" style="color:white">{{$row->ghichu}}</></td>
                                    @elseif ($row->trangthai==0)
                                    <td>{{$row->ghichu}}</td>
                                    @elseif($row->trangthai==2)
                                    <td bgcolor="red" style="color:white">{{$row->ghichu}}</></td>
                                    @endif
									<td class="row">
                                        @if ($row->trangthai==1)
                                            <h5   style="color:green">Đã xong</h5>
                                        @endif
                                        @if ($row->trangthai==0)
                                        <form action="{{route('doisoluongmonhoadon')}}" method="get">
                                            {{csrf_field()}}
                                            <input type="hidden" name="id" value="{{$row->id}}">
                                            <input type="hidden" name="dongia" value="{{$row->dongia}}">
                                            <div class="buttons_added">
                                                <input class="minus is-form" type="button" value="-">
                                                <input aria-label="quantity" class="input-qty" max="100" min="1" name="soluong" type="number" value="{{$row->soluong}}">
                                                <input class="plus is-form" type="button" value="+">
                                                <button type="submit" class="btn btn-warning">Đổi số lượng</button>                                                
                                            </div>
                                        </form>
                                        @endif
                                        @if ($row->trangthai==0 || $row->trangthai==2)
                                        <form action="{{route('xoamonhoadon')}}" method="get">
                                            {{csrf_field()}}
                                            <input type="hidden" name="id" value="{{$row->id}}">
                                            <button type="submit" class="btn btn-danger">Xóa món</button>
                                        </form>
                                        @endif
									</td>
                                    @if($row->loaimon==1)
                                    <td>Món Nước</td>
                                    @elseif($row->loaimon==2)
                                    <td>Món Ăn</td>
                                    @elseif($row->loaimon==3)
                                    <td>Món phụ</td>
                                    @endif
									<td>{{$row->dongia}}</td>
									<td>{{$row->gia}}</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
            @endif

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
<html>   
   <body onload = "JavaScript:AutoRefresh(180000);"></body>
</html>