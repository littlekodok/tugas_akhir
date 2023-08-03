@extends('layouts.main')

@section('container')
     <div class="content-body">

        <div class="container-fluid">
			  @if (session()->has('edit'))
                            <div class="alert alert-warning solid alert-dismissible fade show col-lg-12 my-2 mb-3">
                                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
                                        <strong>Sukses! </strong> {{ session('edit') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                        </button>
                                </div>
                @endif
            <div class="row">
                <div class="col-lg-12">
						<div class="page-titles">
							<ol class="breadcrumb">
								<li class="breadcrumb-item active"><a href="javascript:void(0)">Data Wajib Pajak</a></li>
                                <li class="breadcrumb-item "><a href="javascript:void(0)">Validasi Wajib Pajak</a></li>
							</ol>
						</div>
                </div>
            </div>
             
            <div class="row">
					<div class="col-xl-12">
						<form action="{{ route('admin.data-wajib-pajak.validasi-post',$wajibpajak->id) }}" id="form" method="post">
							@csrf
						<div class="card">
							<div class="card-header border-0 flex-wrap align-items-start">
								<div class="col-md-8">
									<div class="user d-sm-flex d-block pe-md-5 pe-0">
										
										<div class="ms-sm-3 ms-0 me-md-5 md-0">
											<h5 class="mb-1 font-w600"><a href="javascript:void(0);" class="text-black">{{ $wajibpajak->nama }}</a></h5>
											<div class="listline-wrapper mb-2">
												<span class="item"><i class="text-primary far fa-envelope"></i>{{ $wajibpajak->email }}</span>
												<span class="item"><i class="text-primary far fa-id-badge"></i>{{ $wajibpajak->user->akses }}</span>
												<span class="item"><i class="text-primary fas fa-map-marker-alt"></i>Indonesia</span>
											</div>
								
										</div>
									</div>
								</div>
							</div>
							<div class="card-body pt-0">
								<h4 class="fs-20">Deskripsi</h4>
								<div class="row">
									
									<div class="col-xl-6 col-md-6">
										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Nama Lengkap : </span><span class="font-w400">{{ $wajibpajak->nama }}</span></p>
										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Tanggal Daftar : </span><span class="font-w400">{{ $wajibpajak->tanggal_daftar }}</span></p>
										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Nomor Registrasi : </span><span class="font-w400">{{ sprintf("%07s",$wajibpajak->no_pendaftaran) }}</span></p>
										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Jenis Pendapatan : </span><span class="font-w400">{{ $wajibpajak->jenis_pendapatan }}</span></p>
										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Jenis Usaha : </span><span class="font-w400">{{ $wajibpajak->jenis_usaha == 1 ? "Pribadi" : "Badan Usaha"  }}</span></p>
										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">NIK/NIB :</span> <span class="font-w400">{{ $wajibpajak->nik}}</span></p>
										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Foto :</span></p>
                                        <div id="lightgallery" class=" col-xl-4 col-md-4 d-flex justify-content-center" >
                                            <a href="{{ Storage::url($wajibpajak->foto) }}" data-exthumbimage="{{ Storage::url($wajibpajak->foto) }}" data-src="{{ Storage::url($wajibpajak->foto) }}" class="col-lg-3 col-md-6 mb-4">
                                                <img src="{{ Storage::url($wajibpajak->foto) }}" alt="" class="d-flex justify-content-center foto"  style="max-width: 300px; max-height:400px;">
                                            </a>
                                        </div>

                                        
									</div>
									<div class="col-xl-6 col-md-6">
										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Kabupaten :</span> <span class="font-w400">{{ $wajibpajak->kabupaten }}</span></p>
										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Kecamatan :</span> <span class="font-w400" >{{ $wajibpajak->kecamatan->nama_kecamatan }}</span></p>
										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Kelurahan : </span><span class="font-w400">{{ $wajibpajak->kelurahan->nama_kelurahan }}</span></p>
										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Kode Pos:</span> <span class="font-w400">{{ $wajibpajak->kode_pos }}</span></p>
										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Nomor Telepon : </span><span class="font-w400">{{ $wajibpajak->no_telpon }}</span></p>
										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Email : </span><span class="font-w400">{{ $wajibpajak->email }}</span></p>
										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">Alamat: </span><span class="font-w400">{{ $wajibpajak->alamat}}</span></p>
										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">RT:  </span><span class="font-w400">{{ $wajibpajak->rt }}</span></p>
										<p class="font-w600 mb-2 d-flex"><span class="custom-label-2">RW: </span><span class="font-w400">{{ $wajibpajak->rw }}</span></p>
                                    </div>
                                     <div class="row">
                		</div>
								</div>
							</div>
							<div class="card-footer mt-3 d-flex flex-wrap justify-content-between align-items-center">
								<div class="mb-md-2 mb-3 exp-del">
									<span class="d-block mb-1"><i class="fas fa-circle me-2" style="color: #ffa755"></i>Wajib Pajak  <strong class="text-warning">Belum Tervalidasi</strong></span>
								
								</div>
								<div>	
									<button   type="submit" class="btn btn-primary btn-sm me-2  sweet-confirm"><i class="fas fa-check me-2"></i>Validasi</button>
									<a type="button" href="{{ route('admin.data-wajib-pajak.edit-validasi',$wajibpajak->id) }}" class="btn btn-warning btn-sm me-2"><i class="fas fa-pencil me-2"></i>Edit</a>
								</div>
							</div>
						</div>
						</form>
					</div>
				</div>
            </div>
        </div>

    </div>	
	@push('scripts')

	<script>
		document.querySelector(".sweet-confirm").onclick = function (e) {
			e.preventDefault();
			Swal.fire({
				title: 'Apakah anda yakin?',
				text: "Pastikan Data Sudah Benar",
				type: 'warning',
				showCancelButton: true,
				cancelButtonText: 'Batal',
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Ya'
				}).then((result) => {
				if (result.isConfirmed) {
					document.querySelector('#form').submit()
				}
			})
		}
	</script>
	@endpush
@endsection
