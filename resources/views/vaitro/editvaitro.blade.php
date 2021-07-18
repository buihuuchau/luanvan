@extends('layouts.admin')

@section('title')
    <title>Sửa vai trò</title>
@endsection
@section('home')
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('thongtinquan') }}" class="nav-link">Home</a>
    </li>
@endsection
@section('dangxuat')
    <ul class="navbar-nav ml-right">
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('dangxuatquan') }}" class="nav-link">Đăng xuất</a>
        </li>
    </ul>
@endsection
@section('quan')
    <a href="" class="brand-link">
        <img src="{!! asset($quan->hinhquan) !!}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">{{ $quan->tenquan }}</span>
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
                        <h1 class="m-0">Sửa vai trò</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('thongtinquan') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('quanlyvaitro') }}">Quản lý vai trò</a></li>
                            <li class="breadcrumb-item"><a href="">Sửa vai trò</a></li>
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

                    <form action="{{ route('doeditvaitro') }}" method="post" class="row">
                        {{ csrf_field() }}
                        @if ($errors->any())
                            <h3>{{ $errors->first() }}</h3>
                        @endif
                        <div class="form-group col-md-12">
                            <label>Tên vai trò</label>
                            <input type="text" class="form-control" name="tenvaitro" value="{{$vaitro->tenvaitro}}" disabled><br>
                        </div>
                        {{-- ban --}}
                        <table class="table col-md-12">
                            <tr>
                                @foreach ($quyen as $key => $row)
                                    @if ($row->id <= 4)
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="{{ $row->id }}" name="idquyenban[]"
                                                    value="{{ $row->id }}">
                                                <label class="custom-control-label"
                                                    for="{{ $row->id }}">{{ $row->tenquyen }}</label>

                                            </div>
                                        </td>
                                    @endif
                                @endforeach
                                <td>
                                    <input class="btn btn-info btn-sm" type="button" id="btn1ban" value="Chọn bàn" />
                                    <input class="btn btn-info btn-sm" type="button" id="btn2ban"
                                        value="Bỏ chọn bàn" />
                                </td>
                            </tr>

                            <tr>
                                @foreach ($quyen as $key => $row)
                                    @if ($row->id > 4 && $row->id <= 8)
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="{{ $row->id }}" name="idquyencalam[]"
                                                    value="{{ $row->id }}">
                                                <label class="custom-control-label"
                                                    for="{{ $row->id }}">{{ $row->tenquyen }}</label>

                                            </div>
                                        </td>
                                    @endif
                                @endforeach
                                <td>
                                    <input class="btn btn-info btn-sm" type="button" id="btn1calam" value="Chọn ca làm" />
                                    <input class="btn btn-info btn-sm" type="button" id="btn2calam"
                                        value="Bỏ chọn ca làm" />
                                </td>
                            </tr>

                            <tr>
                                @foreach ($quyen as $key => $row)
                                    @if ($row->id > 8 && $row->id <= 12)
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="{{ $row->id }}" name="idquyenhoadon[]"
                                                    value="{{ $row->id }}">
                                                <label class="custom-control-label"
                                                    for="{{ $row->id }}">{{ $row->tenquyen }}</label>

                                            </div>
                                        </td>
                                    @endif
                                @endforeach
                                <td>
                                    <input class="btn btn-info btn-sm" type="button" id="btn1hoadon" value="Chọn hóa đơn" />
                                    <input class="btn btn-info btn-sm" type="button" id="btn2hoadon"
                                        value="Bỏ chọn hóa đơn" />
                                </td>
                            </tr>

                            <tr>
                                @foreach ($quyen as $key => $row)
                                    @if ($row->id > 12 && $row->id <= 16)
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="{{ $row->id }}" name="idquyenkhachhang[]"
                                                    value="{{ $row->id }}">
                                                <label class="custom-control-label"
                                                    for="{{ $row->id }}">{{ $row->tenquyen }}</label>

                                            </div>
                                        </td>
                                    @endif
                                @endforeach
                                <td>
                                    <input class="btn btn-info btn-sm" type="button" id="btn1khachhang"
                                        value="Chọn khách hàng" />
                                    <input class="btn btn-info btn-sm" type="button" id="btn2khachhang"
                                        value="Bỏ chọn khách hàng" />
                                </td>
                            </tr>

                            <tr>
                                @foreach ($quyen as $key => $row)
                                    @if ($row->id > 16 && $row->id <= 20)
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="{{ $row->id }}" name="idquyenkho[]"
                                                    value="{{ $row->id }}">
                                                <label class="custom-control-label"
                                                    for="{{ $row->id }}">{{ $row->tenquyen }}</label>

                                            </div>
                                        </td>
                                    @endif
                                @endforeach
                                <td>
                                    <input class="btn btn-info btn-sm" type="button" id="btn1kho" value="Chọn kho" />
                                    <input class="btn btn-info btn-sm" type="button" id="btn2kho" value="Bỏ chọn kho" />
                                </td>
                            </tr>

                            <tr>
                                @foreach ($quyen as $key => $row)
                                    @if ($row->id > 20 && $row->id <= 24)
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="{{ $row->id }}" name="idquyenkhuvuc[]"
                                                    value="{{ $row->id }}">
                                                <label class="custom-control-label"
                                                    for="{{ $row->id }}">{{ $row->tenquyen }}</label>

                                            </div>
                                        </td>
                                    @endif
                                @endforeach
                                <td>
                                    <input class="btn btn-info btn-sm" type="button" id="btn1khuvuc" value="Chọn khu vực" />
                                    <input class="btn btn-info btn-sm" type="button" id="btn2khuvuc"
                                        value="Bỏ chọn khu vực" />
                                </td>
                            </tr>

                            <tr>
                                @foreach ($quyen as $key => $row)
                                    @if ($row->id > 24 && $row->id <= 28)
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="{{ $row->id }}" name="idquyenlichlamviec[]"
                                                    value="{{ $row->id }}">
                                                <label class="custom-control-label"
                                                    for="{{ $row->id }}">{{ $row->tenquyen }}</label>

                                            </div>
                                        </td>
                                    @endif
                                @endforeach
                                <td>
                                    <input class="btn btn-info btn-sm" type="button" id="btn1lichlamviec"
                                        value="Chọn lịch làm việc" />
                                    <input class="btn btn-info btn-sm" type="button" id="btn2lichlamviec"
                                        value="Bỏ chọn lịch làm việc" />
                                </td>
                            </tr>

                            <tr>
                                @foreach ($quyen as $key => $row)
                                    @if ($row->id > 28 && $row->id <= 32)
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="{{ $row->id }}" name="idquyennguyenlieu[]"
                                                    value="{{ $row->id }}">
                                                <label class="custom-control-label"
                                                    for="{{ $row->id }}">{{ $row->tenquyen }}</label>

                                            </div>
                                        </td>
                                    @endif
                                @endforeach
                                <td>
                                    <input class="btn btn-info btn-sm" type="button" id="btn1nguyenlieu"
                                        value="Chọn nguyên liệu" />
                                    <input class="btn btn-info btn-sm" type="button" id="btn2nguyenlieu"
                                        value="Bỏ chọn nguyên liệu" />
                                </td>
                            </tr>

                            <tr>
                                @foreach ($quyen as $key => $row)
                                    @if ($row->id > 32 && $row->id <= 36)
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="{{ $row->id }}" name="idquyenquan[]"
                                                    value="{{ $row->id }}">
                                                <label class="custom-control-label"
                                                    for="{{ $row->id }}">{{ $row->tenquyen }}</label>

                                            </div>
                                        </td>
                                    @endif
                                @endforeach
                                <td>
                                    <input class="btn btn-info btn-sm" type="button" id="btn1quan" value="Chọn quán" />
                                    <input class="btn btn-info btn-sm" type="button" id="btn2quan" value="Bỏ chọn quán" />
                                </td>
                            </tr>

                            <tr>
                                @foreach ($quyen as $key => $row)
                                    @if ($row->id > 36 && $row->id <= 40)
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="{{ $row->id }}" name="idquyenthanhvien[]"
                                                    value="{{ $row->id }}">
                                                <label class="custom-control-label"
                                                    for="{{ $row->id }}">{{ $row->tenquyen }}</label>

                                            </div>
                                        </td>
                                    @endif
                                @endforeach
                                <td>
                                    <input class="btn btn-info btn-sm" type="button" id="btn1thanhvien"
                                        value="Chọn thành viên" />
                                    <input class="btn btn-info btn-sm" type="button" id="btn2thanhvien"
                                        value="Bỏ chọn thành viên" />
                                </td>
                            </tr>

                            <tr>
                                @foreach ($quyen as $key => $row)
                                    @if ($row->id > 40 && $row->id <= 44)
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="{{ $row->id }}" name="idquyenthucdon[]"
                                                    value="{{ $row->id }}">
                                                <label class="custom-control-label"
                                                    for="{{ $row->id }}">{{ $row->tenquyen }}</label>

                                            </div>
                                        </td>
                                    @endif
                                @endforeach
                                <td>
                                    <input class="btn btn-info btn-sm" type="button" id="btn1thucdon"
                                        value="Chọn thực đơn" />
                                    <input class="btn btn-info btn-sm" type="button" id="btn2thucdon"
                                        value="Bỏ chọn thực đơn" />
                                </td>
                            </tr>

                            <tr>
                                @foreach ($quyen as $key => $row)
                                    @if ($row->id > 44 && $row->id <= 48)
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="{{ $row->id }}" name="idquyenvaitro[]"
                                                    value="{{ $row->id }}">
                                                <label class="custom-control-label"
                                                    for="{{ $row->id }}">{{ $row->tenquyen }}</label>

                                            </div>
                                        </td>
                                    @endif
                                @endforeach
                                <td>
                                    <input class="btn btn-info btn-sm" type="button" id="btn1vaitro" value="Chọn vai trò" />
                                    <input class="btn btn-info btn-sm" type="button" id="btn2vaitro"
                                        value="Bỏ chọn vai trò" />
                                </td>
                            </tr>

                            <tr>
                                @foreach ($quyen as $key => $row)
                                    @if ($row->id > 48 && $row->id <= 52)
                                        <td>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                    id="{{ $row->id }}" name="idquyenquanly[]"
                                                    value="{{ $row->id }}">
                                                <label class="custom-control-label"
                                                    for="{{ $row->id }}">{{ $row->tenquyen }}</label>

                                            </div>
                                        </td>
                                    @endif
                                @endforeach
                                <td>
                                    <input class="btn btn-info btn-sm" type="button" id="btn1quanly" value="Chọn quản lý" />
                                    <input class="btn btn-info btn-sm" type="button" id="btn2quanly"
                                        value="Bỏ chọn quản lý" />
                                </td>
                            </tr>
                        </table>
                        <input type="hidden" name="id" value="{{$vaitro->id}}">
                        <button type="submit" class="btn btn-primary">Lưu chỉnh sửa</button>
                    </form>

                    <div>
                        <br><br><br>
                        <h3>Các quyền đang được cấp</h3><br>
                        @foreach ($quyen as $key3 => $row3)
                            @foreach ($vaitro_quyen as $key2 => $row2)
                                @if ($row3->id == $row2->idquyen)

                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" class="form-check-input" id="{{ $row3->id }}"
                                            name="idquyen[]" value="{{ $row3->id }}" checked disabled>
                                        <label class="form-check-label"
                                            for="{{ $row3->id }}">{{ $row3->tenquyen }}</label>
                                    </div>

                                    @if ($row3->id % 4 == 0)
                                        <br>
                                    @endif
                                @endif
                            @endforeach
                        @endforeach
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    {{-- script check all xem --}}
    <script language="javascript">
        // Chức năng chọn hết
        document.getElementById("btn1ban").onclick = function() {
            // Lấy danh sách checkbox
            var checkboxes = document.getElementsByName('idquyenban[]');

            // Lặp và thiết lập checked
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = true;
            }
        };
        // Chức năng bỏ chọn hết
        document.getElementById("btn2ban").onclick = function() {
            // Lấy danh sách checkbox
            var checkboxes = document.getElementsByName('idquyenban[]');

            // Lặp và thiết lập Uncheck
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = false;
            }
        };
    </script>

    <script language="javascript">
        // Chức năng chọn hết
        document.getElementById("btn1calam").onclick = function() {
            // Lấy danh sách checkbox
            var checkboxes = document.getElementsByName('idquyencalam[]');

            // Lặp và thiết lập checked
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = true;
            }
        };
        // Chức năng bỏ chọn hết
        document.getElementById("btn2calam").onclick = function() {
            // Lấy danh sách checkbox
            var checkboxes = document.getElementsByName('idquyencalam[]');

            // Lặp và thiết lập Uncheck
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = false;
            }
        };
    </script>

    <script language="javascript">
        // Chức năng chọn hết
        document.getElementById("btn1hoadon").onclick = function() {
            // Lấy danh sách checkbox
            var checkboxes = document.getElementsByName('idquyenhoadon[]');

            // Lặp và thiết lập checked
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = true;
            }
        };
        // Chức năng bỏ chọn hết
        document.getElementById("btn2hoadon").onclick = function() {
            // Lấy danh sách checkbox
            var checkboxes = document.getElementsByName('idquyenhoadon[]');

            // Lặp và thiết lập Uncheck
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = false;
            }
        };
    </script>

    <script language="javascript">
        // Chức năng chọn hết
        document.getElementById("btn1khachhang").onclick = function() {
            // Lấy danh sách checkbox
            var checkboxes = document.getElementsByName('idquyenkhachhang[]');

            // Lặp và thiết lập checked
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = true;
            }
        };
        // Chức năng bỏ chọn hết
        document.getElementById("btn2khachhang").onclick = function() {
            // Lấy danh sách checkbox
            var checkboxes = document.getElementsByName('idquyenkhachhang[]');

            // Lặp và thiết lập Uncheck
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = false;
            }
        };
    </script>

    <script language="javascript">
        // Chức năng chọn hết
        document.getElementById("btn1kho").onclick = function() {
            // Lấy danh sách checkbox
            var checkboxes = document.getElementsByName('idquyenkho[]');

            // Lặp và thiết lập checked
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = true;
            }
        };
        // Chức năng bỏ chọn hết
        document.getElementById("btn2kho").onclick = function() {
            // Lấy danh sách checkbox
            var checkboxes = document.getElementsByName('idquyenkho[]');

            // Lặp và thiết lập Uncheck
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = false;
            }
        };
    </script>

    <script language="javascript">
        // Chức năng chọn hết
        document.getElementById("btn1khuvuc").onclick = function() {
            // Lấy danh sách checkbox
            var checkboxes = document.getElementsByName('idquyenkhuvuc[]');

            // Lặp và thiết lập checked
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = true;
            }
        };
        // Chức năng bỏ chọn hết
        document.getElementById("btn2khuvuc").onclick = function() {
            // Lấy danh sách checkbox
            var checkboxes = document.getElementsByName('idquyenkhuvuc[]');

            // Lặp và thiết lập Uncheck
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = false;
            }
        };
    </script>

    <script language="javascript">
        // Chức năng chọn hết
        document.getElementById("btn1lichlamviec").onclick = function() {
            // Lấy danh sách checkbox
            var checkboxes = document.getElementsByName('idquyenlichlamviec[]');

            // Lặp và thiết lập checked
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = true;
            }
        };
        // Chức năng bỏ chọn hết
        document.getElementById("btn2lichlamviec").onclick = function() {
            // Lấy danh sách checkbox
            var checkboxes = document.getElementsByName('idquyenlichlamviec[]');

            // Lặp và thiết lập Uncheck
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = false;
            }
        };
    </script>

    <script language="javascript">
        // Chức năng chọn hết
        document.getElementById("btn1nguyenlieu").onclick = function() {
            // Lấy danh sách checkbox
            var checkboxes = document.getElementsByName('idquyennguyenlieu[]');

            // Lặp và thiết lập checked
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = true;
            }
        };
        // Chức năng bỏ chọn hết
        document.getElementById("btn2nguyenlieu").onclick = function() {
            // Lấy danh sách checkbox
            var checkboxes = document.getElementsByName('idquyennguyenlieu[]');

            // Lặp và thiết lập Uncheck
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = false;
            }
        };
    </script>

    <script language="javascript">
        // Chức năng chọn hết
        document.getElementById("btn1quan").onclick = function() {
            // Lấy danh sách checkbox
            var checkboxes = document.getElementsByName('idquyenquan[]');

            // Lặp và thiết lập checked
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = true;
            }
        };
        // Chức năng bỏ chọn hết
        document.getElementById("btn2quan").onclick = function() {
            // Lấy danh sách checkbox
            var checkboxes = document.getElementsByName('idquyenquan[]');

            // Lặp và thiết lập Uncheck
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = false;
            }
        };
    </script>

    <script language="javascript">
        // Chức năng chọn hết
        document.getElementById("btn1thanhvien").onclick = function() {
            // Lấy danh sách checkbox
            var checkboxes = document.getElementsByName('idquyenthanhvien[]');

            // Lặp và thiết lập checked
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = true;
            }
        };
        // Chức năng bỏ chọn hết
        document.getElementById("btn2thanhvien").onclick = function() {
            // Lấy danh sách checkbox
            var checkboxes = document.getElementsByName('idquyenthanhvien[]');

            // Lặp và thiết lập Uncheck
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = false;
            }
        };
    </script>

    <script language="javascript">
        // Chức năng chọn hết
        document.getElementById("btn1thucdon").onclick = function() {
            // Lấy danh sách checkbox
            var checkboxes = document.getElementsByName('idquyenthucdon[]');

            // Lặp và thiết lập checked
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = true;
            }
        };
        // Chức năng bỏ chọn hết
        document.getElementById("btn2thucdon").onclick = function() {
            // Lấy danh sách checkbox
            var checkboxes = document.getElementsByName('idquyenthucdon[]');

            // Lặp và thiết lập Uncheck
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = false;
            }
        };
    </script>

    <script language="javascript">
        // Chức năng chọn hết
        document.getElementById("btn1vaitro").onclick = function() {
            // Lấy danh sách checkbox
            var checkboxes = document.getElementsByName('idquyenvaitro[]');

            // Lặp và thiết lập checked
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = true;
            }
        };
        // Chức năng bỏ chọn hết
        document.getElementById("btn2vaitro").onclick = function() {
            // Lấy danh sách checkbox
            var checkboxes = document.getElementsByName('idquyenvaitro[]');

            // Lặp và thiết lập Uncheck
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = false;
            }
        };
    </script>

    <script language="javascript">
        // Chức năng chọn hết
        document.getElementById("btn1quanly").onclick = function() {
            // Lấy danh sách checkbox
            var checkboxes = document.getElementsByName('idquyenquanly[]');

            // Lặp và thiết lập checked
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = true;
            }
        };
        // Chức năng bỏ chọn hết
        document.getElementById("btn2quanly").onclick = function() {
            // Lấy danh sách checkbox
            var checkboxes = document.getElementsByName('idquyenquanly[]');

            // Lặp và thiết lập Uncheck
            for (var i = 0; i < checkboxes.length; i++) {
                checkboxes[i].checked = false;
            }
        };
    </script>
@endsection
