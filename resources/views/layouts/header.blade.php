 <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="#" class="brand-logo">
                <img src="{{ asset('images/kabupaten rembang.png')}}" style="max-width: 62px; max-height:65px" alt="">
                <h4 class="brand-title" style="max-height:48px">E-SPTPD</h4>
                
               
				{{-- <svg class="brand-title" xmlns="http://www.w3.org/2000/svg" width="134.01" height="48.365" viewBox="0 0 134.01 48.365">
				  <g id="Group_38" data-name="Group 38" transform="translate(-133.99 -40.635)">
					<text id="Job_Admin_Dashboard" data-name="Job Admin Dashboard" transform="translate(134 85)" fill="#787878" font-size="12" font-family="Poppins-Light, Poppins" font-weight="300"><tspan x="0" y="0">E-SPTPD</tspan></text>
					<path id="Path_1948" data-name="Path 1948" d="M.36,6.616a1.661,1.661,0,0,0,1.094-.422,1.287,1.287,0,0,0,.5-1.016V-11.738H7.52L7.551,5.271A8.16,8.16,0,0,1,6.91,8.789a4.074,4.074,0,0,1-2.2,1.985,11.542,11.542,0,0,1-4.346.657ZM17.651,9.68A7.316,7.316,0,0,1,13.7,8.617a7.008,7.008,0,0,1-2.626-2.97,9.786,9.786,0,0,1-.922-4.315,9.276,9.276,0,0,1,.907-4.174,6.935,6.935,0,0,1,2.6-2.877,7.438,7.438,0,0,1,4-1.047,7.607,7.607,0,0,1,4.018,1.032,6.8,6.8,0,0,1,2.611,2.861,9.349,9.349,0,0,1,.907,4.205,9.759,9.759,0,0,1-.922,4.33,6.993,6.993,0,0,1-2.642,2.955A7.4,7.4,0,0,1,17.651,9.68Zm0-4.565a1.753,1.753,0,0,0,1.438-.954,5.2,5.2,0,0,0,.625-2.83,4.8,4.8,0,0,0-.594-2.626,1.73,1.73,0,0,0-1.47-.907,1.694,1.694,0,0,0-1.454.907,4.908,4.908,0,0,0-.578,2.626,5.309,5.309,0,0,0,.61,2.83A1.718,1.718,0,0,0,17.651,5.115Zm17.478,4.6q-2.345,0-5.972-.375L27.75,9.18V-12.238h5.44V-6.11q.25-.094.844-.3a6.64,6.64,0,0,1,1.079-.281,6.807,6.807,0,0,1,1.079-.078,5.75,5.75,0,0,1,4.737,1.939q1.579,1.939,1.579,6.285,0,4.377-1.767,6.316T35.129,9.711Zm-.594-4.878a2.3,2.3,0,0,0,1.876-.719A4.131,4.131,0,0,0,37,1.551Q37-1.92,34.754-1.92q-.719,0-1.563.063v6.6A10.43,10.43,0,0,0,34.535,4.834ZM45.134-6.36h5.44V9.274h-5.44Zm.031-6.222h5.44V-7.36h-5.44ZM59.611,9.68a5.9,5.9,0,0,1-4.909-2q-1.595-2-1.595-6.222a12.451,12.451,0,0,1,.844-5.143A4.635,4.635,0,0,1,56.3-6.125a9.87,9.87,0,0,1,3.846-.641,13.2,13.2,0,0,1,2.095.188q1.157.188,3.033.625L65.145-1.7q-2.908-.219-3.627-.219a4.459,4.459,0,0,0-1.845.3,1.565,1.565,0,0,0-.844.985,6.976,6.976,0,0,0-.219,2A7.45,7.45,0,0,0,58.845,3.5a1.625,1.625,0,0,0,.86,1.032,4.362,4.362,0,0,0,1.813.3l3.6-.219L65.27,8.9A27.641,27.641,0,0,1,59.611,9.68Zm8.473-21.918h5.44V-.325l1.032-.406L76.714-6.36H82.78L79.4,1.207,83,9.274H76.9L74.744,3.958l-1.219.406V9.274h-5.44Z" transform="translate(133.63 53.217)" fill="#464646"/>
				  </g>
				</svg> --}}

            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
							<div class="dashboard_bar">
                                Dashboard
                            </div>
							
                        </div>
                                {{-- @php
                                    dd($cek);
                                @endphp --}}
                        <ul class="navbar-nav header-right">
                            @if (isset($cek))
                                @if ($cek == false)
                                    <li class="nav-item dropdown notification_dropdown">
                                    <span  class="badge light badge-lg badge-danger" >Wajib Pajak Belum Registrasi</span>
                                </li>
                                @endif
                                @if ($cek !== false && $cek->verifikasi == 0)
                                    <li class="nav-item dropdown notification_dropdown">
                                        <span  class="badge light badge-lg badge-warning" >Data Wajib Pajak Sedang Dicek Oleh Petugas</span>
                                    </li>
                                @endif
                                @if ($cek !== false && $cek->verifikasi == 1)
                                    <li class="nav-item dropdown notification_dropdown">
                                        <span  class="badge light badge-lg badge-success" >Wajib Pajak Sudah Divalidasi</span>
                                    </li>
                                @endif
                            @endif
                            {{-- @if ($cek == false)
                            <li class="nav-item dropdown notification_dropdown">
                                <span  class="badge light badge-lg badge-danger" >Wajib Pajak Belum Registrasi</span>
							</li> --}}
                        
                            {{-- @php ($cek == true) --}}
                                
                            
                            {{-- @endif --}}
							 
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell dz-theme-mode p-0" href="javascript:void(0);">
									<i id="icon-light" class="fas fa-sun"></i>
                                    <i id="icon-dark" class="fas fa-moon"></i>
									
                                </a>
							</li>
							<li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                                    <img src="{{ auth()->user()->akses == 'Admin' ? asset('images/admin.png') : asset('images/wp.png')  }}" width="20" alt="">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="app-profile.html" class="dropdown-item ai-icon">
                                        <svg id="icon-user2" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ms-2">Profile </span>
                                    </a>
                                    @if (auth()->user()->akses == 'Admin')
                                    <a href="{{ route('admin.admin-password') }}" class="dropdown-item ai-icon">
                                       <i class="fa-solid fa-lock"></i>
                                        <span class="ms-2">Ganti Password</span>
                                    </a>
                                    @endif
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button class="dropdown-item ai-icon">
                                            <svg  xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                            <span class="ms-2">Logout </span>
                                        </button>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
				</nav>
			</div>
		</div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->