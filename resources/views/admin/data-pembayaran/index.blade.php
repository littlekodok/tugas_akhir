@extends('layouts.main')

@section('container')
     <div class="content-body">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
						<div class="page-titles">
							<ol class="breadcrumb">
								<li class="breadcrumb-item active"><a href="javascript:void(0)">Data Pembayaran Objek Pajak</a></li>
						
							</ol>
						</div>
                </div>
            </div>
            <div class="row">
                 <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Pembayaran</h4>
                            </div>
                            <div class="card-body">
                                <!-- Nav tabs -->
                                <div class="">
                                  
                                    <div class="table-responsive">
                                    <a href="{{ route('admin.transaksi.export') }}" class="btn light btn-success my-3 btn-sm"><i class="fa-solid fa-file-excel me-3"></i>Export Excel</a>
                                     <table id="wp-belum-tervalidasi" class="display" style="min-width: 845px; width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Objek Pajak</th>
                                                <th class="text-center">Jenis Pajak</th>
                                                <th class="text-center">Wajib Pajak</th>
                                                <th class="text-center">Tanggal Pendataan</th> 
                                                <th class="text-center">Bulan Bayar</th> 
                                                <th class="text-center">Total Pajak</th> 
                                                <th class="text-center">Status Pembayaran</th>
                                                {{-- <th class="text-center">Aksi</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
												<th class="text-center">No</th>
                                                <th class="text-center">Objek Pajak</th>
                                                <th class="text-center">Jenis Pajak</th>
                                                <th class="text-center">Wajib Pajak</th>
                                                <th class="text-center">Tanggal Pendataan</th>
                                                <th class="text-center">Bulan Bayar</th>
                                                <th class="text-center">Total Pajak</th> 
                                                <th class="text-center">Status Pembayaran</th>
                                                {{-- <th class="text-center">Aksi</th> --}}
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
        ajax:"/admin/data-pembayaran/dataTableDataPembayaran",
        // ajax:"{{ route('admin.datatable-belum-validasi') }}",

        columns: [
            {data: 'DT_RowIndex',name:'DT_RowIndex',width:'10px',orderable:false,searchable:false},
            {data: 'objek_pajak',name:'objek_pajak',class: "text-center"},
            {data: 'id_jenis_pajak',name:'jenis_pajak',render: function(data,type,row) { 
                    // console.log(data);
                    if (data == '1') {
                        data = 'Pajak Hotel'
                    } else if (data == '2') {
                        data = 'Pajak Restoran'
                    } else if (data == '3') {
                        data = 'Pajak Hiburan'
                    }
                    else {
                        data = 'Pajak Parkir'
                    }
                    // data = '<span class="badge light badge-warning">'+data+'</span>';
                    return data;
                },class:'text-center fw-semibold'},
            {data: 'wajib_pajak',name:'wajib_pajak',class:'text-center text-capitalize'},
            {data: 'tanggal_pendataan',name:'tanggal_pendataan',class:'text-center'},
            {data: 'bulan_bayar',name:'bulan_bayar',class:'text-center'},
            {data: 'total_pajak',name:'total_pajak',class:'text-center'},
            {data: 'status',name:'status_pembayaran',class: "text-center",render: function(data,type,row) { 
                    // console.log(row);
                    if (data == 'PENDING') {
                        data = '<span class="badge badge-warning text-center ">'+data+'<span class="ms-1 fas fa-stream"></span>'+'</span>';
                    } else if (data == 'SUCCESS') {
                        data = '<span class="badge  badge-success text-center">'+data+'<span class="ms-1 fa fa-check"></span>'+'</span>';
                    } else  {
                        data = '<span class="badge  badge-danger text-center">'+data+'<span class="ms-1 fa fa-ban"></span>'+'</span>';
                    }
                    return data
                }},
            // {data: 'verifikasi',name:'verifikasi',class: "text-center",render: function(data,type,row) { 
            //         // console.log(row);
            //         data = '<span class="badge light badge-warning text-center">'+data+'</span>';
            //         return data;
            //     }},
            // {data: 'validasi',name:'validasi',orderable:false,searchable:false,}
        ],
            language: {
                paginate: {
                next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
            }
            }
        })
    })
	</script>
	@endpush
@endsection
