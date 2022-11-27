<nav class="navbar navbar-expand-lg navbar-light mb-4 navbar-fixed-top">
  <div class="container">
    <img src="{{ asset('images/KOJO 1.png') }}" href="/" class="img-fluid">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="mr-auto navbar-nav"></ul>
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
            <div class="dropdown-menu" style="background: #DDE5B6;" aria-labelledby="navbarDropdown">
              <a class="dropdown-item nice" href="{{ URL::to('product') }}"><i class="bi bi-bag"></i> Product</a>
              <a class="dropdown-item nice" href="{{ URL::to('category') }}"><i class="bi bi-collection"></i> Category</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">More</a>
            <div class="dropdown-menu" style="background: #DDE5B6;" aria-labelledby="navbarDropdown">
              <a class="dropdown-item nice" href="{{ URL::to('about') }}"><i class="bi bi-info-circle"></i> About</a>
              <a class="dropdown-item nice" href="{{ URL::to('contact') }}"><i class="bi bi-telephone"></i> Contact</a>
            </div>
          </li>
          <form action="/product" method="GET">
            <input type="search" class="form-search mx-sm-2 rounded-0 shadow-none" placeholder="Search..." name="q" autocomplete="off">
          </form>
          <li class="nav-item">
            <a class="bi bi-bag-heart-fill fa-lg nav-link ml-4" href="{{ URL::to('wishlist') }}">
              @auth
                @if(isset($wishcount))
                  <span>{{$wishcount}}</span>
                @endif
              @endauth
            </a>
          </li>
          @guest
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle bi-person-circle fa-lg nav-link" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

            </a>
            <div class="dropdown-menu" style="background: #DDE5B6;" aria-labelledby="navbarDropdown">
              <a class="dropdown-item nice" href="{{ URL::to('login') }}"><i class="bi bi-person-down"></i> Sign In</a>
              <a class="dropdown-item nice" href="{{ URL::to('register') }}"><i class="bi bi-person-add"></i> Sign Up</a>
            </div>
          </li>
          @endguest
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle bi-person-circle fa-lg nav-link" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <small class="ml-1" >{{ Auth::user()->name }}</small>
            </a>
            <div class="dropdown-menu" style="background: #DDE5B6;" aria-labelledby="navbarDropdown">
              @if(Auth::user()->role != "admin"))
              <a class="dropdown-item nice" href="{{ URL::to('profile') }}"><i class="bi bi-person-fill-gear"></i> Profile</a>
              <a class="dropdown-item nice" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>      
              @else
              <a class="dropdown-item nice" href="{{ URL::to('admin') }}"><i class="bi bi-person-fill-gear"></i> Admin</a>
              <a class="dropdown-item nice" href="{{ URL::to('profile') }}"><i class="bi bi-person-fill-gear"></i> Profile</a>
              <a class="dropdown-item nice" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>      
              @endif
            </div>
          </li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
          @endauth

        </ul>
      </ul>
    </div>
  </div>
</nav>
