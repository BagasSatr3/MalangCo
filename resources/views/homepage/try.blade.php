<div class="container" style="height:50vh;">
   <div class="col">
      <div class="d-flex flex-column align-items-center">
         <br>
         <br>
         <h2>{{$setting->website_name}}</h2>
         <div class="d-flex flex-column align-items-center">
            <h7>{{$setting->meta_keyword}}</h7>
         </div>
      </div>
   </div>

   <div class="container">
   <div class="row justify-content-center row-cols-1 row-cols-lg-2 row-cols-xl-4">
        <div class="col">
            <div class="card radius-15 bg-primary">
                <div class="card-body text-center">
                    <div class="p-4 radius-15">
                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" width="110" height="110" class="rounded-circle shadow p-1 bg-white" alt="">
                        <h5 class="mb-0 mt-5 text-white">Pauline I. Bird</h5>
                        <p class="mb-3 text-white">Webdeveloper</p>
                        <div class="list-inline contacts-social mt-3 mb-3"> <a href="javascript:;" class="list-inline-item border-0"><i class="bx bxl-facebook"></i></a>
                            <a href="javascript:;" class="list-inline-item border-0"><i class="bx bxl-twitter"></i></a>
                            <a href="javascript:;" class="list-inline-item border-0"><i class="bx bxl-linkedin"></i></a>
                        </div>
                        <div class="d-grid"> <a href="#" class="btn btn-white radius-15">Contact Me</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-20 bg-danger">
                <div class="card-body text-center">
                    <div class="p-4 radius-15">
                        <img src="{{ asset('images/pp.jpg') }}" width="110" height="110" class="rounded-circle shadow p-1 bg-white" alt="">
                        <h5 class="mb-0 mt-5 text-white">Pauline I. Bird</h5>
                        <p class="mb-3 text-white">Webdeveloper</p>
                        <div class="list-inline contacts-social mt-3 mb-3"> <a href="javascript:;" class="list-inline-item border-0"><i class="bx bxl-facebook"></i></a>
                            <a href="javascript:;" class="list-inline-item border-0"><i class="bx bxl-twitter"></i></a>
                            <a href="javascript:;" class="list-inline-item border-0"><i class="bx bxl-linkedin"></i></a>
                        </div>
                        <div class="d-grid"> <a href="#" class="btn btn-white radius-15">Contact Me</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      </div>
   <!-- <div class="container">
      <div class="row">
      <div class ="row mt-4">
      @foreach($dev as $produk)
      <div class="col-md-4">
      <div class="card card-circle" style="box-shadow: 5px 6px 6px 2px #e9ecef;">
      <div class="card-icon" style="">
         <a href="">
            @if($produk->foto != null)
            <img src="{{ \Storage::url($produk->foto) }}" alt="{{ $produk->name_dev }}" class="card-img-top" style="max-height: 190px; width: 100%;">
            @else
            <img src="{{ asset('images/bag.jpg') }}" alt="{{ $produk->name_dev }}" class="card-img-top" style="max-height: 190px; width: 100%;">
            @endif
         </a>
         </div>
            <div class="card-body">
               <div class="row mt-4">
                  <div class="col">  
                     <a class="text-decoration-none" style="color: black;">
                        <p class="card-text h5">
                           <strong>{{ $produk->name_dev }}</strong>
                        </p>
                        <p>
                        {{ $produk->job_dev }}
                        </p>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      @endforeach
   </div>
</div>
</div> -->
