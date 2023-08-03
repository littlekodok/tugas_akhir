@extends('layouts.main')

@section('container')
     <div class="content-body">

        <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                            <div class="page-titles">
                                <div class="d-flex">
                                    <ol class="breadcrumb align-items-center mt-0">
                                        <li class="breadcrumb-item ps-0 active"><a href="javascript:void(0)">Pelaporan Objek Pajak</a></li>
                                    </ol>
                                </div>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('wajib-pajak.objek-pajak.tambah') }}" class="btn btn-primary">Tambah Objek Pajak</a>
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                           <div class="card">
                               <div class="card-header">
                                   <h4 class="card-title">Objek Pajak</h4>
                               </div>
                               <div class="card-body">
                                   <div class="custom-tab-1">
                                       <div class="table-responsive">
                                        <table id="wp-belum-tervalidasi" class="display" style="min-width: 845px; width:100%">
                                           <thead>
                                               <tr>
                                                   <th class="text-center">No</th>
                                                   <th class="text-center">Nama Objek Pajak</th>
                                                   <th class="text-center">Jenis Pajak</th>
                                                   <th class="text-center">Status</th>
                                                   <th class="text-center">Aksi</th>
                                               </tr>
                                           </thead>
                                           <tbody>
                                           </tbody>
                                           <tfoot>
                                               <tr>
                                                    <th class="text-center">No</th>
                                                    <th class="text-center">Nama Objek Pajak</th>
                                                    <th class="text-center">Jenis Pajak</th>
                                                    <th class="text-center">Status</th>
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
     <!-- Modal -->
     <div class="modal fade" id="modal-objek" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        $(document).on('click','.modal-objek',function () {
            var stud_id = $(this).val();
            // alert(stud_id)
            $('#modal-objek').modal('show')
            $.ajax({
                type:"GET",
                url:"objek-pajak/show/" +stud_id,
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

    $(document).ready(function (){
        $('#wp-belum-tervalidasi').DataTable({
        ordering:true,
        processing: true,
        serverSide:true,
        // ajax:"{{ route('wajib-pajak.datatable-data-objek-pajak') }}",
        ajax: '/wajib-pajak/objek-pajak/dataObjekPajak',
        columns: [
            {data: 'DT_RowIndex',name:'DT_RowIndex',width:'10px',orderable:false,searchable:false,class:'text-center'},
            {data: 'nama_objek',name:'nama',class: "text-center"},
            {data: 'id_jenis_pajak',name:'jenis_pajak',class: "text-center"},
            {data: 'validasi',name:'validasi',class: "text-center",render: function(data,type,row) { 
                    // console.log(row);
                    if (data == 'Diterima') {
                        data =  '<span class="badge light badge-success"><i class="fa fa-circle text-success me-1"></i>'+data+'</span>';
                    } else if(data == 'Proses') {
                        data =  '<span class="badge light badge-warning"><i class="fa fa-circle text-warning me-1"></i>'+data+'</span>';
                    } else{
                        data =  '<span class="badge light badge-danger"><i class="fa fa-circle text-danger me-1"></i>'+data+'</span>';
                    }
                    return data;
                }},
            {data: 'aksi',name:'aksi',orderable:false,searchable:false,class:'text-center'}
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
