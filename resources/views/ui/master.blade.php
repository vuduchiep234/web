<!DOCTYPE html>
<html> 
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Web Mobile</title>
	<link rel="stylesheet" href="../frontend/css/bootstrap.min.css">
	<link rel="stylesheet" href="../frontend/css/home.css">
	<link rel="stylesheet" href="../frontend/css/details.css">
	<link rel="stylesheet" href="../frontend/css/category.css">
	<link rel="stylesheet" href="../frontend/css/cart.css">
	<script type="text/javascript" src="../frontend/js/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script type="text/javascript" src="../frontend/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script type="text/javascript" src="../js/Home.js"></script>


		<!--[if !IE]> -->
		<!-- <script src="../backend/assets/js/jquery-2.1.4.min.js"></script> -->

	<script type="text/javascript">
		$(function() {
			var pull        = $('#pull');
			menu        = $('nav ul');
			menuHeight  = menu.height();

			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});
		});

		$(window).resize(function(){
			var w = $(window).width();
			if(w > 320 && menu.is(':hidden')) {
				menu.removeAttr('style');
			}
		});
	</script>
</head>
<body>    
	<!-- header -->
	<header id="header">
		<div class="container">
			<div class="row">
				<div id="logo" class="col-md-3 col-sm-12 col-xs-12">
					<h1>
						<a href="{{route('index')}}"><img style="height: 80px; width: 100px;" src="../frontend/img/home/index.png"></a>						
						<nav><a id="pull" class="btn btn-danger" href="#">
							<i class="fa fa-bars"></i>
						</a></nav>			
					</h1>
				</div>
				<div id="search" class="col-md-7 col-sm-12 col-xs-12">
					<input type="text" name="text" value="Nhập từ khóa ...">
					<input type="submit" name="submit" value="Tìm Kiếm">
				</div>
				<div id="cart" class="col-md-2 col-sm-3 col-xs-3">
					<a class="display" href="{{route('cart/show')}}">Giỏ hàng</a>
					<a href="{{route('cart/show')}}">{{Cart::count()}}</a>	
					<!-- {{Cart::count()}} -->			    
				</div>
				
				@if(!Session::has('id'))
				<div style="margin-left: 1040px;" class="col-md-2 col-sm-12 col-xs-12">
					<a class="display" href="{{route('login')}}"><u>Dang nhap</u></a>
					<!-- <a href="#">{{Cart::count()}}</a>	 -->
					<!-- {{Cart::count()}} -->			    
				</div>
				@else
				<a data-toggle="dropdown" href="#" style="margin-left: 900px;">
					<img class="nav-user-photo" src="../backend/assets/images/avatars/user.jpg" alt="Jason's Photo" />
					<span class="user-info">
						<small>Welcome,</small>
						{{Session::get('first_name').' '.Session::get('last_name')}}
					</span>

					<i class="ace-icon fa fa-caret-down"></i>
				</a>

				<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
					<li>
						<a href="#">
							<i class="ace-icon fa fa-cog"></i>
							Settings
						</a>
					</li>

					<li>
						<a href="profile.html">
							<i class="ace-icon fa fa-user"></i>
							Profile
						</a>
					</li>

					<li class="divider"></li>

					<li>
						<a href="{{route('logout')}}">
							<i class="ace-icon fa fa-power-off"></i>
							Logout
						</a>
					</li>
				</ul>

				@endif
				
			</div>			
		</div>
	</header><!-- /header -->
	<!-- endheader -->

	<!-- main -->
	@yield('main')
	<!-- endmain -->

	<!-- <script type="text/javascript" src="../js/Home.js"></script> -->

	<!-- footer -->
	<footer id="footer">			
		<div id="footer-t">
			<div class="container">
				<div class="row">				
					<div id="logo-f" class="col-md-3 col-sm-12 col-xs-12 text-center">						
						<a href="#"><img style="height: 80px; width: 100px;" src="frontend/img/home/index.png"></a>		
					</div>
					<div id="about" class="col-md-3 col-sm-12 col-xs-12">
						<h3>About us</h3>
						<p class="text-justify">Cua hang chung toi han hanh duoc phuc vu cac ban.
							Chung toi cam ket mang den cho moi nguoi nhung san pham tot nhat voi gia thanh hop ly nhat
						</p>
					</div>
					<div id="hotline" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Hotline</h3>
						<p>Phone Sale: (+84) 0963 792 117</p>
						<p>Email: hiep.vd151447@sis.hust.edu.vn</p>
					</div>
					<div id="contact" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Contact Us</h3>
						<p>Address 1: Dai hoc Bach Khoa Ha Noi</p>
						<p>Address 2: Ha Noi</p>
					</div>
				</div>				
			</div>
			<div id="footer-b">				
				<div class="container">
					<div class="row">
						<div id="footer-b-l" class="col-md-6 col-sm-12 col-xs-12 text-center">
							<p>Vu Duc Hiep - 20151447</p>
						</div>
						<div id="footer-b-r" class="col-md-6 col-sm-12 col-xs-12 text-center">
							<p>© 2018 Vu Duc Hiep</p>
						</div>
					</div>
				</div>
				<div id="scroll">
					<a href="#"><img src="frontend/img/home/scroll.png"></a>
				</div>	
			</div>
		</div>
	</footer>
	<!-- endfooter -->
</body>
</html>
