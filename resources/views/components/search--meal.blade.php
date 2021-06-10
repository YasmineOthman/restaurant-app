
<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="https://www.facebook.com/Sanabel.ngo" style="color: #eb640a">FOODY</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item ">
          <a class="nav-link active" aria-current="page" href="/" style="color: #eb640a">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{route('restaurants.index')}}" style="color: #eb640a">Restaurants</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#" style="color: #eb640a">Contact us</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #eb640a">
            Account
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#"style="color: #eb640a">Log in</a></li>
            <li><a class="dropdown-item" href="#" style="color: #eb640a">Sign in</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><form action="#" method="post">
              @csrf
              <input type="submit" class="button is-light" value="Logout">
            </form></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" action="{{ route('meals.search') }}" method="GET">
        <input name="name" id="search"class="form-control me-2" type="search" placeholder="Search about meal.." aria-label="Search" style="border-color:#eb640a">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #eb640a">
      by</a>
      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
      <input type="radio" name="search" value="name"> name<br>
      <input type="radio" name="search" value="price"> price<br>
      <input type="radio" name="search" value="pricemore"> price and more<br>
      <input type="radio" name="search" value="priceless"> price and less<br>
      <input type="radio" name="search" value="calory"> calory<br>
      </ul>
      </li>
      <button class="btn btn-success" type="submit">Search</button>
      </form>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #eb640a">
            Language
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#"style="color: #eb640a">Arabic</a></li>
              <li><a class="dropdown-item" href="#" style="color: #eb640a">English</a></li>

          </ul>
      </li>

    </div>
  </div>
</nav>


