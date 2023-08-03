@extends('layouts.main')

@section('container')
    <div class="content-body">
        <div class="container-fluid"> 
          <div class="row">
              <div class="col-12">
                  <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Data Objek Pajak</h4>
                        </div>
                  </div>
              </div>
          </div>
          <div class="tab-content">
            <div class="tab-pane fade show active" id="Boxed" role="tabpanel">
              <div class="row">
                <div class="col-xl-3 col-xxl-3  col-md-4 col-sm-6">
                  <div class="card">
                    <div class="jobs2 card-body">
                      <div class="text-center">
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" height="4em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M0 32C0 14.3 14.3 0 32 0H480c17.7 0 32 14.3 32 32s-14.3 32-32 32V448c17.7 0 32 14.3 32 32s-14.3 32-32 32H304V464c0-26.5-21.5-48-48-48s-48 21.5-48 48v48H32c-17.7 0-32-14.3-32-32s14.3-32 32-32V64C14.3 64 0 49.7 0 32zm96 80v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H112c-8.8 0-16 7.2-16 16zM240 96c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H240zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V112c0-8.8-7.2-16-16-16H368c-8.8 0-16 7.2-16 16zM112 192c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H112zm112 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H240c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V208c0-8.8-7.2-16-16-16H368zM328 384c13.3 0 24.3-10.9 21-23.8c-10.6-41.5-48.2-72.2-93-72.2s-82.5 30.7-93 72.2c-3.3 12.8 7.8 23.8 21 23.8H328z"/></svg>
                        </span>
                        <h4 class="mb-0 mt-4"><a href="{{ route('admin.data-objek-pajak.pajak-hotel') }}" class="stretched-link">Pajak Hotel</a></h4>
                        <span class="text-primary mb-3 d-block">Kabupaten Rembang</span>
                      </div>
                      <div class="text-center">
                        <span class="d-block mb-1"><i class="fa-solid fa-circle-check me-2" style="color:#68e365"></i>{{ $hotelDiterima->count() }} Pajak Tervalidasi</span>
                        <span><i class="fa-solid fa-ban me-2" style="color: #f72b50"></i>{{ $hotelProses->count() }} Belum Tervalidasi</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-xxl-3  col-md-4 col-sm-6">
                  <div class="card">
                    <div class="jobs2 card-body">
                      <div class="text-center">
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" height="4em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M416 0C400 0 288 32 288 176V288c0 35.3 28.7 64 64 64h32V480c0 17.7 14.3 32 32 32s32-14.3 32-32V352 240 32c0-17.7-14.3-32-32-32zM64 16C64 7.8 57.9 1 49.7 .1S34.2 4.6 32.4 12.5L2.1 148.8C.7 155.1 0 161.5 0 167.9c0 45.9 35.1 83.6 80 87.7V480c0 17.7 14.3 32 32 32s32-14.3 32-32V255.6c44.9-4.1 80-41.8 80-87.7c0-6.4-.7-12.8-2.1-19.1L191.6 12.5c-1.8-8-9.3-13.3-17.4-12.4S160 7.8 160 16V150.2c0 5.4-4.4 9.8-9.8 9.8c-5.1 0-9.3-3.9-9.8-9L127.9 14.6C127.2 6.3 120.3 0 112 0s-15.2 6.3-15.9 14.6L83.7 151c-.5 5.1-4.7 9-9.8 9c-5.4 0-9.8-4.4-9.8-9.8V16zm48.3 152l-.3 0-.3 0 .3-.7 .3 .7z"/></svg>
                        </span>
                        <h4 class="mb-0 mt-4"><a href="{{ route('admin.data-objek-pajak.pajak-restoran') }}"class="stretched-link">Pajak Restoran</a></h4>
                        <span class="text-primary mb-3 d-block">Kabupaten Rembang</span>
                      </div>
                      <div class="text-center">
                        <span class="d-block mb-1"><i class="fa-solid fa-circle-check me-2" style="color:#68e365"></i>{{ $restoranDiterima->count() }} Pajak Tervalidasi</span>
                        <span><i class="fa-solid fa-ban me-2" style="color: #f72b50"></i>{{ $restoranProses->count() }} Belum Tervalidasi</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-xxl-3  col-md-4 col-sm-6">
                  <div class="card">
                    <div class="jobs2 card-body">
                      <div class="text-center">
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" height="4em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M435.4 361.3l-89.7-6c-5.2-.3-10.3 1.1-14.5 4.2s-7.2 7.4-8.4 12.5l-22 87.2c-14.4 3.2-29.4 4.8-44.8 4.8s-30.3-1.7-44.8-4.8l-22-87.2c-1.3-5-4.3-9.4-8.4-12.5s-9.3-4.5-14.5-4.2l-89.7 6C61.7 335.9 51.9 307 49 276.2L125 228.3c4.4-2.8 7.6-7 9.2-11.9s1.4-10.2-.5-15L100.4 118c19.9-22.4 44.6-40.5 72.4-52.7l69.1 57.6c4 3.3 9 5.1 14.1 5.1s10.2-1.8 14.1-5.1l69.1-57.6c27.8 12.2 52.5 30.3 72.4 52.7l-33.4 83.4c-1.9 4.8-2.1 10.1-.5 15s4.9 9.1 9.2 11.9L463 276.2c-3 30.8-12.7 59.7-27.6 85.1zM256 48l.9 0h-1.8l.9 0zM56.7 196.2c.9-3 1.9-6.1 2.9-9.1l-2.9 9.1zM132 423l3.8 2.7c-1.3-.9-2.5-1.8-3.8-2.7zm248.1-.1c-1.3 1-2.7 2-4 2.9l4-2.9zm75.2-226.6l-3-9.2c1.1 3 2.1 6.1 3 9.2zM256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm14.1-325.7c-8.4-6.1-19.8-6.1-28.2 0L194 221c-8.4 6.1-11.9 16.9-8.7 26.8l18.3 56.3c3.2 9.9 12.4 16.6 22.8 16.6h59.2c10.4 0 19.6-6.7 22.8-16.6l18.3-56.3c3.2-9.9-.3-20.7-8.7-26.8l-47.9-34.8z"/></svg>
                        </span>
                        <h4 class="mb-0 mt-4"><a href="{{ route('admin.data-objek-pajak.pajak-hiburan') }}"class="stretched-link">Pajak Hiburan</a></h4>
                        <span class="text-primary mb-3 d-block">Kabupaten Rembang</span>
                      </div>
                      <div class="text-center">
                        <span class="d-block mb-1"><i class="fa-solid fa-circle-check me-2" style="color:#68e365"></i>{{ $hiburanDiterima->count() }} Pajak Tervalidasi</span>
                        <span><i class="fa-solid fa-ban me-2" style="color: #f72b50"></i>{{ $hiburanProses->count() }} Belum Tervalidasi</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-xxl-3  col-md-4 col-sm-6">
                  <div class="card">
                    <div class="jobs2 card-body">
                      <div class="text-center">
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" height="4em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M256 0C114.6 0 0 114.6 0 256V448c0 35.3 28.7 64 64 64h42.8c-6.6-5.9-10.8-14.4-10.8-24V376c0-20.8 11.3-38.9 28.1-48.6l21-64.7c7.5-23.1 29-38.7 53.3-38.7H313.6c24.3 0 45.8 15.6 53.3 38.7l21 64.7c16.8 9.7 28.2 27.8 28.2 48.6V488c0 9.6-4.2 18.1-10.8 24H448c35.3 0 64-28.7 64-64V256C512 114.6 397.4 0 256 0zM362.8 512c-6.6-5.9-10.8-14.4-10.8-24V448H160v40c0 9.6-4.2 18.1-10.8 24H362.8zM190.8 277.5L177 320H335l-13.8-42.5c-1.1-3.3-4.1-5.5-7.6-5.5H198.4c-3.5 0-6.5 2.2-7.6 5.5zM168 408a24 24 0 1 0 0-48 24 24 0 1 0 0 48zm200-24a24 24 0 1 0 -48 0 24 24 0 1 0 48 0z"/></svg>
                        </span>
                        <h4 class="mb-0 mt-4"><a href="{{ route('admin.data-objek-pajak.pajak-parkir') }}"class="stretched-link">Pajak Parkir</a></h4>
                        <span class="text-primary mb-3 d-block">Kabupaten Rembang</span>
                      </div>
                      <div class="text-center">
                      <span class="d-block mb-1"><i class="fa-solid fa-circle-check me-2" style="color:#68e365"></i>{{ $parkirDiterima->count() }} Pajak Tervalidasi</span>
                        <span><i class="fa-solid fa-ban me-2" style="color: #f72b50"></i>{{ $parkirProses->count() }} Belum Tervalidasi</span>
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

@endsection
