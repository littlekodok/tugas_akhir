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
            <div class="row">
                <div class="col-lg-12">
						<div class="card">
							<div class="card-body d-flex align-items-center">
								<div>
									<h4 class="fs-20 mb-2 fw-bold" >Silahkan Registrasi Wajib Pajak</h4>
									<p class="mb-0 ">Untuk mendapatkan NPWPD (Nomor Pokok Wajib Pajak Daerah) pengguna baru diharuskan untuk mengisi formulir registrasi Wajib Pajak terlebih dahulu. Dengan Adanya NPWPD Wajib Pajak dapat melaporkan pajaknya. <b class="text-success">Proses Pengecekan formulir oleh petugas selama 1-3 Hari Kerja.</b> Mohon untuk selalu mengecek akun kembali </p>
								</div>
							</div>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                         <div class="card-body">
                                <div class="card-header px-0">
                                    <h4 class="card-title fw-bold">Formulir Registrasi Wajib Pajak</h4>
                                </div>
                                <div class="mt-3 basic-form">
                                    <form action="">
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
                                                 <input type="input" class="form-control" name="jenis_pendapatan" value="Pajak"  readonly required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Jenis Pendapatan</label>
                                            <div class="col-sm-6">
                                               <input type="text" value="Pajak" name="jenis_pendapatan" class="form-control" readonly required>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Jenis Usaha</label>
                                            <div class="col-sm-6">
                                                <select class="form-control default-select form-control wide" name="jenis_usaha"   required>
                                                    <option value="">Silahkan Pilih</option>
                                                    <option value="1">Pribadi</option>
                                                    <option value="2">Badan Usaha</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">NIK/NIB</label>
                                            <div class="col-sm-6">
                                                <input type="text" max="16" min="13" class="form-control" placeholder="NIK/NIB"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                            <div class="col-sm-6">
                                                <input type="email" class="form-control" placeholder="Nama Lengkap">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Alamat</label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" placeholder="Jalan">
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="number" class="form-control" placeholder="RT">
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="number" class="form-control" placeholder="RW">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Kabupaten</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" value="Rembang" readonly>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Kecamatan</label>
                                            <div class="col-sm-6">
                                               <select class="default-select form-control wide ">
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
                                                </select>
                                            </div>
                                        </div>
                                         <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Kelurahan</label>
                                            <div class="col-sm-6">
                                               <select class="default-select form-control wide ">
                                                    <option>Option 1</option>
                                                    <option>Option 2</option>
                                                    <option>Option 3</option>
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
                                            <label class="col-sm-3 col-form-label">Nomor Telepon</label>
                                            <div class="col-sm-6">
                                                <input type="tel"  minlength="10" maxlength="12"class="form-control" placeholder="Nomor Telepon"   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
                                            </div>
                                        </div>
                                         <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-6">
                                                <input type="email" class="form-control" placeholder="Email" readonly>
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

@endsection
