<x-layouts.app>
  <section class="section">
  <div class="container">
      <div class="title is-2 form">Edit Meal</div>
      <form action="{{ route('meals.update') }} " method="POST">
       @csrf
       <input type="hidden" name="_method" value="PUT">
       <div class="field">
          <label class="label form"> Meal Name</label>
          <div class="control">
            <input class="input @error('name')is-danger @enderror is-normal" name="name" type="text" value="{{ old('name',$meal->name) }}" placeholder="Enter Meal Name">
          </div>
          @error('name')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="field">
          <label class="label form"> Meal Price</label>
          <div class="control">
            <input class="input @error('price')is-danger @enderror is-normal" name="price" type="text" value="{{ old('price',$meal->price) }}" placeholder="Enter Meal price">
          </div>
          @error('price')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="field">
          <label class="label form"> Calory</label>
          <div class="control">
            <input class="input @error('calory')is-danger @enderror is-normal" name="calory" type="text" value="{{ old('calory',$meal->calory) }}" placeholder="Enter Calory">
          </div>
          @error('calory')
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
                  Choose an image for mael
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
            <button class=" is-link form-button">Update</button>
          </div>
          <div class="control">
            <button class=" is-link is-light form-button">Cancel</button>
          </div>
        </div>
      </form>
  </div>


  </section>
  </x-layouts.app>
