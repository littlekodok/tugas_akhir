@extends('layouts.main')

@section('container')
    <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header px-0">
                                <h4 class="card-title fw-bold">Formulir Edit Data Wajib Pajak</h4>
                            </div>
                            <div class="mt-3 basic-form">
                                <form action="{{ route('admin.data-wajib-pajak.validasi-update',$wajibpajak->id) }}" enctype="multipart/form-data" method="post" id="form">
                                                @csrf
                                                
                                                {{-- <input type="hidden" value="{{ auth()->user()->id }}" name="id_user"> --}}
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Tanggal</label>
                                                    <div class="col-sm-6">
                                                        <input type="input" class="form-control" value="{{ date('d/m/Y') }}" readonly>
                                                        <input type="hidden" name="tanggal_daftar" value="{{ date('Y-m-d') }}">
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Nomor Registrasi</label>
                                                    <div class="col-sm-6">
                                                         <input type="input" class="form-control" name="no_pendaftaran" value="{{ sprintf("%07s",$wajibpajak->no_pendaftaran) }}"  readonly required>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Jenis Pendapatan</label>
                                                    <div class="col-sm-6">
                                                       <input type="text" class="form-control  @error('jenis_pendapatan') is-invalid @enderror" name="jenis_pendapatan" value="Pajak" readonly required>
                                                    </div>
                                                </div>
                                                
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Jenis Usaha</label>
                                                    <div class="col-sm-6">
                                                        <select class="form-control default-select form-control wide  @error('jenis_usaha') is-invalid @enderror"  name="jenis_usaha" required >
                                                            <option value="1" {{ $wajibpajak->jenis_usaha == '1' ? 'selected' : '' }}>Pribadi</option>
                                                            <option value="2" {{ $wajibpajak->jenis_usaha == '2' ? 'selected' : '' }}> Badan Usaha</option>
                                                        </select>
                                                         @error('jenis_usaha')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">NIK/NIB</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" maxlength="16" minlength="13" class="form-control  @error('nik') is-invalid @enderror"  value="{{ old('nik', $wajibpajak->nik) }}" name="nik" laceholder="NIK/NIB"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                         @error('nik')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" pattern="[A-Za-z ]*" title="Isikan Hanya Huruf" class="text-capitalize form-control @error('nama') is-invalid @enderror" name="nama" value="{{  old('nama',$wajibpajak->nama) }}" required>
                                                        @error('nama')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Alamat</label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control  @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat', $wajibpajak->alamat) }}" placeholder="Jalan" required>
                                                        @error('alamat')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-2">
                                                        <input type="number" class="form-control  @error('rt') is-invalid @enderror" name="rt" value="{{ old('rt', $wajibpajak->rt) }}" id="rt" maxlength="2" placeholder="RT" required  oninput="(function(e) { let value = e.value.replace(/\D/g,''); if (parseInt(value, 10) < 10) { value = '0' + value; } e.value = value.substr(-2); })(this);" >
                                                        @error('rt')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                    
                                                    <div class="col-sm-2">
                                                        <input min="0" maxlength="2" value="{{ old('rw', $wajibpajak->rw) }}" id="rw" name="rw" class="form-control  @error('rw') is-invalid @enderror" type="number" placeholder="RW" oninput="(function(e) { let value = e.value.replace(/\D/g,''); if (parseInt(value, 10) < 10) { value = '0' + value; } e.value = value.substr(-2); })(this);"/>
                                                        @error('rw')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Kabupaten</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" name="kabupaten" value="Rembang" readonly>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Kecamatan</label>
                                                    <div class="col-sm-6">
                                                       <select class="js-example-basic-single kecamatan form-control wide  @error('id_kecamatan') is-invalid @enderror" name="id_kecamatan" id="id_kecamatan" value="{{ $wajibpajak->id_kecamatan }}" required  onchange="listKelurahan()">
                                                            @foreach ($kecamatans as $kecamatan)
                                                                <option value="{{ $kecamatan->id }}" {{ $wajibpajak->id_kecamatan == $kecamatan->id ? 'selected' : '' }}>{{ $kecamatan->kode_kecamatan }} | {{ $kecamatan->nama_kecamatan }}</option>
                                                            @endforeach
                                                            
                                                        </select>
                                                        @error('id_kecamatan')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                 <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Kelurahan</label>
                                                    <div class="col-sm-6">
                                                       <select class="js-example-basic-single kelurahan form-control wide  @error('id_kelurahan') is-invalid @enderror " name="id_kelurahan" id="id_kelurahan" value="{{ $wajibpajak->id_kelurahan }}" required>
                                                            @foreach ($kelurahans as $kelurahan)
                                                                <option value="{{ $kelurahan->id}}" {{ $wajibpajak->id_kelurahan == $kelurahan->id ? 'selected' : '' }}>{{ $kelurahan->kode_kelurahan }} | {{ $kelurahan->nama_kelurahan }}</option>
                                                            @endforeach 
                                                        </select>
                                                        @error('id_kelurahan')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                 <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Kode Pos</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control  @error('kode_pos') is-invalid @enderror" value="{{ old('kode_pos',$wajibpajak->kode_pos) }}" name="kode_pos" maxlength="5"  minlength="5"  required placeholder="Kode Pos" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
                                                        @error('kode_pos')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                 <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Nomor Telepon</label>
                                                    <div class="col-sm-6">
                                                        <input type="tel"  minlength="10" maxlength="12" class="form-control  @error('no_telpon') is-invalid @enderror"value="{{ old('no_telpon',$wajibpajak->no_telpon) }}"  name="no_telpon" required placeholder="Nomor Telepon"   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                                        @error('no_telpon')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                 <div class="mb-3 row">
                                                    <label class="col-sm-3 col-form-label">Email</label>
                                                    <div class="col-sm-6 ">
                                                        <input type="email" class="form-control text-dark bg-light " name="email" placeholder="Email" value="{{ old('nik', $wajibpajak->email) }}" readonly>
                                                    </div>
                                                </div>
                                                <div class="mb-3 row">
                                                    <label for="foto" class="col-sm-3 col-form-label">Foto Wajib Pajak</label>
                                                      <div class="col-sm-6">
                                                        <input type="hidden" name="oldImage" value="{{ $wajibpajak->foto }}">
                                                        @if ($wajibpajak->foto)
                                                        <img src="{{ Storage::url($wajibpajak->foto) }}"  class="img-preview" alt="" style="max-width:400px;max-height:500px;">                                                         
                                                        @else
                                                        <img class="img-preview" alt="Kosong" style="max-width:400px;max-height:500px;"> 
                                                        @endif
                                                        <input class="form-control @error('foto') is-invalid @enderror" name="foto" value="{{ $wajibpajak->foto }}"  type="file" accept="image/png, image/jpeg" id="foto" onchange="previewImage()">
                                                        <span class="d-flex mt-1 text-danger">*Maksimal 2 Mb</span>
                                                        @error('foto')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                      </div>
                                                </div>
                                                <div class="card-footer mt-3 d-flex flex-wrap justify-content-end align-items-center">
                                                    <div>
                                                        <a type="button" class="btn btn-danger light" href="{{ route('admin.data-wajib-pajak.validasi',$wajibpajak->id) }}">Batal</a>
                                                       <button type="submit" class="btn btn-primary light">Save changes</button>
                                                    </div>
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

    function previewImage() {
            const image = document.querySelector('#foto');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function (oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    
    function change(element) {
            element.classList.toggle('fullsize')
    }

    document.addEventListener('DOMContentLoaded', function() {
        listKelurahan();
    });


    function listKelurahan() {
        var id_kecamatan = $("#id_kecamatan").val();
        var id_kelurahan = $('#id_kelurahan').val();
        var kelurahanSelect = $("#id_kelurahan");
        // var ket = document.getElementById('keterangan_lokasi');
        $.ajax({
            url: '/getEditKelurahan/' + id_kecamatan,
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
                                    val.id + '">' + val.kode_kelurahan + '|' + val.nama_kelurahan +
                                    '</option>');
                } else {
                    kelurahanSelect.append('<option value="' +
                                    val.id + '">' + val.kode_kelurahan + '|' + val.nama_kelurahan +
                                    '</option>');
                }
            });
        });
    }

    // $(function(){
    //     $("#form").on('submit',function (e) {
    //         e.preventDefault();
    //     });
    // })
       
    </script>
    @endpush

@endsection