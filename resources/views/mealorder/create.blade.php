<form action="{{ route('meal-order.storeorder',$meal->id) }} " method="POST">
  @csrf
<table>
  <tr>
    <td><label>Meal Name:</label><input type="text" name="name"  value="{{ $meal->name }}"></td><br>
    <td>

      {{-- <input type="quantity" value="{{ old('quantity') }}" placeholder="enter quantity"> --}}
      <div class="field">
        <label class="label form"> Quantity of meal:</label>
        <div class="control">
          <input class="input @error('quantity')is-danger @enderror is-normal" name="quantity" type="text" value="{{ old('quantity') }}" placeholder="Enter quantity">
        </div>
        @error('quantity')
          <p class="help is-danger">{{ $message }}</p>
        @enderror
      </div>
    </td>
  </tr>
</table>
<div class="field is-grouped">
  <div class="control">
    <button class=" is-link form-button">ok</button>
  </div>
</div>
</form>
