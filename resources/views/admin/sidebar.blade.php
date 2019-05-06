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
						<a href="{{route('listMember')}}" class="dropdown-toggle">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text"> Quan ly thanh vien </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="">
								<a href="{{route('listRole')}}" id="sidebarRole">
									<i class="menu-icon fa fa-caret-right"></i>
									Phan quyen
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="{{route('listMember')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Danh sach thanh vien
								</a>

								<b class="arrow"></b>
							</li>
							
						</ul>
					</li>

					<li class="">
						<a href="{{route('listProduct')}}" class="dropdown-toggle">
							<i class="menu-icon fa fa-desktop"></i>
							<span class="menu-text"> Quan ly san pham </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li class="">
								<a href="{{route('listProducer')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Nha san xuat
								</a>

								<b class="arrow"></b>
							</li>
							
							<li class="">
			                    <a href="{{route('listTypeProduct')}}">
			                        <i class="menu-icon fa fa-caret-right"></i>
			                        Loai san pham
			                    </a>

			                    <b class="arrow"></b>
			                </li>

							<li class="">
								<a href="{{route('listProduct')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Danh sach san pham
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>

					<li class="">
						<a href="{{route('listOrder')}}"  class="dropdown-toggle">
							<i class="menu-icon fa fa-pencil-square-o"></i>
							<span class="menu-text"> Quan ly ban hang </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							
							
							<li class="">
								<a href="{{route('orderProcessing')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Danh sach don hang 
								</a>

								<b class="arrow"></b>
							</li>
							<li class="">
								<a href="{{route('listShipper')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Danh sach Shipper 
								</a>

								<b class="arrow"></b>
							</li>

							
						</ul>

					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa  fa-tachometer "></i>
							<span class="menu-text"> Quan ly tai nguyen </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="{{ route('listImage') }}"  >
									<i class="menu-icon fa fa-caret-right"></i>
									Tai nguyen anh
									<b class="arrow fa fa-angle-down"></b>
								</a>

								<b class="arrow"></b>

								

							</li>

						</ul>
					</li>


					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-calendar"></i>
							<span class="menu-text"> Quan ly kho </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="{{route('listImportBill')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Nhap hang
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="{{route('listExportBill')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Xuat hang
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