<x-layouts.app>
  <section class="hero is-success is-small">
    <div class="hero-body" style="background-color: #eb640a;">
      <div class="container has-text-centered" >
        <p class="title">
          <h1 style="color:black;">{{$category->type}} </h1>
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
          </ul>
        </div>
      </nav>
    </div>
  </section>


  </x-layouts>
