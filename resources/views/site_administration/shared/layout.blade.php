<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Intel Access | @yield('title')</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	
	<!-- ================== BEGIN BASE CSS STYLE ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="{{ asset('plugins/bootstrap/4.1.0/css/bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/ionicons/css/ionicons.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/apple/style.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/apple/style-responsive.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('plugins/gritter/css/jquery.gritter.css') }}" rel="stylesheet" />
	<!-- ================== END BASE CSS STYLE ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
	@yield('css')
	<!-- ================== END PAGE LEVEL STYLE ================== -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{ asset('plugins/pace/pace.min.js') }}"></script>
	<!-- ================== END BASE JS ================== -->

	<style>
	</style>
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade show"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		@include("site_administration.shared.header-nav")
		<!-- end #header -->
		
		<!-- begin #sidebar -->
		<div id="sidebar" class="sidebar">
			@include("site_administration.shared.side-nav")
		</div>
		<div class="sidebar-bg"></div>
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			@yield('content')
		</div>
		<!-- end #content -->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{ asset('plugins/jquery/jquery-3.2.1.min.js') }}"></script>
	<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap/4.1.0/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('js/theme/apple.min.js') }}"></script>
	<script src="{{ asset('plugins/gritter/js/jquery.gritter.js') }}"></script>
	<script src="{{ asset('js/apps.min.js') }}"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	@yield('js')
	
	@if(session()->has('success'))
        <script>
			$.gritter.add({
                title: 'SUCCESS',
                text: '{{ session()->get('success') }}',
                time: 8000,
                class_name: 'gritter-info gritter-center'
            });
        </script>
	@endif	

	@if(session()->has('error'))
        <script>
			$.gritter.add({
                title: 'ERROR',
                text: '{{ session()->get('error') }}',
                time: 5000,
                class_name: 'gritter-light gritter-center'
            });
        </script>
	@endif

	@if(session()->has('loggedin'))
        <script>
            $.gritter.add({
                title: "{{ session()->get('loggedin') }}, {{ Auth::user()->first_name }}",
                text: "",
                image: "{{ route('image', ['filename' => Auth::user()->id . '-' . Auth::user()->first_name . '.jpg']) }}",
                time: 5000,
                class_name: "my-sticky-class"
            });
        </script>
	@endif
	<!-- ================== END PAGE LEVEL JS ================== -->
</body>
</html>

