<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<title>MCU Pusdiklat BPS</title>

	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="{{asset('admin_lte/plugins/fontawesome-free/css/all.min.css')}}">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="{{asset('admin_lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
	<!-- Theme style -->
	<link rel="stylesheet" href="{{asset('admin_lte/dist/css/adminlte.min.css')}}">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
	<div>
		<!-- Navbar -->
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<a href='http://pusdiklat.bps.go.id' style="float:left;"><img src="{{asset('images/bps.png')}}" alt style="height:35px; font-style: 14;" > PUSDIKLAT BPS</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarText">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link disabled" href="#"></a>
					</li>
			      <li class="nav-item active">
			        <a class="nav-link" href="{{ url('/pemeriksaan') }}">Dashboard<span class="sr-only">(current)</span></a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="{{ url('/pemeriksaan/create') }}">Tambah Data</a>
			      </li>
			    </ul>
			 </div>
		</nav>
		<section class="content">
			<div class="container-fluid">
				@yield('content')
			</div>
		</section>
		<footer>
			<strong>Copyright &copy; 2020 <a href="http://pusdiklat.bps.go.id">Pusdiklat BPS</a>.</strong> Made With Love.
			<div class="float-right d-none d-sm-inline-block">
				<b>Version</b> 1.0.0
			</div>
		</footer>
	</div>
	<!-- ./wrapper -->

	<!-- REQUIRED SCRIPTS -->
	<!-- jQuery -->
	<script src="{{asset('admin_lte/plugins/jquery/jquery.min.js')}}"></script>
	<!-- Bootstrap -->
	<script src="{{asset('admin_lte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
	<!-- overlayScrollbars -->
	<script src="{{asset('admin_lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
	<!-- AdminLTE App -->
	<script src="{{asset('admin_lte/dist/js/adminlte.js')}}"></script>

	<!-- OPTIONAL SCRIPTS -->
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
	<script src="{{asset('admin_lte/dist/js/demo.js')}}"></script>

	<!-- PAGE PLUGINS -->
	<!-- jQuery Mapael -->
	<script src="{{asset('admin_lte/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
	<script src="{{asset('admin_lte/plugins/raphael/raphael.min.js')}}"></script>
	<script src="{{asset('admin_lte/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
	<script src="{{asset('admin_lte/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
	<!-- ChartJS -->
	<script src="{{asset('admin_lte/plugins/chart.js/Chart.min.js')}}"></script>

	<!-- PAGE SCRIPTS -->
	<script src="{{asset('admin_lte/dist/js/pages/dashboard2.js')}}"></script>
</body>
</html>
