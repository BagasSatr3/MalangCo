@extends('layouts.template')
@section('content')
<div class="container" style="margin-top:70px;">
  <div class="row mt-4">
    <div class="col col-lg-8 col-md-8">
      <div id="carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
        @foreach($itemproduk->images as $index => $image)
        @if($index == 0)
          <div class="carousel-item active">
              <img src="{{ \Storage::url($image->foto) }}" class="d-block w-100" alt="...">
          </div>
        @else
          <div class="carousel-item">
              <img src="{{ \Storage::url($image->foto) }}" class="d-block w-100" alt="...">
          </div>
        @endif
        @endforeach
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


    <div class="col col-lg-4 col-md-4">
      <div class="row">
        <div class="col">
          <div class="card" style="border:none; background-color: #ADC178;">
            <div class="card-body card-yellow">
              @if(count($errors) > 0)
              @foreach($errors->all() as $error)
                <div class="alert alert-warning">{{ $error }}</div>
              @endforeach
              @endif
              @if ($message = Session::get('error'))
                <div class="alert alert-warning">
                  <p>{{ $message }}</p>
                </div>
              @endif
              @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
              @endif
              <span class="small">{{ $itemproduk->kategori->nama_kategori }}</span>
              <div class="row">
              <div class="col">
              <h5 class="font-weight-bold">{{ $itemproduk->nama_produk }}</h5>
              </div>
              <!-- cek apakah ada promo -->
              <div class="col">
              @if($itemproduk->promo != null)
              <p>
                Rp. <del>{{ number_format($itemproduk->promo->harga_awal, 2) }}</del>
                <br />
                Rp. {{ number_format($itemproduk->promo->harga_akhir, 2) }}
              </p>
              @else
              <p>
                Rp. {{ number_format($itemproduk->harga, 2) }}
              </p>
              @endif
              </div>
              </div>
              <div class="row mt-4">
              <div class="col">
              <form action="{{ route('wishlist.store') }}" method="post">
                @csrf
                <input type="hidden" name="produk_id" value={{ $itemproduk->id }}>
                <button type="submit" class="btn btn-sm">
                @if(isset($itemwishlist) && $itemwishlist)
                  <i class="fas fa-heart"></i> Add to Wishlist
                @else
                  <i class="far fa-heart"></i> Add to Wishlist
                @endif
                </button>
              </form>
              </div>
              <div class="col" style="margin-top: -5px">
              <form action="{{ route('cartdetail.store') }}" method="POST">
                @csrf
                <input type="hidden" name="produk_id" value={{$itemproduk->id}}>
                <button class="btn btn-sm" type="submit" style="margin-top:5px;">
                  <i class="fa fa-shopping-cart"></i> Add to Cart
                  </button>
              </form>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
<!-- Description -->
      <div class="row mt-4">
        <div class="col">
          <div class="card" style="border:none; background-color: #ADC178;">
            <div class="card-header card-red">
              Description
            </div>
            <div class="card-body card-yellow">
              {{ $itemproduk->deskripsi_produk }}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- Comment -->
  <div class="row mt-4">
    <div class="col">
      <div class="card">
        <div class="card-header card-red">
          Description
        </div>
        <div class="card-body card-yellow">
          {{ $itemproduk->deskripsi_produk }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection