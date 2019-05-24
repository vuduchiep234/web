	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="../frontend/img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Auction</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">


		<script src="../frontend/js/h1.js"></script>
  <link rel="stylesheet" href="../frontend/css/h1.css">
  <script src="../frontend/js/h2.js"></script>

			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="../frontend/css/linearicons.css">
			<link rel="stylesheet" href="../frontend/css/font-awesome.min.css">
			<link rel="stylesheet" href="../frontend/css/bootstrap.css">
			<link rel="stylesheet" href="../frontend/css/magnific-popup.css">
			<link rel="stylesheet" href="../frontend/css/nice-select.css">
			<link rel="stylesheet" href="../frontend/css/animate.min.css">
			<link rel="stylesheet" href="../frontend/css/owl.carousel.css">
			<link rel="stylesheet" href="../frontend/css/jquery-ui.css">
			<link rel="stylesheet" href="../frontend/css/main.css">



			<!-- <script type="text/javascript" src="../js/Home.js"></script> -->

			<style type="text/css">
				.dropbtn {
					  background-color: #4CAF50;
					  color: white;
					  padding: 16px;
					  font-size: 16px;
					  border: none;
					}

					.dropdown {
					  position: relative;
					  display: inline-block;
					}

					.dropdown-content {
					  display: none;
					  position: absolute;
					  background-color: #f1f1f1;
					  min-width: 160px;
					  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
					  z-index: 1;
					}

					.dropdown-content a {
					  color: black;
					  padding: 12px 16px;
					  text-decoration: none;
					  display: block;
					}

					.dropdown-content a:hover {background-color: #ddd;}

					.dropdown:hover .dropdown-content {display: block;}

					.dropdown:hover .dropbtn {background-color: #3e8e41;}
			</style>

		</head>
		<body>
		  <header id="header" id="home">
	  		@include('user.header')
		  </header><!-- #header -->

			<!-- start banner Area -->
			<section class="banner-area relative" id="home">
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row fullscreen d-flex align-items-center ">
						<div class="banner-content col-lg-9 col-md-12">
							<h1 class="text-uppercase">
								Web Auction online
							</h1>
							<p class="pt-10 pb-10">
								

							</p>
							@if(!Session::has('user_id'))
							<a href="{{route('login')}}" class="primary-btn text-uppercase">Get Started</a>
							@endif
						</div>
					</div>
				</div>
			</section>
			<!-- End banner Area -->

			<!-- Start popular-course Area -->
			@yield('content')
			<!-- End popular-course Area -->



			<!-- start footer Area -->
			<footer class="footer-area section-gap">
				@include('user.footer')
			</footer>
			<!-- End footer Area -->

			<div class="modal fade" id="card" role="dialog">
	            <div class="modal-dialog">

	                <div class="modal-content">
	                    <!-- <form > -->
	                        <!-- <input type="hidden" name="_method" value="delete"> -->
	                        <!-- {{csrf_field()}} -->

	                <!-- Modal content-->

	                        <!-- <div class="modal-header">
	                        	<h4 class="modal-title">Confirm</h4>
	                            <button type="button" class="close" data-dismiss="modal">&times;</button>

	                        </div> -->
	                        <div class="modal-header" style="background: #FFFAFA;">
			                	<h4 class="modal-title"> Register Card</h4>
			                    <button type="button" class="close" data-dismiss="modal">&times;</button>

			                </div>
			                <div class="modal-body">
			                    <div class="row">
			                        <div class="col-xs-12">
			                            <!-- PAGE CONTENT BEGINS -->
			                            <div class="col-sm-9" >
			                                <div class="form-group" >
			                                    <label class="col-sm-4 control-label no-padding-right" for="form-field-1" style="margin-top: 22px;"><b>Address:</b></label>

			                                    <div class="col-sm-7">
			                                        <input type="text" placeholder="Enter address ..." class="form-control"  name="quantity" id="address" style="width: 320px; margin-top: 15px; margin-left: -20px;"/>
			                                    </div>
			                                </div>

			                            </div>
			                            <div class="col-sm-9" >
			                                <div class="form-group" >
			                                    <label class="col-sm-4 control-label no-padding-right" for="form-field-1" style="margin-top: 22px;"><b>Phone:</b></label>

			                                    <div class="col-sm-7">
			                                        <input type="text" placeholder="Enter phone number ..." class="form-control"  name="quantity" id="phone" style="width: 320px; margin-top: 15px; margin-left: -20px;"/>
			                                    </div>
			                                </div>

			                            </div>

			                        </div>
			                    </div>

			                </div>
			                <br/>

	                        <div class="modal-footer" style="background: #FFFAFA;">
	                            <input type="hidden" id="card_user_id" value="" />
	                            <input type="button" value="No" data-dismiss="modal" style="float: right;">

	                            <input type="button" id="register_card" value="Yes">
	                                <!-- <i class="ace-icon fa fa-trash-o bigger-120 orange"></i> -->


	                        </div>
	                    <!-- </form> -->


	                </div>
	            </div>
			</div>


			<div class="modal fade" id="confirm_logout" role="dialog">
			    <div class="modal-dialog">

			        <div class="modal-content">
			            <!-- <form method="get" class="form-delete">
			                <input type="hidden" name="_method" value="delete">
			                {{csrf_field()}} -->

			        <!-- Modal content-->

			                <div class="modal-header">
			                	<h4 class="modal-title">Xác nhận</h4>
			                    <button type="button" class="close" data-dismiss="modal">&times;</button>

			                </div>
			                <div class="modal-body">

			                    <span id="form_output"></span>
			                    <div class="row">
			                        <div class="col-xs-12">
			                            <!-- PAGE CONTENT BEGINS -->
			                            <h4 style="margin-left: 130px;">Bạn muốn đăng xuất ?</h4>

			                        </div>
			                    </div>

			                </div>

			                <div class="modal-footer">
			                    <input type="hidden" id="user-delete" value="" />
			                    <input value="No" type="button" data-dismiss="modal">

			                    <input value="Yes" type="button" id="logout_user">
			                </div>
			            <!-- </form> -->


			        </div>
			    </div>
			</div>


			<div class="modal fade" id="changePassword-user" role="dialog">
			    <div class="modal-dialog">
			<!--
			        <form method="get" action="">
			            <input type="hidden" name="_method" value="patch">
			            {{csrf_field()}} -->
			            <!-- Modal content-->
			            <div class="modal-content">
			                <div class="modal-header" style="background: #FFFAFA;">
			                	<h4 class="modal-title" >Change Password</h4>
			                    <button type="button" class="close" data-dismiss="modal">&times;</button>

			                </div>
			                <div class="modal-body">
			                    <div class="row">
			                        <div class="col-xs-12">
			                            <!-- PAGE CONTENT BEGINS -->

			                            <div class="col-sm-9" >
			                                <div class="form-group" >
			                                    <label class="col-sm-6 control-label no-padding-right" for="form-field-1" style="margin-top: 22px;"><b>Current password:</b></label>

			                                    <div class="col-sm-6">
			                                        <input type="password" id="current" placeholder="Enter current password ..." style="width: 280px; margin-top: 15px; margin-left: 0px;"/>
			                                    </div>
			                                </div>

			                            </div>

			                            <div class="col-sm-9" >
			                                <div class="form-group" >
			                                    <label class="col-sm-6 control-label no-padding-right" for="form-field-1" style="margin-top: 22px;"><b>New password:</b></label>

			                                    <div class="col-sm-6">
			                                        <input type="password" id="new" placeholder="Enter new password ..." style="width: 280px; margin-top: 15px; margin-left: 0px;"/>
			                                    </div>
			                                </div>

			                            </div>

			                            <div class="col-sm-9" >
			                                <div class="form-group" >
			                                    <label class="col-sm-6 control-label no-padding-right" for="form-field-1" style="margin-top: 22px;"><b>Confirm:</b></label>

			                                    <div class="col-sm-6">
			                                        <input type="password" id="confirm" placeholder="Enter current password ..." style="width: 280px; margin-top: 15px; margin-left: 0px;"/>
			                                    </div>
			                                </div>

			                            </div>
			                        </div>
			                    </div>

			                </div>
			                <br/>
			                <div class="modal-footer" style="background: #FFFAFA;">
			                    <input type="hidden" id="change_user_id" name="user-id" value="{{Session::get('user_id')}}" />
			                    <input type="hidden" id="current_pass" value="" />
			                    <input type="hidden" id="new_pass" value="" />
			                    <input type="hidden" id="confirm_pass" value="" />
			                    <!-- <input type="hidden" id="role_id" value="" /> -->

			                    <input type="button" value="Close" data-dismiss="modal" class=" no-padding-right">
			                    <input type="submit" value="Ok" id="change_password" >

			                </div>
			            </div>
			        <!-- </form> -->
			    </div>
			</div>


			<script src="../frontend/js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="../frontend/js/vendor/bootstrap.min.js"></script>
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="../frontend/js/easing.min.js"></script>
			<script src="../frontend/js/hoverIntent.js"></script>
			<script src="../frontend/js/superfish.min.js"></script>
			<script src="../frontend/js/jquery.ajaxchimp.min.js"></script>
			<script src="../frontend/js/jquery.magnific-popup.min.js"></script>
    		<script src="../frontend/js/jquery.tabs.min.js"></script>
			<script src="../frontend/js/jquery.nice-select.min.js"></script>
			<script src="../frontend/js/owl.carousel.min.js"></script>
			<script src="../frontend/js/mail-script.js"></script>
			<script src="../frontend/js/main.js"></script>




			<script type="text/javascript" src="../js/Home.js"></script>
            <script type="text/javascript" src="../js/Search.js"></script>

		</body>
	</html>
