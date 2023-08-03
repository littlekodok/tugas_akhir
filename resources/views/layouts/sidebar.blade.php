 <!--**********************************
            Sidebar start
        ***********************************-->
         <div class="dlabnav">
            <div class="dlabnav-scroll">
				<div class="dropdown header-profile2 ">
					<a class="nav-link " href="javascript:void(0);"  role="button" data-bs-toggle="dropdown">
						<div class="header-info2 d-flex align-items-center">
							<img src="{{ auth()->user()->akses == 'Admin' ? asset('images/admin.png') : asset('images/wp.png')  }}" alt="">
							<div class="d-flex align-items-center sidebar-info">
								<div>
									<span class="font-w400 d-block">{{ auth()->user()->akses }}</span>
									<small class="text-end font-w400">{{ auth()->user()->nama }}</small>
								</div>	
					
							</div>
							
						</div>
					</a>
				</div>
				<ul class="metismenu" id="menu">
					@can('wp')
						
							
							 <li><a class=" " href="{{ route('wajib-pajak.index') }}" aria-expanded="false">
									 <i class="flaticon-025-dashboard"></i>
									 <span class="nav-text">Dashboard</span>
								 </a>
							 </li>
							 

							 @if (isset($cek) && $cek !== false && $cek->verifikasi == 1)
								<li><a class=" " href="{{ route('wajib-pajak.objek-pajak.index') }}" aria-expanded="false">
									<i class="fa-solid fa-clipboard-list"></i>
									<span class="nav-text">Pelaporan</span>
									</a>
                   				 </li>
				
                    			<li>
								<a href="{{ route('wajib-pajak.pembayaran.index') }}" class="" aria-current="page" title="Pembayaran" data-bs-toggle="tooltip" data-bs-placement="right">
									<i class="fa-solid fa-money-bill-wave"></i>
									<span class="nav-text">Pembayaran</span>
								</a>
								</li>
                    
                    			<li><a class=" " href="{{ route('wajib-pajak.tagihan') }}"  aria-current="page" title="Tunggakan" data-bs-toggle="tooltip" data-bs-placement="right">
									<i class="fa-solid fa-receipt"></i>
									<span class="nav-text">Tagihan</span>
								</a>
                       
                    			</li>
							 @endif
					
					@endcan

					@can('admin')
					<li><a class=" " href="{{ route('admin.index') }}" aria-expanded="false">
							<i class="flaticon-025-dashboard"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                    </li>
                    <li><a class=" " href="{{ route('admin.data-wajib-pajak') }}" aria-expanded="false">
							<i class="fa-solid fa-users"></i>
							<span class="nav-text">Data Wajib Pajak</span>
						</a>
                    </li>
                     <li><a class=" " href="{{ route('admin.data-objek-pajak') }}" aria-expanded="false">
							<i class="fa-solid fa-street-view"></i>
							<span class="nav-text">Data Objek Pajak</span>
						</a>
                       
                    </li>
					<li><a class=" " href="{{ route('admin.data-pengguna') }}" aria-expanded="false">
						<i class="fa-solid fa-user-gear"></i>
						<span class="nav-text">Data Pengguna</span>
					</a>
				   
				</li>
                     <li><a class=" " href="{{ route('admin.data-pembayaran') }}" aria-expanded="false">
							<i class="flaticon-022-copy"></i>
							<span class="nav-text">Data Pembayaran</span>
						</a>
                    </li>
                    {{-- <li><a class=" " href="javascript:void()" aria-expanded="false">
							<i class="fa-solid fa-file-invoice-dollar"></i>
							<span class="nav-text">Data Tunggakan</span>
						</a>
                    </li> --}}
					@endcan
                </ul>
				
				
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
		