@extends('layouts.main')

@section('container')
     <div class="content-body">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
						<div class="page-titles">
							<ol class="breadcrumb">
								<li class="breadcrumb-item "><a href="{{ route('admin.data-objek-pajak.pajak-restoran') }}">Data Pajak Restoran</b></a></li>
								<li class="breadcrumb-item active"><a >Data {{ $objekpajak->nama_objek }}</a></li>
                                
							</ol>
						</div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-9 col-xxl-8">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header d-block">
                                    <h4 class="fs-20 d-block"><a href="javascript:void(0);" class="text-black">{{ $objekpajak->nama_objek }}</a></h4>
                                    <div class="d-block">
                                        <span class="me-2"><i class="text-primary fas fa-briefcase me-2"></i>{{ $objekpajak->jenispajak->nama_pajak }}</span>
                                        <span class="me-2"><i class="text-primary fas fa-map-marker-alt me-2"></i>kabupaten Rembang</span>
                                        
                                    </div>
                                </div>
                                    <div class="card-body pb-0">
                                        <form action="{{ route('admin.pajak-restoran.validasi-post',$objekpajak->id) }}" id="form" method="post">
                                            @csrf
                                                <h4 class="fs-20 mb-3">Deskripsi Objek Pajak</h4>                                    
                                                <div class="row mb-3">
                                                    <div class="col-xl-12">
                                                        <div>
                                                            <p class="font-w500 mb-3"><span class="custom-label">Objek Pajak </span><span class="font-w400"> {{ $objekpajak->nama_objek }}</span></p>
                                                            <p class="font-w500 mb-3"><span class="custom-label">Jenis Pajak </span><span class="font-w400"> {{ $objekpajak->jenispajak->nama_pajak }}</span></p>
                                                            <p class="font-w500 mb-3"><span class="custom-label">Rekening </span><span class="font-w400"> {{ $objekpajak->rekening->nama_rekening }}</span></p>
                                                            <p class="font-w500 mb-3"><span class="custom-label">Kode Rekening </span><span class="font-w400"> {{ $objekpajak->rekening->kode_rekening }}</span></p>
                                                            <p class="font-w500 mb-3"><span class="custom-label">Alamat </span><span class="font-w400">{{ $objekpajak->alamat_objek. ','.'RT'.' '.$objekpajak->rt_objek.','.'RW'.' '.$objekpajak->rt_objek. ','. ' '. $objekpajak->kelurahan->nama_kelurahan. ',' . ' '.$objekpajak->kecamatan->nama_kecamatan.','.' '.'Kabupaten Rembang'}}</span></p>
                                                        </div>
                                                    </div>
                                                </div>	
                                                    <div class="d-flex justify-content-center py-4 border-bottom border-top flex-wrap">
                                                        <div class="col-xl-12">
                                                            <div class="col-xl-12 map " id="map" style="height:350px; margin:20px 0px"></div>
                                                        </div>
                                                    </div>
                                                    <h4 class="custom-label d-flex justify-content-center my-3">Foto Objek Pajak</h4>
                                                    <div id="lightgallery" class="row">
                                                        @foreach ($objekpajak->fotoobjekpajak as $ft)
                                                        <a href="{{ Storage::url($ft->foto) }}" data-exthumbimage="{{ Storage::url($ft->foto) }}" data-src="{{ Storage::url($ft->foto) }}" class="col-lg-3 col-md-6 mb-4">
                                                            <img src="{{ Storage::url($ft->foto) }}" alt="" class="rounded "  style="width:100%">
                                                        </a>
                                                        @endforeach
                                                    </div>
                                                    <hr>
                                                    <div>
                                                        <label class="form-label font-w600">Validasi:<span class="text-danger scale5 ms-2">*</span></label>
                                                       
                                                        <div class="btn-group d-flex col-xl-8" role="group" aria-label="section preference">
                                                            <input type="radio" class="btn-check @error('validasi') is-invalid @enderror" required  name="validasi" value="Diterima" id="option1" autocomplete="off"/>
                                                            <label class="btn light btn-success" for="option1">Diterima</label>   
                                                            
                                                            <input type="radio"  class="btn-check" name="validasi" value="Ditolak" id="option2" autocomplete="off"/>
                                                            <label class="btn light btn-danger" for="option2">Ditolak</label>
                                                            @error('validasi')
                                                            <span class="invalid-feedback ms-3" >
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                           
                                                        </div>
                                                      
                                                    </div>
                                                    <hr>
                                                    <div class="col-xl-12 mb-4">
                                                        <label class="form-label font-w600">Keterangan:<span class="text-danger scale5 ms-2">*</span></label>
                                                        <textarea class="form-control solid @error('keterangan') is-invalid @enderror" rows="5" value="{{ old('keterangan') }}" aria-label="With textarea" required name="keterangan"></textarea>
                                                        @error('keterangan')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    </div>
                                                    <div class="card-footer border-0">
                                                        <div class="d-flex justify-content-star flex-wrap">
                                                            <a  href="{{ route('admin.data-objek-pajak.pajak-restoran') }}" type="button" class="btn light btn-dark btn-sm me-2">Kembali</a>
                                                            <button  href="javascript:void(0);" type="submit" class="btn light btn-primary btn-sm me-2 sweet-confirm"><i class="far fa-check-circle me-2"></i>Simpan</button>
                                                        </div>
                                                    </div>
                                        </form>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-xxl-4">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header border-0 pb-0">
                                    <h4 class="fs-20 mb-0">Data Wajib Pajak</h4>
                                </div>
                                <div class="card-body pt-4">
                                    <div class="mb-3 d-flex">
                                        <h5 class="mb-1 fs-14 custom-label">Wajib Pajak</h5>
                                        <span> {{ $objekpajak->wajibpajak->nama }}</span>	
                                    </div>
                                    <div class="mb-3 d-flex">
                                        <h5 class="mb-1 fs-14 custom-label">NPWPD</h5>
                                        <span>{{ "P.".$objekpajak->wajibpajak->jenis_usaha.".".sprintf("%07s",$objekpajak->wajibpajak->no_pendaftaran).".".$objekpajak->wajibpajak->kecamatan->kode_kecamatan.".".$objekpajak->wajibpajak->kelurahan->kode_kelurahan }}</span>	
                                    </div>
                                    <div class="mb-3 d-flex">
                                        <div class="col-lg-3">
                                            <h5 class="mb-1 fs-14 custom-label">Jenis Pendapatan</h5>
                                        </div>

                                        <span class="ms-5">{{ $objekpajak->wajibpajak->jenis_pendapatan }}</span>	
                                    </div>
                                    <div class="mb-3 d-flex">
                                        <h5 class="mb-1 fs-14 custom-label">Jenis Usaha</h5>
                                        <span>{{ $objekpajak->wajibpajak->jenis_usaha == 1 ? 'Pribadi' : 'Badan Usaha' }}</span>	
                                    </div>
                                    <div class="mb-3 d-flex">
                                        <h5 class="mb-1 fs-14 custom-label">NIK</h5>
                                        <span>{{ $objekpajak->wajibpajak->nik }}</span>	
                                    </div>
                                    <div class="mb-3 d-flex">
                                        <h5 class="mb-1 fs-14 custom-label">Alamat</h5>
                                        <span>{{ $objekpajak->wajibpajak->alamat. ','.'RT'.' '.$objekpajak->wajibpajak->rt.','.'RW'.' '.$objekpajak->wajibpajak->rw. ','. ' '. $objekpajak->wajibpajak->kelurahan->nama_kelurahan. ',' . ' '.$objekpajak->wajibpajak->kecamatan->nama_kecamatan}}</span>	
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
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
       

        // Peta Koordinat
            // set lokasi latitude dan longitude, lokasinya kabupaten rembang
            var mymap = L.map('map').setView([-6.7147371, 111.3209311], 13);
                // stting maps
                L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', 
                {subdomains:['mt0','mt1','mt2','mt3'], attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(mymap);
            
                var marker = L.marker([<?= $objekpajak->latitude ?>, <?= $objekpajak->longitude ?>]).addTo(mymap);
                marker.bindPopup("<?= $objekpajak->nama_objek ?>").openPopup();
  
                // buat variabel berisi fungsi L.popup
                var popup = L.popup();
  
            //     // buat fungsi popup saat map diklik
            //     function onMapClick(e) {
            //       popup
            //         .setLatLng(e.latlng)
            //         .setContent("Koordinatnya adalah" + e.latlng.toString())
            //         .openOn(mymap);
  
            //       document.getElementById('longitude').value = e.latlng
            //       .lng //value pada form latitde, longitude akan berganti secara otomatis
            //   document.getElementById('latitude').value = e.latlng
            //       .lat //value pada form latitde, longitude akan berganti secara otomatis
            //     }
            //     mymap.on('click', onMapClick); //jalankan fungsi
      </script>
	@endpush
@endsection
