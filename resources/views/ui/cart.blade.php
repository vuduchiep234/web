@extends('ui.master')
@section('main')

<script type="text/javascript">
	
	function updateCart(qty, rowId){

		$.ajax({
			url: "{{route('cart/update')}}",
			data: {qty: qty, rowId: rowId},
			function(){
				location.reload();
			}
		});

		
	}

</script>
<section id="body">
		<div class="container">
			<div class="row">
				<div id="sidebar" class="col-md-3">
					<nav id="menu">
						@include('ui.sidebar')
						<!-- <a href="#" id="pull">Danh mục</a> -->
					</nav>

					
				</div>

				<div id="main" class="col-md-9">
					<!-- main -->
					<!-- phan slide la cac hieu ung chuyen dong su dung jquey -->
					
					

					<div id="wrap-inner">
						<div id="list-cart">
							<h3>Giỏ hàng</h3>
							@if(Cart::count() >= 1)
							<form >
								<table class="table table-bordered .table-responsive text-center">
									<tr class="active">
										<td width="11.111%">Ảnh mô tả</td>
										<td width="22.222%">Tên sản phẩm</td>
										<td width="22.222%">Số lượng</td>
										<td width="16.6665%">Đơn giá</td>
										<td width="16.6665%">Thành tiền</td>
										<td width="11.112%">Xóa</td>
									</tr>
									@foreach($items as $product)
									<tr data="row" id="{{$product->id}}}">
										<td><img style="height: 50px;" class="img-responsive" src="../{{$product->options->img}}"></td>
										<td>{{$product->name}}</td>
										<td>
											<div class="form-group">
												<input class="form-control" type="number" data="quantity" value="{{$product->qty}}" onchange="updateCart(this.value, '{{$product->rowId}}')">
											</div>
										</td>
										<td data="price" value="{{$product->price}}"><span class="price">{{$product->price}}</span></td>
										<td><span class="price">{{$product->price * $product->qty}}</span></td>
										<td><a style="color: red;" href="{{route('cart/delete', $product->rowId)}}">Xóa</a></td>
									</tr>
									@endforeach
								</table>
								<div class="row" id="total-price">
									<div class="col-md-6 col-sm-12 col-xs-12">										
											Tổng thanh toán: <span class="total-price">{{$total}} dong</span>
																													
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12">
										<a href="{{route('index')}}" class="my-btn btn">Mua tiếp</a>
										<!-- <a href="" class="my-btn btn">Cập nhật</a> -->
										<a href="{{route('cart/delete', 'all')}}" class="my-btn btn">Xóa giỏ hàng</a>
									</div>
								</div>
							</form>             	                	
						</div>

						<div id="xac-nhan">
							<h3>Xác nhận mua hàng</h3>
							<form method="get" action="">
								{{csrf_field()}}
								<!-- <div class="form-group">
									<label for="email">Email address:</label>
									<input required type="email" class="form-control" id="email" name="email">
								</div>
								<div class="form-group">
									<label for="name">Họ và tên:</label>
									<input required type="text" class="form-control" id="name" name="name">
								</div>
								<div class="form-group">
									<label for="phone">Số điện thoại:</label>
									<input required type="number" class="form-control" id="phone" name="phone">
								</div> -->
								<div class="form-group">
									<label for="add">Địa chỉ:</label>
									<input required type="text" class="form-control" id="address_users" name="address_users">
								</div>
								<div class="form-group text-right">
									<input type="hidden" name="users_id" id="users_id" value="{{Session::get('id')}}">

									@foreach($items as $product)
									<input type="hidden" name="_products_id" id="_products_id" value="{{$product->id}}">
									<input type="hidden" name="_quantity" id="_quantity" value="{{$product->qty}}">
									<input type="hidden" name="_price" id="_price" value="{{$product->price}}">
									@endforeach
									<button type="submit" class="btn btn-default" id="submit_order">Thực hiện đơn hàng</button>
								</div>
							</form>
						</div>
						@else
						<h3>
							Gio hang rong !
						</h3>
						@endif
					</div>

					
					<!-- end main -->
				</div>
			</div>
		</div>
	</section>
@endsection