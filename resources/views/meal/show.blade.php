<x-layouts.app>
  <section class="hero is-success is-small">
    <div class="hero-body" style="background-color: #eb640a;">
      <div class="container has-text-centered" >
        <p class="title">
          <h1 style="color:black;">{{$meal->name}}</h1>
          {{-- <h3 style="color:black;">{{$post->category->name}}</h3> --}}
        </p>
      </div>
    </div>
    <div class="hero-foot" style="background-color:black;">
      <nav class="tabs is-boxed is-fullwidth">
        <div class="container">
          <ul>
            <li><a href="{{ route('meals.edit', $meal) }}"style="text-decoration:none; color:#eb640a;"><b>Edit</b></a></li>
            {{-- <li><a href="{{ route('restaurants.delete', $restaurant->id) }}" style="text-decoration:none; color:#eb640a;"><b>Delete</b></a></li> --}}
            <li><a href="{{ route('meals.create') }}"style="text-decoration:none; color:#eb640a;"><b>Create New Meal</b></a></li>
            <li><a href="{{route('mealorder.show', $meal->id)}}"style="text-decoration:none; color:#eb640a;"><b>Add To Order</b></a></li>
            <li><a href="#"style="text-decoration:none; color:#eb640a;"><b>Order more</b></a></li>

            <li><a href="{{ route('meals.index') }}"style="text-decoration:none; color:#eb640a;"><b>Show Meal in same category</b></a></li>
          </ul>
        </div>
      </nav>
    </div>
  </section>
  <section class="section">
    <div class="container">
      <div>
       <p> {{ $meal->calory }}</p>
       <p> {{$meal->price}}</p>

      </div>
      </div>
    </div>
  </section>

  </x-layouts>
