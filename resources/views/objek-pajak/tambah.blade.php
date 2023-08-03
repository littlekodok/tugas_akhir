@extends('layouts.main')

@section('container')
     <div class="content-body">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
						<div class="page-titles">
							<div class="d-flex">
								<ol class="breadcrumb align-items-center mt-0">
                                    <li class="breadcrumb-item ps-0"><a href="{{ route('wajib-pajak.objek-pajak.index') }}">Pelaporan Objek Pajak</a></li>
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
                                    <form action="{{ route('wajib-pajak.objek-pajak.store') }}" id="form" method="post" enctype="multipart/form-data">
                                       @csrf
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
                                                <select class="js-example-basic-single jenis_pajak form-control wide" name="id_jenis_pajak" id="id_jenis_pajak"  required onchange="listRekening()">
                                                    <option value="">Silahkan Pilih</option>
                                                        @foreach ($jenispajak as $jp)
                                                        <option value="{{ $jp->id }}" {{ old('id_jenis_pajak') == $jp->id ? "selected" : "" }}>{{ $jp->nama_pajak }}</option>
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Rekening</label>
                                            <div class="col-sm-6">
                                                <select class="js-example-basic-single rekening form-control wide" name="id_rekening"  id="id_rekening" required>
                                                    <option value="">Silahkan Pilih</option>
                                                    @foreach ($rekenings as $rekening)
                                                            <option value="{{ $rekening->id}}" {{ old('id_rekening') == $rekening->id ? 'selected' : '' }}>{{ $rekening->kode_rekening }} | {{ $rekening->nama_rekening }}</option>
                                                    @endforeach 
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nama Objek</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control  @error('nama_objek') is-invalid @enderror" value="{{ old('nama_objek') }}" placeholder="Nama Objek" name="nama_objek"  style="text-transform: capitalize" required>
                                                 @error('nama_objek')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Jalan</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control  @error('alamat_objek') is-invalid @enderror" value="{{ old('alamat_objek') }}" placeholder="Jalan" name="alamat_objek"  >
                                                @error('alamat_objek')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="number" class="form-control @error('rt_objek') is-invalid @enderror" value="{{ old('rt_objek') }}" placeholder="RT" id ="rt"  name="rt_objek"  oninput="(function(e) { let value = e.value.replace(/\D/g,''); if (parseInt(value, 10) < 10) { value = '0' + value; } e.value = value.substr(-2); })(this);" required>
                                                @error('rt_objek')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="number" class="form-control @error('rw_objek') is-invalid @enderror " value="{{ old('rw_objek') }}" placeholder="RW" id="rw" name="rw_objek" oninput="(function(e) { let value = e.value.replace(/\D/g,''); if (parseInt(value, 10) < 10) { value = '0' + value; } e.value = value.substr(-2); })(this);" required>
                                                @error('rw_objek')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Kecamatan</label>
                                            <div class="col-sm-6">
                                                <select class="js-example-basic-single kecamatan form-control wide" name="id_kecamatan" id="id_kecamatan" required  onchange="listKelurahan()">
                                                    <option>Silahkan Pilih</option>
                                                    @foreach ($kecamatans as $kecamatan)
                                                        <option value="{{ $kecamatan->id }}"  {{ old('id_kecamatan') == $kecamatan->id ? "selected" : "" }}> {{ $kecamatan->nama_kecamatan }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                         <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Kelurahan</label>
                                            <div class="col-sm-6">
                                               <select class="js-example-basic-single kelurahan form-control wide" name="id_kelurahan"  id="id_kelurahan"  required>
                                                <option >Silahkan Pilih</option>
                                                 @foreach ($kelurahans as $kelurahan)
                                                            <option value="{{ $kelurahan->id}}" {{ old('id_kelurahan') == $kelurahan->id ? 'selected' : '' }}> {{ $kelurahan->nama_kelurahan }}</option>
                                                @endforeach 
                                                </select>
                                                
                                            </div>
                                        </div>
                                         <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Kode Pos</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control @error('kode_pos_objek') is-invalid @enderror " value="{{ old('kode_pos_objek') }}" maxlength="5"  name="kode_pos_objek" minlength="5"   placeholder="Kode Pos" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                 @error('kode_pos_objek')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                         <div class="mb-3 row">
                                            <div class="container map " id="map" style="height:500px; margin:20px 0px"></div>
                                        </div>
                                         <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Latitude</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" value="{{ old('latitude') }}" name="latitude" id="latitude" required  readonly>
                                            </div>
                                        </div>
                                         <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Longitude</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" value="{{ old('longitude') }}" name="longitude" id="longitude" required readonly>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="formFileMultiple" class="col-sm-3 col-form-label">Foto Pendukung</label>
                                              <div class="col-sm-6">
                                                <input class="form-control @error('foto') is-invalid @enderror" name="foto[]" type="file" accept="image/png, image/jpeg" id="formFileMultiple" multiple required>
                                                <span >
                                                    <strong class="text-danger">Minimal 3 Foto, Foto yang kurang dari 3 akan ditolak untuk valdasi</strong>
                                                </span>
                                                 @error('foto')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                               
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
                                            <button type="submit" class="btn btn-primary mt-5 mb-2 btn-block fw-bold h4 sweet-confirm" style="font-size: 12px;">Kirim</button>
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


    document.addEventListener('DOMContentLoaded', function() {
        listKelurahan();
        listRekening();
        });


    function listKelurahan() {
        var id_kecamatan = $("#id_kecamatan").val();
        var id_kelurahan = $('#id_kelurahan').val();
        var kelurahanSelect = $("#id_kelurahan");
        // var ket = document.getElementById('keterangan_lokasi');
        $.ajax({
            url: 'tambah/getKelurahanObjek/' + id_kecamatan,
            type: 'GET',
            data: {
                id_kecamatan: id_kecamatan,
            }
        }).then(function(data) {
            // $('#indeks_kawasan').val(data.indeks_kawasan);
            // ket.innerHTML = '';
            kelurahanSelect.empty();
            kelurahanSelect.append('<option value="">Silahkan Pilih</option>');
            data.forEach(function(val) {
                if (val.id == id_kelurahan) {
                    kelurahanSelect.append('<option selected value="' +
                                    val.id + '">' + val.nama_kelurahan +
                                    '</option>');
                } else {
                    kelurahanSelect.append('<option value="' +
                                    val.id + '">' + val.nama_kelurahan +
                                    '</option>');
                }
            });
        });
    }   

    function listRekening() {
        var id_jenis_pajak = $("#id_jenis_pajak").val();
        var id_rekening = $('#id_rekening').val();
        var rekeningSelect = $("#id_rekening");
        // var ket = document.getElementById('keterangan_lokasi');
        $.ajax({
            url: 'tambah/getRekening/' + id_jenis_pajak,
            type: 'GET',
            data: {
                id_jenis_pajak: id_jenis_pajak,
            }
        }).then(function(data) {
            // $('#indeks_kawasan').val(data.indeks_kawasan);
            // ket.innerHTML = '';
            rekeningSelect.empty();
            rekeningSelect.append('<option value="">Silahkan Pilih</option>');
            data.forEach(function(val) {
                if (val.id == id_rekening) {
                    rekeningSelect.append('<option selected value="' +
                                    val.id + '">'  + val.nama_rekening +
                                    '</option>');
                } else {
                    rekeningSelect.append('<option value="' +
                                    val.id + '">'  + val.nama_rekening +
                                    '</option>');
                }
            });
        });
    }
  

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
