@extends('ui.master')
@section('main')

<section id="body">
		<div class="container">
			<div class="row">
				<div id="sidebar" class="col-md-3">
					<nav id="menu">
						<ul>
							@include('ui.sidebar')				
						</ul>
						
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
					
					<div id="wrap-inner">
						
						<div id="product-info">
							<div class="clearfix"></div>
							<h3>{{$product->name}}</h3>
							<div class="row">
								<div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
									<img style="height: 300px; width: 200px;" src="../{{$product->content}}">
								</div>
								<div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
									<p>Giá: <span class="price">{{$product->price}}</span></p>
									<p>Bảo hành: 1 đổi 1 trong 12 tháng</p> 
									<p>Phụ kiện: Dây cáp sạc, tai nghe</p>
									<p>Tình trạng: Máy mới 100%</p>
									<p>Khuyến mại: Hỗ trợ trả góp 0% dành cho các chủ thẻ Ngân hàng Sacombank</p>
									<p>Còn hàng: Còn hàng</p>
									<p class="add-cart text-center"><a href="{{route('cart/add', $product->id)}}">Đặt hàng online</a></p>
								</div>
							</div>		
											
						</div>
						<div id="product-detail">
							<h3>Chi tiết sản phẩm</h3>
							<p class="text-justify">{{$product->detail}}</p>
						</div>
						
						<div id="comment">
							<h3>Bình luận</h3>
							<div class="col-md-9 comment">
								<form method="get" action="">
									{{csrf_field()}}
									<input type="hidden" name="user_id" id="cmtuser_id" value="{{Session::get('id')}}">
									<input type="hidden" name="product_id" id="cmtproduct_id" value="{{$product->id}}">
									<div class="form-group">
										<label for="cm">Bình luận:</label>
										<textarea required rows="10" id="cmt" class="form-control" name="content"></textarea>
									</div>
									<div class="form-group text-right">
										<button type="submit" class="btn btn-default" id="submit-comment">Gửi</button>
									</div>
								</form>
							</div>
						</div>
						<div id="comment-list">
							@foreach($listComment as $comment)
							<ul>
								<li class="com-title">
									{{$comment->first_name.' '.$comment->last_name}}
									<br>
									<span>{{$comment->created_at}}</span>	
								</li>
								<li class="com-details">
									{{$comment->content}}
								</li>
							</ul>
							@endforeach
							<ul>
								<li class="com-title">
									Member comment
									<br>
									<span>2017-19-01 10:00:00</span>	
								</li>
								<li class="com-details">
									HTC One X 32GB là sản phẩm đáng chờ đợi nhất trong năm nay, với cấu hình mạnh và giá thành tương đối mềm so với các dòng Smart Phone của các hãng khác
								</li>
							</ul>
							<ul>
								<li class="com-title">
									Member comment
									<br>
									<span>2017-19-01 10:00:00</span>	
								</li>
								<li class="com-details">
									HTC One X 32GB là sản phẩm đáng chờ đợi nhất trong năm nay, với cấu hình mạnh và giá thành tương đối mềm so với các dòng Smart Phone của các hãng khác
								</li>
							</ul>
						</div>
					</div>					
					<!-- end main -->
				</div>
			</div>
		</div>
	</section>

@endsection