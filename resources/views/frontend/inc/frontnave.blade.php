<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="{{url('/')}}">E-Shop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/categories')}}">Categories</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/cart')}}">Cart&nbsp;&nbsp;<span class="badge badge-pill bg-success cart-count">0</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('/wishlist')}}">Wishlist&nbsp;&nbsp;<span class="badge badge-pill bg-primary wishlist-count">0</span></a>
        </li>
         @guest
         @if (Route::has('login'))
             <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @endif
        @if (Route::has('register'))
            <li class="nav-item">
                 <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
        @else
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">
                        Profile
                     </a>
                    </li>
                    <li><a class="dropdown-item" href="{{ url('my-orders') }}">
                    Orders&nbsp;&nbsp;<span class="badge badge-pill bg-success orders-count">0</span>
                     </a>
                    </li>
                    @if(Auth::user()->role_as == '1')
                    <li><a class="dropdown-item" href="/dashboard">
                        Admin
                     </a>
                    </li>
                        @endif
                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                        </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                     </form>
                    </li>
                </ul>
            </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
