@extends('layouts.main')

@section('container')
     <div class="content-body">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
						<div class="page-titles">
							<ol class="breadcrumb">
								<li class="breadcrumb-item active"><a href="javascript:void(0)">Data Wajib Pajak</a></li>
						
							</ol>
						</div>
                </div>
            </div>
            <div class="row">
                 <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Wajib Pajak</h4>
                            </div>
                            <div class="card-body">
                                <!-- Nav tabs -->
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active text-primary" data-bs-toggle="tab" href="#home1"><i class=" fa-solid fa-ban me-2"></i> Wajib Pajak Belum Tervalidasi</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-primary" data-bs-toggle="tab" href="#profile1"><i class="fa-solid fa-check me-2"></i> Wajib Pajak Tervalidasi</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="home1" role="tabpanel">
                                            <div class="pt-4">
                                             
                                    <div class="table-responsive">
                                     <table id="wp-belum-tervalidasi" class="display" style="min-width: 845px; width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Nama</th>
                                                <th class="text-center">Tanggal Daftar</th>
                                                <th class="text-center">Jenis Usaha</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Verifikasi</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Nama</th>
                                                <th class="text-center">Tanggal Daftar</th>
                                                <th class="text-center">Jenis Usaha</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Verifikasi</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="profile1">
                                            <div class="pt-4">
                                                <div class="table-responsive">
                                                <table id="wp-tervalidasi" class="display dataTable" style="min-width: 845px; width:100%" >
                                                    <thead>
                                                        <tr>
                                                            <th class="text-center">No</th>
                                                            <th class="text-center">Tanggal</th>
                                                            <th class="text-center">NIK</th>
                                                            <th class="text-center">NPWPD</th>
                                                            <th class="text-center">Nama</th>
                                                            <th class="text-center">Alamat</th>
                                                            <th class="text-center">No Hp</th>
                                                            <th class="text-center">Verifikasi</th>
                                                            {{-- <th>Aksi</th> --}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        
                                                    </tbody>
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

    </div>
	@push('scripts')
	<script>
	//example 1
    $(document).ready(function (){
        $('#wp-belum-tervalidasi').DataTable({
        ordering:true,
        processing: true,
        serverSide:true,
        ajax:"/admin/data-wajib-pajak/dataTableBelumValidasiJson",
        // ajax:"{{ route('admin.datatable-belum-validasi') }}",
        columns: [
            {data: 'DT_RowIndex',name:'DT_RowIndex',width:'10px',orderable:false,searchable:false},
            {data: 'nama',name:'nama',class: "text-center"},
            {data: 'tanggal_daftar',name:'tanggal_daftar',class: "text-center"},
            {data: 'jenis_usaha',name:'jenis_usaha',class: "text-center"},
            {data: 'email',name:'email',class: "text-center"},
            {data: 'verifikasi',name:'verifikasi',class: "text-center",render: function(data,type,row) { 
                    // console.log(row);
                    data = '<span class="badge light badge-warning text-center">'+data+'</span>';
                    return data;
                }},
            {data: 'validasi',name:'validasi',orderable:false,searchable:false}
        ],
            language: {
                paginate: {
                next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
            }
            }
        })

        $('#wp-tervalidasi').DataTable({
        ordering:true,
        processing: true,
        serverSide:true,
        ajax:"/admin/data-wajib-pajak/dataTableTerValidasiJson",
        // ajax:"{{ route('admin.datatable-tervalidasi') }}",
        columns: [
            {data: 'DT_RowIndex',name:'DT_RowIndex',width:'10px',orderable:false,searchable:false,class: "text-center"},
            {data: 'tanggal_daftar',name:'tanggal_daftar',class: "text-center"},
            {data: 'nik',name:'nik',class: "text-center"},
            {data: 'jenis_usaha',name:'jenis_usaha',class: "text-center"},
            {data: 'nama',name:'nama',class: "text-center"},
            {data: 'alamat',name:'alamat',class: "text-center"},
            {data: 'no_telpon',name:'no_telpon',class: "text-center"},
            {data: 'verifikasi',name:'verifikasi',class: "text-center",render: function(data,type,row) { 
                    // console.log(row);
                    data = '<span class="badge light badge-success text-center">'+data+'</span>';
                    return data;
                }},
            // {data: 'validasi',name:'validasi',orderable:false,searchable:false}
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
