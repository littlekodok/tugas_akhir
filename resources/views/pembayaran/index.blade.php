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
                    <div class="col-xl-12">
                           <div class="card">
                               <div class="card-header">
                                   <h4 class="card-title">Data Objek Pajak <strong>{{ auth()->user()->nama }}</strong></h4>
                               </div>
                               <div class="card-body">
                                   <!-- Nav tabs -->
                                   <div class="custom-tab-1">
                                       <div class="table-responsive">
                                        <table id="pajak-parkir-belum-tervalidasi" class="display" style="min-width: 845px; width:100%">
                                           <thead>
                                               <tr>
                                                   <th class="text-center">No</th>
                                                   <th class="text-center">Objek Pajak</th>
                                                   <th class="text-center">Jenis Pajak</th>
                                                   {{-- <th>Wajib Pajak</th> --}}
                                                   {{-- <th>Tanggal Daftar</th> --}}
                                                   {{-- <th>Validasi</th> --}}
                                                   <th class="text-center">Aksi</th>
                                               </tr>
                                           </thead>
                                           <tbody>
                                               
                                           </tbody>
                                           <tfoot>
                                               <tr>
                                                   <th class="text-center">No</th>
                                                   <th class="text-center">Objek Pajak</th>
                                                   <th class="text-center">Jenis Pajak</th>
                                                   {{-- <th>Wajib Pajak</th> --}}
                                                   {{-- <th>Tanggal Daftar</th> --}}
                                                   {{-- <th>Validasi</th> --}}
                                                   <th class="text-center">Aksi</th>
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
    @push('scripts')
	<script>
	// Pajak Parkiran Belum Tervalidasi
    $(document).ready(function (){
        $('#pajak-parkir-belum-tervalidasi').DataTable({
        ordering:true,
        processing: true,
        serverSide:true,
        // ajax:"{{ route('wajib-pajak.datatable-pembayaran') }}",
        ajax:'/wajib-pajak/pembayaran/dataTablePembayaran',
        columns: [
            {data: 'DT_RowIndex',name:'DT_RowIndex',class:'text-center',width:'10px',orderable:false,searchable:false},
            {data: 'nama_objek',name:'nama_objek',class:'text-center'},
            {data: 'id_jenis_pajak',name:'id_jenis_pajak',render: function(data,type,row) { 
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
                },class:'text-center'},
            // {data: 'id_wajib_pajak',name:'id_wajib_pajak'},
            // {data: 'tanggal_daftar_objek',name:'tanggal_daftar_objek'},
            // {data: 'validasi',name:'validasi',render: function(data,type,row) { 
            //         // console.log(row);
            //         data = '<span class="badge light badge-warning">'+data+'</span>';
            //         return data;
            //     }},
            {data: 'aksi',name:'aksi',orderable:false,searchable:false,class:'text-center'}
        ],
            language: {
                paginate: {
                next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>' 
            }
            }
        })
    // Pajak Parkiran Tervalidasi
        
    }); 
    
	</script>
	@endpush
@endsection
