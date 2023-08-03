@extends('layouts.main')

@section('container')
     <div class="content-body">

        <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                            <div class="page-titles">
                                <div class="d-flex">
                                    <ol class="breadcrumb align-items-center mt-0">
                                        <li class="breadcrumb-item ps-0 active"><a href="javascript:void(0)">Pembayaran Objek Pajak</a></li>
                                    </ol>
                                </div>
                            </div>
                            {{-- <div class="mb-3">
                                <a href="{{ route('wajib-pajak.objek-pajak.tambah') }}" class="btn btn-primary">Tambah Objek Pajak</a>
                            </div> --}}
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Data Wajib Pajak</h4>
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="username" class="form-label">Nama Lengkap</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control border-left-end" id="username" value="{{$objekPajak->wajibpajak->nama  }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="username" class="form-label">NPWPD</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control border-left-end" id="username" value="{{ "P".$objekPajak->wajibpajak->jenis_usaha.".".sprintf("%07s",$objekPajak->wajibpajak->no_pendaftaran).".".$objekPajak->wajibpajak->kecamatan->kode_kecamatan.".".$objekPajak->wajibpajak->kelurahan->kode_kelurahan  }}"  readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="username" class="form-label">Alamat</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control border-left-end" id="username" value="{{ $objekPajak->wajibpajak->alamat.','.'RT'.' '.$objekPajak->wajibpajak->rt.','.'RW'.' '.$objekPajak->wajibpajak->rw.','.' '.$objekPajak->wajibpajak->kelurahan->nama_kelurahan.','.$objekPajak->wajibpajak->kecamatan->nama_kecamatan}}"  readonly>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="username" class="form-label">Nomor Telepon</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control border-left-end" id="username" value="{{ $objekPajak->wajibpajak->no_telpon  }}"readonly>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" value="{{ auth()->user()->email }}" class="form-control" id="email" placeholder="you@example.com">
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    
                                    <div class="col-lg-8 order-lg-1">
                                        <h4 class="mb-3">Data Objek Pajak</h4>
                                        <form >
                                            <div class="row">
                                                <div class="col-lg-12 mb-3">
                                                    <label for="firstName" class="form-label">Nama Objek</label>
                                                    <input type="text" class="form-control" id="firstName" placeholder="" value="{{ $objekPajak->nama_objek }}"  readonly>
                                                    
                                                </div>
                                                
                                            </div>

                                            <div class="mb-3">
                                                <label for="username" class="form-label">Jenis Pajak</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control border-left-end" id="username" value="{{ $objekPajak->jenispajak->nama_pajak  }}"  readonly>
                                                    
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="email" class="form-label">Nama Rekening</label>
                                                <input type="email" value="{{ $objekPajak->rekening->nama_rekening }}" class="form-control" id="email" readonly>
                                               
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Kode Rekening</label>
                                                <input type="email" value="{{ $objekPajak->rekening->kode_rekening }}" class="form-control" id="email" readonly>
                                               
                                            </div>

                                            <div class="mb-3">
                                                <label for="address" class="form-label">Alamat</label>
                                                <input type="text" class="form-control" id="address" value="{{ $objekPajak->alamat_objek.','.' '.'RT'.$objekPajak->rt_objek.','.'RW'.' '.$objekPajak->rw_objek.','.$objekPajak->kelurahan->nama_kelurahan.','.$objekPajak->kecamatan->nama_kecamatan }}"  readonly>
                                              
                                            </div>
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Kode Pos</label>
                                                <input type="text" class="form-control" id="address" value="{{ $objekPajak->kode_pos_objek }}"  readonly>
                                              
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-xl-8">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="mb-3">Pembayaran</h4>
                                <form action="{{ route('wajib-pajak.proses-bayar',$objekPajak->id) }}" method="post" id="form">
                                    @csrf
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-md-6 mb-3">
                                            <label for="username" class="form-label">Nomor Transaksi</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control border-left-end" id="username" value="{{ $kd }}"  name="no_transaksi"  readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="username" class="form-label">Tahun Pajak</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control border-left-end" name="tahun_pajak"  value="{{ date('Y') }}" readonly >
                                            </div>
                                        </div>
                                    </div>
                      
                                    <div class="col-md-12 mb-3">
                                        <label for="username" class="form-label">Rekening</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control border-left-end" name="norek_transaksi" value="{{ $objekPajak->rekening->kode_rekening.' '.$objekPajak->rekening->nama_rekening}}"  readonly>
                                        </div>
                                        
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="username" class="form-label">Bulan Pembayaran</label>
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="fa-solid fa-calendar"></i></span>
                                            <input type="text" class="form-control" name="bulan_bayar" id="datepicker" data-date-format="yyyy/mm/dd" required placeholder="Silahkan Pilih Bulan Untuk Pembayaran"/>
                                  
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="username" class="form-label">Dasar Pengenaan</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control border-left-end" name="dasar_pengenaan" value="" id="dasar_pengenaan" required onkeypress="return /\d/.test(String.fromCharCode(event.keyCode || event.which))" data-inputmask=" 'alias': 'numeric','prefix' : 'Rp. ', 'digits' : '2','groupSeparator' : ',', 'autoGroup' : true,'digitsOptional' : 'false', 'removeMaskOnSubmit' : 'true', 'autoUnmask' : true">
                                        </div>
                                    
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="username" class="form-label">Tarif(%)</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control border-left-end" name="tarif_pajak" id="tarif_pajak"  value="{{ $objekPajak->rekening->persen_tarif }}"  readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="email" class="form-label">Total Pajak</label>
                                        <input type="text" name="total_pajak"  id="total_pajak" class="form-control"  readonly data-inputmask=" 'alias': 'numeric','prefix' : 'Rp. ', 'digits' : '2','groupSeparator' : ',', 'autoGroup' : true,'digitsOptional' : 'false','removeMaskOnSubmit' : true, 'autoUnmask' : true">
                                     
                                    </div>
                                  
                                    <div class="col-md-12 mb-3">
                                        <label for="jalan" class="col-sm-3 col-form-label">Keterangan</label>
                                        <div class="col-sm-8">
                                          <textarea class="form-control" name="kegiatan" id="exampleTextarea1" required></textarea>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-lg btn-block" type="submit">Lanjutkan Pembayaran</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

        </div>

    </div>
    @push('scripts')
	<script>
        $(document).ready(function () {
            $('#dasar_pengenaan').inputmask()
        });
     
    
    // $('#tarif_pajak').val($('#tarif_pajak').val() + '%');

    $(document).ready(function(){
      $('#dasar_pengenaan').keyup(function(){

        var bayar = parseInt($('#dasar_pengenaan').val());
        var diskon = parseInt($('#tarif_pajak').val());

        var totalBayar = bayar*diskon/100;
        $('#total_pajak').val(totalBayar).inputmask();

      }) 
    });

    $(document).ready(function(){
    $("#datepicker").datepicker({
        format: "yyyy/mm/dd",
        todayBtn: "linked",
        todayHighlight: "true"
    });
});
    
    // $(document).ready(function () {
    //     $("#datepicker").datepicker( {
    //         format: "mm-yyyy",
    //         startView: "months", 
    //         minViewMode: "months"
    //     });
    // })
    
    // $(document).ready(function(){

    // $("#dasar_pengenaan").keyup(function(){
    //     var angkane = $("#dasar_pengenaan").val();
    //     $("#out").html(terbilang(angkane));
    // });
    // });
    // function terbilang(angka){
    // var bilne=["","satu","dua","tiga","empat","lima","enam","tujuh","delapan","sembilan","sepuluh","sebelas"];
    // if(angka < 12){
    //     return bilne[angka];
    // }else if(angka < 20){
    //     return terbilang(angka-10)+" belas";
    // }else if(angka < 100){
    //     return terbilang(Math.floor(parseInt(angka)/10))+" puluh "+terbilang(parseInt(angka)%10);
    // }else if(angka < 200){
    //     return "seratus "+terbilang(parseInt(angka)-100);
    // }else if(angka < 1000){
    //     return terbilang(Math.floor(parseInt(angka)/100))+" ratus "+terbilang(parseInt(angka)%100);
    // }else if(angka < 2000){
    //     return "seribu "+terbilang(parseInt(angka)-1000);
    // }else if(angka < 1000000){
    //     return terbilang(Math.floor(parseInt(angka)/1000))+" ribu "+terbilang(parseInt(angka)%1000);
    // }else if(angka < 1000000000){
    //     return terbilang(Math.floor(parseInt(angka)/1000000))+" juta "+terbilang(parseInt(angka)%1000000);
    // }else if(angka < 1000000000000){
    //     return terbilang(Math.floor(parseInt(angka)/1000000000))+" milyar "+terbilang(parseInt(angka)%1000000000);

    // }else if(angka < 1000000000000000){
    //     return terbilang(Math.floor(parseInt(angka)/1000000000000))+" trilyun "+terbilang(parseInt(angka)%1000000000000);
    // }
    // }


	</script>
	@endpush
@endsection
