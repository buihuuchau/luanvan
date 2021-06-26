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
            <form action="{{route('doaddban')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="formGroupExampleInput">Quán</label>
                    <input type="text" class="form-control" name="idquan" value="1">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput1">Khu vực</label>
                    <input type="text" class="form-control" name="idkhuvuc" value="1">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Tên bàn</label>
                    <input type="text" class="form-control" name="tenban">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
