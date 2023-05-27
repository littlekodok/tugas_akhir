<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="DexignLab">
	<meta name="robots" content="" >
	<meta name="keywords" content="admin dashboard, admin template, analytics, bootstrap, bootstrap 5, bootstrap 5 admin template, job board admin, job portal admin, modern, responsive admin dashboard, sales dashboard, sass, ui kit, web app, frontend">
	<meta name="description" content="We proudly present Jobick, a Job Admin dashboard HTML Template, If you are hiring a job expert you would like to build a superb website for your Jobick, it's a best choice.">
	<meta property="og:title" content="Jobick : Job Admin Dashboard Bootstrap 5 Template + FrontEnd">
	<meta property="og:description" content="We proudly present Jobick, a Job Admin dashboard HTML Template, If you are hiring a job expert you would like to build a superb website for your Jobick, it's a best choice." >
	<meta property="og:image" content="https://jobick.dexignlab.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
	
	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Page Title -->
	<title>E-SPTPD Kabupaten Rembang</title>
	
	<!-- Favicon icon -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
	
	<!-- All StyleSheet -->
	<link href="{{ asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/owl-carousel/owl.carousel.css" rel="stylesheet') }}">
	
	<!-- Globle CSS -->
	<link rel="stylesheet" href="{{ asset("css/style2.css") }}">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
	
	<!-- Leaflet Js -->
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
	
	<!-- Datatable -->
    <link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
</head>
<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
		<div class="lds-ripple">
			<div></div>
			<div></div>
		</div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

		<!--**********************************
            Content body start
        ***********************************-->
        @include('layouts.header')
        @include('layouts.sidebar')
        @yield('container')
        <!--**********************************
            Content body end
        ***********************************-->


	</div>
    <!--**********************************
        Main wrapper end
    ***********************************-->
	
<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
<script src="{{ asset('vendor/global/global.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('vendor/select2/js/select2.full.min.js') }}"></script>

<!-- Datatable -->
{{-- <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script> --}}
<script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
{{-- <script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script> --}}

<!-- Dashboard 1 -->
<script src="{{ asset('js/dashboard/dashboard-1.js') }}"></script>

<script src="{{ asset('vendor/owl-carousel/owl.carousel.js') }}"></script>

<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{ asset('js/dlabnav-init.js') }}"></script>

<!-- Leaflet Js -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>



@stack('scripts')	
<script>
function JobickCarousel()
	{

		/*  testimonial one function by = owl.carousel.js */
		jQuery('.front-view-slider').owlCarousel({
			loop:false,
			margin:30,
			nav:true,
			autoplaySpeed: 3000,
			navSpeed: 3000,
			autoWidth:true,
			paginationSpeed: 3000,
			slideSpeed: 3000,
			smartSpeed: 3000,
			autoplay: false,
			animateOut: 'fadeOut',
			dots:true,
			navText: ['', ''],
			responsive:{
				0:{
					items:1,
					
					margin:10
				},
				
				480:{
					items:1
				},			
				
				767:{
					items:3
				},
				1750:{
					items:3
				}
			}
		})
	}

	jQuery(window).on('load',function(){
		setTimeout(function(){
			JobickCarousel();
		}, 1000); 
	});
</script>
</body>
</html>