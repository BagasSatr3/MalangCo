@extends('layouts.template')
@section('content')
  <!-- carousel -->
  <center>
    <div class="container" >
      <div class="row mt-5" >
        <div class="col" >
          <div id="carousel" class="carousel slide" data-ride="carousel"  >
            <div class="carousel-inner" style=>
              <div class="carousel-item active">
                  <img src="{{ asset('images/photo1.png') }}" class="carosel" alt="..." style="max-width: 100%; height: auto;" >
              </div>
              <div class="carousel-item">
                <img src="{{ asset('images/photo2.png') }}" class="d-block w-150 h-250" alt="..." style="max-width: 100%; height: auto;"  >
              </div>
             
              <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
    
            </div>
        
            
          </div>
        </div>
      </div>
    </div>
    </center>
  <hr>
  <div class="container">
  <div class="row my-4">
    <div class="col">
      <h3 class="text-center">Malang is The Best!</h5>
      <h5 style="text-align:center;font-family: Nunito;">
        Siapa yang tidak kenal dengan kota Malang? Kota dengan julukan kota dingin ini memang menjadi salah satu tujuan wisata terbaik yang menyajikan suasana sejuk dan hangat dalam waktu bersamaan.
      </h5>
      <h5 style="text-align:center;font-family: Nunito;">
        Malang`Cu adalah website yang menyediakan layanan produk dan jasa khas Malang. Siap untuk petualangan budaya Malang selanjutnya?
      </h5>
      <p class="text-center">
        <a href="{{ URL::to('about') }}" class="btn btn-outline-secondary">
          Baca Selengkapnya
        </a>
      </p>
    </div>
  </div>
  </div>
<!-- end tentang toko -->


<!-- kategori produk -->

<div class="kategori mx-2">
  <div class="row mt-4 mb-4">
    <div class="col col-md-12 col-sm-12 mb-4">
       <h2 class="text-center pt-3">Pilihlah Kebutuhan Anda</h2>
    </div>
    <!-- kategori pertama -->
    <div class="col-sm-6">
      <div class="row justify-content-center align-items-center">
        <div class="card border-0 m-5">
        <a href="{{ URL::to('item/') }}">
          <img src="{{ asset('images/bag.jpg') }}" alt="" class="card-img-top">
        </a>
        <div class="card-body">
          <div class = "card-title">
            <p class="text-center">
            <a href="{{ URL::to('item/') }}" class="btn" style="width:120px">Barang</a>

            </p>
        </div>
</div>
</div>
      </div>
    </div>
    <!-- kategori kedua -->
    <div class="col-sm-6">
      <div class="row justify-content-center ">
        <div class="card border-0 m-5">
            <a href= "{{ URL::to('jasa/') }}">
                <img src="{{ asset('images/bag.jpg') }}" alt="" class="card-img-top">
            </a>
            <div class="card-body"  >
                <div class = "card-title">
                    <p class = "text-center">
                        <a href="{{ URL::to('jasa/') }}" class="btn"  style="width:120px">Jasa</a>

                    </p>
                </div>
            </div>
        </div>
      </div>
    </div>

    <!-- kategori ketiga -->

  </div>
  </div>
  <!-- end kategori produk -->
  </div>
@endsection
