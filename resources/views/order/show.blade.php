<x-layouts.app>
  <section class="section">
    <div class="container">
      <div class="content mycontent">
        <ul style="list-style-type: none" class="tag-list">
          {{-- {{$sum}} --}}
          {{-- @foreach ($order->meals as $meal)
            <li><a href="{{route('meals.show',$meal)}}" style="text-decoration:none; color:blue"><b>#{{$meal->name}} &nbsp;</b></a></li>
          {{$sum = $meal->price + $sum}}
            @endforeach --}}
        </ul>
        <h1>Thanks for order from us your cost is {{$sum}}</h1>
      </div>
    </div>
  </section>
  </x-layouts>
