<x-layouts.app>
  <section class="section">
    <div class="container">
      <div class="columns is-multiline">
          @foreach ($meals as $meal)
          <div class="column is-4">
            <a href="{{ route('meals.show', $meal) }}" style="text-decoration: none;">
              <div class="card" style="height: 100%;" id="postcard">
                <div class="card-image" id="postimage">
                  <figure class="image is-4by3" >
                    <img src="{{ $meal-> image }}" alt="Placeholder image" >
                  </figure>
                </div>
                <div class="card-content">
                  <div class="media">
                    <div class="media-content">
                      <p class="title is-4">{{ $meal->name }}</p>

                    </div>
                  </div>
                  <div class="content">
                    <span style="color: black">{{$meal->price}}</span>
                    <a href="{{ route('meals.show', $meal->id) }}" style="color: blue;text-decoration: none;">show</a>
                    <br>
                    <time datetime="2016-1-1">{{ $meal->calory }}</time>
                  </div>
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
