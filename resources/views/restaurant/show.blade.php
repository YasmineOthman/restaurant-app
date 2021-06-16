{{-- <x-layouts.app>
  <x-navbar />
    <section class="hero is-success is-small">
      <div class="hero-body"  >
        <div class="container has-text-centered" >
          <img src="{{ $restaurant-> image }}" alt="Placeholder image"  >
        </div>
          <p class="title">
            <h1>{{$restaurant->name}} Restaurant</h1>
          </p>

      </div>
      <div class="hero-foot" style="background-color:black;">
        <nav class="tabs is-boxed is-fullwidth">
          <div class="container">
            <ul>
              <li><a href="{{ route('restaurants.edit', $restaurant) }}"style="text-decoration:none; color:orange;"><b>Edit</b></a></li>
              {{-- <li><a href="{{ route('restaurants.delete', $restaurant->id) }}" style="text-decoration:none; color:orange;"><b>Delete</b></a></li> --}}
              {{-- <li><a href="{{ route('restaurants.create') }}"style="text-decoration:none; color:orange;"><b>Create New Restaurant</b></a></li>
              <li><a href="{{ route('categories.create' )}}"style="text-decoration:none; color:orange;">
              <b>Add Category</b></a></li> --}}
               {{-- <li><a href="{{route('res-order.createorder',$restaurant->id)}}"style="text-decoration:none; color:orange;">
                <b> Make Order</b></a></li> --}}
                {{-- ="/posts/{{ $post->id }}" --}}
            {{-- </ul>
          </div>
        </nav>
      </div>
    </section>
    <section class="section">
      <div class="container">
        <div>
         <p> Address: {{ $restaurant->city }} - {{$restaurant->address}}  {!! $restaurant->description !!}</p>
        </div>
        <h3>Categories in the restaurant:</h3>
        </div></section> --}}
    {{-- <section class="section">
      <div class="container">
        <div class="columns is-multiline">
            @foreach ($restaurant->categories as $category)
            <div class="column is-4">
                <a href="{{route('categories.show',$category)}}" style="text-decoration:none; color:black">
                <div class="card" style="height: 100%;" id="postcard">
                  <div class="card-image">
                    <figure class="image is-4by3" >
                      <img src="{{ $category-> image }}" alt="Placeholder image" >
                    </figure>
                  </div>
                  <div class="card-content">
                    <div class="media">
                      <div class="media-content">
                        <span class="title is-4 form">{{ $category->type }}</span><br>
                      </div> --}}
                    {{-- </div>
                  </div>
                </div>
              </a>
            </div>
              @endforeach
            </div>
          </div>
        </div> --}}
      {{-- </div>
    </section>
    </x-layouts> --}}
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} </title>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{asset('css/pages/style.css')}}">
</head>
<body>
<!-- header section starts  -->
<header style="background-color:black">
    <a href="#" class="logo"><i class="fas fa-utensils"></i>FOODY</a>
    <div id="menu-bar" class="fas fa-bars" ></div>
    <nav class="navbar">
        {{-- <a href="#home" style="color:orange">home</a> --}}
        <a class="nav-link active" aria-current="page" href="/" style="color: orange">Home</a>
        {{-- <a href="#speciality" style="color:orange">Restaurants</a> --}}
        <a class="nav-link active" href="{{route('restaurants.index')}}" style="color: orange">Restaurants</a>
        {{-- <a href="#popular" style="color:orange">Contact us</a> --}}
        {{-- <a href="#gallery" style="color:orange">Account</a> --}}
         <a class="nav-link  active" href="{{route('categories.create')}}" style="color:orange">
          Categories
        </a>
        <a href="#popular" style="color:orange">tables</a>
        <a href="{{route('res-order.createorder',$restaurant->id)}}" style="color:orange">order</a>
        <a class="nav-link active" href="#footer" style="color: orange">Contact us</a>
    </nav>
</header>
<!-- header section ends -->
<!-- home section starts  -->
<section class="home" id="home" style="background-color:orange">
    <div class="content">
        <h3>{{$restaurant->name}} Restaurant</h3>
        <p>{!! $restaurant->description !!}</p>
        <a href="login" class="btn btn-dark" style="color:black" role=button>Get Order</a>
      </div>
    <div class="image">
        <img src="{{asset("storage/$restaurant->image")}}">
    </div>
