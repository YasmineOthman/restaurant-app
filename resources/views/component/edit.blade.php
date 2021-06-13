<x-layouts.app>
  <section class="section">
    <div class="container">
      <div class="title is-2">Edit {{$component->name}} Component</div>
      {{-- <form action="/tags" method="POST" class="form"> --}}
        <form action="{{ route('components.update',$component) }}" method="POST" class="form">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="field">
          <label class="label">Name</label>
          <div class="control">
            <input class="input @error('name')is-danger @enderror" name="name" type="text" value="{{ old('name') }}" placeholder="component Name">
          </div>
          @error('name')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>

        <div class="field is-grouped">
          <div class="control">
            <button class=" is-link">Update</button>
          </div>
          <div class="control">
            <button class=" is-link is-light">Cancel</button>
          </div>
        </div>
      </form>
    </div>
  </section>

</x-layouts.app>
