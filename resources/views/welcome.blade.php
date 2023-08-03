<!DOCTYPE html>
<html lang="en">
<head>
	
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="admin dashboard, admin template, analytics, bootstrap, bootstrap 5, bootstrap 5 admin template, job board admin, job portal admin,
	modern, responsive admin dashboard, sales dashboard, sass, ui kit, web app, frontent">
	<meta name="author" content="DexignLab">
	<meta name="robots" content="">
	<meta name="description" content="We proudly present a job portal, a job posting, and the bootstrap 5 admin & frontend HTML template, If you are a job expert and 
	would like to build a superb and top-notch website for your business or a posting center for jobs, then job admin is the best choice.">
	<meta property="og:title" content="Jobick : Job Admin Dashboard Bootstrap 5 Template + FrontEnd">
	<meta property="og:description" content="We proudly present a job portal, a job posting, and the bootstrap 5 admin & frontend HTML template, If you are a job expert 
	and would like to build a superb and top-notch website for your business or a posting center for jobs, then job admin is the best choice.">
	<meta property="og:image" content="https://Jobick.dexignlab.com/xhtml/social-image.png">
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

	<meta name="format-detection" content="telephone=no">
	
	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- Title -->
	<title>E-SPTPD Kabupaten Rembang</title>
    
	<!-- Favicon icon -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png"') }}">
    
	<!-- Stylesheet -->
	<link href="{{ asset('vendor/animate/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
	<link href="{{ asset('vendor/swiper/css/swiper-bundle.min.css') }}" rel="stylesheet">

	<!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
    <link class="skin" rel="stylesheet" href="{{ asset('css/skin/skin-1.css') }}">
	
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	
</head>
<body id="bg" data-anm=".anm">

{{-- <!--loader start -->
  <div id="loading-area" class="loading-page-1">
	<div class="loader">
		<div class="ball one"></div>
		<div class="ball two"></div>
		<div class="ball three"></div>
		<div class="ball four"></div>
	</div>
</div>  --}}
<!--loader start --> 

