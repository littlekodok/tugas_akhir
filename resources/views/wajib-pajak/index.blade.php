@extends('layouts.main')

@section('container')
     <div class="content-body">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    @if (session()->has('success'))
                           <div class="alert alert-success solid alert-dismissible fade show col-lg-12">
									<svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>
									<strong>Success! </strong> {{ session('success') }}
									<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                                    </button>
                            </div>
                            @endif
						<div class="card">
							<div class="card-body d-flex align-items-center">
								<div>
									<h4 class="fs-20 mb-2 fw-bold" >Selamat Datang {{ auth()->user()->nama }}</h4>
									<p class="mb-0 ">E-SPTPD merupakan aplikasi pelaporan pajak berbasis website yang digunakan oleh BPPKAD Kabupaten Rembang dalam rangka penertiban pajak</p>
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
@if ($cek == false)
    @include('wajib-pajak.form')
@endif
        </div>

    </div>
    @push('scripts')
        <script>

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
                        url: 'wajib-pajak/getKelurahan/' + id_kecamatan,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                           
                            $('select[name="id_kelurahan"]').empty();
                            $('select[name="id_kelurahan"]').append(
                                '<option hidden>Pilih Kelurahan</option>');
                            $.each(data, function(key, datakelurahan) {
                                $('select[name="id_kelurahan"]').append('<option value="' +
                                    datakelurahan.id + '">' + datakelurahan.kode_kelurahan + '|' + datakelurahan.nama_kelurahan +
                                    '</option>');
                            });

                        }
                    });
                } else {
                    $('select[name="id_kelurahan"]').empty();
                }
            });
        });    
        </script>
    @endpush

@endsection
