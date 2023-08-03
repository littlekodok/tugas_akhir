@extends('layouts.main')

@section('container')
     <div class="content-body">
        <div class="container-fluid">
            
            <div class="row">
                <div class="col-lg-12">   
						<div class="card">
							<div class="card-body d-flex align-items-center mb-2">
								<div>
									<h4 class="fs-20 mb-2 fw-bold" >Selamat Datang {{ auth()->user()->nama }}</h4>
									<p class="mb-0 ">E-SPTPD merupakan aplikasi pelaporan pajak berbasis website yang digunakan oleh BPPKAD Kabupaten Rembang dalam rangka penertiban pajak</p>
								</div>	
							</div>
						</div>
                </div>
            </div>
            @if ($cek == false)
            <div class="row">
                <div class="col-lg-12">
						<div class="card">
							<div class="card-body d-flex align-items-center">
								<div>
									<h4 class="fs-20 mb-2 fw-bold" >Silahkan Registrasi Wajib Pajak</h4>
									<p class="mb-0 ">Untuk mendapatkan NPWPD (Nomor Pokok Wajib Pajak Daerah) pengguna baru diharuskan untuk mengisi formulir registrasi Wajib Pajak terlebih dahulu. Dengan Adanya NPWPD Wajib Pajak dapat melaporkan pajaknya. <b class="fw-bold">Proses Pengecekan formulir oleh petugas selama 1-3 Hari Kerja.</b> Mohon untuk selalu mengecek akun kembali </p>
								</div>

							</div>
                        </div>
                       
                </div>
            </div>
            
            @endif
            @if (isset($cek) && $cek !== false && $cek->verifikasi == 1 )
            <div class="row">
                <div class="col-lg-12">
						<div class="card">
							<div class="card-body d-flex align-items-center">
								<div>
									<h4 class="fs-20 mb-2 fw-bold" >Akun Berhasil Diregistrasi</h4>
                                    <p class="mb-0 ">Silahkan laporkan pajak anda. Setiap pelaporan objek membutuhkan validasi <strong class="text-warning">selama +- 3 hari oleh Admin</strong> . Apabila terdapat kendala dalam pelaporan silahkan hubungi Admin BPPKAD Rembang </p>
								</div>

							</div>
                        </div>
                       
                </div>
            </div>
            @endif
            
@if ($cek == false)
    @include('wajib-pajak.form')
@endif
        </div>

    </div>
    @push('scripts')
        <script>
             document.querySelector(".sweet-wrong").onclick = function () {
        sweetAlert("Oops...", "Something went wrong !!", "error")
    }
        // Add inputan baru kecamatan luar
        $(document).ready(function() {
            $("#id_kecamatan").on("change", function() {
                if ($(this).val() === "1") {
                    $("#kecamatan_luar").show();
                }
                else {
                    $("#kecamatan_luar").hide();
                }
            });
        });
        // Add inputan baru kelurahan luar
        $(document).ready(function() {
            $("#id_kelurahan").on("change", function() {
                if ($(this).val() === "1") {
                    $("#kelurahan_luar").show();
                }
                else {
                    $("#kelurahan_luar").hide();
                }
            });
        });

        // input only alphabet 
        function testInput(event) {
            var value = String.fromCharCode(event.which);
            var pattern = new RegExp(/[a-zåäö ]/i);
            return pattern.test(value);
        }
        $('#kelurahan_luar').bind('keypress', testInput);
        $('#kecamatan_luar').bind('keypress', testInput);

        // Kelurahan Select
        document.addEventListener('DOMContentLoaded', function() {
        listKelurahan();

        });

        function listKelurahan() {
        var id_kecamatan = $("#id_kecamatan").val();
        var id_kelurahan = $('#id_kelurahan').val();
        var kelurahanSelect = $("#id_kelurahan");
        // var ket = document.getElementById('keterangan_lokasi');
        $.ajax({
            url: 'wajib-pajak/getKelurahan/' + id_kecamatan,
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
                                    val.id + '">'  + val.nama_kelurahan +
                                    '</option>');
                } else {
                    kelurahanSelect.append('<option value="' +
                                    val.id + '">' + val.nama_kelurahan +
                                    '</option>');
                }
            });
        });
    }
        // $(document).ready(function() {
        //     $('.js-example-basic-single kecamatan').select2();
        // });
        // $(document).ready(function() {
        //     $('.js-example-basic-single kelurahan').select2();
        // });
        
        // $(document).ready(function() {
        //     $('#id_kecamatan').on('change', function() {
        //         var id_kecamatan = $(this).val();
        //         // window.alert(id_prov);
        //         if (id_kecamatan) {
        //             $.ajax({
        //                 url: 'wajib-pajak/getKelurahan/' + id_kecamatan,
        //                 type: "GET",
        //                 dataType: "json",
        //                 success: function(data) {
                           
        //                     $('select[name="id_kelurahan"]').empty();
        //                     $('select[name="id_kelurahan"]').append(
        //                         '<option hidden>Pilih Kelurahan</option>');
        //                     $.each(data, function(key, datakelurahan) {
        //                         $('select[name="id_kelurahan"]').append('<option value="' +
        //                             datakelurahan.id + '">' + datakelurahan.kode_kelurahan + '|' + datakelurahan.nama_kelurahan +
        //                             '</option>');
        //                     });

        //                 }
        //             });
        //         } else {
        //             $('select[name="id_kelurahan"]').empty();
        //         }
        //     });
        // });    
        </script>
    @endpush

@endsection
