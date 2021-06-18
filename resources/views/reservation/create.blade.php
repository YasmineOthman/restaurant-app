<x-layouts.app>
  <x-navbar />
<section class="section">
<div class="container">
    <div class="title is-2 form">Reserve your table from {{$restaurant->name}} restaurant</div>
    <form action="{{route('reservations.store')}} " method="POST" >
      @csrf
      <input type="number" name="restaurantid" value="{{$restaurant->id}}" hidden>
        <div class="field">
        <label class="label form"> Day:</label>
        <div class="control">
          <input  class="input @error('day')is-danger @enderror is-normal" name="day" type="date"  value="{{ old('day') }}" placeholder="" min="" max="">
        </div>
        @error('day')
          <p class="help is-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="field">
        <label class="label form"> Time:</label>
        <div class="control">
          <input class="input @error('time')is-danger @enderror is-normal" name="time" type="time" value="{{ old('time') }}" placeholder="">
        </div>
        @error('time')
          <p class="help is-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="field">
        <div class="control" id="table">
          <label class="label form">Available Tables</label>
          @foreach ($restaurant->tables as $table)
              <table>
                <tr>
                 <td>Table : <input name="tables[]"type="checkbox" value="{{ $table->id }}"> {{ $table->place_table }} </td>
                 <td> &nbsp;&nbsp;number of chairs : <input name= "chairs_count{{ $table->id }}"  value= "{{$table->chairs_count}}" style="border:hidden" readonly></td>
               </tr><br>
             </table>
                @endforeach
          </div>
        @error('tables')
          <p class="help is-danger">{{ $message }}</p>
        @enderror
      </div>
      <div class="field is-grouped">
        <div class="control">
          <button class=" is-link form-button">Reserve</button>
        </div>
        <div class="control">
          <button class=" is-link is-light form-button">Cancel</button>
        </div>
      </div>
    </form>

</div>
</section>
</x-layouts.app>
