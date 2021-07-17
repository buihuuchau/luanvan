 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    @yield('quan')

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        @yield('avatar')
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                @if($ssidthanhvien = Session::get('ssidthanhvien') == null)
                    <li class="nav-item">
                        <a href="{{ route('quanlythanhvien') }}" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Quản lý thành viên
                                <!-- <span class="right badge badge-danger">New</span> -->
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('quanlyvaitro') }}" class="nav-link">
                            <i class="nav-icon fas fa-ad"></i>
                            <p>
                                Quản lý vai trò
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('dangxuatquan') }}" class="nav-link">
                            <i class="fas fa-sign-out-alt">&nbsp;&nbsp;&nbsp;</i>
                            <p>
                                Đăng xuất
                            </p>
                        </a>
                    </li>
                @endif

                @if($ssidthanhvien = Session::get('ssidthanhvien'))
                
                    @php
                        $ssidthanhvien = Session::get('ssidthanhvien');
                        $thanhvien = DB::table('thanhvien')
                            ->where('thanhvien.id',$ssidthanhvien)
                            ->first();
                        $vaitro_quyen = DB::table('vaitro_quyen')
                            ->where('idvaitro',$thanhvien->idvaitro)
                            ->get();
                    @endphp

                    @foreach($vaitro_quyen as $key => $row)
                        @if($row->idquyen == 13)
                        <li class="nav-item">
                            <a href="{{ route('quanlykhachhang') }}" class="nav-link">
                                <i class="nav-icon fas fa-address-book"></i>
                                <p>
                                    Quản lý khách hàng
                                </p>
                            </a>
                        </li>
                        @endif

                        @if($row->idquyen == 21)
                        <li class="nav-item">
                            <a href="{{ route('quanlykhuvuc') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Quản lý khu vực
                                </p>
                            </a>
                        </li>
                        @endif

                        @if($row->idquyen == 1)
                        <li class="nav-item">
                            <a href="{{ route('quanlyban') }}" class="nav-link">
                                <i class="nav-icon fas fa-adjust"></i>
                                <p>
                                    Quản lý bàn
                                </p>
                            </a>
                        </li>
                        @endif

                        @if($row->idquyen == 41)
                        <li class="nav-item">
                            <a href="{{ route('quanlythucdon') }}" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>
                                    Quản lý thực đơn
                                </p>
                            </a>
                        </li>
                        @endif

                        @if($row->idquyen == 29)
                        <li class="nav-item">
                            <a href="{{ route('quanlynguyenlieu') }}" class="nav-link">
                                <i class="nav-icon fas fa-cookie"></i>
                                <p>
                                    Quản lý nguyên liệu
                                </p>
                            </a>
                        </li>
                        @endif

                        @if($row->idquyen == 17)
                        <li class="nav-item">
                            <a href="{{ route('quanlykho') }}" class="nav-link">
                                <i class="nav-icon fas fa-dungeon"></i>
                                <p>
                                    Quản lý kho
                                </p>
                            </a>
                        </li>
                        @endif

                        @if($row->idquyen == 9)
                        <li class="nav-item">
                            <a href="{{ route('quanlyhoadon') }}" class="nav-link">
                                <i class="nav-icon fas fa-calculator"></i>
                                <p>
                                    Quản lý hóa đơn
                                </p>
                            </a>
                        </li>
                        @endif

                        @if($row->idquyen == 5)
                        <li class="nav-item">
                            <a href="{{ route('quanlycalam') }}" class="nav-link">
                                <i class="nav-icon fas fa-clock"></i>
                                <p>
                                    Quản lý ca làm
                                </p>
                            </a>
                        </li>
                        @endif

                        @if($row->idquyen == 25)
                        <li class="nav-item">
                            <a href="{{ route('quanlylichlamviec') }}" class="nav-link">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>
                                    Quản lý lịch làm việc
                                </p>
                            </a>
                        </li>
                        @endif

                        @if($row->idquyen == 49)
                        <li class="nav-item">
                            <a href="{{ route('quanlyngansach') }}" class="nav-link">
                                <i class="nav-icon fas fa-credit-card"></i>
                                <p>
                                    Quản lý ngân sách
                                </p>
                            </a>
                        </li>
                        @endif

                        @if($row->idquyen == 9)
                        <li class="nav-item">
                            <a href="{{ route('hoadon') }}" class="nav-link">
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p>
                                    ORDER
                                </p>
                            </a>
                        </li>
                        @endif

                        @if($row->idquyen == 29)
                        <li class="nav-item">
                            <a href="{{ route('quanlychebien') }}" class="nav-link">
                                <i class="nav-icon fa fa-beer"></i>
                                <p>
                                    CHẾ BIẾN
                                </p>
                            </a>
                        </li>
                        @endif

                    @endforeach

                    <li class="nav-item">
                        <a href="{{ route('dangxuatthanhvien') }}" class="nav-link">
                            <i class="fas fa-sign-out-alt">&nbsp;&nbsp;&nbsp;</i>
                            <p>
                                Đăng xuất
                            </p>
                        </a>
                    </li>

                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
 </aside>
