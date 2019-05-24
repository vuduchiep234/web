<ul class="nav-menu" style="margin-left: 560px;">
  <li><a href="{{route('homePage')}}">Home</a></li>
  <li><a href="#">About</a></li>

  <li class="menu-has-children"><a href="#">Producer</a>
    <ul>
      @foreach($listProducer as $producer)
      <li><a href="{{route('listProductOfProducer', $producer->id)}}">{{$producer->name}}</a></li>
      <li class="divider"></li>
      @endforeach

    </ul>
  </li>
  <li class="menu-has-children"><a href="#">Category</a>
    <ul>
      @foreach($listCate as $cate)
      <li><a href="{{route('listProductOfCategory', $cate->id)}}">{{$cate->type}}</a></li>
      <li class="divider"></li>
      @endforeach
    </ul>
  </li>

  <li><a href="#">Contact</a></li>
</ul>
