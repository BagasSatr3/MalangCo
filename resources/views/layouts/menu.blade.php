<nav class="navbar navbar-expand-lg navbar-light mb-4 navbar-fixed-top">
  <div class="container">
    <a class="navbar-brand" href="/">KOJO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="mr-auto navbar-nav"></ul>
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{ URL::to('produk') }}">Product</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{ URL::to('kontak') }}">Contact</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{ URL::to('about') }}">About</a>
        </li>
        <form action="/produk" method="GET">
          <input type="search" class="form-search mx-sm-2 rounded-0 shadow-none"  autocomplete="off"
            name="cari" value="{{ old('cari') }}" placeholder="Search...">
        </form>
        <li class="nav-item">
          <a class="bi bi-bookmark-fill fa-lg nav-link ml-4" href="{{ URL::to('wishlist') }}"></a>
        </li>
        <li class="nav-item">
          <a class="bi bi-cart-fill fa-lg nav-link" href="{{ URL::to('cart') }}"></a>
        </li>
        @guest
        <div class="dropdown">
          <div class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="bi bi-person-circle fa-lg nav-link">
        </div>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{ URL::to('login') }}">Sign-In</a>
            <a class="dropdown-item" href="{{ URL::to('register') }}">Sign-Up</a>
          </div>
        </div> 
        @endguest
        @auth
        <div class="nav-item dropdown">
          <div class="text-black" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="">
          <span class="bi bi-person-circle fa-lg nav-link"><small class="ml-1">{{ Auth::user()->name }}</small>
        </div>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              Logout
            </a>
          </div>
        </div> 
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
        @endauth
      </ul>
    </div>
  </div>
</nav>
