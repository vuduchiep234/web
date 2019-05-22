<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="active">
						<a href="{{route('homeAdmin')}}">
							<i class="menu-icon fa fa-home home-icon"></i>
							<span class="menu-text"> Home </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="{{route('listUser')}}" class="dropdown-toggle">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text"> Manage User </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="">
								<a href="{{route('listRole')}}" id="sidebarRole">
									<i class="menu-icon fa fa-caret-right"></i>
									List Role
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="{{route('listUser')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									List User
								</a>

								<b class="arrow"></b>
							</li>
							
						</ul>
					</li>

					<li class="">
						<a href="{{route('listProduct')}}" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text"> Manage Product </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="">
								<a href="{{route('listProducer')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Producer
								</a>

								<b class="arrow"></b>
							</li>
							
							<li class="">
			                    <a href="{{route('listCategory')}}">
			                        <i class="menu-icon fa fa-caret-right"></i>
			                        Category
			                    </a>

			                    <b class="arrow"></b>
			                </li>

							<li class="">
								<a href="{{route('listProduct')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									List Product
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>

					<li class="">
						<a href="{{route('listOrder')}}"  class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Manage Auction </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							
							<li class="">
								<a href="{{route('listAuction')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Auction 
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="{{route('listAuctionProduct')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Auction Product
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="{{route('orderProcessing')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									List Order 
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="{{route('listShipper')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									List Shipper 
								</a>

								<b class="arrow"></b>
							</li>

							
						</ul>

					</li>

					<!--  -->


					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-calendar"></i>
							<span class="menu-text"> Manage Warehouse </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="{{route('listImportBill')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Import
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="{{route('listExportBill')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Export
								</a>

								<b class="arrow"></b>
							</li>

							
						</ul>
					</li>

				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>