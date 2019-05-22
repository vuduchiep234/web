@extends('admin.master')
@section('content')

    <!-- Main content -->
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="{{route('homeAdmin')}}">Home</a>
                </li>

                <li>
                    <a href="{{route('listAuction')}}">Manage Auction</a>
                </li>
                <li class="active">Auction Product</li>

            </ul><!-- /.breadcrumb -->

        </div>
        <div class="page-content">

            <div class="row" >

                <div class="col-xs-12">
                    <h3 class="box-title"><b>Auction Product</b></h3>
                    <button class="btn btn-sm btn-success" data-toggle="modal" id="addAuctionProduct" style="float: right; margin-top: -40px;">
                                    <i class="ace-icon fa fa-plus bigger-110 white"></i>
                                    <b>Add</b>

                                </button>
                </div>

                <div style="margin-left: 700px; margin-top: -46px; margin-right: 10px;">

                    
                        @include('admin.search')
                        
                   
                </div>
                
            </div>
            <br>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                      <th class="text-center">ID</th>
                      <th class="text-center">Product</th>
                      <th class="text-center">User</th>
                      <th class="text-center">Start Time</th>
                      <th class="text-center">Duration</th>
                      <th class="text-center">Offer</th>
                      <th class="text-center">Winner</th>
                      <th class="text-center">State</th>
                    </tr>
                </thead>
                <tbody id="body_list_auction_product">
                    @foreach($list as $auction_product)

                        <?php
                            $flag = 1;
                            if(strtotime(date('Y-m-d H:i:s')) 
                                - strtotime($auction_product->created_at) 
                                - substr($auction_product->duration, 0, 2)*3600
                                + substr($auction_product->duration, 3, 2)*60
                                + substr($auction_product->duration, 6, 8) 
                                > 0){
                                $flag = 0;
                            }

                                ?>

                        <tr row_id_auction_product="<?php echo $auction_product->id; ?>">
                            <td class="text-center">{{$auction_product->id}}</td>
                            <td class="text-center">{{$auction_product->nameProduct}}</td>
                            <td class="text-center">{{$auction_product->nameUser}}</td>
                            <td class="text-center">{{$auction_product->created_at}}</td>
                            <td class="text-center">{{$auction_product->duration}}</td>
                            <td class="text-center">{{$auction_product->offer}}</td>
                            @if($flag == 0)
                            <td class="text-center">
                                <a href="#" class="blue" id_edit_auction_product="<?php echo $auction_product->id; ?>" product="{{$auction_product->nameProduct}}" user="{{$auction_product->nameUser}}" duration="{{$auction_product->duration}}" user_id="{{$auction_product->user_id}}" product_id="{{$auction_product->product_id}}" auction_id="{{$auction_product->auction_id}}" data-type="update-auction_product" data-toggle="modal">
                                    <i class="ace-icon fa fa-eye bigger-130"></i>
                                </a>
                            </td>
                            @else
                            <td class="text-center">
                                <a href="#" class="black" id_edit_auction_product="<?php echo $auction_product->id; ?>" product="{{$auction_product->nameProduct}}" user="{{$auction_product->nameUser}}" duration="{{$auction_product->duration}}" user_id="{{$auction_product->user_id}}" product_id="{{$auction_product->product_id}}" auction_id="{{$auction_product->auction_id}}" data-type="auction_product" data-toggle="modal">
                                    <i class="ace-icon fa fa-eye-slash  bigger-130 brown"></i>
                                </a>
                            </td>
                            @endif
                            
                            <td class="text-center">
                                <?php
                                    echo (strtotime(date('Y-m-d H:i:s')) - strtotime($auction_product->created_at)
                                    
                                - (substr($auction_product->duration, 0, 2)*3600
                                + substr($auction_product->duration, 3, 2)*60
                                + substr($auction_product->duration, 6, 8)) > 0) ? "finished" : "happenning";

                                ?>
                            </td>

                            <!-- <td class="text-center">
                                <a class="red" href="#" id_delete_auction_product="<?php echo $auction_product->id; ?>" data-type="delete-auction_product" data-toggle="modal">
                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>

                            </td> -->
                        </tr>

                    @endforeach

                </tbody>

              </table>
              <div style="margin-left: 0px;">{!! $list->links() !!}</div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
    <!-- /.content -->

<div class="modal fade" id="myModal-auction_product" role="dialog">
    <div class="modal-dialog">
        <!-- <form action="" method="get" id="">
             Modal content
            {{csrf_field()}} -->
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 style="text-align: center;" class="modal-title"><b>Add Auction Product</b></h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="col-sm-11" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label style="margin-top: 5px;" class="control-label col-sm-3 no-padding-right" for="password2"><b>Product:</b></label>
                                    <div class="col-sm-9" style="margin-left: -15px; width: 382px;">
                                        <select class="form-control" id="product">
                                            <option value=""></option>
                                            @foreach($listP as $role)
                                                <option value="<?php echo $role->id; ?>">{{$role->name}}</option>
                                            @endforeach
                                    
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-11" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label style="margin-top: 5px;" class="control-label col-sm-3 no-padding-right" for="password2"><b>Duration:</b></label>
                                    <div class="col-sm-9" style="margin-left: -15px; width: 382px;">
                                        <select class="form-control" id="auction">
                                            <option value=""></option>
                                            @foreach($listA as $role)
                                                <option value="<?php echo $role->id; ?>">{{$role->duration}}</option>
                                            @endforeach
                                    
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-11" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label style="margin-top: 5px;" class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>Offer:</b> </label>

                                    <div class="col-sm-9" style="margin-left: -15px; width: 382px;">
                                        <input type="text" id="offer" placeholder="Enter offer ..." class="form-control" name="shipper-name" />
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <br/>
                <div class="modal-footer">
                    <input type="hidden" id="user_id" name="user_id" value="{{Session::get('user_id')}}" />

                    <!-- <input type="hidden" id="role_id" value="" /> -->

                    <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                        <i class="ace-icon fa fa-times red2"></i>
                        Close
                    </button>
                    <button class="btn btn-white btn-bold green" type="submit" id="add-auction_product">
                        <i class="ace-icon fa fa-check bigger-110 green"></i>
                        Add
                    </button>

                </div>
            </div>
        <!-- </form> -->
    </div>
