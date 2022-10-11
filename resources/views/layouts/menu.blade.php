<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
  <div class="container">
    <a class="navbar-brand" href="/">MALANG`CU</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="mr-auto navbar-nav"></ul>
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ URL::to('produk') }}">Produk</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ URL::to('kategori') }}">Kategori</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ URL::to('kontak') }}">Kontak</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ URL::to('about') }}">Tentang Kami</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ URL::to('login') }}">Login</a>
        </li>
        <input type="text" class="border border-radius text-center"style="500px" placeholder="Search">
      </ul>
    </div>
  </div>
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
