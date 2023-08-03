@extends('layouts.main')

@section('container')
    <div class="content-body">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
						<div class="page-titles">
							<ol class="breadcrumb">
								<li class="breadcrumb-item "><a href="{{ route('admin.data-objek-pajak') }}">Data Objek</a></li>
								<li class="breadcrumb-item active"><a>Data Pajak Parkir</a></li>

						
							</ol>
						</div>
                </div>
            </div>
            <div class="row">
                 <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Pajak Parkiran</h4>
                            </div>
                            <div class="card-body">
                                <!-- Nav tabs -->
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active text-primary" data-bs-toggle="tab" href="#home1"><i class=" fa-solid fa-ban me-2"></i> Pajak Parkiran Belum Tervalidasi</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-primary" data-bs-toggle="tab" href="#profile1"><i class="fa-solid fa-check me-2"></i> Pajak Parkiran Tervalidasi</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="home1" role="tabpanel">
                                            <div class="pt-4">
                                             
                                    <div class="table-responsive">
                                     <table id="pajak-parkir-belum-tervalidasi" class="display" style="min-width: 845px; width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Objek Pajak</th>
                                                <th>Jenis Pajak</th>
                                                <th>Wajib Pajak</th>
                                                <th>Tanggal Daftar</th>
                                                <th>Validasi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Objek Pajak</th>
                                                <th>Jenis Pajak</th>
                                                <th>Wajib Pajak</th>
                                                <th>Tanggal Daftar</th>
                                                <th>Validasi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="profile1">
                                            <div class="pt-4">
                                                <div class="table-responsive">
                                                <table id="pajak-parkir-tervalidasi" class="display" style="min-width: 845px; width:100%" >
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Wajib Pajak</th>
                                                            <th>NPWPD</th>
                                                            <th>Objek</th>
                                                            <th>Validasi</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Wajib Pajak</th>
                                                            <th>NPWPD</th>
                                                            <th>Objek</th>
                                                            <th>Validasi</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
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
    <!-- Modal -->
    <div class="modal fade" id="modal-parkir" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{-- <input type="hidden" id="stud_id"> --}}
                <div class="mb-4">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control solid" placeholder="Name" id="nama_objek" aria-label="name" readonly>
                </div>
                <div class="mb-4">
                    <label class="form-label">Jenis Pajak</label>
                    <input type="text" class="form-control solid" placeholder="Name" id="jenis_pajak" aria-label="name" readonly>
                </div>
                
                <div class="mb-4">
                    <label class="form-label">Tanggal Daftar</label>
                    <input type="date" class="form-control solid" placeholder="Name" id="tanggal_daftar_objek" aria-label="name" readonly>
                </div>
                <div class="mb-4">
                    <label class="form-label">Alamat</label>
                    <input type="text" class="form-control solid" placeholder="Name" id="alamat" aria-label="name" readonly>
                </div>
                <div class="mb-4">
                    <label class="form-label">Tanggal Validasi</label>
                    <input type="text" class="form-control solid" placeholder="Name"  id="tanggal_validasi" aria-label="name" readonly>
                </div>

                <div class="mb-4">
                    <label class="form-label">Status Validasi</label>
                    <input type="text" class="form-control  solid" id="status_validasi" aria-label="name" readonly>
                </div>
            
                <div class="mb-4">
                    <label class="form-label">Keterangan</label>
                    <textarea class="form-control solid" id="keterangan" With textarea"></textarea>
                </div>
            </div>
        
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
            </div>
        </div>
        </div>
    </div>
  
    
	@push('scripts')
	<script>
    // Modal
    $(document).ready(function () {
        $(document).on('click','.btn-primary',function () {
            var stud_id = $(this).val();
            // alert(stud_id)
            $('#modal-parkir').modal('show')
            $.ajax({
                type:"GET",
                url:"pajak-parkir/show/" +stud_id,
                success:function (response) {
                    // console.log(response.data.jenispajak.id);
                 

                    $('#nama_objek').val(response.data.nama_objek);
                    $('#jenis_pajak').val(response.jenispajak.nama_pajak);
                    $('#tanggal_daftar_objek').val(response.data.tanggal_daftar_objek);
                    $('#alamat').val(response.alamat);
                    $('#keterangan').val(response.data.keterangan);
                    $('#tanggal_validasi').val(response.v);
                    $('#status_validasi').val(response.data.validasi);
                    if (response.data.validasi == 'Diterima') {
                        $('#status_validasi').css({"color":"#68e365","background":"#d2f7d1"})
                    } else{
                        $('#status_validasi').css({"color":"#f72b50","background":"#fee6ea"})
                    }

                    // $('#nama_objek').val(response.data.nama_objek);

                }
            })
        })
    })        
	// Pajak Parkiran Belum Tervalidasi
    $(document).ready(function (){
        $('#pajak-parkir-belum-tervalidasi').DataTable({
        ordering:true,
        processing: true,
        serverSide:true,
        ajax:"/admin/data-objek-pajak/pajak-parkir/dataTableParkirBelumValidasiJson",
        // ajax:"{{ route('admin.datatable-parkir-belum-validasi') }}",
        columns: [
            {data: 'DT_RowIndex',name:'DT_RowIndex',class:'text-center',width:'10px',orderable:false,searchable:false,class:'text-center'},
            {data: 'nama_objek',name:'nama_objek'},
            {data: 'id_jenis_pajak',name:'id_jenis_pajak'},
            {data: 'id_wajib_pajak',name:'id_wajib_pajak',class:'text-center text-uppercase'},
            {data: 'tanggal_daftar_objek',name:'tanggal_daftar_objek'},
            {data: 'validasi',name:'validasi',render: function(data,type,row) { 
                    // console.log(row);
                    data = '<span class="badge light badge-warning">'+data+'</span>';
                    return data;
                }},
            {data: 'aksi',name:'aksi',orderable:false,searchable:false}
        ],
            language: {
                paginate: {
                next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
            }
            }
        })
    // Pajak Parkiran Tervalidasi
        $('#pajak-parkir-tervalidasi').DataTable({
        ordering:true,
        processing: true,
        serverSide:true,
        ajax:"/admin/data-objek-pajak/pajak-parkir/dataTableParkirTerValidasiJson",
        // ajax:"{{ route('admin.datatable-parkir-tervalidasi') }}",
        columns: [
            {data: 'DT_RowIndex',name:'DT_RowIndex',width:'10px',orderable:false,searchable:false,class:'text-center'},
            {data: 'id_wajib_pajak',name:'id_wajib_pajak',class:'text-center text-uppercase'},
            {data: 'jenis_usaha',name:'npwpd',class:'text-center'},
            {data: 'nama_objek',name:'nama_objek',class:'text-center'},
            // {data: 'id_jenis_pajak',name:'id_jenis_pajak'},
            // {data: 'id_wajib_pajak',name:'id_wajib_pajak'},
            {data: 'validasi',name:'validasi',render: function(data,type,row) { 
                    // console.log(row);
                    if (data == 'Diterima') {
                        data = '<span class="badge light badge-success">'+data+'</span>'
                    } else{
                        data = '<span class="badge light badge-danger">'+data+'</span>'
                    }
                    return data;
                },class:'text-center'},
            {data: 'aksi',name:'aksi',orderable:false,searchable:false}
        ],
            language: {
                paginate: {
                next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
            }
            }
        })
    }); 
    
    
    
      
    
	</script>
	@endpush
@endsection
