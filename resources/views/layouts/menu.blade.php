<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 fixed-top">
  <div class="container">
    <a class="navbar-brand" href="/">MALANG`CU</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="mr-auto navbar-nav"></ul>
      <ul class="navbar-nav">
        <input type="text" class="border border-radius text-center"style="500px" placeholder="Search">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Produk</a>
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
          <a class="nav-link" href="#">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav> -->

<nav>
         <div class="menu-icon">
            <span class="fas fa-bars"></span>
         </div>
         <div class="logo">
            MALANG'CU
         </div>
         <div class="search-icon">
            <span class="fas fa-search"></span>
         </div>
         <div class="cancel-icon">
            <span class="fas fa-times"></span>
         </div>
         <form action="#">
            <input type="search" class="search-data" placeholder="Search" required>
            <button type="submit" class="fas fa-search"></button>
         </form>
         <div class="nav-items">
            <li><a href="/">Home</a></li>
            <li><a href="#">Produk</a></li>
            <li><a href="{{ URL::to('kategori') }}">Kategori</a></li>
            <li><a href="{{ URL::to('kontak') }}">Kontak</a></li>
            <li><a href="{{ URL::to('about') }}">About</a></li>
            <li><a href="#">Login</a></li>
         </div>
      </nav>