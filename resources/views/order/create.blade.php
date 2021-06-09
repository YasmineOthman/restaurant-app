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
  <div class="title is-2 form">Make Your Order</div>

  <form action=" {{route('orders.store')}}" method="POST" >
    @csrf
      <div class="field">
      <label class="label form">Place</label>
      <div class="control">
        <input class="input @error('place')is-danger @enderror is-normal" name="place" type="text" value="{{ old('place') }}" placeholder="Enter Place">
      </div>
      @error('place')
        <p class="help is-danger">{{ $message }}</p>
      @enderror
    </div>

    <div class="field">
      <label class="label">Meals</label>
      <div class="control" id="meal">
        <div class="select is-multiple @error('meals')is-danger @enderror">
          <select name="meals[]"  multiple>
            @foreach ($meals as $meal)
              <option value="{{ $meal->id }}">{{ $meal->name }}</option>
            @endforeach
          </select>
        </div>
      </div>
      @error('meals')
        <p class="help is-danger">{{ $message }}</p>
      @enderror
    </div>
    <div class="field">
      <label class="label form">Notes</label>
      <div class="control">
        <textarea class="ckeditor textarea @error('notes')is-danger @enderror is-small" name="notes" placeholder="notes..">{{ old('notes') }}</textarea>
        <script type="text/javascript">
          CKEDITOR.replace( 'content' );
        </script>
        <input type="hidden" name="content" id="content">
      </div>
      @error('notes')
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
