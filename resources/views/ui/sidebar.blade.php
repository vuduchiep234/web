<ul>
	<li class="menu-item">danh mục sản phẩm</li>
	@foreach($listCate as $cate)
	<li class="menu-item"><a href="{{route('category', $cate->id)}}" title="">{{$cate->type}}</a></li>
	@endforeach				
</ul>