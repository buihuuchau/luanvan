<!DOCTYPE html>
<html lang="en">
<head>
  	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@yield('title')
	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback')}}">
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css')}}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css')}}">
	<!-- DataTables -->
	<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
	<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
	<link rel="stylesheet" href="{{ asset('AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.css') }}">
	<!-- MyCSS -->
	<link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/mystyle.css')}}">
	@yield('css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

@include('partials.header')

@include('partials.sidebar')

@yield('content')

@include('partials.footer')
</div>
<!-- jQuery -->
<script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE/dist/js/adminlte.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- Page specific script -->
<!-- datatables -->
<script>
  	$(function () {

		$("#example1").DataTable({
		"paging": true,//hien thi phan trang
		"lengthChange": true,//so dong cua 1 trang
		"searching": true,//o tim kiem
		"ordering": true,// sap xep dong
		"info": true,// hien thi co tat ca bao nhieu dong
		"autoWidth": false,// tu dong thu nho theo kich co man hinh, nen chon false de dung cho dien thoai
		"responsive": true,// nut mo rong khi man hinh bi hep
		// "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],//cac chuc nang khac
		"buttons": ["colvis"]
		}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

		$('#example2').DataTable({
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"ordering": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		// "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
		"buttons": ["colvis"]
		}).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

		$('#example3').DataTable({
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"ordering": true,
		"info": true,
		"autoWidth": false,
		"responsive": true,
		// "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
		"buttons": ["colvis"]
		}).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');

		$('#example4').DataTable({
		"paging": false,
		"lengthChange": false,
		"searching": false,
		"ordering": false,
		"info": false,
		"autoWidth": true,
		"responsive": false,
		// "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
		"buttons": ["print"]
		}).buttons().container().appendTo('#example4_wrapper .col-md-6:eq(0)');
  	});
</script>
<!-- Nut tang giam so luong -->
<script>
	$('input.input-qty').each(function() {
		var $this = $(this),
			qty = $this.parent().find('.is-form'),
			min = Number($this.attr('min')),
			max = Number($this.attr('max'))
		if (min == 0) {
			var d = 0
		} else d = min
		$(qty).on('click', function() {
			if ($(this).hasClass('minus')) {
			if (d > min) d += -1
			} else if ($(this).hasClass('plus')) {
			var x = Number($this.val()) + 1
			if (x <= max) d += 1
			}
			$this.attr('value', d).val(d)
		})
	})
</script>
{{-- auto reload --}}
<script type = "text/JavaScript">
	function AutoRefresh( t ) {
		setTimeout("location.reload(true);", t);
	}
</script>


</body>
</html>
