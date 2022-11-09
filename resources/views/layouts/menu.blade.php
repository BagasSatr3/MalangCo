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
          <input type="search" class="form-control mx-sm-2 rounded-0 shadow-none"  autocomplete="off"
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
        <div class="dropdown">
          <div class="text-black" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="">
          <span class="bi bi-person-circle fa-lg nav-link">Hi, {{ Auth::user()->name }} 
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
<<<<<<< HEAD
</nav>
=======
</nav> -->

<nav>
  <div class="navbar">
    <a class="navbar-brand" href="/">
      <img src="/images/logo.svg" height="50px" />
    </a>
  </div>
  <div class="nav-items">
    <form action="/item/produk" method="GET" class="form-search">
      <input type="search" class="search-data" placeholder="Search" name="q">
      <button type="submit" class="fa fa-search"></button>
    </form>
    <!-- <li><a href="/">Home</a></li>
            <li><a href="#">Produk</a></li>
            <li><a href="{{ URL::to('kategori') }}">Kategori</a></li>
            <li><a href="{{ URL::to('kontak') }}">Kontak</a></li>
            <li><a href="{{ URL::to('about') }}">About</a></li>
            <li><a href="#">Login</a></li>-->
  </div>
  <div class="search-icon">
    <span class="fas fa-search"></span>
  </div>
  <div class="cancel-icon">
    <span class="fas fa-times"></span>
  </div>
  <ul class="navbar-nav">
    <li class="nav-item dropdown">
      <a class="dropdown dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa-solid fa-bars"></i>
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="#">Produk</a>
        <a class="dropdown-item" href="{{ URL::to('kategori') }}">Kategori</a>
        <a class="dropdown-item" href="{{ URL::to('about') }}">About</a>
        <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/login">Login <span class="sr-only">(current)</span></a>
          <a href="#" class="dropdown-item" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">Sign Out<span class="sr-only">(current)</span></a>
      </div>
    </li>
  </ul>

</nav>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  @csrf
</form>
>>>>>>> e44596e73fec1a597f514461faacc250b3544ae0
