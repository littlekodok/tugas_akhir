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
                                <h4 class="card-title">Custom Tab 1</h4>
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
                                     <table id="wp-belum-tervalidasi" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Tanggal Daftar</th>
                                                <th>Jenis Usaha</th>
                                                <th>Email</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Tanggal Daftar</th>
                                                <th>Jenis Usaha</th>
                                                <th>Email</th>
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
                                                <table id="wp-tervalidasi" class="display" style="min-width: 845px">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Tanggal</th>
                                                            <th>NIK</th>
                                                            <th>No</th>
                                                            <th>NPWPD</th>
                                                            <th>Nama</th>
                                                            <th>Alamat</th>
                                                            <th>No Hp</th>
                                                            <th>Cetak</th>
                                                            <th>Aksi</th>
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
	@push('scripts')
	<script>
	//example 1
    $(document).ready(function (){
        $('#wp-belum-tervalidasi').DataTable({
        ordering:true,
        processing: true,
        serverSide:true,
        ajax:'data-wajib-pajak/json',
        columns: [
            {data: 'DT_RowIndex',name:'DT_RowIndex',width:'10px',orderable:false,searchable:false},
            {data: 'nama',name:'nama'},
            {data: 'tanggal_daftar',name:'tanggal_daftar'},
            {data: 'jenis_usaha',name:'jenis_usaha'},
            {data: 'email',name:'email'},
            {data: 'validasi',name:'validasi',orderable:false,searchable:false}
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