</section>
<!-- home section ends -->
<!-- speciality section starts  -->
<section class="speciality" id="speciality">
    <h1 class="heading" style="color:orange"> our <span>Categories</span> </h1>
         {{-- <div class="container-fluid padding ">
          <div class="row padding text-center" >
            @foreach ($restaurant->categories as $category)
         <div class="col-md-4 col-sm-12 col-lg-3" style="display: inline-block">
         <div class="card" style="width: 20rem;" >
         <a href="{{route('categories.show',$category)}}">
           <img src="{{ $category->image }}" class="card-img-top cardImage" alt="..."></a>
        </div></div>
        @endforeach
         </div></div> --}}
         <div class="box-container">
          @foreach ($restaurant->categories as $category)
        <div class="box">
          <img class="image" src="{{asset('images/s-img-1.jpg')}}" alt="">
          <div class="content" style="background-color:black;">
            @if($category->type == "meat")
              <img src="{{asset('images/s-1.png')}}" alt="">
            @endif
            @if($category->type == "Pizza")
            <img src="{{asset('images/s-2.png')}}" alt="">
          @endif
              <h3 style="color:orange;">{{$category->type}}</h3>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda inventore neque amet ipsa tenetur voluptates aperiam tempore libero labore aut.</p>
          </div>
      </div>
      @endforeach
         </div>
        </section>
<!-- speciality section ends -->

<!-- popular section starts  -->

