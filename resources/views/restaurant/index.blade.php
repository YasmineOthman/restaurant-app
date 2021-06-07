<x-layouts.app>
    <section class="section">
      <div class="container">
        <div class="columns is-multiline">
            @foreach ($restaurants as $restaurant)
            <div class="column is-4">
              <a href="{{ route('restaurants.show', $restaurant) }}" style="text-decoration: none;">
                <div class="card" style="height: 100%;" id="postcard">
                  <div class="card-image">
                    <figure class="image is-4by3" >
                      <img src="{{ $restaurant-> image }}" alt="Placeholder image" >
                    </figure>
                  </div>
                  <div class="card-content">
                    <div class="media">
                      <div class="media-content">
                        <span class="title is-4">{{ $restaurant->name }}</span><br>
                        <span style="color: black">{{$restaurant->city}} -</span>
                      <span style="color: black">{{$restaurant->address}}</span>
                      </div>
                    </div>
                    {{-- <div class="content">

                      {{-- <a href="{{ route('restaurants.show', $restaurant->id) }}" style="color: blue;text-decoration: none;">show</a> --}}
                      {{-- <br> --}}
                      {{-- <time datetime="2016-1-1">{{ $restaurant->created_at }}</time> --}}
                    {{-- </div>  --}}
                  </div>
                </div>
              </a>
            </div>
            @endforeach
            {{-- <div class="column is-12">{{ $restaurants->links() }}</div> --}}
          </div>
        </div>











      </div>
    </section>
  </x-layouts.app>
