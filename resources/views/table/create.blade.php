<x-layouts.app>
  <x-navbar />
<section class="section">
<div class="container">
    <div class="title is-2 form">Create Your Table</div>
    {{-- @for($i = 0;$i< $restaurant->tables_count;$i++) --}}
    <form action=" {{route('tables.store')}}" method="POST" >
      @csrf
      <input type="number" name="restaurantid" value="{{$restaurant->id}}" hidden>
      {{-- @for($i = 0;$i< $restaurant->tables_count;$i++) --}}
      {{-- @foreach($restaurant->tables_count as $table) --}}
      {{-- <h2>Table {{$i+1}}</h2> --}}
        <div class="field">
        <label class="label form"> Place Table</label>
        <div class="control">
          <input class="input @error('place')is-danger @enderror is-normal" name="place" type="text" value="{{ old('place') }}" placeholder="Enter place table">
        </div>
        @error('place')
          <p class="help is-danger">{{ $message }}</p>
        @enderror
      </div>

      <div class="field">
        <label class="label form"> Count Of Chairs</label>
        <div class="control">
          <input class="input @error('chairs_count')is-danger @enderror is-normal" name="chairs_count" type="number" min="0" value="{{ old('chairs_count') }}" placeholder="Enter Count Of chairs">
        </div>
        @error('chairs_count')
          <p class="help is-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="field">
        <label class="label form">Status</label>
        <div class="control" id="status">
                   <input name="status"type="radio" value={{0}} > <span style="color: orange">Available</span>
                  <input name="status"type="radio" value={{1}}> <span style="color: orange">Reserved</span>
          </div>
        @error('status')
          <p class="help is-danger">{{ $message }}</p>
        @enderror
      </div>

      {{-- @endfor --}}
      <div class="field is-grouped">
        <div class="control">
          <button class=" is-link form-button">Create</button>
        </div>
        <div class="control">
          <button class=" is-link is-light form-button">Cancel</button>
        </div>
      </div>
    </form>
    {{-- @endfor --}}
</div>
</section>
</x-layouts.app>
