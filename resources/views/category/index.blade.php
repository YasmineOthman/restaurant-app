<x-layouts.app>
  <x-search/>
  <section class="section">
    <div class="container">
      <div class="columns is-multiline">
          @foreach ($categories as $category)
          <div class="column is-4">
            <a href="{{ route('categories.show', $category) }}" style="text-decoration: none;">
              <div class="card" style="height: 100%;" id="postcard">
                <div class="card-image" id="postimage">
                  <figure class="image is-4by3" >
                    <img src="{{ $category-> image }}" alt="Placeholder image" >
                  </figure>
                </div>
                <div class="card-content">
                  <div class="media">
                    <div class="media-content">
                      <p class="title is-4">{{ $category->type }}</p>

                    </div>
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