</div>

<div class="modal fade" id="editModal-auction_product" role="dialog">
    <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 style="text-align: center;" class="modal-title"><b>Edit Auction Product</b></h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="col-sm-11" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label style="margin-top: 5px;" class="control-label col-sm-3 no-padding-right" for="password2"><b>Product:</b></label>
                                    <div class="col-sm-9" style="margin-left: -15px; width: 382px;">
                                        <select class="form-control" id="_product">
                                            <option value=""></option>
                                            @foreach($listP as $role)
                                                <option value="<?php echo $role->id; ?>">{{$role->name}}</option>
                                            @endforeach
                                    
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-11" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label style="margin-top: 5px;" class="control-label col-sm-3 no-padding-right" for="password2"><b>Duration:</b></label>
                                    <div class="col-sm-9" style="margin-left: -15px; width: 382px;">
                                        <select class="form-control" id="_auction">
                                            <option value=""></option>
                                            @foreach($listA as $role)
                                                <option value="<?php echo $role->id; ?>">{{$role->duration}}</option>
                                            @endforeach
                                    
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-11" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>Offer:</b> </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="_offer" placeholder="Enter offer ..." class="form-control" name="shipper-name" style="width: 400px; margin-top: -5px;"/>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <br/>
                <div class="modal-footer">
                    <input type="hidden" id="auction_product_id" name="auction_product-id" value="" />

                    <!-- <input type="hidden" id="product_id" value="" /> -->

                    <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                        <i class="ace-icon fa fa-times red2"></i>
                        Close
                    </button>
                    <button class="btn btn-white btn-bold blue" type="submit" id="edit-auction_product">
                        <i class="ace-icon fa fa-check bigger-110 blue"></i>
                        Edit
                    </button>

                </div>
            </div>
        <!-- </form> -->
    </div>
</div>


<div class="modal fade" id="deleteModal-auction_product" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <!-- <form method="get" class="form-delete">
                <input type="hidden" name="_method" value="delete">
                {{csrf_field()}} -->

        <!-- Modal content-->

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" style="text-align: center;"><b>Confirm</b></h3>
                </div>
                <div class="modal-body">

                    <span id="form_output"></span>
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->
                            <h4 style="text-align: center;">You may want to delete?</h4>

                        </div>
                    </div>

                </div>

                <div class="modal-footer">
                    <input type="hidden" id="id_auction_product" value="" />
                    <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                                <i class="ace-icon fa fa-times red2"></i>
                                Close
                            </button>
                            <button class="btn btn-white btn-warning btn-bold" id="delete-auction_product">
                                <i class="ace-icon fa fa-trash-o bigger-120 orange"></i>
                                Delete
                            </button>

                </div>
            <!-- </form> -->


        </div>
    </div>
</div>

<div class="modal fade" id="displayModal-winner" order="dialog">
            <div class="modal-dialog">

                <!-- <form action="" method="post"> -->
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title center"><b>Winner</b></h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <!-- PAGE CONTENT BEGINS -->

                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>User: </b></label>
                                            <span id="name_user"></span>
                                        </div>

                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"><b>Email: </b></label>
                                            <span id="email"></span>

                                            <!-- <div class="col-sm-9">
                                                <input type="text" id="form-field-1-1" placeholder="Nhap email" class="form-control" name="email"/>
                                            </div> -->
                                        </div>

                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1" id="_address"><b>Address: </b></label>
                                            <span id="address"></span>
                                        </div>

                                    </div>

                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <label class="col-sm-3 control-label no-padding-right" for="form-field-1"  id="_phone"><b>Phone: </b></label>
                                            <span id="phone"></span>
                                        </div>

                                    </div>

                                    

                                    <div class="col-sm-9" >
                                        <hr style="width: 530px;">
                                        <div class="form-group" >
                                            <table id="simple-table" class="table  table-bordered table-hover" style="margin-left:65px">
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Quantity</th>
                                                        <th>Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th id="name_product"></th>
                                                        <th id="quantity"></th>
                                                        <th id="price"></th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    
                                    <!-- <div class="col-sm-9">

                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2">State:</label>
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
                                    </div> -->

                                </div>
                            </div>

                        </div>  
                        <br/>
                        <div class="modal-footer">
                            <input type="hidden" id="users_id" value="">
                            <input type="hidden" id="address_users" value="">
                            <input type="hidden" id="_products_id" value="">
                            <input type="hidden" id="_price" value="">
                            <input type="hidden" id="_quantity" value="">
                            <!-- <button class="btn btn-info" type="submit" id="submit_order">
                                <i class="ace-icon fa fa-check bigger-110"></i>
                                OK
                            </button> -->
                            
                            <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                                <i class="ace-icon fa fa-times red2"></i>
                                Close
                            </button>
                            <button class="btn btn-white btn-bold blue" type="submit" id="submit_order">
                                <i class="ace-icon fa fa-check bigger-110 blue"></i>
                                Create Order
                            </button>
                            
                        </div>
                    </div>
                <!-- </form> -->
            </div>
        </div>

@endsection



