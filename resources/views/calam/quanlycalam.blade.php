@extends('layouts.admin')

@section('title')
  <title>Quản lý ca làm</title>
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
                <h1 class="m-0">Quản lý ca làm</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('thongtinthanhvien')}}">Thông tin thành viên</a></li>
                <li class="breadcrumb-item"><a href="">Quản lý ca làm</a></li>
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
					
					<button type="button" class="btn btn-primary" data-toggle="modal"
					data-target="#exampleModalCenter">
					Thêm ca làm
					</button>
					<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
						aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">Thêm ca làm</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form action="{{route('doaddcalam')}}" method="post">
									<div class="modal-body">
										{{csrf_field()}}
										<div class="form-group">
											<label>Tên ca làm</label>
											<input type="text" class="form-control" name="tencalam" required><br>
											<label>Từ giờ</label>
											<input type="time" class="form-control" name="tu" required><br>
											<label>Đến giờ</label>
											<input type="time" class="form-control" name="den" required><br>
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary"
											data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Thêm</button>
									</div>
								</form>
							</div>
						</div>
					</div>

				</div>

				@if($errors->any())
				<h3>{{$errors->first()}}</h3>
				@endif

				<div class="card">
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
							<thead>
								<tr role="row">
									{{-- <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending">No.</th> --}}
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >TỪ GIỜ</th>
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >ĐẾN GIỜ</th>
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >TÊN CA LÀM</th>
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >ẨN / HIỆN</th>
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >THAO TÁC</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($calam as $key => $row)
								<tr class="odd">
									{{-- <td class="dtr-control sorting_1" tabindex="0">{{$key+1}}</td> --}}
									<td>{{$row->tu}}</td>
									<td>{{$row->den}}</td>
									<td>{{$row->tencalam}}</td>
									@foreach ($lichlamviec as $key2 => $row2)
										<?php	if($row2->idcalam==$row->id)	$sudung = $row->id;
										?>				
									@endforeach
									
									@if($row->hidden==0 && $sudung!=$row->id)
										<td>Chưa được sử dụng</td>
									@elseif($row->hidden==0 && $sudung==$row->id)
										<td bgcolor="lightgreen">Đang được sử dụng</td>
									@else
										<td bgcolor="gray" style="color:white">Vô hiệu hóa</td>
									@endif
									<td>
										<a href="{{route('editcalam',['id'=>$row->id])}}">Sửa ca làm</a><br>

										@if($row->hidden==0)
										<a href="{{route('hiddencalam',['id'=>$row->id])}}">Ẩn ca làm</a><br>
										@else
										<a href="{{route('showcalam',['id'=>$row->id])}}">Hiện ca làm</a><br>
										@endif

										@if($sudung!=$row->id)
										<a href="{{route('deletecalam',['id'=>$row->id])}}"
											onclick="return confirm('Bạn có chắc chắn muốn xóa')";>Xóa ca làm</a>
										@endif
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
