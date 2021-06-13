<x-layouts.app>
  <section class="section">
    <div class="container">
      <div class="title is-2 form">Create New Component</div>
      {{-- <form action="/tags" method="POST" class="form"> --}}
        <form action="{{ route('components.store') }}" method="POST" class="form">
        @csrf
        <div class="field">
          <label class="label form">Name</label>
          <div class="control">
            <input class="input @error('name')is-danger @enderror" name="name" type="text" value="{{ old('name') }}" placeholder="component Name">
          </div>
          @error('name')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>



        <div class="field is-grouped">
          <div class="control">
            <button class=" is-link form-button">Create</button>
          </div>
          <div class="control">
            <button class=" is-link is-light form-button">Cancel</button>
          </div>
        </div>
      </form>
    </div>
  </section>

</x-layouts.app>
