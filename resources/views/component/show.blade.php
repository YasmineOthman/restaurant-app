<x-layouts.app>
  <section class="hero is-success is-small">
    <div class="hero-body" style="background-color: #eb640a;">
      <div class="container has-text-centered" >
        <p class="title">
          <h1 style="color:black;">hello
            {{-- {{$component->name}} --}}
           </h1>
        </p>
      </div>
    </div>
    {{-- <div class="hero-foot" style="background-color:black;">
      <nav class="tabs is-boxed is-fullwidth">
        <div class="container">
          <ul>
            <li><a href="{{ route('components.edit', $component) }}"style="text-decoration:none; color:#eb640a;"><b>Edit</b></a></li>
            {{-- <li><a href="{{ route('restaurants.delete', $restaurant->id) }}" style="text-decoration:none; color:#eb640a;"><b>Delete</b></a></li> --}}
            {{-- <li><a href="{{ route('components.create') }}"style="text-decoration:none; color:#eb640a;"><b>Create New Component</b></a></li> --}}
            {{-- <li><a href="{{ route('categories.show', $post->category) }}"style="text-decoration:none; color:#eb640a;"><b>Show related Posts</b></a></li> --}}
            {{-- <li><a href="{{ route('meals.create' )}}"style="text-decoration:none; color:#eb640a;">
              <b>Create Meal</b></a></li> --}}
          {{-- </ul> --}}
        {{-- </div> --}}
      {{-- </nav> --}}
    {{-- </div> --}}
  </section>
  {{-- <section class="section">
    <div class="container">
      <p class="content">
        <h3>Related Meals</h3>
        <ul>
          @foreach ($component->meals as $meal)
            <li><a href="{{route('meals.show',$meal)}}" style="text-decoration:none; color:black"><b>{{ $meal->name }}</b></a></li>
          @endforeach
        </ol>
      </p>
    </div>
  </section> --}}

</x-layouts.app>
