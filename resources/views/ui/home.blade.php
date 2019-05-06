@extends('ui.master')
@section('main')
 
<section id="body">
		<div class="container">
			<div class="row">
				<div id="sidebar" class="col-md-3">
					<nav id="menu">
						@include('ui.sidebar')
						<!-- <a href="#" id="pull">Danh mục</a> -->
					</nav>

					<div id="banner-l" class="text-center">
						<div class="banner-l-item">
							<a href="#"><img src="frontend/img/home/banner-l-1.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="frontend/img/home/banner-l-2.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="frontend/img/home/banner-l-3.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="frontend/img/home/banner-l-4.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="frontend/img/home/banner-l-5.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="frontend/img/home/banner-l-6.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="frontend/img/home/banner-l-7.png" alt="" class="img-thumbnail"></a>
						</div>
					</div>
				</div>

				<div id="main" class="col-md-9">
					<!-- main -->
					<!-- phan slide la cac hieu ung chuyen dong su dung jquey -->
					<div id="slider">
						<div id="demo" class="carousel slide" data-ride="carousel">

							<!-- Indicators -->
							<ul class="carousel-indicators">
								<li data-target="#demo" data-slide-to="0" class="active"></li>
								<li data-target="#demo" data-slide-to="1"></li>
								<li data-target="#demo" data-slide-to="2"></li>
							</ul>

							<!-- The slideshow -->
							<div class="carousel-inner">
								<div class="carousel-item active">
									<img src="frontend/img/home/slide-1.png" alt="Los Angeles" >
								</div>
								<div class="carousel-item">
									<img src="frontend/img/home/slide-2.png" alt="Chicago">
								</div>
								<div class="carousel-item">
									<img src="frontend/img/home/slide-3.png" alt="New York" >
								</div>
							</div>

							<!-- Left and right controls -->
							<a class="carousel-control-prev" href="#demo" data-slide="prev">
								<span class="carousel-control-prev-icon"></span>
							</a>
							<a class="carousel-control-next" href="#demo" data-slide="next">
								<span class="carousel-control-next-icon"></span>
							</a>
						</div>
					</div>

					<div id="banner-t" class="text-center">
						<div class="row">
							<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
								<a href="#"><img src="frontend/img/home/banner-t-1.png" alt="" class="img-thumbnail"></a>
							</div>
							<div class="banner-t-item col-md-6 col-sm-12 col-xs-12">
								<a href="#"><img src="frontend/img/home/banner-t-1.png" alt="" class="img-thumbnail"></a>
							</div>
						</div>					
					</div>

					<div id="wrap-inner">
						<div class="products">
							<h3>sản phẩm nổi bật</h3>

							<div class="product-list row">
								@foreach($listProduct as $product)
								@if($product->quantity > 0)
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img style="height: 150px;" src="{{$product->content}}" class="img-thumbnail"></a>
									<p><a href="#">{{$product->name}}</a></p>
									<p class="price">{{$product->price}}</p>	  
									<div class="marsk">
										<a href="{{route('detailProduct', $product->id)}}">Xem chi tiết</a>
									</div>                                    
								</div>
								@endif
								@endforeach
							</div>                	                	
						</div>

						<div class="products">
							<h3>sản phẩm mới</h3>
							<?php echo $newProduct; ?>
							<div class="product-list row">
								@foreach($newProduct as $product)
								@if($product->quantity > 0)
								<div class="product-item col-md-3 col-sm-6 col-xs-12">
									<a href="#"><img style="height: 100px;" src="{{$product->content}}" class="img-thumbnail"></a>
									<p><a href="#">{{$product->name}}</a></p>
									<p class="price">{{$product->price}}</p>	  
									<div class="marsk">
										<a href="{{route('detailProduct', $product->id)}}">Xem chi tiết</a>
									</div>                                    
								</div>
								@endif
								@endforeach
							</div>    
						</div>
					</div>
					
					<!-- end main -->
				</div>
			</div>
		</div>
	</section>


@endsection