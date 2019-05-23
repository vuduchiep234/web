@extends('user.master')
@section('content')

<section class="course-details-area pt-120">
	<div class="container">
		@foreach($list as $list)
		<?php
            $flag = 1;
            if(strtotime(date('Y-m-d H:i:s')) 
                - strtotime($list->created_at) 
                - substr($list->duration, 0, 2)*3600
                - substr($list->duration, 3, 2)*60
                - substr($list->duration, 6, 8) 
                > 0){
                $flag = 0;
            }
        ?>
		<div class="row">
			<div class="col-lg-8 left-contents">
				<div class="main-image">
					<img class="img-fluid" src="{{$list->image_url}}" alt="">
				</div>
				<div class="jq-tab-wrapper" id="horizontalTab">
                    <div class="jq-tab-menu">
                        <div class="jq-tab-title active" data-tab="1">Describe</div>
                        <div class="jq-tab-title" data-tab="2">Producer</div>
                        <div class="jq-tab-title" data-tab="3">Category</div>
                        <div class="jq-tab-title" data-tab="4" id="my_history" product_id="{{$list->product_id}}" auction_id="{{$list->auction_id}}" user_id="{{Session::get('user_id')}}">My History</div>
                        @if($flag == 0)
                        <div class="jq-tab-title" data-tab="5" id="winner" product_id="{{$list->product_id}}" auction_id="{{$list->auction_id}}" user_id="{{Session::get('user_id')}}">Winner</div>
                        @endif
                    </div>
                    <div class="jq-tab-content-wrapper">
                        <div class="jq-tab-content active" data-tab="1">
                            {{$list->detail}}
                        </div>
                        <div class="jq-tab-content" data-tab="2">
                            {{$list->nameProducer}}
                        </div>
                        <div class="jq-tab-content" data-tab="3">
							{{$list->type}}
                        </div>
                        <div class="jq-tab-content comment-wrap" data-tab="4">
			                <table id="example1" class="table table-bordered table-striped">
				                <thead>
				                    <tr>
				                      <th class="text-center">ID Product</th>
				                      <th class="text-center">Name Product</th>
				                      <th class="text-center">ID User</th>
				                      <!-- <th class="text-center">Password</th> -->
				                      <th class="text-center">Name User</th>
				                      <th class="text-center">Offer</th>
				                      <th class="text-center">Time</th>
				                    </tr>
				                </thead>
				                <tbody id="data_history">  

				                </tbody>
				            </table>           						                
                        </div>
                        <div class="jq-tab-content" data-tab="5">	
                        	<table id="example1" class="table table-bordered table-striped">
				                <thead>
				                    <tr>
				                      <th class="text-center">ID Product</th>
				                      <th class="text-center">Name Product</th>
				                      <th class="text-center">ID User</th>
				                      <!-- <th class="text-center">Password</th> -->
				                      <th class="text-center">Name User</th>
				                      <th class="text-center">Offer</th>
				                      <th class="text-center">Time</th>
				                    </tr>
				                </thead>
				                <tbody id="data_winner">  

				                </tbody>
				            </table>           	
                        </div>                                
                    </div>
                </div>
			</div>
			<div class="col-lg-4 right-contents">
				<ul>
					<li>
						<a class="justify-content-between d-flex" href="#">
							<p>Product</p> 
							<span class="or">{{$list->nameProduct}}</span>
						</a>
					</li>
					<li>
						<a class="justify-content-between d-flex" href="#">
							<p>Start offer </p>
							<span>{{$list->offer}}</span>
						</a>
					</li>
					<li>
						<a class="justify-content-between d-flex" href="#">
							<p>Quantity </p>
							<span>{{$list->quantity}}</span>
						</a>
					</li>
					<li>
						<a class="justify-content-between d-flex" href="#">
							<p>Start time </p>
							<span>{{$list->created_at}}</span>
						</a>
					</li>
					<li>
						<a class="justify-content-between d-flex" href="#">
							<p>Duration </p>
							<span>{{$list->duration}}</span>
						</a>
					</li>
					<li>
						<a class="justify-content-between d-flex" href="#">
							<p>State </p>
							@if($flag == 0)
							<span>Finished</span>
							@else
							<span>Happenning</span>
							@endif
						</a>
					</li>
				</ul>
				@if($flag == 1)
				<a href="#" data-toggle="modal" class="primary-btn text-uppercase auction_" product_id="{{$list->product_id}}" auction_id="{{$list->auction_id}}" user_id="{{Session::get('user_id')}}">Auction</a>
				@else
				<a href="#" data-toggle="modal" class="primary-btn text-uppercase">Can't bid now</a>
				@endif
			</div>
		</div>
		@endforeach
	</div>	
</section>

<div class="modal fade" id="myModal-auction" author="dialog">
    <div class="modal-dialog">

        <!-- <form id="form-author"> -->
            <!-- {{csrf_field()}} -->
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background: #FFFAFA;">
                	<h3 class="modal-title text-center" style="text-align: center; color: black;"><b> Auction </b></h3>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->
                            <div class="col-sm-9" >
                                <div class="form-group" >
                                    <label class="col-sm-4 control-label no-padding-right" for="form-field-1" style="margin-top: 22px;"><b>Price:</b></label>

                                    <div class="col-sm-7">
                                        <input type="text" placeholder="Enter price ..." class="form-control"  name="price" id="price" style="width: 320px; margin-top: 15px; margin-left: -20px;"/>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
                <br/>
                <div class="modal-footer" style="background: #FFFAFA;">
                	<input type="hidden" name="product_id" id="product_id" value="">
                	<input type="hidden" name="auction_id" id="auction_id" value="">
                	<input type="hidden" name="user_id" id="user_id" value="{{Session::get('user_id')}}">
                    <!-- <button style="margin-left: -400px;" type="button" class="btn" data-dismiss="modal">Close</button> -->
                    <input type="submit" value="Ok" id="_auction">

                </div>
            </div>
        <!-- </form> -->
    </div>
</div>

@endsection
