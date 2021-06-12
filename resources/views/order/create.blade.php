<x-layouts.app>
<section class="section">
<div class="container">
  <div class="title is-2 form">Make Your Order from {{$restaurant->name}} Restaurant</div>

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
    {{-- <div class="field">
      <label class="label">Meals</label>
      <div class="control" id="meal">
        <div class="select is-multiple @error('meals')is-danger @enderror">
          <select name="meals[]"  multiple>
            @foreach ($restaurant->categories as $category)
            @foreach ($category->meals as $meal)
              <option value="{{ $meal->id }}">{{ $meal->name }}</option>
              @endforeach
              @endforeach
          </select>
        </div>
      </div>
      @error('meals')
        <p class="help is-danger">{{ $message }}</p>
      @enderror
    </div> --}}
    <div class="field">
      <label class="label">Meals</label>
      <div class="control" id="meal">
        @foreach ($restaurant->categories as $category)
            @foreach ($category->meals as $meal)
                  <input name="meals[]"type="checkbox" value="{{ $meal->id }}">{{ $meal->name }}
         quantity <input name="quantity{{ $meal->id }}" type="number" ><br>
         <input name= "price{{ $meal->id }}" type="number" value= {{$meal->price}}><br>

         {{-- @if($order = $meal->order->first())
         <td>{{ $meal->pivot->value }}</td>
     @endif --}}
                  @endforeach
              @endforeach
          </select>
        </div>
      </div>
      @error('meals')
        <p class="help is-danger">{{ $message }}</p>
      @enderror
    </div>
    {{-- <table>
      @foreach($meals as $meal)
          <tr>
              <td><input {{ $meal->name ? 'checked' : null }} data-id="{{ $meal->id }}" type="checkbox" ></td>
              <td>{{ $meal->name }}</td>
              <td><input value="{{ $meal->name ?? null }}" {{ $meal->name ? null : 'disabled' }} data-id="{{ $meal->id }}" name="meals[{{ $meal->id }}]" type="text"  placeholder="Amount"></td>
          </tr>
      @endforeach
  </table> --}}

    <div class="field">
      <label class="label form">Notes</label>
      <div class="control">
        <textarea class=" textarea @error('notes')is-danger @enderror is-small" name="notes" placeholder="notes..">{{ old('notes') }}</textarea>
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
