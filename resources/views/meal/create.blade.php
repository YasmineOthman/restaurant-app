<x-layouts.app>
  <section class="section">
  <div class="container">
      <div class="title is-2 form">Create Meal</div>
      <form action="{{ route('meals.store') }} " method="POST" enctype="multipart/form-data">
       @csrf
       <div class="field">
          <label class="label form"> Meal Name</label>
          <div class="control">
            <input class="input @error('name')is-danger @enderror is-normal" name="name" type="text" value="{{ old('name') }}" placeholder="Enter Meal Name">
          </div>
          @error('name')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="field">
          <label class="label form"> Meal Price</label>
          <div class="control">
            <input class="input @error('price')is-danger @enderror is-normal" name="price" type="text" value="{{ old('price') }}" placeholder="Enter Meal price">
          </div>
          @error('price')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="field">
          <label class="label form"> Calory</label>
          <div class="control">
            <input class="input @error('calory')is-danger @enderror is-normal" name="calory" type="text" value="{{ old('calory') }}" placeholder="Enter Calory">
          </div>
          @error('calory')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="field">
          <label class="label form">Category</label>
          <div class="control" id="category">
            <div class="select @error('category_id')is-danger @enderror">
              <select name="category_id" value="{{ old('category_id') }}">
                @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->type }}</option>
                @endforeach
              </select>
            </div>
          </div>
          @error('category_id')
            <p class="help is-danger">{{ $message }}</p>
          @enderror
        </div>
        <div class="field">
          <label class="label form">Components</label>
          <div class="control" id="component">
            <div class="select is-multiple @error('components')is-danger @enderror">
              <select name="components[]"  multiple>
                @foreach ($components as $component)
                  <option value="{{ $component->id }}">{{ $component->name }}</option>
                @endforeach
              </select>
            </div>
          </div>
          @error('components')
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
