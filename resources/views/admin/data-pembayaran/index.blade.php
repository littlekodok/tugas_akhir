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
								<div class="upload">
									<a href="javascript:void(0);"><i class="fas fa-arrow-up"></i></a>
								</div>
							</div>
						</div>
                </div>
            </div>
            
          

        </div>

    </div>

@endsection
