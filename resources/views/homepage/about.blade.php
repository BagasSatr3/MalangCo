@extends('layouts.template')
@section('content')
<div class="container">
   <div class="row align-items-center justify-content-around flex-row-reverse">
      <div class="col-lg-6">
         <div class="about-text">
            <h3 class="h3">{{$setting->website_name}}</h3>
            <p>{{$setting->meta_keyword}}</p>
            <p><p>{{$setting->meta_description}}</p></p>
         </div>
      </div>
      <div class="col-12 col-sm-8 col-lg-6">
         <div class="about-img">
            <img src="{{ asset('images/auth-bg.png') }}">
         </div>
      </div>
   </div><br><br>

   <!-- <div class="row justify-content-left">
      <div class="col-12 col-sm-8 col-lg-6">
      <div class="section_heading text-center wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
         <h1 class="h1">{{$setting->website_name}}</h1>
         <p>Appland is completely creative, lightweight, clean &amp; super responsive app landing page.</p>
         <div class="line"></div>
      </div>
      </div>
      <div class="col-12 col-sm-8 col-lg-6">
         <img src="{{ asset('images/auth-bg.png') }}" alt="" sizes="" srcset="">
      </div>
   </div> -->


   <div class="row" style="margin-top: 20px">
      <!-- Single Advisor-->
      @foreach($dev as $produk)
      <div class="col-12 col-md-6 col-lg-4">
         <div class="card border-0 shadow-lg pt-5 my-5 position-relative" style="position: relative;display: -webkit-flex;display: flex;-webkit-flex-direction: column;flex-direction: column;min-width: 0;word-wrap: break-word;background-color: #fff;background-clip: border-box;border: 1px solid rgba(0,0,0,0.125);border-radius: .25rem;">
            <div class="card-body p-4">
               <div class="member-profile position-absolute w-100 text-center">
               @if($produk->foto != null)
                  <img class="rounded-circle mx-auto d-inline-block shadow-sm" src="{{ \Storage::url($produk->foto) }}" alt="">
               @else
               <img class="rounded-circle mx-auto d-inline-block shadow-sm" src="{{ asset('images/bag.jpg') }}" alt="">
               @endif
               </div>
               <div class="card-text pt-1">
                  <h5 class="member-name mb-0 text-center text-primary font-weight-bold">{{ $produk->name_dev }}</h5>
                  <div class="mb-3 text-center">{{ $produk->job_dev }}</div>
                  <div>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Vivamus eget eros vestibulum, accumsan ante viverra, condimentum tellus. </div>
               </div>
            </div><!--//card-body-->
            <div class="card-footer theme-bg-primary border-0 text-center">
               <ul class="social-list list-inline mb-0 mx-auto">
                  <li class="list-inline-item"><a class="text-dark" href="{{ $produk->git }}"><svg class="svg-inline--fa fa-github fa-w-16 fa-fw" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path></svg><!-- <i class="fab fa-twitter fa-fw"></i> Font Awesome fontawesome.com --></a></li>
                  <li class="list-inline-item"><a class="text-dark" href="{{ $produk->insta }}"><svg class="svg-inline--fa fa-instagram fa-w-14 fa-fw" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"></path></svg><!-- <i class="fab fa-instagram fa-fw"></i> Font Awesome fontawesome.com --></a></li>
               </ul><!--//social-list-->
            </div><!--//card-footer-->
         </div><!--//card-->
      </div><!--//col-->
      @endforeach
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

@endsection