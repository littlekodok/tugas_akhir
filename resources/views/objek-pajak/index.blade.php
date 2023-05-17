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
          

        </div>

    </div>

@endsection
