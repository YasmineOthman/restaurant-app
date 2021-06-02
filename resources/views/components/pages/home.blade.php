<x-layouts.app>
  <section class="section">
    <div class="container">
      <div class="title is-3 has-text-centered">
        Restaurants
      </div>
      {{-- row --}}
      <div class="columns is-multiline">
        {{-- @foreach ($posts as $post)
        <div class="column is-4">
          <a href="{{ route('posts.show', $post) }}" style="text-decoration: none;">
            <div class="card" style="height: 100%;" id="postcard">
              <div class="card-image" id="postimage">
                <figure class="image is-4by3" >
                  <img src="{{ $post-> featured_image }}" alt="Placeholder image" >
                </figure>
              </div>
              <div class="card-content">
                <div class="media">
                  <div class="media-content">
                    <p class="title is-4">{{ $post->title }}</p>

                  </div>
                </div>
                <div class="content">
                  <span style="color: black">{{substr($post->content,0,20)}}....</span>
                  <a href="{{ route('posts.show', $post->id) }}" style="color: blue;text-decoration: none;">read more</a>
                  <br>
                  <time datetime="2016-1-1">{{ $post->created_at }}</time>
                </div>
              </div>
            </div>
          </a>
        </div>
        @endforeach --}}
        {{-- <div class="column is-12">
          <div class="buttons is-centered">
            <a href="{{ route('posts.index') }}" style="text-decoration: none">See All Posts</a>
          </div>
       </div> --}}
    </div>
  </section>
  </body>
</html>
</x-layouts.app>
