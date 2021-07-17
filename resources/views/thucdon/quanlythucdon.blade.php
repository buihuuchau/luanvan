@extends('layouts.admin')

@section('title')
  <title>Quản lý thực đơn</title>
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
                <h1 class="m-0">Quản lý thực đơn</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('thongtinthanhvien')}}">Thông tin thành viên</a></li>
                <li class="breadcrumb-item"><a href="">Quản lý thực đơn</a></li>
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
					Thêm thực đơn
					</button>
					<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
						aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">Thêm thực đơn</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<form action="{{route('doaddthucdon')}}" method="post" enctype="multipart/form-data">
									<div class="modal-body">
										{{csrf_field()}}
										<div class="form-group">
											<label>Chọn loại món</label>
											<select class="form-control" name="loaimon">
												<option value="1">Món nước</option>
												<option value="2">Món ăn</option>
												<option value="3">Món phụ</option>
											</select>
										</div>
										<div class="form-group">
											<label>Tên món</label>
											<input type="text" class="form-control" name="tenmon" required>
										</div>
										<div class="form-group">
											<label>Đơn giá</label>
											<input type="number" class="form-control" name="dongia" required>
										</div>
										<div class="form-group">
											<label>Hình ảnh món:</label>
											<input required="true" type="file" class="form-control" name="hinhmon">
										</div>
										<div class="form-group">
											<label>Mô tả</label>
											<input type="text" class="form-control" name="mota" required><br>
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
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >TÊN MÓN</th>
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >ĐƠN GIÁ</th>
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >HÌNH ẢNH</th>
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >MÔ TẢ</th>
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >ẨN / HIỆN</th>
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >LOẠI MÓN</th>
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >THAO TÁC</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($thucdon as $key => $row)
								<tr class="odd">
									{{-- <td class="dtr-control sorting_1" tabindex="0">{{$key+1}}</td> --}}
									<td>{{$row->tenmon}}</td>
									<td>{{number_format("$row->dongia",0,",",".");}}</td>
									<td><img src="{{$row->hinhmon}}" alt="" width="40px" height="60px"></td>
									<td>{{$row->mota}}</td>
									@foreach ($chitiet as $key2 => $row2)
										<?php	if($row2->idthucdon==$row->id)	$sudung = $row->id;	?>				
									@endforeach
									
									@if($row->hidden==0 && $sudung!=$row->id)
										<td>Đang được phục vụ</td>
									@elseif($row->hidden==0 && $sudung==$row->id)
										<td bgcolor="lightgreen">Đang được phục vụ</td>
									@else
										<td bgcolor="gray" style="color:white">Ngừng phục vụ</td>
									@endif
									<td>
										<a href="{{route('editthucdon',['id'=>$row->id])}}">Sửa thực đơn</a><br>

										@if($row->hidden==0)
										<a href="{{route('hiddenthucdon',['id'=>$row->id])}}">Ẩn thực đơn</a><br>
										@else
										<a href="{{route('showthucdon',['id'=>$row->id])}}">Hiện thực đơn</a><br>
										@endif

										@if($sudung!=$row->id)
										<a href="{{route('deletethucdon',['id'=>$row->id])}}"
											onclick="return confirm('Bạn có chắc chắn muốn xóa')";>Xóa thực đơn</a>
										@endif
									</td>
									@if ($row->loaimon==1)
										<td>Món nước</td>
									@elseif($row->loaimon==2)
										<td>Món ăn</td>
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

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
