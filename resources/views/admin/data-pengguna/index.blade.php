@extends('layouts.main')

@section('container')
     <div class="content-body">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
						<div class="page-titles">
							<ol class="breadcrumb">
								<li class="breadcrumb-item active"><a href="javascript:void(0)">Data Pengguna</a></li>
						
							</ol>
						</div>
                </div>
            </div>
            
            <div class="row">
                 <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Daftar Data Pengguna </h4>
                            </div>
                            <div class="card-body">
                                <!-- Nav tabs -->
                               
                                    <div class="table-responsive">
                                     <table id="wp-belum-tervalidasi" class="display" style="min-width: 845px; width:100%">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Nama</th>
                                                <th class="text-center">Tanggal Daftar</th>
                                            
                                                <th class="text-center">Email</th>
                                               
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
                                            
                                                <th class="text-center">Email</th>
                                               
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

      <!-- Modal -->
        {{-- <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Password</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <form action="{{ route('admin.update-password',$user->id) }}" method="post">
                            @csrf
                            <input type="hidden" name="user_id" id="user_id">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label>Current Password</label>
                                    <input type="password" name="current_password" id="current_password" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label>New Password</label>
                                    <input type="password" name="password" id="password"  min="8" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label>Confirm Password</label>
                                    <input type="password" name="password_confirmation"  id="password_confirmation" min="8" class="form-control" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                        </form>
                </div>
            </div> 
        </div> --}}

          
    </div>
	@push('scripts')
	<script>
	//example 1
    $(document).ready(function (){
        $(document).on('click','.btn-primary',function () {
            var user_id = $(this).val();
            // alert(user_id)
            $('#changePasswordModal').modal('show');
            $.ajax({
            type: 'GET',
            url: 'update-password/' + user_id,
            success:function (response) {
                console.log(response.user.nama);
            }
        });
        });
        $('#wp-belum-tervalidasi').DataTable({
        ordering:true,
        processing: true,
        serverSide:true,
        ajax:"/admin/data-pengguna/dataTablePenggunaJson",
        // ajax:"{{ route('admin.datatable-pengguna') }}",
        columns: [
            {data: 'DT_RowIndex',name:'DT_RowIndex',width:'10px',orderable:false,searchable:false},
            {data: 'nama',name:'nama',class: "text-center"},
            {data: 'tanggal_daftar',name:'tanggal_daftar',class: "text-center"},
            {data: 'email',name:'email',class: "text-center"},
            // {data: 'verifikasi',name:'verifikasi',class: "text-center",render: function(data,type,row) { 
            //         // console.log(row);
            //         data = '<span class="badge light badge-warning text-center">'+data+'</span>';
            //         return data;
            //     }},
            {data: 'password',name:'password',orderable:false,searchable:false,class:'text-center'}
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
