<x-layouts.app>
  <section class="section">
    <div class="container">
      <div class="columns is-multiline">
          @foreach ($components as $component)
          <div class="column is-4">
            <a href="{{ route('components.show', $component) }}" style="text-decoration: none;">
              <div class="card" style="height: 100%;" id="postcard">
                <div class="card-image" id="postimage">
                  <figure class="image is-4by3" >
                    <img src="{{ $component-> name }}" alt="Placeholder image" >
                  </figure>
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
