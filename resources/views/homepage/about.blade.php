@extends('layouts.template')
@section('content')
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
      <div class="row">
      <div class ="row mt-4">
      <!--Card 1-->
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
</div>

@endsection