@extends('layouts.template')
@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col col-lg-4 col-md-4">
      <div class="card card-primary card-outline">
        <div class="card-body box-profile" style="background-color: #ADC178">
          <div class="text-center">
            <img src="{{ asset('img/user1-128x128.jpg') }}" alt="profil" class="profile-user-img img-responsive img-circle">
          </div>
          <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
          <p class="text-muted text-center">Member sejak : {{ Auth::user()->created_at }}</p>
          <hr>
          <strong>
            <i class="fas fa-map-marker mr-2"></i>
            Alamat
          </strong>
          <p class="text-muted">
          {{ Auth::user()->alamat }}
          </p>
          <hr>
          <strong>
            <i class="fas fa-envelope mr-2"></i>
            Email
          </strong>
          <p class="text-muted">
          {{ Auth::user()->email }}
          </p>
          <hr>
          <strong>
            <i class="fas fa-phone mr-2"></i>
            No Tlp
          </strong>
          <p class="text-muted">
          {{ Auth::user()->phone }}
          </p>
          <hr>
          <a href="{{ URL::to('admin/setting') }}" class="btn btn-primary btn-block">Setting</a>
        </div>
      </div>      
    </div>
    <div class="col col-lg-8 col-md-8">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">History Transaksi</h3>
        </div>
        <div class="card-body">
          <!-- digunakan untuk menampilkan pesan error atau sukses -->
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
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Invoice</th>
                  <th>Sub Total</th>
                  <th>Diskon</th>
                  <th>Ongkir</th>
                  <th>Total</th>
                  <th>Status Pembayaran</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              @foreach($itemorder as $order)
                <tr>
                  <td>
                    {{ ++$no }}
                  </td>
                  <td>
                    {{ $order->cart->no_invoice }}
                  </td>
                  <td>
                    {{ number_format($order->cart->subtotal, 2) }}
                  </td>
                  <td>
                    {{ number_format($order->cart->diskon, 2) }}
                  </td>
                  <td>
                    {{ number_format($order->cart->ongkir, 2) }}
                  </td>
                  <td>
                    {{ number_format($order->cart->total, 2) }}
                  </td>                  
                  <td>
                    {{ $order->cart->status_pembayaran }}
                  </td>
                  <td>
                    {{ $order->cart->status_pengiriman }}
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection