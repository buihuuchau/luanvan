@extends('layouts.admin')

@section('title')
  <title>Quản lý bàn</title>
@endsection

@section('content')
      <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Starter Page</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Starter Page</li>
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
					<a style="width:44px" class="btn btn-primary" href="{{route('addban')}}">
						<i class="fas fa-plus"></i></a>
				</div>
				<div class="card">
					<div class="card-body">
						<table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid" aria-describedby="example1_info">
							<thead>
								<tr role="row">
									<th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending">No.</th>
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >ID QUÁN</th>
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >ID KHU VỰC</th>
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >TÊN BÀN</th>
									<th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" >Trạng thái</th>
								</tr>
							</thead>
							<tbody>
							@foreach ($ban as $key => $row)
								<tr class="odd">
									<td class="dtr-control sorting_1" tabindex="0">{{$key+1}}</td>
									<td>{{$row->idquan}}</td>
									<td>{{$row->idkhuvuc}}</td>
									<td>{{$row->tenban}}</td>
									<td>{{$row->trangthai}}</td>
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
