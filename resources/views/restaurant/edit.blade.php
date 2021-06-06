<x-layouts.app>
    <x-slot name="scripts">
        <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
        <script type="text/javascript">
           $(document).ready(function () {
           $('.ckeditor').ckeditor();
          });
</script>
      </x-slot>
<section class="section">
<div class="container">
    <div class="title is-2 form">Edit {{ $restaurant->name }} information</div>
    <form action="{{ route('restaurants.update',$restaurant) }}" method="POST" class="form" >
     @csrf
     <input type="hidden" name="_method" value="PUT">
     <div class="field">
        <label class="label form"> Restaurant Name</label>
        <div class="control">
          <input class="input @error('name')is-danger @enderror is-normal" name="name" type="text" value="{{ old('name', $restaurant->name) }}" placeholder="Enter Restaurant Name">
        </div>
        @error('name')
          <p class="help is-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="field">
        <label class="label form">City</label>
        <div class="control">
          <input class="input @error('city')is-danger @enderror is-normal" name="city" type="text" value="{{ old('city',$restaurant->city) }}" placeholder="Enter your city">
        </div>
        @error('address')
          <p class="help is-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="field">
        <label class="label form">Location</label>
        <div class="control">
          <input class="input @error('address')is-danger @enderror is-normal" name="address" type="text" value="{{ old('address',$restaurant->address) }}" placeholder="Enter Restaurant location">
        </div>
        @error('address')
          <p class="help is-danger">{{ $message }}</p>
        @enderror
      </div>

      <div class="field">
        <label class="label form">Description</label>
        <div class="control">
          <textarea class="ckeditor textarea @error('description')is-danger @enderror is-small" name="description" placeholder="descripe your restaurant..">{{ old('description', $restaurant->description) }}</textarea>
          <script type="text/javascript">
            CKEDITOR.replace( 'content' );
          </script>
          <input type="hidden" name="content" id="content">
        </div>
        @error('description')
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
                Choose an image for restaurant
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
