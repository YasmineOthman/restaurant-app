<x-layouts.app>
    <section class="hero is-success is-small">
      <div class="hero-body"  >
        <div class="container has-text-centered" >
          <img src="{{ $restaurant-> image }}" alt="Placeholder image"  >
        </div>
          <p class="title">
            <h1 style="text-align: center">{{$restaurant->name}} Restaurant</h1>
          </p>

      </div>
      <div class="hero-foot" style="background-color:black;">
        <nav class="tabs is-boxed is-fullwidth">
          <div class="container">
            <ul>
              <li><a href="{{ route('restaurants.edit', $restaurant) }}"style="text-decoration:none; color:#eb640a;"><b>Edit</b></a></li>
              {{-- <li><a href="{{ route('restaurants.delete', $restaurant->id) }}" style="text-decoration:none; color:#eb640a;"><b>Delete</b></a></li> --}}
              <li><a href="{{ route('restaurants.create') }}"style="text-decoration:none; color:#eb640a;"><b>Create New Restaurant</b></a></li>
              <li><a href="{{ route('categories.create' )}}"style="text-decoration:none; color:#eb640a;">
              <b>Add Category</b></a></li>
               <li><a href="{{route('res-order.createorder',$restaurant->id)}}"style="text-decoration:none; color:#eb640a;">
                <b> Make Order</b></a></li>
                {{-- ="/posts/{{ $post->id }}" --}}
            </ul>
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
        </div></section>
    <section class="section">
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
