@extends('admin.master')
@section('content')

            <!-- Begin Content -->
            <div class="main-content">
                <div class="main-content-inner">
                    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                        <ul class="breadcrumb">
                            <li>
                                <i class="ace-icon fa fa-home home-icon"></i>
                                <a href="{{route('homeAdmin')}}">Home</a>
                            </li>

                            <li>
                                <a href="{{route('listOrder')}}">Quan ly ban hang</a>
                            </li>
                            <li class="active">Xu ly don hang</li>

                        </ul><!-- /.breadcrumb -->

                    </div>
                    <div class="page-content">
                        <!-- <c:if test="${ != null}">
                            <h4 class="pink">
                                <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>

                                <a class="green" data-toggle="modal">Chua co don hang</a>
                            </h4>
                            <div class="hr hr-18 dotted hr-double"></div>
                        </c:if> -->

                        <div class="row" >
                            <div class="col-xs-12">

                                <div class="row" >
                                    <div class="col-xs-12" >
                                        <h4>Danh sach Don hang</h4> 
                                        
                                    </div>
                                    <div style="margin-left: 700px; margin-top: -46px; margin-right: 10px;">
                                        <form method="get" id="search-order" class="search-form" action="{{route('listOrder/search')}}">
                                            {{csrf_field()}}
                                            @include('admin.search')
                                        </form>
                                    </div>
                                    
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <table id="simple-table" class="table  table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="center">
                                                        ID
                                                    </th>
                                                    <th class="center">
                                                        ID chi tiet don hang
                                                    </th>
                                                    <th class="center">
                                                        ID khach hang
                                                    </th>
                                                    <th class="center">
                                                        ID Shipper
                                                    </th>
                                                    <th class="center">
                                                        Trang thai
                                                    </th>
                                                    <th class="center">
                                                        Chi tiet
                                                    </th>
                                                    <th class="center">
                                                        Xu ly
                                                    </th>
                                                    <th class="center">
                                                        Xoa
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                             @foreach($list as $order)
                                            <tr id="<?php echo $order->id; ?>">
                                                <td class="center" data-target="idBill" style="padding-top: 13px;" >{{ $order->id }}</td>
                                                <td class="center" data-target="idBillDetail" style="padding-top: 13px;">{{ $order->billdetail_id }}</td>
                                                <td class="center" data-target="user_id" style="padding-top: 13px;">{{ $order->user_id }}</td>
                                                <td class="center" data-target="shipper_id" style="padding-top: 13px;">{{ $order->shipper_id }}</td>
                                                <td class="center" data-target="stateBill" style="padding-top: 13px;">{{ $order->state }}</td>
                                                <td class="center" style="padding-top: 13px;">
                                                    <a href="#" class="green edit-cate" data-toggle="modal" data-target="#displayModal-order">
                                                        <i class="ace-icon fa fa-eye  bigger-130"></i>
                                                    </a>
                                                </td>
                                                <td class="center">
                                                    
                                                   <div class="btn-group">
                                                        <button data-toggle="dropdown" class="btn btn-sm btn-danger dropdown-toggle" aria-expanded="false">
                                                            Action
                                                            <i class="ace-icon fa fa-angle-down icon-on-right"></i>
                                                        </button>
                                                        <input type="hidden" name="order-id" id="order-id" value="{{$order->id}}">
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <a href="#" data="<?php echo($order->id) ?>" class="find-shipper" data-toggle="modal" >Kich hoat</a>
                                                            </li>

                                                            <li class="divider"></li>

                                                            <li>
                                                                <a href="#" class="cancel" data="<?php echo($order->id) ?>" data-toggle="modal">Huy</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                
                                                <td class="center" style="padding-top: 13px;">

                                                    <a class="red" href="#" id="<?php echo $order->id; ?>" data-order="delete-order" data-toggle="modal">
                                                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                    </a>

                                                </td>
                                            </tr>

                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div style="margin-left: 0;">{!! $list->links() !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.main-content -->
            <!-- End Content -->



<!-- Modal -->
<div class="modal fade" id="myModal-findShipper" role="dialog">
    <div class="modal-dialog">

        <form action="" method="get">
            <input type="hidden" name="_method" value="patch">
            {{csrf_field()}}
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tim kiem Shipper</h4>
                    <button type="button" id="random" class="btn btn-purple btn-sm btn-primary" style="margin-left: 200px; margin-top: -45px;">Random</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->
                            <h4>Thong tin shipper duoc chon</h4>
                            <div id="bodyModal-findShipper"></div>
                                

                        </div>
                    </div>

                </div>  
                <br/>
                <div class="modal-footer">
                    <input type="hidden" name="id_bill" id="id_bill" value="">
                    <input type="hidden" name="id_shipper" id="id_shipper" value="">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <button class="btn btn-info" type="submit" id="_findShipper">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        OK
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="cancelModal" role="dialog">
            <div class="modal-dialog">
                
                <div class="modal-content">
                    <form method="get" class="form-delete">
                        <input type="hidden" name="_method" value="patch">
                        {{csrf_field()}}
                    
                <!-- Modal content-->
                
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Xac nhan yeu cau</h4>
                        </div>
                        <div class="modal-body">
                            
                            <span id="form_output"></span>
                            <div class="row">
                                <div class="col-xs-12">
                                    <!-- PAGE CONTENT BEGINS -->
                                    <h4>Ban co muon huy don hang nay khong ?</h4>

                                </div>
                            </div>

                        </div>  
                        
                        <div class="modal-footer">
                            <input type="hidden" id="button-cancel" value="" />
                            <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                                <i class="ace-icon fa fa-times red2"></i>
                                Khong
                            </button>
                            <button class="btn btn-white btn-warning btn-bold" id="cancel-bill">
                                <i class="ace-icon fa fa-trash-o bigger-120 orange"></i>
                                Co
                            </button>
                            
                        </div>
                    </form>
                        
                    
                </div>
            </div>
</div>

<div class="modal fade" id="deleteModal-order" role="dialog">
            <div class="modal-dialog">
                
                <div class="modal-content">
                    <form method="get" class="form-delete">
                        <input type="hidden" name="_method" value="delete">
                        {{csrf_field()}}
                    
                <!-- Modal content-->
                
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Xac nhan yeu cau</h4>
                        </div>
                        <div class="modal-body">
                            
                            <span id="form_output"></span>
                            <div class="row">
                                <div class="col-xs-12">
                                    <!-- PAGE CONTENT BEGINS -->
                                    <h4>Ban co muon xoa don hang nay khong ?</h4>

                                </div>
                            </div>

                        </div>  
                        
                        <div class="modal-footer">
                            <input type="hidden" id="order-delete" value="" />
                            <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                                <i class="ace-icon fa fa-times red2"></i>
                                Khong
                            </button>
                            <button class="btn btn-white btn-warning btn-bold" id="delete-bill">
                                <i class="ace-icon fa fa-trash-o bigger-120 orange"></i>
                                Co
                            </button>
                            
                        </div>
                    </form>
                        
                    
                </div>
            </div>
</div>


<div class="modal fade" id="displayModal-order" order="dialog">
            <div class="modal-dialog">

                <form action="" method="post">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Don hang XXX</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <!-- PAGE CONTENT BEGINS -->

                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Khach hang: </label>
                                        </div>

                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Dia chi: </label>
                                        </div>

                                    </div>

                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Dien thoai: </label>
                                        </div>

                                    </div>

                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Email: </label>

                                            <!-- <div class="col-sm-9">
                                                <input type="text" id="form-field-1-1" placeholder="Nhap email" class="form-control" name="email"/>
                                            </div> -->
                                        </div>

                                    </div>

                                    <div class="col-sm-9" >
                                        <hr style="width: 530px;">
                                        <div class="form-group" >
                                            <table id="simple-table" class="table  table-bordered table-hover" style="margin-left:65px">
                                                <thead>
                                                    <tr>
                                                        <th>San pham</th>
                                                        <th>So luong</th>
                                                        <th>Tong cong</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>Samsung Galaxy J7 Pro</th>
                                                        <th>1</th>
                                                        <th>25000000</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    
                                    <div class="col-sm-9">

                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2">Trang thai:</label>
                                            <div class="col-xs-12 col-sm-9" style="width: 300px;">
                                                <select class="form-control" id="form-field-select-1">
                                                    <option value=""></option>
                                                    <option value="AL">Alabama</option>
                                                    <option value="AK">Alaska</option>
                                                    <option value="AZ">Arizona</option>
                                                    <option value="AR">Arkansas</option>
                                        
                                            
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>  
                        <br/>
                        <div class="modal-footer">
                            <button class="btn btn-info" type="submit">
                                <i class="ace-icon fa fa-check bigger-110"></i>
                                OK
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>



@endsection