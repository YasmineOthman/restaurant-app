
<nav class="navbar navbar-expand-lg  navbar-dark " style="background-color:black">
  <div class="container">
    {{-- <a class="navbar-brand" href="https://www.facebook.com/Sanabel.ngo" style="color: orange">FOODY</a> --}}
    <a href="#" class="navbar-brand" style="color: orange">
      <i class="fas fa-utensils"></i>FOODY</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item ">
          <a class="nav-link active" aria-current="page" href="/" style="color: orange">{{ __('validation.attributes.home') }}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{route('restaurants.index')}}" style="color: orange">{{ __('validation.attributes.Restaurants') }}</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: orange">
            {{ __('validation.attributes.account') }}
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            {{-- <li><a class="dropdown-item" href="#"style="color: orange">Log in</a></li>
            <li><a class="dropdown-item" href="#" style="color: orange">Sign in</a></li> --}}
            <li><a class="dropdown-item" href="{{ asset('login') }}" style="color: orange">{{ __('validation.attributes.Login') }}</a></li>
              <li><a class="dropdown-item" href="{{ asset('register') }}" style="color: orange">{{ __('validation.attributes.register') }}</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><form action="logout" method="post">
              @csrf
              <input type="submit" class="button is-light" value="{{ __('validation.attributes.Logout') }}">
            </form></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#" style="color: orange">{{ __('validation.attributes.contact us') }}</a>
        </li>
      </ul>


      <form class="d-flex" action="{{ route('restaurants.search') }}" method="GET">
        <input name="name" id="search"class="form-control me-2" type="search" placeholder="{{ __('validation.attributes.Enter name,city or address of Restaurant') }}" aria-label="Search" style="border-color:orange">
          {{-- </ul> --}}
      {{-- </li> --}}
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: orange">
      </a>
      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
      <input type="radio" name="search" value="name"> {{ __('validation.attributes.name') }}<br>
      <input type="radio" name="search" value="address"> {{ __('validation.attributes.address') }}<br>
      <input type="radio" name="search" value="city"> {{ __('validation.attributes.city') }}<br>
      </ul>
      </li>
      <button class="btn btn-success" type="submit">{{ __('validation.attributes.search') }}</button>
      </form>
      <li class="nav-item ">
      <a class="nav-link active" aria-current="page" href="{{route('getbyip')}}" style="color: orange"> {{ __('validation.attributes.by location') }} </a>
      </li>
      {{-- <li class="nav-item dropdown"> --}}
          {{-- <a class="nav-link dropdown-toggle active" href="{{ route('locale.toggle', App::getLocale() == 'ar' ? 'en': 'ar') }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: orange">
            {{ App::getLocale() == 'ar' ? 'en': 'ar' }}
          </a> --}}
          {{-- <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              {{-- <li><a class="dropdown-item" href="#" style="color:orange">Arabic</a></li> --}}
              {{-- <li><a class="dropdown-item" href="#" style="color:orange">English</a></li> --}}
              <li><a class="dropdown-item" href="{{ route('locale.toggle', App::getLocale() == 'ar' ? 'en': 'ar') }}" style="color:orange">{{ App::getLocale() == 'ar' ? 'EN' : 'AR' }}</a></li>
              {{-- <li><a class="dropdown-item" href="{{ route('locale.toggle', App::getLocale() == 'en' ? 'ar': 'en') }}" style="color:orange">English</a></li> --}}

          {{-- </ul>  --}}
      {{-- </li> --}}

    </div>
  </div>
</nav>


{{-- <header style="background-color:black">
  <a href="#" class="logo"><i class="fas fa-utensils"></i>FOODY</a>
  <div id="menu-bar" class="fas fa-bars" ></div>
  <nav class="navbar">
      <a class="nav-link active" aria-current="page" href="/" style="color: orange">Home</a>
      <a class="nav-link active" href="{{route('restaurants.index')}}" style="color: orange">Restaurants</a>
      <a class="nav-link active" href="#popular" style="color: orange">Contact us</a>
       <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color:orange">
        Account

      </a>
      <a href="#review" style="color:orange">language</a>
      <a href="{{route('res-order.createorder',$restaurant->id)}}" style="color:orange">order</a>

  </nav>

</header> --}}



