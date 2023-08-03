@extends('layouts.main')

@section('container')
     <div class="content-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
						<div class="page-titles">
							<ol class="breadcrumb">
								<li class="breadcrumb-item active"><a href="javascript:void(0)">Update Password</a></li>
                             
						
							</ol>
						</div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    @if (session('message'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="me-2"><polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                        <strong>Error!</strong> {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                        </button>
                    </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('admin.admin-update-password') }}" method="post">
                                    @csrf
                                   
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
                                        
                                            <a  href="{{ route('admin.index') }}" class="btn btn-secondary" >Kembali</a>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                 
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>      
      

          
    </div>
	
@endsection