<section class="popular" id="popular">

    <h1 class="heading" style="color:orange"><span>our</span> tables </h1>

    <div class="box-container">
      @foreach ($restaurant->tables as $table)
      @if($table->status == 0)
        <div class="box">
            <span class="price"> {{$table->chairs_count}} chairs </span>
            <img src="images/p-1.jpg" alt="">
            <h3>{{ $table->place_table }}</h3>
            <a href="{{route('res-reservation.createreservation',$restaurant->id,$table->id)}}" class="btn">reserve now</a>
        </div>
        @endif
        @endforeach
        {{-- <div class="box">
            <span class="price"> $5 - $20 </span>
            <img src="images/p-2.jpg" alt="">
            <h3>tasty cakes</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <a href="https://tech-code24.net" class="btn">order now</a>
        </div> --}}
        {{-- <div class="box">
            <span class="price"> $5 - $20 </span>
            <img src="images/p-3.jpg" alt="">
            <h3>tasty sweets</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div> --}}
            {{-- <a href="https://tech-code24.net" class="btn">order now</a>
        </div>
        <div class="box">
            <span class="price"> $5 - $20 </span>
            <img src="images/p-4.jpg" alt="">
            <h3>tasty cupcakes</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <a href="https://tech-code24.net" class="btn">order now</a> --}}
        {{-- </div>
        <div class="box">
            <span class="price"> $5 - $20 </span>
            <img src="images/p-5.jpg" alt="">
            <h3>cold drinks</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <a href="https://tech-code24.net" class="btn">order now</a>
        </div>
        <div class="box">
            <span class="price"> $5 - $20 </span>
            <img src="images/p-6.jpg" alt="">
            <h3>cold ice-cream</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            {{-- </div> --}}
            {{-- <a href="https://tech-code24.net" class="btn">order now</a> --}}
        {{-- </div> --}}

    </div>

</section>

<!-- popular section ends -->

<!-- steps section starts  -->

<div class="step-container">

    <h1 class="heading" style="color:orange">our <span>services</span></h1>

    <section class="steps">

        <div class="box">
          <a href="{{route('categories.index')}}">
            <img src="{{asset('images/step-1.jpg')}}" alt="">
            <h3 style="color:orange">choose your favorite food</h3>
          </a>
        </div>
        <div class="box">
          <a href="{{route('res-order.createorder',$restaurant->id)}}">
            <img src="{{asset('images/step-2.jpg')}}" alt="">
            <h3 style="color:orange">online order and delivery</h3>
          </a>
        </div>
        <div class="box">
          <a href="{{route('res-reservation.createreservation',$restaurant->id)}}">
            <img src="{{asset('images/step-4.jpg')}}" alt="">
            <h3 style="color:orange">reserve your table</h3>
          </a>
        </div>
        {{-- <div class="box">
            <img src="{{asset('images/step-4.jpg')}}" alt="">
            <h3 style="color:orange">and finally, enjoy your food</h3>
        </div> --}}

    </section>

</div>

<!-- steps section ends -->

<!-- gallery section starts  -->

<section class="gallery" id="gallery">
    <h1 class="heading" style="color:orange"> our restaurant <span> gallery </span> </h1>
    <div class="box-container">
      @foreach ($restaurant->categories as $category)
        <div class="box">
            <img src="{{asset('images/g-1.jpg')}}" alt="">
            <div class="content">
                <h3>{{$category->type}}</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="{{route('res-order.createorder',$restaurant->id)}}" class="btn">ordern now</a>
            </div>
        </div>
        @endforeach
        {{-- <div class="box">
            <img src="images/g-2.jpg" alt="">
            <div class="content">
                <h3>tasty food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="https://tech-code24.net/" class="btn">ordern now</a>
            </div>
        </div> --}}
        {{-- <div class="box">
            <img src="images/g-3.jpg" alt="">
            <div class="content">
                <h3>tasty food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="https://tech-code24.net/" class="btn">ordern now</a>
            </div>
        </div>
        <div class="box">
            <img src="images/g-4.jpg" alt="">
            <div class="content">
                <h3>tasty food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="https://tech-code24.net/" class="btn">ordern now</a>
            </div>
        </div> --}}
        {{-- <div class="box">
            <img src="images/g-5.jpg" alt="">
            <div class="content">
                <h3>tasty food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="https://tech-code24.net/" class="btn">ordern now</a>
            </div>
        </div>
        <div class="box">
            <img src="images/g-6.jpg" alt="">
            <div class="content">
                <h3>tasty food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="https://tech-code24.net/" class="btn">ordern now</a>
            </div> --}}
        {{-- </div> --}}
        {{-- <div class="box">
            <img src="images/g-7.jpg" alt="">
            <div class="content">
                <h3>tasty food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="https://tech-code24.net/" class="btn">ordern now</a>
            </div>
        </div>
        <div class="box">
            <img src="images/g-8.jpg" alt="">
            <div class="content">
                <h3>tasty food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="https://tech-code24.net/" class="btn">ordern now</a>
            </div>
        </div> --}}
        {{-- <div class="box">
            <img src="images/g-9.jpg" alt="">
            <div class="content">
                <h3>tasty food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="https://tech-code24.net/" class="btn">ordern now</a>
            </div>
        </div> --}}

    </div>

</section>

<!-- gallery section ends -->

<!-- review section starts  -->

{{-- <section class="review" id="review">

    <h1 class="heading" style="color:orange"> our customers <span>reviews</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="images/pic1.png" alt="">
            <h3>john deo</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti delectus, ducimus facere quod ratione vel laboriosam? Est, maxime rem. Itaque.</p> --}}
        {{-- </div>
        <div class="box">
            <img src="images/pic2.png" alt="">
            <h3>john deo</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti delectus, ducimus facere quod ratione vel laboriosam? Est, maxime rem. Itaque.</p>
        </div>
        <div class="box">
            <img src="images/pic3.png" alt="">
            <h3>john deo</h3>
            <div class="stars"> --}}
                {{-- <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti delectus, ducimus facere quod ratione vel laboriosam? Est, maxime rem. Itaque.</p>
        </div>

    </div>

</section> --}}

<!-- review section ends -->

<!-- order section starts  -->
<section class="order" id="order">
    <h1 class="heading" style="color:orange"> FeedBack </h1>
    <div class="row">
        <div class="image">
            <img src="{{asset('images/order-img.jpg')}}" alt="">
        </div>
        <form action="{{route('res-order.createorder',$restaurant->id)}}">
            <div class="inputBox">
                <input type="text" placeholder="name">
                <input type="email" placeholder="email">
            </div>
            <div class="inputBox">
                <input type="number" placeholder="number">
                <input type="text" placeholder="food name">
            </div>
            <textarea placeholder="address" name="" id="" cols="30" rows="10"></textarea>
            <input type="submit" value="order now" class="btn">
        </form>
    </div>
</section>
<!-- order section ends -->

<!-- footer section  -->

<section class="footer" id="footer">
    <div class="share">
        <a href="#" class="btn">facebook</a>
        <a href="#" class="btn">twitter</a>
        <a href="#" class="btn">instagram</a>
        <a href="#" class="btn">pinterest</a>
        <a href="#" class="btn">linkedin</a>
    </div>
    <h1 class="credit"> created by <span> foody </span> | all rights reserved! </h1>
</section>
<!-- scroll top button  -->
<a href="#home" class="fas fa-angle-up" id="scroll-top"></a>
{{-- <!-- loader  -->
<div class="loader-container" style="background-color:orange">
    <img src="{{asset('images/loader.gif')}}" alt="">
</div> --}}
<!-- custom js file link  -->
<script src="{{asset('js\script.js')}}"></script>
</body>
</html>
