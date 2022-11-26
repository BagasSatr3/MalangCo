@extends('layouts.template')
@section('content')
<div class="container" style="margin-bottom:70px;">
  <!-- kategori produk -->
  <div class="card" style="padding: 20px; background-color: #ADC178">
    <div class="bg-transparent" >
      <h2 class="text-left" style="font-weight:bold; margin-bottom: 20px;">Product Category</h2>
        <div class="btn-group d-flex flex-wrap shadow-none mt-1 mt-lg-1 mt-md-1 mt-xl-1 ms-2 ms-lg-2 ms-md-2 ms-xl-2">
          @foreach($itemkategori as $kategori)
            <a style="width: 150px; font-size: 13px; font-weight:bold; font-family: 'Poppins' sans-serif;" href="{{ URL::to('category/'.$kategori->slug_kategori) }}" class="btn mt-1 mt-lg-1 mt-md-1 mt-xl-1 mx-2 mx-lg-2 mx-md-2 mx-xl-2 rounded">
              {{ $kategori->nama_kategori }}</span>
            </a>
          @endforeach
        </div>
    </div>
  </div>
  <!-- end kategori produk -->
  <!-- produk Terbaru-->
  <div class="row mt-4" style="margin-top: 30px; margin-bottom: 30px;">
    <div class="col col-md-12 col-sm-12 mb-4">
      <h2 class="text-left" style="font-weight:bold; margin-bottom: 20px;">Terbaru</h2>
    </div>
    @foreach($itemproduk as $produk)
    <!-- produk pertama -->
    <div class="col-lg-3">
        <div class="card text-center mb-3" style="box-shadow: 5px 6px 6px 2px #e9ecef;position: relative;display: flex;flex-direction: column;min-width: 0;word-wrap: break-word;background-color: #fff;background-clip: border-box;border: 0 solid rgba(0, 0, 0, 0.125);border-radius: 1rem;">
            <div class="py-5 px-4">
              <a href="{{ URL::to('product/'.$produk->slug_produk ) }}" style="height: 150px; max-width: 200px;">
              @if($produk->foto != null)
                <img src="{{ \Storage::url($produk->foto) }}" alt="{{ $produk->nama_produk }}" class="card-img-top"/>
              @else
              <img src="{{ asset('images/bag.jpg') }}" alt="{{ $produk->nama_produk }}" class="card-img-top"/>
              @endif
                <h3 class="fs-6 text-truncate"><a href="#" class="stretched-link text-reset text-decoration-none">{{ $produk->nama_produk }}</a></h3>
                <span class="text-success">Rp. {{ number_format($produk->harga, 2) }}</span>
                <del class="text-muted">$650.83</del>
            </div>
            <div class="bg-danger text-white small position-absolute end-0 top-0 px-2 py-2 lh-1 text-center">
                <span class="d-block">10%</span>
                <span class="d-block">OFF</span>
            </div>
        </div>
    </div>
    <!-- <div class="col-md-4">
      <div class="card mb-4" style="box-shadow: 5px 6px 6px 2px #e9ecef;">
      <div style="height: 190px; max-width: 270px; display: flex; align-items: center; margin-left: auto; margin-right: auto;">
        <a href="{{ URL::to('product/'.$produk->slug_produk ) }}">
          @if($produk->foto != null)
          <img src="{{ \Storage::url($produk->foto) }}" alt="{{ $produk->nama_produk }}" class="card-img-top" style="max-height: 190px; width: 100%;">
          @else
          <img src="{{ asset('images/bag.jpg') }}" alt="{{ $produk->nama_produk }}" class="card-img-top" style="max-height: 190px; width: 100%;">
          @endif
        </a>
      </div>
        <div class="card-body" style="border:none; background-color: #ADC178;">
        <div class="row mt-4">
        <div class="col">  
            <a class="text-decoration-none" style="color: black;">
            <p class="card-text h5">
              <strong>{{ $produk->nama_produk }}</strong>
            </p>
          </a>
          </div>
          <div class="col-auto">
              <p>
                Rp. {{ number_format($produk->harga, 2) }}
              </p>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col">
              <a class="btn" href="{{ URL::to('product/'.$produk->slug_produk ) }}">
                Detail
              </a>
            </div>
          </div>
        </div>
      </div>
    </div> -->
    @endforeach
</div>
@endsection