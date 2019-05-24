@extends('user.master')
@section('content')


<section class="popular-course-area section-gap">
	<div class="container">

		

		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-70 col-lg-8">
				<div class="title text-center">
					<h1 class="mb-10">Auction Product Happenning</h1>
					<p>This is my product</p>
				</div>
			</div>
		</div>
		<div class="row" id="list_book">
			<div class="active-popular-carusel" id="_list_book">
				
				@foreach($list as $book)

					<?php
			            $flag = 1;
			            if(strtotime(date('Y-m-d H:i:s')) 
			                - strtotime($book->created_at) 
			                - substr($book->duration, 0, 2)*3600
			                - substr($book->duration, 3, 2)*60
			                - substr($book->duration, 6, 8) 
			                > 0){
			                $flag = 0;
			            }

			            if($flag == 1){

			        ?>

					<div class="single-popular-carusel">

						<div class="thumb-wrap relative">
							<div class="thumb relative">
								<div class="overlay overlay-bg"></div>

								<a id="{{$book->id}}" href="{{route('detailProduct', $book->id_product)}}">
									<img style="width: 270px; height: 300px" class="img-fluid" src="{{$book->image_url}}" alt="">
								</a>
							</div>
							<div class="meta d-flex justify-content-between">
								<p><span class="lnr lnr-users"></span>  <span class="lnr lnr-bubble"></span></p>
								<h4 style="color: red;">{{$book->quantity}}</h4>
							</div>
						</div>
						<div class="details">
							<a id="{{$book->id}}" href="{{route('detailProduct', $book->id_product)}}">
								<h4>
									{{$book->nameProduct}}
								</h4>
							</a>
							<p>
								Offer: {{$book->offer}}
							</p>
							<p>
								Producer: <a id="" href="">{{$book->nameProducer}}</a>
							</p>
							<p>
								Category: <a id="" href="">{{$book->type}}</a>
							</p>
							
						</div>

					</div>
					<?php
					}
					?>
				@endforeach
			</div>

		</div>

		<div class="row d-flex justify-content-center">
			<div class="menu-content pb-70 col-lg-8">
				<div class="title text-center">
					<h1 class="mb-10">Auction Product Finnished</h1>
					<p>This is my product</p>
				</div>
			</div>
		</div>
		<div class="row" id="list_book">
			<div class="active-popular-carusel" id="_list_book">
				
				@foreach($list as $book)

					<?php
			            $flag = 1;
			            if(strtotime(date('Y-m-d H:i:s')) 
			                - strtotime($book->created_at) 
			                - substr($book->duration, 0, 2)*3600
			                - substr($book->duration, 3, 2)*60
			                - substr($book->duration, 6, 8) 
			                > 0){
			                $flag = 0;
			            }

			            if($flag == 0){

			        ?>

					<div class="single-popular-carusel">

						<div class="thumb-wrap relative">
							<div class="thumb relative">
								<div class="overlay overlay-bg"></div>

								<a id="{{$book->id}}" href="{{route('detailProduct', $book->id_product)}}">
									<img style="width: 270px; height: 300px" class="img-fluid" src="{{$book->image_url}}" alt="">
								</a>
							</div>
							<div class="meta d-flex justify-content-between">
								<p><span class="lnr lnr-users"></span>  <span class="lnr lnr-bubble"></span></p>
								<h4 style="color: red;">{{$book->quantity}}</h4>
							</div>
						</div>
						<div class="details">
							<a id="{{$book->id}}" href="{{route('detailProduct', $book->id_product)}}">
								<h4>
									{{$book->nameProduct}}
								</h4>
							</a>
							<p>
								Offer: {{$book->offer}}
							</p>
							<p>
								Producer: <a id="" href="">{{$book->nameProducer}}</a>
							</p>
							<p>
								Category: <a id="" href="">{{$book->type}}</a>
							</p>
							
						</div>

					</div>
					<?php
					}
					?>
				@endforeach
			</div>

		</div>
	</div>
</section>

@endsection
