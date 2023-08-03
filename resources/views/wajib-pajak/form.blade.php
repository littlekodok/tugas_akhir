<div class="row">
                <div class="col-lg-12">
                    <div class="card">
                         <div class="card-body">
                                <div class="card-header px-0">
                                    <h4 class="card-title fw-bold">Formulir Registrasi Wajib Pajak</h4>
                                </div>
                                <div class="mt-3 basic-form">
                                    <form action="{{ route('wajib-pajak.store') }}" enctype="multipart/form-data" method="post">
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
                                                 <input type="input" class="form-control" name="no_pendaftaran" value="{{ $kd }}"  readonly required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Jenis Pendapatan</label>
                                            <div class="col-sm-6">
                                               <input type="text" class="form-control  @error('jenis_pendapatan') is-invalid @enderror" name="jenis_pendapatan" value="Pajak" readonly required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label ">Jenis Usaha</label>
                                            <div class="col-sm-6">
                                                <select id="jenis_usaha" class="form-control jenis-usaha form-control wide  @error('jenis_usaha') is-invalid @enderror" value="{{ old('jenis_usaha') }}"   name="jenis_usaha" required>
                                                    <option value="">Silahkan Pilih</option>
                                                    <option value="1" {{ old('jenis_usaha') == "1" ? "selected" : "" }}>Pribadi</option>
                                                    <option value="2" {{ old('jenis_usaha') == "2" ? "selected" : "" }}>Badan Usaha</option>
                                                </select>
                                                 @error('jenis_usaha')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                      
                                            {{-- <label id="otherName" style="display: none">Enter your Name<input type="text" name="othername" />
                                            </label> --}}
                                     
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">NIK/NIB</label>
                                            <div class="col-sm-6">
                                                <input type="text" maxlength="16" minlength="13" class="form-control  @error('nik') is-invalid @enderror"  value="{{ old('nik') }}" name="nik" placeholder="NIK/NIB"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
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
                                                <input type="text" pattern="[a-zA-Z ]+" title="Isikan Hanya Huruf Tanpa Menggunakan Nama Gelar" class="text-capitalize form-control @error('nama') is-invalid @enderror" name="nama" value="{{ auth()->user()->nama }}" required>
                                                @error('nama')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <span class="d-flex mt-1 text-danger">*Tuliskan nama tanpa gelar</span>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Alamat</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control  @error('alamat') is-invalid @enderror" name="alamat" value="{{ old('alamat') }}" placeholder="Jalan" required>
                                                @error('alamat')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="number" class="form-control  @error('rt') is-invalid @enderror" name="rt" value="{{ old('rt') }}"  maxlength="2" placeholder="RT" required  oninput="(function(e) { let value = e.value.replace(/\D/g,''); if (parseInt(value, 10) < 10) { value = '0' + value; } e.value = value.substr(-2); })(this);" >
                                                @error('rt')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-2">
                                                <input min="0" maxlength="2" value="{{ old('rw') }}" name="rw" class="form-control  @error('rw') is-invalid @enderror" type="number" placeholder="RW" oninput="(function(e) { let value = e.value.replace(/\D/g,''); if (parseInt(value, 10) < 10) { value = '0' + value; } e.value = value.substr(-2); })(this);"/>
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
                                               <select class="js-example-basic-single kecamatan form-control wide  @error('id_kecamatan') is-invalid @enderror" name="id_kecamatan" id="id_kecamatan" required  onchange="listKelurahan()">
                                                    <option>Silahkan Pilih</option>
                                                    @foreach ($kecamatans as $kecamatan)
                                                        <option value="{{ $kecamatan->id }}" {{ old('id_kecamatan') == $kecamatan->id ? "selected" : "" }}>{{ $kecamatan->nama_kecamatan }} </option>
                                                    @endforeach
                                                </select>
                                                @error('id_kecamatan')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row" style="display:none;" id="kecamatan_luar">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control  @error('kecamatan_luar') is-invalid @enderror" value="{{ old('kecamatan_luar') }}" name="kecamatan_luar" style="background-color:#fafafa"  placeholder="Masukan Kecamatan Luar"  >
                                                @error('kecamatan_luar')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Kelurahan</label>
                                            <div class="col-sm-6">
                                               <select class="js-example-basic-single kelurahan form-control wide  @error('id_kelurahan') is-invalid @enderror " name="id_kelurahan" id="id_kelurahan" required>
                                                    @foreach ($kelurahans as $kelurahan)
                                                            <option value="{{ $kelurahan->id}}" {{ old('id_kelurahan') == $kelurahan->id ? 'selected' : '' }}>{{ $kelurahan->nama_kelurahan }}</option>
                                                @endforeach 
                                                </select>
                                                @error('id_kelurahan')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row" style="display: none"  id="kelurahan_luar">
                                            <label class="col-sm-3 col-form-label"></label>
                                            <div class="col-sm-6">
                                                <input type="text"  id="kelurahan_luar" class="form-control text-dark  @error('kelurahan_luar') is-invalid @enderror" style="background-color:#fafafa" value="{{ old('kelurahan_luar') }}" name="kelurahan_luar"  placeholder="Masukan Nama Kelurahan"  >
                                                @error('kelurahan_luar')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                         <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Kode Pos</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control  @error('kode_pos') is-invalid @enderror" value="{{ old('kode_pos') }}" name="kode_pos" maxlength="5"  minlength="5"  required placeholder="Kode Pos" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required>
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
                                                <input type="tel"  minlength="10" maxlength="12" class="form-control  @error('no_telpon') is-invalid @enderror"value="{{ old('no_telpon') }}"  name="no_telpon" required placeholder="Nomor Telepon"   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
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
                                                <input type="email" class="form-control text-dark bg-light " name="email" placeholder="Email" value="{{ auth()->user()->email }}" readonly>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="formFileMultiple" class="col-sm-3 col-form-label">Foto Wajib Pajak</label>
                                              <div class="col-sm-6">
                                                <input class="form-control @error('foto') is-invalid @enderror" name="foto" type="file" accept="image/png, image/jpeg"  required>
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
                                            <button type="submit" class="btn btn-primary mt-5 mb-2 btn-block fw-bold h4"  style="font-size: 12px;">Kirim</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

           