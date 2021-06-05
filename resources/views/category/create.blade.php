<x-layouts.app>
<section class="section">
<div class="container">
    <div class="title is-2 form">Create Category</div>
    <form action="{{ route('categories.store') }} " method="POST">
     @csrf
     <div class="field">
        <label class="label form"> Category Name</label>
        <div class="control">
          <input class="input @error('type')is-danger @enderror is-normal" name="type" type="text" value="{{ old('type') }}" placeholder="Enter Category Type">
        </div>
        @error('type')
          <p class="help is-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="field">
        <label class="label form"> Image</label>
        <div class="file">
          <label class="file-label">
            <input class="file-input" type="file" name="image" accept="image/*">
            <span class="file-cta">
              <span class="file-icon">
                <i class="fas fa-upload"></i>
              </span>
              <span class="file-label">
                Choose an image for category
              </span>
            </span>
          </label>
        </div>
        @error('image')
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
