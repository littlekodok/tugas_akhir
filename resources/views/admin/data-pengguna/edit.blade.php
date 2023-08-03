@extends('layouts.main')

@section('container')
     <div class="content-body">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
						<div class="page-titles">
							<ol class="breadcrumb">
								<li class="breadcrumb-item "><a href="{{ route('admin.data-pengguna') }}">Data Pengguna</a></li>
                                <li class="breadcrumb-item active"><a >Ganti Password</a></li>
						
							</ol>
						</div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    @if (session('message'))
                    <h5 class="alert alert-danger mb-2 text-center">{{ session('message') }}</h5>
                    @endif    
                    
                </div>
               
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="basic-form">
                                <form action="{{ route('admin.update-password',$user->id) }}" method="post">
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
                                        
                                            <a  href="{{ route('admin.data-pengguna') }}" class="btn btn-secondary" >Kembali</a>
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
