@extends('layouts.template')
@section('content')
<<<<<<< HEAD
<div class="container" style="width: 2500px; height: 500px;">



  <!-- carousel-->
  <div class="row">
    <div class="col">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        @foreach($itemslide as $index => $slide )
        @if($index == 0)
        <div class="carousel-item active">
          <img class="d-block w-100" src="{{ \Storage::url($slide->foto) }}" alt="First slide">
        </div>
        @else
        <div class="carousel-item">
          <img class="d-block w-100" src="{{ \Storage::url($slide->foto) }}" alt="Second slide">
        </div>
        @endif
        @endforeach   
      </div>
    </div>
    </div>
  </div>
  <!-- end carousel -->



  <!-- kategori -->
  <div class="row mt-4">
    <div class="col col-md-12 col-sm-12 mb-4">
      <h2 class="text-left">Category</h2>
    </div>
    @foreach($itemkategori as $kategori)
    <div class="col-md-1">
        <div class="kategori">
          <a href="{{ URL::to('kategori/'.$kategori->slug_kategori) }}" class="button">
            <p class="card-text">{{ $kategori->nama_kategori }}</p>
          </a>
        </div>
    </div>
    @endforeach
  <!-- end kategori -->



  <!-- produk Promo-->
  <div class="row mt-4">
    <div class="col col-md-12 col-sm-12 mb-4">
      <h2 class="text-center">Promo</h2>
    </div>
    @foreach($itempromo as $promo)
    <!-- produk pertama -->
    <div class="col-md-4">
      <div class="card mb-4 shadow-sm">
        <a href="{{ URL::to('produk/'.$promo->produk->slug_produk) }}">
          @if($promo->produk->foto != null)
          <img src="{{\Storage::url($promo->produk->foto) }}" alt="{{ $promo->produk->nama_produk }}" class="card-img-top">
          @else
          <img src="{{asset('images/bag.jpg') }}" alt="{{ $promo->produk->nama_produk }}" class="card-img-top">
          @endif

  <!-- tentang toko -->
=======
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
>>>>>>> e44596e73fec1a597f514461faacc250b3544ae0
  <hr>
  <div class="row mt-4">
    <div class="col">
      <h5 class="text-center">Toko Online Menggunakan Laravel</h5>
      <p>
        Toko adalah demo membangun toko online menggunakan laravel framework. Di dalam demo ini terdapat user bisa menginput data kategori, produk dan transaksi.
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic laborum aliquam dolorum sequi nulla maiores quos incidunt veritatis numquam suscipit. Cumque dolore rem obcaecati. Eos quod ad non veritatis assumenda.
      </p>
      <p>
        Toko adalah demo membangun toko online menggunakan laravel framework. Di dalam demo ini terdapat user bisa menginput data kategori, produk dan transaksi.
        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic laborum aliquam dolorum sequi nulla maiores quos incidunt veritatis numquam suscipit. Cumque dolore rem obcaecati. Eos quod ad non veritatis assumenda.
      </p>
      <p class="text-center">
        <a href="" class="btn">
          Baca Selengkapnya
        </a>      
      </p>
    </div>
  </div>
  <!-- end tentang toko -->
</div>
@endsection