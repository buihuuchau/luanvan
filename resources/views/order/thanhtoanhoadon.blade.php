@extends('layouts.admin')

@section('title')
    <title>THANH TOÁN HÓA ĐƠN</title>
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
        <img src="{!! asset($thanhvien->hinhquan) !!}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ $thanhvien->tenquan }}</span>
    </a>
@endsection
@section('avatar')
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{!! asset($thanhvien->hinhtv) !!}" class="img-circle elevation-2" alt="User Image">
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
                        <h1 class="m-0"></h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('thongtinthanhvien') }}">Thông tin thành
                                    viên</a>
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

                    <div class="col-md-12">
                        @if ($errors->any())
                            <h3>{{ $errors->first() }}</h3>
                        @endif
                        <!-- popup -->
                        <div class="col-md-12 mb-4 text-right">
                            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modalLoginForm"><i
                                    class="fas fa-plus"></i></a>
                        </div>

                        <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog"
                            aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <h1 style="text-align:center">Khuyến mãi</h1>
                                    <form action="{{ route('giamgia') }}" method="get">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{ $id }}"><!-- idhoadon -->
                                        <div class="modal-body mx-3">
                                            <div class="md-form mb-5">
                                                <label>Nhập số điện thoại</label>
                                                <input required="true" type="tel" class="form-control" name="sdt"
                                                    placeholder="0123456789" pattern="[0-9]{10}">
                                                <label>Nhập số diểm</label>
                                                <input required="true" type="number" class="form-control" name="diem"
                                                    value="-1">
                                            </div>
                                        </div>
                                        <div class="modal-footer d-flex justify-content-center">
                                            <button class="btn btn-default">Check</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- popup -->
                        <div class="card">
                            <div class="card-body">
                                <table id="example3" class="table table-bordered table-striped dataTable dtr-inline"
                                    role="grid" aria-describedby="example3_info">

                                    <thead>
                                        <tr style="border:none">
                                            <td style="border:none"></td>
                                            <td colspan="3" style="border:none">
                                                <h1 style="text-align:center">HÓA ĐƠN BÁN LẺ</h1>
                                            </td>
                                            <td style="border:none"></td>
                                        </tr>
                                        <tr style="border:none">
                                            <td colspan="2" style="border:none">
                                                <h4 style="text-align:left">Tên quán: {{ $thanhvien->tenquan }}</h4>
                                            </td>
                                            <td style="border:none"></td>
                                            <td colspan="2" style="border:none">
                                                <h4 style="text-align:left">Khu vực: {{ $hoadon->tenkhuvuc }}</h4>
                                            </td>
                                        </tr>
                                        <tr style="border:none">
                                            <td colspan="2" style="border:none">
                                                <h4 style="text-align:left">Địa chỉ: {{ $thanhvien->diachiquan }}</h4>
                                            </td>
                                            <td style="border:none"></td>
                                            <td colspan="2" style="border:none">
                                                <h4 style="text-align:left">Bàn: {{ $hoadon->tenban }}</h4>
                                            </td>
                                        </tr>
                                        <tr style="border:none">
                                            <td colspan="2" style="border:none">
                                                <h4 style="text-align:left">Website: {{ $thanhvien->website }}</h4>
                                            </td>
                                            <td style="border:none"></td>
                                            <td colspan="2" style="border:none">
                                                <h4 style="text-align:left">Thời gian: {{ $hoadon->thoigian }}</h4>
                                            </td>
                                        </tr>
                                        <tr style="border:none">
                                            <td colspan="2" style="border:none">
                                                <h4 style="text-align:left">Liên hê: {{ $thanhvien->sdtquan }}</h4>
                                            </td>
                                            <td style="border:none"></td>
                                            <td colspan="2" style="border:none">
                                                <h4 style="text-align:left">NV phục vụ: {{ $hoadon->hoten }}</h4>
                                            </td>
                                        </tr>
                                        <tr role="odd">
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example3"
                                                rowspan="1" colspan="1" aria-sort="ascending">STT</th>
                                            <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                                colspan="1">TÊN MÓN</th>
                                            <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                                colspan="1">ĐƠN GIÁ</th>
                                            <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                                colspan="1">SỐ LƯỢNG</th>
                                            <th class="sorting" tabindex="0" aria-controls="example3" rowspan="1"
                                                colspan="1">THÀNH TIỀN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($chitiet as $key => $row)
                                            <tr class="odd">
                                                <th class="dtr-control sorting_1" tabindex="0">{{ $key + 1 }}</th>
                                                <td>{{ $row->tenmon }}</td>
                                                <td>{{ number_format("$row->dongia", 0, ',', '.') }}đ</td>
                                                <td>{{ number_format("$row->soluong", 0, ',', '.') }}</td>
                                                <td>{{ number_format("$row->gia", 0, ',', '.') }}đ</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td><br></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <th>Tạm tính:</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <th>{{ number_format("$tamtinh", 0, ',', '.') }}đ</th>
                                        </tr>
                                        <tr>
                                            <th>Giảm giá:</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <th><?php $giamgia = $diem * 1000; ?>{{ number_format("$giamgia", 0, ',', '.') }}đ</th>
                                        </tr>
                                        <tr>
                                            <th>TỔNG:</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <th><?php $tong = $tamtinh - $diem * 1000; ?>{{ number_format("$tong", 0, ',', '.') }}đ</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <form action="{{ route('thanhtoanhoadon') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $id }}"><!-- idhoadon-->
                            <input type="hidden" name="idban" value="{{ $idban }}"><!-- idban-->
                            <input type="hidden" name="diem" value="{{ $diem }}"><!-- diem-->
                            <input type="hidden" name="idkhachhang" value="{{ $idkhachhang }}">
                            <!--idkhachhang -->
                            <input type="hidden" name="diemkhachhang" value="{{ $diemkhachhang }}">
                            <!--diemkhachhang -->
                            <input type="hidden" name="giamgia" value="{{ $giamgia }}">
                            <!--diemkhachhang -->
                            <input type="hidden" name="thanhtien" value="{{ $tong }}">
                            <!--thanhtien -->
                            <button type="submit" class="btn btn-primary">Thanh toán</button>
                        </form>

                    </div>

                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
