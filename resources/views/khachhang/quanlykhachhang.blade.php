@extends('layouts.admin')

@section('title')
    <title>Quản lý khách hàng</title>
@endsection
@section('home')
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('thongtinthanhvien') }}" class="nav-link">Home</a>
    </li>
@endsection
@section('dangxuat')
    <ul class="navbar-nav ml-right">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('dangxuatthanhvien') }}" class="nav-link">Đăng xuất</a>
        </li>
    </ul>
@endsection
@section('quan')
    <a href="{{ route('dangnhapquan') }}" class="brand-link">
        <img src="{{ $thanhvien->hinhquan }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ $thanhvien->tenquan }}</span>
    </a>
@endsection
@section('avatar')
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ $thanhvien->hinhtv }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="{{ route('thongtinthanhvien') }}" class="d-block">{{ $thanhvien->hoten }}</a>
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
                        <h1 class="m-0">Quản lý khách hàng</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('thongtinthanhvien') }}">Thông tin thành viên</a>
                            </li>
                            <li class="breadcrumb-item"><a href="">Quản lý khách hàng</a></li>
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
                            {{-- <a style="width:44px" class="btn btn-primary" href="{{ route('addkhachhang') }}">
                                <i class="fas fa-plus"></i></a> --}}
                            {{-- //////////////////////////////// --}}
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#exampleModalCenter">
                                Thêm khách hàng
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Thêm khách hàng</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
										<form action="{{route('doaddkhachhang')}}" method="post">
											<div class="modal-body">
												{{csrf_field()}}
												{{-- @if($errors->any())
													<h3>{{$errors->first()}}</h3>
												@endif --}}
												<div class="form-group">
													<label class="col-form-label">Tên khách hàng</label>
													<input type="text" class="form-control" name="hotenkh" required>
												</div>
												<div class="form-group">
													<label>Số điện thoại</label>
													<input required="true" type="tel" class="form-control" name="sdt" placeholder="0123456789" pattern="[0-9]{10}">
												</div>
												{{-- <div class="form-group">
													<button type="submit" class="btn btn-primary">Thêm</button>
												</div> --}}
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary"
													data-dismiss="modal">Close</button>
												{{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
												<button type="submit" class="btn btn-primary">Thêm</button>
											</div>
										</form>
                                    </div>
                                </div>
                            </div>
                            {{-- ////////////////////// --}}
                        </div>

						@if($errors->any())
							<h3>{{$errors->first()}}</h3>
						@endif

                        <div class="card">
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                    role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            {{-- <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending">No.</th> --}}
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1">HỌ TÊN</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1">SỐ ĐIỆN THOẠI</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1">ĐIỂM</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1">NGÀY ĐĂNG KÝ</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1">THAO TÁC</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($khachhang as $key => $row)
                                            <tr class="odd">
                                                {{-- <td class="dtr-control sorting_1" tabindex="0">{{ $key + 1 }}</td> --}}
                                                <td>{{ $row->hotenkh }}</td>
                                                <td>{{ $row->sdt }}</td>
                                                <td>{{ $row->diem }}</td>
                                                <td>{{ $row->ngaydangky }}</td>
                                                <td><a href="{{ route('editkhachhang', ['id' => $row->id]) }}">Sửa thông
                                                        tin</a></td>
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
