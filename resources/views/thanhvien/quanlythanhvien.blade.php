@extends('layouts.admin')

@section('title')
  <title>Quản lý thành viên</title>
@endsection
@section('home')
	<li class="nav-item d-none d-sm-inline-block">
		<a href="{{route('thongtinquan')}}" class="nav-link">Home</a>
    </li>
@endsection
@section('dangxuat')
	<ul class="navbar-nav ml-right">
      	<li class="nav-item d-none d-sm-inline-block">
        	<a href="{{route('dangxuatquan')}}" class="nav-link">Đăng xuất</a>
      	</li>
    </ul>
@endsection
@section('quan')
	<a href="#" class="brand-link">
  		<img src="{{$quan->hinhquan}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      	<span class="brand-text font-weight-light">{{$quan->tenquan}}</span>
	</a>
@endsection

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Quản lý thành viên</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('thongtinquan')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="">Quản lý thành viên</a></li>
                <!-- <li class="breadcrumb-item active"></li> -->
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
					<a style="width:44px" class="btn btn-primary" href="{{route('addthanhvien')}}">
					<i class="fas fa-plus"></i></a>
				</div>
				<div class="card">
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
							<thead>
							<tr role="row">
								{{-- <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending">No.</th> --}}
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >HỌ TÊN</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >HÌNH ẢNH</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >NĂM SINH</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >GIỚI TÍNH</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >ĐỊA CHỈ</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >SỐ ĐIỆN THOẠI</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >NGÀY VÀO LÀM</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >LƯƠNG/BUỔI</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >VAI TRÒ</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >TRẠNG THÁI</th>
								<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >THAO TÁC</th>
							</tr>
							</thead>
							<tbody>
							@foreach ($thanhvien as $key => $row)
							<tr class="odd">
								{{-- <td class="dtr-control sorting_1" tabindex="0">{{$key+1}}</td> --}}
								<td>{{$row->hoten}}</td>
								<td><img src="{{$row->hinhtv}}" alt="" width="40px" height="60px"></td>
								<td>{{$row->namsinh}}</td>
								@if($row->sex==0)
									<td>Nam</td>
								@else
									<td>Nữ</td>
								@endif
								<td>{{$row->diachi}}</td>
								<td>{{$row->sdt}}</td>
								<td>{{$row->ngayvaolam}}</td>
								<td>{{number_format("$row->luong",0,",",".");}} vnđ</td>
								<td>{{$row->tenvaitro}}</td>
								@foreach ($lichlamviec as $key2 => $row2)
									<?php	if($row2->idthanhvien==$row->id)	$sudung = $row->id;	?>				
								@endforeach
								@foreach ($hoadon as $key3 => $row3)
									<?php	if($row3->idthanhvien==$row->id)	$sudung = $row->id;	?>				
								@endforeach
								
								@if($row->hidden==0 && $sudung!=$row->id)
									<td>Thành viên mới</td>
								@elseif($row->hidden==0 && $sudung==$row->id)
									<td bgcolor="lightgreen">Đang hoạt động</td>
								@else
									<td bgcolor="gray" style="color:white">Vô hiệu hóa</td>
								@endif
								<td>
									<a href="{{route('editthongtinthanhvien',['id'=>$row->id])}}">Sửa thành viên</a><br>

									@if ($row->hidden==1)
									<a href="{{route('kichhoatthanhvien',['id'=>$row->id])}}">Kích hoạt</a><br>
									@else
									<a href="{{route('vohieuhoathanhvien',['id'=>$row->id])}}">Vô hiệu hóa</a><br>
									@endif

									@if($sudung!=$row->id)
									<a href="{{route('deletethongtinthanhvien',['id'=>$row->id])}}"
										onclick="return confirm('Bạn có chắc chắn muốn xóa')";>Xóa thành viên</a>
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
