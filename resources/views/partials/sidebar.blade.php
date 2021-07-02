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
        	<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          	<!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
               	<li class="nav-item">
            		<a href="{{route('quanlythanhvien')}}" class="nav-link">
              		<i class="nav-icon fas fa-th"></i>
              		<p>
               			Quản lý thành viên
                		<!-- <span class="right badge badge-danger">New</span> -->
              		</p>
            		</a>
          		</li>
          		<li class="nav-item">
            		<a href="{{route('quanlykhuvuc')}}" class="nav-link">
              		<i class="nav-icon fas fa-th"></i>
              		<p>
               			Quản lý khu vực
              		</p>
            		</a>
          		</li>
				<li class="nav-item">
            		<a href="{{route('quanlyban')}}" class="nav-link">
              		<i class="nav-icon fas fa-th"></i>
              		<p>
               			Quản lý bàn
              		</p>
            	</a>
          		</li>
				<li class="nav-item">
            		<a href="{{route('quanlynguyenlieu')}}" class="nav-link">
              		<i class="nav-icon fas fa-th"></i>
              		<p>
               			Quản lý nguyên liệu
              		</p>
            		</a>
          		</li>
				<li class="nav-item">
            		<a href="{{route('quanlykho')}}" class="nav-link">
              		<i class="nav-icon fas fa-th"></i>
              		<p>
               			Quản lý kho
              		</p>
            		</a>
          		</li>
        	</ul>
    	</nav>
    	<!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>