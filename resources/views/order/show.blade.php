<div>helllllllllllllllo</div>
<div class="content mycontent">
  <ul style="list-style-type: none" class="tag-list">
    @foreach ($order->meals as $meal)
      <li><a href="#" style="text-decoration:none; color:blue"><b>#{{$meal->name}} &nbsp;</b></a></li>
    @endforeach
  </ul>
</div>