<div class="page-wraper">

	<!-- Header -->
	<header class="site-header mo-left header header-transparent">
		<!-- Main Header -->
		<div class="sticky-header main-bar-wraper navbar-expand-lg">
			<div class="main-bar clearfix ">
				<div class="container clearfix">
	
					<!-- Website Logo -->
					<div class="logo-header">
						<a href="index.html" class="logo-dark"><img src="{{ asset('images/logo.png') }}" alt=""></a>
					</div>
					
					<!-- Nav Toggle Button -->
					<button class="navbar-toggler collapsed navicon justify-content-end" type="button"
					data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>
					
					<!-- Extra Nav -->
					<div class="extra-nav">
						<div class="extra-cell">
							<a class="btn btn-primary btn-lg btn-shadow" target="" href="{{ route('registrasi') }}">Registrasi</a>
						</div>
						<div class="extra-cell">
							<a class="btn btn-dark btn-lg btn-shadow" target="" href="{{ route('login') }}">login</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Main Header End -->
	</header>
	<!-- Header End -->
	
	<div class="page-content">
		<div class="main-bnr bg-light">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-xl-7 col-lg-7 col-md-12">

						<h1 class=" wow fadeInUp" id="text" data-wow-delay="0.6s"><span class=" text-primary">E-SPTPD</span> Kabupaten Rembang</h1>
						<p class=" text text-primary wow fadeInUp font-w500" data-wow-delay="0.8s">Elektronik Surat Pemberitahuan Pajak Daerah  </p>	
					</div>
					<div class="col-xl-5 col-lg-5 col-md-12">
						<div class="banner-media">
							<img class="media wow bounceInRight" data-wow-delay="1.4s" src="{{ asset('images/home-banner/media-men.png') }}" alt="">	
						</div>
					</div>
				</div>
			</div>
			<svg class="shape1" viewBox="0 0 250 315" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M-15.8534 213.126L-49.2042 179.81C-58.9952 170.029 -58.9952 154.167 -49.2042 144.38L-15.8534 111.064C-6.0624 101.283 9.81609 101.283 19.6137 111.064L52.9646 144.38C62.7556 154.161 62.7556 170.023 52.9646 179.81L19.6137 213.126C9.81609 222.914 -6.0624 222.914 -15.8534 213.126Z" fill="var(--rgba-primary-6)"></path>
				<path d="M54.9201 306.94L23.9065 275.959C13.4659 265.529 13.4659 248.623 23.9065 238.194L54.9201 207.212C65.3607 196.783 82.2839 196.783 92.7245 207.212L123.738 238.194C134.179 248.623 134.179 265.529 123.738 275.959L92.7245 306.94C82.2839 317.37 65.354 317.37 54.9201 306.94Z" fill="var(--rgba-primary-6)"></path>
				<path d="M11.2693 151.465L-104.622 35.6945C-115.062 25.2648 -115.062 8.35919 -104.622 -2.0705L11.2693 -117.841C21.7099 -128.27 38.6331 -128.27 49.0737 -117.841L164.965 -2.0705C175.405 8.35919 175.405 25.2648 164.965 35.6945L49.0737 151.465C38.6331 161.894 21.7099 161.894 11.2693 151.465Z" fill="var(--primary-dark)"></path>
				<path d="M169.833 69.519L135.973 35.6945C125.533 25.2648 125.533 8.35919 135.973 -2.0705L169.833 -35.8951C180.274 -46.3248 197.197 -46.3248 207.638 -35.8951L241.497 -2.0705C251.938 8.35919 251.938 25.2648 241.497 35.6945L207.638 69.519C197.197 79.9487 180.274 79.9487 169.833 69.519Z" fill="var(--primary)"></path>
				<path d="M109.494 186.871L69.1182 146.537C63.0708 140.496 63.0708 130.702 69.1182 124.661L109.494 84.3272C115.542 78.2861 125.346 78.2861 131.393 84.3272L171.769 124.661C177.817 130.702 177.817 140.496 171.769 146.537L131.393 186.871C125.346 192.912 115.542 192.912 109.494 186.871Z" fill="var(--primary)"></path>
			</svg>
			<svg class="shape2"  viewBox="0 0 319 612" fill="none" xmlns="http://www.w3.org/2000/svg">
				<mask id="mask0_54_23" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0" width="319" height="612">
				<rect width="319" height="612" fill="var(--primary)"></rect>
				</mask>
				<g mask="url(#mask0_54_23)">
				<path d="M76.7559 377.481L36.5386 359.615C23.3563 353.759 16.9589 338.129 22.2524 324.711L38.402 283.774C43.6954 270.356 58.6781 264.223 71.8604 270.08L112.078 287.946C125.26 293.802 131.657 309.432 126.364 322.85L110.214 363.787C104.921 377.205 89.9382 383.338 76.7559 377.481Z" stroke="var(--primary-dark)" stroke-width="2" stroke-miterlimit="10"></path>
				<path d="M245.853 304.82L166.379 269.514C146.657 260.753 137.091 237.381 145.011 217.305L176.924 136.41C184.844 116.335 207.247 107.165 226.97 115.927L306.443 151.232C326.166 159.994 335.731 183.365 327.812 203.441L295.899 284.336C287.979 304.412 265.575 313.581 245.853 304.82Z" stroke="var(--primary-dark)" stroke-width="2" stroke-miterlimit="10"></path>
				<path d="M376.662 571.765L157.738 474.51C138.015 465.748 128.449 442.377 136.369 422.301L224.28 199.46C232.2 179.384 254.603 170.215 274.326 178.976L493.25 276.232C512.973 284.994 522.539 308.365 514.619 328.441L426.708 551.282C418.784 571.348 396.381 580.518 376.662 571.765Z" stroke="var(--primary-dark)" stroke-width="2" stroke-miterlimit="10"></path>
				<path d="M115.525 575.71L45.2359 544.485C25.5131 535.723 15.9473 512.352 23.8672 492.276L52.0921 420.73C60.012 400.654 82.4152 391.485 102.138 400.246L172.427 431.471C192.149 440.233 201.715 463.605 193.795 483.68L165.57 555.226C157.659 575.299 135.247 584.472 115.525 575.71Z" stroke="var(--primary-dark)" stroke-width="2" stroke-miterlimit="10"></path>
				<path d="M185.275 121.967L151.156 106.81C135.544 99.8747 127.966 81.3589 134.235 65.4683L147.936 30.7383C154.205 14.8477 171.953 7.58327 187.565 14.5184L221.684 29.6757C237.296 36.6109 244.874 55.1268 238.605 71.0173L224.904 105.747C218.635 121.638 200.895 128.899 185.275 121.967Z" stroke="var(--primary-dark)" stroke-width="2" stroke-miterlimit="10"></path>
				<path d="M141.303 344.782L115.419 333.283C106.513 329.327 102.19 318.765 105.766 309.699L116.16 283.352C119.736 274.287 129.861 270.143 138.767 274.099L164.651 285.598C173.557 289.555 177.88 300.117 174.304 309.182L163.91 335.529C160.334 344.595 150.209 348.739 141.303 344.782Z" stroke="var(--primary-dark)" stroke-width="2" stroke-miterlimit="10"></path>
				<path d="M88.3079 244.487L79.933 240.767C75.6064 238.845 73.5055 233.712 75.2429 229.308L78.6059 220.783C80.3433 216.379 85.2636 214.365 89.5903 216.287L97.9652 220.007C102.292 221.93 104.393 227.063 102.655 231.467L99.2923 239.991C97.5549 244.395 92.6346 246.409 88.3079 244.487Z" stroke="var(--primary-dark)" stroke-width="2" stroke-miterlimit="10"></path>
				<path d="M83.1256 390.858L42.9082 372.992C29.7259 367.135 23.3286 351.505 28.622 338.087L44.7716 297.15C50.065 283.732 65.0478 277.6 78.23 283.456L118.447 301.322C131.63 307.178 138.027 322.808 132.734 336.227L116.584 377.163C111.291 390.582 96.3167 396.71 83.1256 390.858Z" fill="var(--primary-dark)"></path>
				<path d="M275.11 335.94L195.637 300.634C175.914 291.873 166.348 268.501 174.268 248.426L206.181 167.531C214.101 147.455 236.504 138.285 256.227 147.047L335.7 182.352C355.423 191.114 364.989 214.486 357.069 234.561L325.156 315.456C317.245 335.528 294.833 344.701 275.11 335.94Z" fill="var(--rgba-primary)"></path>
				<path d="M416.689 688.933L358.103 662.906C338.38 654.144 328.814 630.773 336.734 610.697L360.26 551.063C368.18 530.987 390.583 521.818 410.306 530.579L468.892 556.606C488.615 565.367 498.181 588.739 490.261 608.815L466.735 668.449C458.815 688.525 436.412 697.694 416.689 688.933Z" fill="white"></path>
				<path d="M405.915 602.876L186.991 505.621C167.268 496.859 157.702 473.488 165.622 453.412L253.533 230.571C261.453 210.495 283.856 201.326 303.579 210.087L522.503 307.343C542.226 316.105 551.792 339.476 543.872 359.552L455.961 582.393C448.041 602.469 425.638 611.638 405.915 602.876Z" fill="var(--primary-dark)"></path>
				<path d="M144.79 606.827L74.5018 575.601C54.779 566.84 45.2132 543.468 53.133 523.393L81.358 451.847C89.2779 431.771 111.681 422.601 131.404 431.363L201.693 462.588C221.415 471.35 230.981 494.721 223.061 514.797L194.836 586.343C186.916 606.419 164.504 615.592 144.79 606.827Z" fill="var(--primary-dark)"></path>
				<path d="M214.529 153.078L180.409 137.921C164.798 130.986 157.219 112.47 163.488 96.5792L177.189 61.8492C183.458 45.9587 201.207 38.6942 216.818 45.6293L250.938 60.7867C266.549 67.7219 274.127 86.2377 267.859 102.128L254.158 136.858C247.893 152.758 230.153 160.019 214.529 153.078Z" fill="var(--primary-dark)"></path>
				<path d="M170.56 375.902L144.676 364.404C135.769 360.447 131.446 349.885 135.023 340.82L145.417 314.473C148.993 305.407 159.118 301.263 168.024 305.22L193.908 316.718C202.814 320.675 207.137 331.237 203.56 340.302L193.167 366.649C189.59 375.715 179.475 379.855 170.56 375.902Z" fill="var(--primary-dark)"></path>
				<path d="M117.561 275.598L109.186 271.878C104.86 269.956 102.759 264.823 104.496 260.419L107.859 251.894C109.596 247.49 114.517 245.476 118.843 247.398L127.218 251.118C131.545 253.04 133.646 258.173 131.909 262.577L128.546 271.102C126.808 275.506 121.897 277.517 117.561 275.598Z" fill="var(--primary-dark)"></path>
				</g>
			</svg>
		</div>
		
		<section class="content-inner overflow-hidden position-relative">
			<div class="container">
				<div class="section-head text-center">
					<h6 class="text wow fadeInUp" data-wow-delay="0.6s">Alur Pelaporan</h6>
					<h4 class="title wow fadeInUp" data-wow-delay="0.8s">Langkah - Langkah Pelaporan dan Pembayaran</h4>
				</div>
				<div class="row justify-content-center">
					<div class="col-lg-4 col-md-6 m-b30">
						<div class="icon-bx-wraper style-1 bg-clr-sky wow bounceInLeft" data-wow-delay="1.2s" >
							
							<div class="icon-content">
								<h4 class="title">Registrasi Akun</h4>
								<p class="text">Setiap Wajib Pajak yang sudah berhak dan berkewajiban dapat melakukan registrasi Akun</p>
							</div>
							<h3 class="count">01</h3>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 m-b30">
						<div class="icon-bx-wraper style-1 bg-clr-pink wow bounceInUp" data-wow-delay="1.0s">
							
							<div class="icon-content">
								<h4 class="title">Lapor Objek Pajak</h4>
								<p class="text">Wajib Pajak yang sudah memiliki dan sudah divalidasi dapat memdaftarakan Objek Pajaknya</p>
							</div>
							<h3 class="count">02</h3>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 m-b30">
						<div class="icon-bx-wraper style-1 bg-clr-green wow bounceInRight" data-wow-delay="1.2s">
							
							<div class="icon-content">
								<h4 class="title">Bayar Pajak</h4>
								<p class="text">Pembayaran Objek Pajak yang sudah didaftarkan dan divalidasi</p>
							</div>
							<h3 class="count">03</h3>
						</div>
					</div>
				</div>
			</div>	
		</section>
	
		{{-- <section class="content-inner bg-light position-relative overflow-hidden">
			<div class="container">
				
			</div>
		</section> --}}
		
		<section class="content-inner overflow-hidden position-relative">
			<div class="container">
				<div class="section-head text-center">
					<h6 class="text wow fadeInUp" data-wow-delay="0.6s">Kategori Pajak</h6>
					<h2 class="title wow fadeInUp" data-wow-delay="0.8s">Kewajiban Membayar Pajak </h2>
				</div>
				<div class="row">
					<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
						<div class="icon-bx-wraper style-2 text-center wow fadeInUp" data-wow-delay="1.0s" >
							<div class="icon-media"> 
								<svg xmlns="http://www.w3.org/2000/svg" height="3em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M416 0C400 0 288 32 288 176V288c0 35.3 28.7 64 64 64h32V480c0 17.7 14.3 32 32 32s32-14.3 32-32V352 240 32c0-17.7-14.3-32-32-32zM64 16C64 7.8 57.9 1 49.7 .1S34.2 4.6 32.4 12.5L2.1 148.8C.7 155.1 0 161.5 0 167.9c0 45.9 35.1 83.6 80 87.7V480c0 17.7 14.3 32 32 32s32-14.3 32-32V255.6c44.9-4.1 80-41.8 80-87.7c0-6.4-.7-12.8-2.1-19.1L191.6 12.5c-1.8-8-9.3-13.3-17.4-12.4S160 7.8 160 16V150.2c0 5.4-4.4 9.8-9.8 9.8c-5.1 0-9.3-3.9-9.8-9L127.9 14.6C127.2 6.3 120.3 0 112 0s-15.2 6.3-15.9 14.6L83.7 151c-.5 5.1-4.7 9-9.8 9c-5.4 0-9.8-4.4-9.8-9.8V16zm48.3 152l-.3 0-.3 0 .3-.7 .3 .7z"/></svg>
							</div>
							<div class="icon-content">
								<h5 class="fs-20 mb-0 mt-4"><a href="#">Pajak Restoran</a></h5>
								
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
						<div class="icon-bx-wraper style-2 text-center wow fadeInUp" data-wow-delay="1.2s" >
							<div class="icon-media"> 
								<svg xmlns="http://www.w3.org/2000/svg" height="3em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 32C0 14.3 14.3 0 32 0H480c17.7 0 32 14.3 32 32s-14.3 32-32 32V448c17.7 0 32 14.3 32 32s-14.3 32-32 32H304V464c0-26.5-21.5-48-48-48s-48 21.5-48 48v48H32c-17.7 0-32-14.3-32-32s14.3-32 32-32V64C14.3 64 0 49.7 0 32zm96 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H112c-8.8 0-16 7.2-16 16zM240 96c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H240zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H368c-8.8 0-16 7.2-16 16zM112 192c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H112zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H240c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H368zM328 384c13.3 0 24.3-10.9 21-23.8c-10.6-41.5-48.2-72.2-93-72.2s-82.5 30.7-93 72.2c-3.3 12.8 7.8 23.8 21 23.8H328z"/></svg>
							</div>
							<div class="icon-content">
								<h5 class="fs-20 mt-4 mb-0"><a href="javascript:void(0);">Pajak Hotel</a></h5>
								
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
						<div class="icon-bx-wraper style-2 text-center wow fadeInUp" data-wow-delay="1.4s" >
							<div class="icon-media"> 
								<svg xmlns="http://www.w3.org/2000/svg" height="3em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M435.4 361.3l-89.7-6c-5.2-.3-10.3 1.1-14.5 4.2s-7.2 7.4-8.4 12.5l-22 87.2c-14.4 3.2-29.4 4.8-44.8 4.8s-30.3-1.7-44.8-4.8l-22-87.2c-1.3-5-4.3-9.4-8.4-12.5s-9.3-4.5-14.5-4.2l-89.7 6C61.7 335.9 51.9 307 49 276.2L125 228.3c4.4-2.8 7.6-7 9.2-11.9s1.4-10.2-.5-15L100.4 118c19.9-22.4 44.6-40.5 72.4-52.7l69.1 57.6c4 3.3 9 5.1 14.1 5.1s10.2-1.8 14.1-5.1l69.1-57.6c27.8 12.2 52.5 30.3 72.4 52.7l-33.4 83.4c-1.9 4.8-2.1 10.1-.5 15s4.9 9.1 9.2 11.9L463 276.2c-3 30.8-12.7 59.7-27.6 85.1zM256 48l.9 0h-1.8l.9 0zM56.7 196.2c.9-3 1.9-6.1 2.9-9.1l-2.9 9.1zM132 423l3.8 2.7c-1.3-.9-2.5-1.8-3.8-2.7zm248.1-.1c-1.3 1-2.7 2-4 2.9l4-2.9zm75.2-226.6l-3-9.2c1.1 3 2.1 6.1 3 9.2zM256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm14.1-325.7c-8.4-6.1-19.8-6.1-28.2 0L194 221c-8.4 6.1-11.9 16.9-8.7 26.8l18.3 56.3c3.2 9.9 12.4 16.6 22.8 16.6h59.2c10.4 0 19.6-6.7 22.8-16.6l18.3-56.3c3.2-9.9-.3-20.7-8.7-26.8l-47.9-34.8z"/></svg>
							</div>
							<div class="icon-content">
								<h5 class="fs-20  mt-4 mb-0"><a href="javascript:void(0);">Pajak Hiburan</a></h5>
								
							</div>
						</div>				
					</div>
					<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
						<div class="icon-bx-wraper style-2 text-center wow fadeInUp" data-wow-delay="1.6s" >
							<div class="icon-media"> 
								<svg xmlns="http://www.w3.org/2000/svg" height="3em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 0C114.6 0 0 114.6 0 256V448c0 35.3 28.7 64 64 64h42.8c-6.6-5.9-10.8-14.4-10.8-24V376c0-20.8 11.3-38.9 28.1-48.6l21-64.7c7.5-23.1 29-38.7 53.3-38.7H313.6c24.3 0 45.8 15.6 53.3 38.7l21 64.7c16.8 9.7 28.2 27.8 28.2 48.6V488c0 9.6-4.2 18.1-10.8 24H448c35.3 0 64-28.7 64-64V256C512 114.6 397.4 0 256 0zM362.8 512c-6.6-5.9-10.8-14.4-10.8-24V448H160v40c0 9.6-4.2 18.1-10.8 24H362.8zM190.8 277.5L177 320H335l-13.8-42.5c-1.1-3.3-4.1-5.5-7.6-5.5H198.4c-3.5 0-6.5 2.2-7.6 5.5zM168 408a24 24 0 1 0 0-48 24 24 0 1 0 0 48zm200-24a24 24 0 1 0 -48 0 24 24 0 1 0 48 0z"/></svg>
							</div>
							<div class="icon-content">
								<h5 class="fs-20 mt-4 mb-0"><a href="javascript:void(0);">Pajak Parkir</a></h5>
								
							</div>
						</div>
					</div>
					
				</div>
			</div>		
		</section>
		
		
		<!--footer-action -->
		<div class="container">
			<section class="footer-action wow fadeInUp" data-wow-delay="1.0s">
				<div class="inner-content wow fadeInUp" data-wow-delay="1.2s">
					<div class="row justify-content-between align-items-center">
						<div class="text-center text-xl-start col-xl-7 m-lg-b20">
							<h2 class="title">Mari Bayar Pajak Tepat Pada Waktunya</h2>
						</div>
						<div class="text-center text-xl-end col-xl-5">
							<a class="btn btn-light btn-lg" href="{{ route('registrasi') }}">Buat Akun</a>
						</div>
					</div>
				</div>
			</section>
		</div>
		<!-- footer-action -->	
	</div>
	
	<!-- Footer -->
    <footer class="site-footer style-1 position-relative">
		<div class="footer-top bg-light sapping">
			<div class="container">
				<div class="row p-50">
					<div class="col-lg-6 col-md-12 col-sm-12">
						<div class="row d-flex justify-content-end ">	
							<div class="col-lg-8 col-md-4 col-sm-4 col-6 text-start">
								<!-- Content -->
								<h3 class="text-uppercase fw-bold mb-4">
									<i class="fa-solid fa-square-check me-3"></i>E-SPTPD 
								</h3>
								<p>
								  Elektronik Surat Pemberitahuan Pajak Daerah merupakan aplikasi pembayaran pajak yang digunakan oleh Wajib Pajak dalam melakuakn pelaporan pajak dan pembayaran pajak
								</p>
							  </div>
						</div>
					</div>	
					<div class="col-lg-6 col-md-12 col-sm-12">
						<div class="row d-flex justify-content-start">	
							<div class="col-lg-12 col-md-4 col-sm-4 col-6 text-left">
								<!-- Content -->
								<h3 class=" fw-bold mb-4">
									<i class="fa-solid fa-address-book me-3"></i>Kontak
								</h3>
								<ul class="list-unstyled tweets mb-3">
									<li class="d-flex align-items-center mb-3">
										<div class=" me-4"><i class="fas fa-home me-end"></i></div>
										<div>Badan Pendapatan Pengelolaan Keuangan dan Aset Daerah <b>BPPKAD Kabupaten Rembang</b></div>
									</li>
									<li class="d-flex align-items-center mb-3">
										<div class=" me-4"><i class="fa-solid fa-location-dot"></i></div>
										<div>Jl. Jend. Gatot Subroto No.8, Kutoharjo, Rembang</div>
										</li>
									<li class="d-flex align-items-center mb-3">
										<div class=" me-4"><i class="fa-solid fa-phone"></i></div>
										<div>08212121212</div>
										</li>
								</ul>
							  </div>
						</div>
					</div>	
					
					
				</div>	
			</div>
		</div>
		<div class="footer-bottom text-md-center text-md-center bg-light">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-12">
						<div class="footer-inner text-center ">
							<p class="copyright-text wow fadeInUp" data-wow-delay="2.4s">Copyright 2023 by <a class="text-primary" href="#" target="_blank">BPPKAD Kabupaten Rembang</a></p>
						</div>
					</div>
				</div>	
			</div>
		</div>	
	</footer>
    <!-- Footer End -->

	<button class="scroltop icon-up" type="button"><i class="fas fa-arrow-up"></i></button>
</div>

<!-- JAVASCRIPT FILES ========================================= -->
<script src="{{ asset('js/jquery.min.js') }}"></script><!-- JQUERY.MIN JS -->
<script src="{{ asset('js/anm.js') }}"></script><!-- JQUERY.MIN JS --> 
<script src="{{ asset('vendor/wow/wow.js') }}"></script><!-- WOW.JS -->
<script src="{{ asset('vendor/swiper/js/swiper-bundle.min.js') }}"></script><!-- OWL silder -->
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script><!-- WOW.JS -->
<script src="{{ asset('vendor/magnific-popup/magnific-popup.js') }}"></script><!-- OWL SLIDER -->
<script src="{{ asset('js/dz.carousel.js') }}"></script><!-- OWL SLIDER -->
<script src="{{ asset('js/dz.ajax.js') }}"></script><!-- AJAX -->
<script src="{{ asset('js/custom.js') }}"></script><!-- CUSTOM JS -->

</body>
</html>