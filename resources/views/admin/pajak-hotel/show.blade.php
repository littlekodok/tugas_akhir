@extends('layouts.main')

@section('container')
     <div class="content-body">

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
						<div class="page-titles">
							<div class="d-flex">
								<ol class="breadcrumb align-items-center mt-0">
                                    <li class="breadcrumb-item ps-0"><a href="{{ route('admin.data-objek-pajak.pajak-hotel') }}">Lihat Data</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Data {{ $objekpajak->nama_objek }}</li>
                                    {{-- <li class="breadcrumb-item ps-0"><a href="javascript:void(0)">Pelaporan Objek Pajak</a></li>
                                    <li class="breadcrumb-item ps-0 active"><a href="javascript:void(0)">Tambah Objek Pajak</a></li> --}}
                                </ol>
							 </div>
						</div>
                        
                </div>
            </div>
              <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                         <div class="card-body">
                                <div class="card-header px-0">
                                    <h4 class="card-title fw-semibold">Data {{ $objekpajak->nama_objek }}</h4>
                                </div>
                                <div class="mt-3 basic-form">
                                    <form action="" id="form" method="post" enctype="multipart/form-data">
                                       @csrf
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nama Objek</label>
                                            <div class="col-sm-6">
                                                <input type="input" class="form-control" value="{{ $objekpajak->nama_objek }}" readonly>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Tanggal Daftar</label>
                                            <div class="col-sm-6">
                                                <input type="input" class="form-control" value="{{ $objekpajak->tanggal_daftar_objek }}" readonly>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Nama Objek</label>
                                            <div class="col-sm-6">
                                                <input type="input" class="form-control" value="{{ $objekpajak->no_objek }}" readonly>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-3 col-form-label">Keterangan</label>
                                            <div class="col-sm-6">
                                                <input type="input" class="form-control fw-bold" value="{{ $objekpajak->keterangan }}" readonly>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
            </div>

          

        </div>

    </div>
    
            
@endsection
