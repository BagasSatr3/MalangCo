@extends('layouts.template')
@section('content')
<div class="container" style="margin-bottom:70px;">



  <!-- kategori produk -->
  <div class="card" style="padding: 20px; background-color: #ADC178">
    <div class="bg-transparent" >
      <h2 class="text-left" style="font-weight:bold; margin-bottom: 20px;">Product Category</h2>
      <div class="btn-group d-flex flex-wrap shadow-none mt-1 mt-lg-1 mt-md-1 mt-xl-1 ms-2 ms-lg-2 ms-md-2 ms-xl-2">
      @foreach($listkategori as $kategori)
        <a style="width: 150px; font-size: 13px; font-weight:bold; font-family: 'Poppins' sans-serif;" href="{{ URL::to('category/'.$kategori->slug_kategori) }}" class="btn mt-1 mt-lg-1 mt-md-1 mt-xl-1 mx-2 mx-lg-2 mx-md-2 mx-xl-2 rounded">
          {{ $kategori->nama_kategori }}</span>
        </a>
      @endforeach
      </div>
    </div>
  </div>
  <!-- end kategori produk -->


  <!-- BEGIN ORDER RESULT -->
  <div class="col-sm-6">
    <div class="btn-group">
      <a class="dropdown-toggle" data-toggle="dropdown">
        Order by <span class="caret"></span>
      </a>
      <ul class="dropdown-menu" role="menu">
        <li><a href="{{ URL::to('product?q=lastest-products') }}">Lastest Products</a></li>
        <li><a href="{{ URL::to('product?q=high-to-low') }}">High to Low Price</a></li>
        <li><a href="{{ URL::to('product?q=low-to-high') }}">Low to High Price</a></li>
        <li><a href="{{ URL::to('product?q=a-z-products') }}">A-Z Products</a></li>
        <li><a href="{{ URL::to('product?q=z-a-products') }}">Z-A Products</a></li>
      </ul>
    </div>
  </div>
  <!-- END ORDER RESULT -->
  <ol class="breadcrumb">Sort By:
    <li class="breadcrumb-item" style="margin-left:10px"><a href="{{ URL::to('product?q=lastest-products') }}">Lastest Products</a></li>
    <li class="breadcrumb-item"><a href="{{ URL::to('product?q=high-to-low') }}">High to Low Price</a></li>
    <li class="breadcrumb-item"><a href="{{ URL::to('product?q=low-to-high') }}">Low to High Price</a></li>
    <li class="breadcrumb-item"><a href="{{ URL::to('product?q=a-z-products') }}">A-Z Products</a></li>
    <li class="breadcrumb-item"><a href="{{ URL::to('product?q=z-a-products') }}">Z-A Products</a></li>
  </ol>


    
  <!-- produk Terbaru-->
  <div class="row mt-4">
    <div class="col col-md-12 col-sm-12 mb-4">
      <h2 class="text-left" style="font-weight:bold;">New Product</h2>
    </div>
    @foreach($itemproduk as $produk)
    <div class="col-lg-3">
        <div class="card text-center mb-3" style="box-shadow: 5px 6px 6px 2px #e9ecef;position: relative;display: flex;flex-direction: column;min-width: 0;word-wrap: break-word;background-color: #fff;background-clip: border-box;border: 0 solid rgba(0, 0, 0, 0.125);border-radius: 1rem;">
            <div class="py-5 px-4">
              <a href="{{ URL::to('product/'.$produk->slug_produk) }}" style="height: 150px; max-width: 200px;">
              @if($produk->foto != null)
                <img src="{{\Storage::url($produk->foto) }}" alt="{{ $produk->nama_produk }}" class="card-img-top"/>
              @else
              <img src="{{ asset('images/bag.jpg') }}" alt="{{ $produk->nama_produk }}" class="card-img-top"/>
              @endif
                <h3 class="h5" style=""><a href="{{ URL::to('product/'.$produk->slug_produk) }}" class="text-decoration-none" onclick="">{{ $produk->nama_produk }}</a></h3>
                @if (isset($produk->promo->produk_id))
                  @if($produk->id == $produk->promo->produk_id)
                  <p>
                  <span class="text-success">Rp. {{ number_format($produk->promo->harga_akhir, 2) }}</span>
                  <del class="text-muted">Rp. {{ number_format($produk->promo->harga_awal, 2) }}</del>
                  </p>
                  @endif
                @else
                <p>
                <span class="text-success">Rp. {{ number_format($produk->harga, 2) }}</span>
                </p>
                @endif
                <div class="row" style="margin-top:20px; margin-bottom:-10px;">
                <div class="col">
                  <form action="{{ route('cartdetail.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="produk_id" value={{$produk->id}}>
                    <button class="btn btn-sm" type="submit" style="margin-top:5px;">
                      <i class="fa fa-shopping-cart"></i> Add to Cart
                      </button>
                  </form>
                </div>
                </div>
            </div>
            @if (isset($produk->promo->produk_id))
              @if($produk->id == $produk->promo->produk_id)
            <div class="bg-danger text-white small position-absolute end-0 top-0 px-2 py-2 lh-1 text-center">
                <span class="d-block">{{ $produk->promo->diskon_persen, 2 }}%</span>
                <span class="d-block">OFF</span>
            </div>
              @endif
            @else
            <div class="bg-danger text-white small position-absolute end-0 top-0 px-2 py-2 lh-1 text-center">
                <span class="d-block">ON</span>
                <span class="d-block">SALE</span>
            </div>
            @endif
        </div>
    </div>
    @endforeach
  </div>
  <!-- end produk terbaru -->
</div>
@endsection
