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

<!-- Apex Chart -->
{{-- <script src="{{ asset('vendor/apexchart/apexchart.js') }}"></script> --}}
{{-- <script src="{{ asset('vendor/chartjs/chart.bundle.min.js') }}"></script> --}}

<!-- Chart piety plugin files -->
<script src="{{ asset('vendor/peity/jquery.peity.min.js') }}"></script>

<!-- Dashboard 1 -->
<script src="{{ asset('js/dashboard/dashboard-1.js') }}"></script>

<script src="{{ asset('vendor/owl-carousel/owl.carousel.js') }}"></script>

<script src="{{ asset('js/custom.min.js') }}"></script>
<script src="{{ asset('js/dlabnav-init.js') }}"></script>


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