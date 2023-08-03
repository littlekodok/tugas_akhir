@extends('layouts.main')

@section('container')
     <div class="content-body">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
						<div class="card">
							<div class="card-body d-flex align-items-center">
								<div>
									<h4 class="fs-20 mb-2 fw-bold" >Selamat Datang {{ auth()->user()->nama }}</h4>
									<p class="mb-0 ">E-SPTPD merupakan aplikasi pelaporan pajak berbasis website yang digunakan oleh BPPKAD Kabupaten Rembang dalam rangka penertiban pajak</p>
								</div>	
								
							</div>
						</div>
						<div>
						
						</div>
                </div>
				<div class="col-lg-12">
					<div class="row">
						<div class="col-xl-12">
							<div class="card">
								<div class="card-body">
									<div class="row shapreter-row">
										<div class="col-xl-3 col-lg-2 col-sm-4 col-6">
											<div class="static-icon">
												<span>
													<i class="fas fa-hotel"></i>
												</span>
												<h3 class="count mb-0">{{ count($hotelDiterima) }}</h3>
											
												<span class="fs-14">Pajak Hotel</span>
											</div>
										</div>
										
										
										<div class="col-xl-3 col-lg-2 col-sm-4 col-6">
											<div class="static-icon">
												<span>
													<i class="fa-solid fa-utensils"></i>
												</span>
												
												<h3 class="count mb-0">{{ count($restoranDiterima) }}</h3>
												<span class="fs-14">Pajak Restoran</span>
											</div>
										</div>
										<div class="col-xl-3 col-lg-2 col-sm-4 col-6">
											<div class="static-icon">
												<span>
													<i class="fa-solid fa-gamepad fa-xl"></i>
												</span>
												<h3 class="count mb-0">{{ count($hiburanDiterima) }}</h3>
												
												<span class="fs-14">Pajak Hiburan</span>
											</div>
										</div>
										<div class="col-xl-3 col-lg-2 col-sm-4 col-6">
											<div class="static-icon">
												<span>
													<i class="fa-solid fa-car-tunnel"></i>
												</span>
												<h3 class="count mb-0">{{ count($parkirDiterima) }}</h3>
												<span class="fs-14">Pajak Parkir</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-xl-12">
					<div class="row">
						<div class="col-xl-6 ">
							<div class="widget-stat card">
								<div class="card-body p-4">
									<div class="media ai-icon">
										<span class="me-3 bgl-primary text-primary">
											<!-- <i class="ti-user"></i> -->
											<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#4885ED}</style><path d="M0 32C0 14.3 14.3 0 32 0H480c17.7 0 32 14.3 32 32s-14.3 32-32 32V448c17.7 0 32 14.3 32 32s-14.3 32-32 32H304V464c0-26.5-21.5-48-48-48s-48 21.5-48 48v48H32c-17.7 0-32-14.3-32-32s14.3-32 32-32V64C14.3 64 0 49.7 0 32zm96 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H112c-8.8 0-16 7.2-16 16zM240 96c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H240zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H368c-8.8 0-16 7.2-16 16zM112 192c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H112zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H240c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H368zM328 384c13.3 0 24.3-10.9 21-23.8c-10.6-41.5-48.2-72.2-93-72.2s-82.5 30.7-93 72.2c-3.3 12.8 7.8 23.8 21 23.8H328z"/></svg>
										</span>
										<div class="media-body">
											<p class="mb-1">Total Pajak Hotel  Bulan Ini</p>
											<h4 class="mb-0">Rp. {{ number_format($totalHotel) }}</h4>
											<span class="badge light badge-success">+Rp. {{ $pajakHotelBaru != null ? number_format($pajakHotelBaru->total_pajak) : '0' }}</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					
						<div class="col-xl-6 ">
							<div class="widget-stat card">
								<div class="card-body p-4">
									<div class="media ai-icon">
										<span class="me-3 bgl-primary text-primary">
											<!-- <i class="ti-user"></i> -->
											<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M192 64C86 64 0 150 0 256S86 448 192 448H448c106 0 192-86 192-192s-86-192-192-192H192zM496 168a40 40 0 1 1 0 80 40 40 0 1 1 0-80zM392 304a40 40 0 1 1 80 0 40 40 0 1 1 -80 0zM168 200c0-13.3 10.7-24 24-24s24 10.7 24 24v32h32c13.3 0 24 10.7 24 24s-10.7 24-24 24H216v32c0 13.3-10.7 24-24 24s-24-10.7-24-24V280H136c-13.3 0-24-10.7-24-24s10.7-24 24-24h32V200z"/></svg>
										</span>
										<div class="media-body">
											<p class="mb-1">Total Pajak Hiburan Bulan Ini</p>
											<h4 class="mb-0">Rp. {{ number_format($totalHiburan) }}</h4>
											<span class="badge light badge-success">+Rp. {{ $pajakHiburanBaru != null ? number_format($pajakHiburanBaru->total_pajak) : '0' }}</span>

											{{-- <span class="badge light badge-success">+Rp. {{ number_format($pajakHiburanBaru->total_pajak) }}</span> --}}
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-6 ">
							<div class="widget-stat card">
								<div class="card-body p-4">
									<div class="media ai-icon">
										<span class="me-3 bgl-primary text-primary">
											<!-- <i class="ti-user"></i> -->
											<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M416 0C400 0 288 32 288 176V288c0 35.3 28.7 64 64 64h32V480c0 17.7 14.3 32 32 32s32-14.3 32-32V352 240 32c0-17.7-14.3-32-32-32zM64 16C64 7.8 57.9 1 49.7 .1S34.2 4.6 32.4 12.5L2.1 148.8C.7 155.1 0 161.5 0 167.9c0 45.9 35.1 83.6 80 87.7V480c0 17.7 14.3 32 32 32s32-14.3 32-32V255.6c44.9-4.1 80-41.8 80-87.7c0-6.4-.7-12.8-2.1-19.1L191.6 12.5c-1.8-8-9.3-13.3-17.4-12.4S160 7.8 160 16V150.2c0 5.4-4.4 9.8-9.8 9.8c-5.1 0-9.3-3.9-9.8-9L127.9 14.6C127.2 6.3 120.3 0 112 0s-15.2 6.3-15.9 14.6L83.7 151c-.5 5.1-4.7 9-9.8 9c-5.4 0-9.8-4.4-9.8-9.8V16zm48.3 152l-.3 0-.3 0 .3-.7 .3 .7z"/></svg>
											
										</span>
										<div class="media-body">
											<p class="mb-1">Total Pajak Restoran Bulan Ini</p>
											<h4 class="mb-0">Rp. {{ number_format($totalRestoran) }}</h4>
											<span class="badge light badge-success">+Rp. {{ number_format($pajakRestoranBaru->total_pajak) }}</span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-6 ">
							<div class="widget-stat card">
								<div class="card-body p-4">
									<div class="media ai-icon">
										<span class="me-3 bgl-primary text-primary">
											<!-- <i class="ti-user"></i> -->
											<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 0C114.6 0 0 114.6 0 256V448c0 35.3 28.7 64 64 64h42.8c-6.6-5.9-10.8-14.4-10.8-24V376c0-20.8 11.3-38.9 28.1-48.6l21-64.7c7.5-23.1 29-38.7 53.3-38.7H313.6c24.3 0 45.8 15.6 53.3 38.7l21 64.7c16.8 9.7 28.2 27.8 28.2 48.6V488c0 9.6-4.2 18.1-10.8 24H448c35.3 0 64-28.7 64-64V256C512 114.6 397.4 0 256 0zM362.8 512c-6.6-5.9-10.8-14.4-10.8-24V448H160v40c0 9.6-4.2 18.1-10.8 24H362.8zM190.8 277.5L177 320H335l-13.8-42.5c-1.1-3.3-4.1-5.5-7.6-5.5H198.4c-3.5 0-6.5 2.2-7.6 5.5zM168 408a24 24 0 1 0 0-48 24 24 0 1 0 0 48zm200-24a24 24 0 1 0 -48 0 24 24 0 1 0 48 0z"/></svg>
										</span>
										<div class="media-body">
											<p class="mb-1">Total Pajak Parkir Bulan Ini</p>
											<h4 class="mb-0">Rp. {{ number_format($totalParkir)  }}</h4>
											<span class="badge light badge-success">+Rp. {{ $pajakParkirBaru != null ? number_format($pajakParkirBaru->total_pajak) : '0' }}</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				{{-- <div class="col-xl-6 col-lg-12 col-sm-12">
					<div class="card">
						<div class="card-header border-0 pb-0 d-sm-flex d-block">
							<h4 class="card-title">Grafik Pajak Restoran</h4>
						</div>
						<div class="card-body">
							<canvas id="barChart_1" style="display: block; box-sizing: border-box; height: 250px; width: 696px;" width="696" height="250"></canvas>
						</div>
					</div>
				</div> --}}

				<div class="col-xl-12 col-lg-12 col-xxl-12 col-sm-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Pembayaran Terbaru</h4>
						</div>
						<div class="card-body">
							<div class="table-responsive recentOrderTable">
								<table class="table verticle-middle table-responsive-md">
									<thead>
										<tr class=" text-center">
											<th scope="col">No</th>
											<th scope="col">Wajib Pajak</th>
											<th scope="col">Objek Pajak</th>
											<th scope="col">Jenis Pajak</th>
											<th scope="col">Bulan Bayar</th>
											<th scope="col">Tanggal Transaksi</th>
											<th scope="col">Status</th>
											<th scope="col">Total Pajak</th>
										
										</tr>
									</thead>
									<tbody>
										@foreach ($transaksiBaru as $tb)
										<tr class="text-center">
											<td >{{ $loop->iteration }}</td>
											<td class="text-capitalize">{{ $tb->wajibpajak->nama }}</td>
											<td class="text-capitalize">{{ $tb->objekpajak->nama_objek }}</td>
											<td class="text-capitalize">{{ $tb->jenispajak->nama_pajak }}</td>
											<td class=" text-center">{{  Carbon::parse($tb->bulan_bayar)->locale('id')->getTranslatedMonthName('MMMM') }}</td>
											<td>{{ Carbon::parse($tb->created_at)->locale('id')->translatedFormat('l, j F Y H:i:s a')}}</td>
											@if ($tb->status == 'SUCCESS')
											<td><span class="badge badge-rounded light badge-success">{{ $tb->status }}</span></td>

											@elseif($tb->status == 'EXPIRE')
											<td><span class="badge badge-rounded light badge-danger">{{ $tb->status }}</span></td>
											@else
											<td><span class="badge badge-rounded light badge-warning">{{ $tb->status }}</span></td>

											@endif
											
											<td >Rp. {{ number_format($tb->total_pajak) }}</td>

										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
            </div>
        </div>

    </div>
@push('scripts')
<script>
	var ctx = document.getElementById('barChart_1').getContext('2d');
	var grafikRestoranChart = new Chart(ctx, {
				type: 'bar',
				data: {
					defaultFontFamily: 'Poppins',
					backgroundColor: 'rgba(249, 58, 11, 1)',
					labels:{!! json_encode($labels) !!},
					datasets :{!! json_encode($datasets) !!}
					 					
					// datasets: [
					// 	{
					// 		label: "My First dataset",	
					// 		data: [65, 59, 80, 81, 56, 55, 40],
					// 		borderColor: 'rgba(249, 58, 11, 1)',
					// 		borderWidth: "0",
					// 		backgroundColor: 'rgba(249, 58, 11, 1)'
					// 	}
					// ]
					}
				},
			);
  </script>
@endpush
@endsection
