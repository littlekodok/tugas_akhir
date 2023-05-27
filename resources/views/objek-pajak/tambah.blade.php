@extends('layouts.main')

@section('container')
     <div class="content-body">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
						<div class="page-titles">
							<div class="d-flex">
								<ol class="breadcrumb align-items-center mt-0">
                                    <li class="breadcrumb-item ps-0"><a href="javascript:void(0)">Pelaporan Objek Pajak</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Tambah Objek Pajak</li>
                                    {{-- <li class="breadcrumb-item ps-0"><a href="javascript:void(0)">Pelaporan Objek Pajak</a></li>
                                    <li class="breadcrumb-item ps-0 active"><a href="javascript:void(0)">Tambah Objek Pajak</a></li> --}}
                                </ol>
							 </div>
						</div>
                        
                </div>
            </div>
              <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                         <div class="card-body">
                                <div class="card-header px-0">
                                    <h4 class="card-title fw-bold">Formulir Pelaporan Objek Pajak</h4>
                                </div>
                                <div class="mt-3 basic-form">
                                    <form action="">
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tanggal</label>
                                            <div class="col-sm-6">
                                                <input type="input" class="form-control" value="{{ date('d/m/Y') }}" readonly>
                                                <input type="hidden" name="tanggal_daftar_objek" value="{{ date('Y-m-d') }}">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nomor Registrasi</label>
                                            <div class="col-sm-6">
                                                 <input type="input" class="form-control" name="no_objek" value="{{ $kd }}"  readonly required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Jenis Pajak</label>
                                            <div class="col-sm-6">
                                                <select class="js-example-basic-single jenis_pajak form-control wide" name="id_jenis_pajak" id="id_jenis_pajak"  required>
                                                    <option value="">Silahkan Pilih</option>
                                                        @foreach ($jenispajak as $jp)
                                                        <option value="{{ $jp->id }}">{{ $jp->kode_jenis_pajak }} | {{ $jp->nama_pajak }}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Rekening</label>
                                            <div class="col-sm-6">
                                                <select class="js-example-basic-single rekening form-control wide" name="id_rekening"  id="id_rekening" required>
                                                    <option value="">Silahkan Pilih</option>
                                                  
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nama Objek</label>
                                            <div class="col-sm-6">
                                                <input type="email" class="form-control" placeholder="Nama Objek" name="nama_objek">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Alamat</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" placeholder="Jalan" name="alamat_objek">
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" placeholder="RT" name="rt_objek">
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control" placeholder="RW" name="rw_objek">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Kecamatan</label>
                                            <div class="col-sm-6">
                                                <select class="js-example-basic-single kecamatan form-control wide" name="id_kecamatan" id="id_kecamatan" required >
                                                    <option>Silahkan Pilih</option>
                                                    @foreach ($kecamatans as $kecamatan)
                                                        <option value="{{ $kecamatan->id }}"> {{ $kecamatan->nama_kecamatan }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                         <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Kelurahan</label>
                                            <div class="col-sm-6">
                                               <select class="js-example-basic-single kelurahan form-control wide" name="id_kelurahan" id="id_kelurahan"  required>
                                                <option >Silahkan Pilih</option>
                                                </select>
                                                
                                            </div>
                                        </div>
                                         <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Kode Pos</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" maxlength="5"  minlength="5"   placeholder="Kode Pos" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                            </div>
                                        </div>
                                         <div class="mb-3 row">
                                            <div class="container map " id="map" style="height:350px; margin:20px 0px"></div>
                                        </div>
                                         <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Latitude</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="latitude" id="latitude">
                                            </div>
                                        </div>
                                         <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Longitude</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="longitude" id="longitude">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="formFileMultiple" class="col-sm-3 col-form-label">Dokumen Pendukung</label>
                                              <div class="col-sm-6">
                                                <input class="form-control @error('foto') is-invalid @enderror" name="foto" type="file" accept="image/png, image/jpeg" id="formFileMultiple" multiple required>
                                                 @error('foto')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <span class="d-flex mt-1 text-danger">*Maksimal 2 Mb</span>
                                              </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label ">*Syarat dan Ketentuan</label>
                                            <div class="form-check col-sm-6 mx-3">
											  <input class="form-check-input " type="checkbox" value="" id="invalidCheck2" required>
											  <label class="form-check-label" for="invalidCheck2">
												Data yang anda isikan sesuai dengan data yang ada dan belum pernah digunakan sebelumnya. Apabila ada data yang tidak sesuai atau palsu anda berhak mendapatkan konsekuensi yang berlaku
											  </label>
											</div>
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mt-5 mb-2 btn-block fw-bold h4" style="font-size: 12px;">Kirim</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

          

        </div>

    </div>
     @push('scripts')
      <script>
      // Kelurahan
        $(document).ready(function() {
            $('.js-example-basic-single kecamatan').select2();
        });
        $(document).ready(function() {
            $('.js-example-basic-single kelurahan').select2();
        });
        
        $(document).ready(function() {
            $('#id_kecamatan').on('change', function() {
                var id_kecamatan = $(this).val();
                // window.alert(id_prov);
                if (id_kecamatan) {
                    $.ajax({
                        url: 'tambah/getKelurahanObjek/' + id_kecamatan,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                           
                            $('select[name="id_kelurahan"]').empty();
                            $('select[name="id_kelurahan"]').append(
                                '<option hidden>Pilih Kelurahan</option>');
                            $.each(data, function(key, datakelurahan) {
                                $('select[name="id_kelurahan"]').append('<option value="' +
                                    datakelurahan.id + '">' + datakelurahan.nama_kelurahan  +
                                    '</option>');
                            });

                        }
                    });
                } else {
                    $('select[name="id_kelurahan"]').empty();
                }
            });
        });

        // Rekening
        $(document).ready(function() {
            $('.js-example-basic-single jenis_pajak').select2();
        });
        $(document).ready(function() {
            $('.js-example-basic-single rekening').select2();
        });
        
        $(document).ready(function() {
            $('#id_jenis_pajak').on('change', function() {
                var id_jenis_pajak = $(this).val();
                // window.alert(id_prov);
                if (id_jenis_pajak) {
                    $.ajax({
                        url: 'tambah/getRekening/' + id_jenis_pajak,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                           
                            $('select[name="id_rekening"]').empty();
                            $('select[name="id_rekening"]').append(
                                '<option hidden>Pilih Rekening</option>');
                            $.each(data, function(key, dataRekening) {
                                $('select[name="id_rekening"]').append('<option value="' +
                                    dataRekening.id + '">' + dataRekening.kode_rekening + '|' + dataRekening.nama_rekening + '|' + dataRekening.persen_tarif + '%' +
                                    '</option>');
                            });

                        }
                    });
                } else {
                    $('select[name="id_rekening"]').empty();
                }
            });
        });

        // Peta Koordinat
          var map = L.map('map').setView([-6.7147371, 111.3209311], 13);
          

              L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {  subdomains:['mt0','mt1','mt2','mt3'], attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
              }).addTo(map);

              let marker = {};
              map.on('click',function(e){
                let latitude = e.latlng.lat.toString().substring(0,15);
                let longitude = e.latlng.lng.toString().substring(0,15);

                if (marker != undefined) {
                  map.removeLayer(marker);
                };
              var popup = L.popup()
                .setLatLng([latitude,longitude])
                .setContent("Koordinat : " + latitude +" , "+ longitude)
                .openOn(map);

                document.querySelector('#longitude').value = longitude;
                document.querySelector('#latitude').value = latitude;
                
                marker = L.marker([latitude,longitude]).addTo(map)

              })


              // L.marker([51.5, -0.09]).addTo(map)
              // .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
              // .openPopup();
                    
        
    </script>
        @endpush
            
@endsection
