@extends('layouts.admin')

@section('title')
    <title>Quản lý chế biến</title>
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
                        <h1 class="m-0">Quản lý chế biến</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('thongtinthanhvien') }}">Thông tin thành viên</a>
                            </li>
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
                        <div class="col-md-12 mb-3 text-right">
                            <a style="width:100px" class="btn btn-danger" href="{{ route('baohetnguyenlieu') }}">Báo hết nguyên liệu</a>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                    role="grid" aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                rowspan="1" colspan="1" aria-sort="ascending">No.</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1">STT HD</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1">TÊN MÓN</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1">SỐ LƯỢNG</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1">GHI CHÚ</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1">TRẠNG THÁI</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1">THAO TÁC</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($chitiet as $key => $row)
                                            <tr class="odd">
                                                <td class="dtr-control sorting_1" tabindex="0">{{ $key + 1 }}</td>
                                                <td>{{ $row->idhoadon }}</td>
                                                <td>{{ $row->tenmon }}</td>
                                                <td>{{ $row->soluong }}</td>
                                                <td>{{ $row->ghichu }}</td>

                                                @if ($row->trangthai == 1)
                                                    <td bgcolor="green" style="color:white">Đã thực hiện xong</td>
                                                @elseif($row->trangthai==0)
                                                    <td>Đang chờ...</td>
                                                @elseif($row->trangthai==2)
                                                    <td bgcolor="red" style="color:white">Đã báo hủy</td>
                                                @endif

                                                <td>
                                                    @if ($row->trangthai == 0)
                                                        <a href="{{route('checkhoanthanh',['id'=>$row->id])}}">Check Hoàn Thành</a><br>
                                                        <a href="{{route('baohuy',['id'=>$row->id])}}" onclick="return confirm('Bạn có chắc chắn')"
                                                            >Báo hủy !</a>
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
<html>   
   <body onload = "JavaScript:AutoRefresh(60000);"></body>
</html>