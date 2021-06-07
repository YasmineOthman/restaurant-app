<x-layouts.app>
  <section class="hero is-success is-small">
    <div class="hero-body" >
      <div class="container has-text-centered" >
        <p class="title">
          <h1 >{{$category->type}} </h1>
        </p>
      </div>
    </div>
    <div class="hero-foot" style="background-color:black;">
      <nav class="tabs is-boxed is-fullwidth">
        <div class="container">
          <ul>
            <li><a href="{{ route('categories.edit', $category) }}"style="text-decoration:none; color:#eb640a;"><b>Edit</b></a></li>
            {{-- <li><a href="{{ route('restaurants.delete', $restaurant->id) }}" style="text-decoration:none; color:#eb640a;"><b>Delete</b></a></li> --}}
            <li><a href="{{ route('categories.create') }}"style="text-decoration:none; color:#eb640a;"><b>Create New Category</b></a></li>
            {{-- <li><a href="{{ route('categories.show', $post->category) }}"style="text-decoration:none; color:#eb640a;"><b>Show related Posts</b></a></li> --}}
            <li><a href="{{ route('meals.create' )}}"style="text-decoration:none; color:#eb640a;">
              <b>Add Meal</b></a></li>
          </ul>
        </div>
      </nav>
    </div>
  </section>
  <section class="section">
    <div class="container">
      <h3>Meals</h3>
      <div class="columns is-multiline">
          @foreach ($category->meals as $meal)
          <div class="column is-4">
              <a href="{{route('meals.show',$meal)}}" style="text-decoration:none; color:black">
              <div class="card" style="height: 100%;" id="postcard">
                <div class="card-image">
                  <figure class="image is-4by3" >
                    <img src="{{ $meal-> image }}" alt="Placeholder image" >
                  </figure>
                </div>
                <div class="card-content">
                  <div class="media">
                    <div class="media-content">
                      <span class="title is-4 form">{{ $meal->name }}</span><br>
                      <span class="title is-6 form">{{ $meal->price }} SYP</span>
                    </div>
                  </div>

                </div>
              </div>
            </a>
          </div>
          @endforeach

        </div>
      </div>

    </div>
  </section>

  </x-layouts>
