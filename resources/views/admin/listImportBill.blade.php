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
                    <a href="{{route('listProduct')}}">Manage Warehourse</a>
                </li>
                <li class="active">Import</li>

            </ul><!-- /.breadcrumb -->

        </div>
        <div class="page-content">
            
            <div class="row" >
                <div class="col-xs-12">

                	<div class="row">
                        <div class="col-xs-12">
                            <h3 class="box-title"><b>List Import Bill</b></h3> 
                            <button class="btn btn-sm btn-success" data-toggle="modal" id="addImportBill" style="float: right; margin-top: -40px;">
                            <i class="ace-icon fa fa-plus bigger-110 white"></i>
                                <b>Add</b>

                            </button>

                           

                        </div>
                        <div style="margin-left: 700px; margin-top: -46px; margin-right: 10px;">    
                            
                                <div class="input-group">

        <input id="data_search" name="data_search" type="text" class="form-control search-query" placeholder="Nhap tu khoa tim kiem ...">
        <span class="input-group-btn">
            <button type="submit" class="btn btn-purple btn-sm" id="search_import">
                <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                Search
            </button>
        </span>
    </div>
                                
                           
                        </div>
                    </div>

                        <!-- <br>
                        <form method="get" action="{{route('listImportBill/between')}}">
                        {{csrf_field()}}
                        <div style="margin-left: 0px;">
                            <div style="margin-left: 80px; width: 1000px;">
                                <label class="control-label col-sm-1 " for="password2" style="margin-top: 7px;">From:</label>
                                <div class="row">
                                    <div class="control-label col-xs-12 col-sm-3 no-padding-right">
                                        <div class="input-group">
                                            <input class="form-control date-picker" id="from_date" data-date-format="yyyy-mm-dd" type="text" name="from_date">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar bigger-110"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-left: 470px; margin-top: -50px; width: 1000px;">
                                <label  style="margin-top: 7px;" class="control-label col-sm-1 " for="password2">to:</label>
                                <div class="row" style="">
                                    <div class="control-label col-xs-12 col-sm-3 no-padding-right">
                                        <div class="input-group">
                                            <input class="form-control date-picker" id="to_date" data-date-format="yyyy-mm-dd" type="text" name="to_date">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar bigger-110"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-left: 900px; margin-top: -34px;">
                                
                                <button class="btn btn-sm btn-success" >
                                <i class=" "></i>
                                Confirm
                                
                                </button>
                                
                            </div>
                            
                        </div>
                    </form> -->
                    
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
                                            Creator
                                        </th>
                                        <th class="center">
                                            Product
                                        </th>
                                        <th class="center">
                                            Quantity
                                        </th>
                                        <th class="center">
                                            Price
                                        </th>
                                        
                                        <th class="center">
                                            Edit
                                        </th><th class="center">
                                            Delete
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="body_list_import">

                                    @foreach($list as $importBill)
                                    <tr row_id_import="<?php echo $importBill->id; ?>">
                                        <td class="center" data-target="idImportBill">{{ $importBill->id }}</td>
                                        <td class="center" data-target="creator_id">{{ $importBill->creator }}</td>
                                        <td class="center" data-target="product_id">{{ $importBill->name }}</td>
                                        <td class="center" data-target="quantity">{{ $importBill->quantity }}</td>
                                        <td class="center" data-target="price">{{ $importBill->price }}</td>

                                        <td class="center">
                                            <a href="#" class="blue edit-importBill" id_edit_import="<?php echo $importBill->id; ?>" data-creator_id="{{$importBill->creator_id}}" data-product_id="{{$importBill->product_id}}" data-quantity="{{$importBill->quantity}}" data-price="{{$importBill->price}}" creator="{{$importBill->creator}}" name="{{$importBill->name}}" data-role="update-importBill" data-toggle="modal">
                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                            </a>
                                        </td>
                                        
                                        <td class="center">
                                            <a class="red" href="#" id_delete_import="<?php echo $importBill->id; ?>" data-role="delete-importBill" data-toggle="modal">
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
<div class="modal fade" id="myModal-importBill" role="dialog">
    <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" style="color: white;">&times;</button>
                    <h3 class="modal-title" style="text-align: center;"><b>Add Import Bill</b></h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">

                            <div class="col-sm-12" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;"><b>Product: </b></label>
                                    <div class="col-sm-9" style="margin-left: 0px; width: 407px;">
                                        <select class="form-control" id="product_id">
                                            <option value=""></option>
                                            @foreach($listP as $product)
                                                <option value="<?php echo $product->id; ?>">{{$product->name}}</option>
                                            @endforeach
                                    
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-12" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;"><b>Quantity: </b></label>

                                    <div class="col-sm-9">
                                        <input type="text" id="importBill-quantity" placeholder="Enter quantity ..." class="form-control" name="importBill-quantity"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-12" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;"><b>Price: </b></label>

                                    <div class="col-sm-9">
                                        <input type="text" id="importBill-price" placeholder="Enter price ..." class="form-control" name="importBill-price"/>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>

                </div>  
                <br/>
                <div class="modal-footer">
                    <input type="hidden" name="importBill-creator_id" id="importBill-creator_id" value="{{Session::get('user_id')}}">

                    <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                        <i class="ace-icon fa fa-times red2"></i>
                        Close
                    </button>
                    <button class="btn btn-white btn-bold" type="submit" id="add-importBill">
                        <i class="ace-icon fa fa-check bigger-110 green"></i>
                        Add
                    </button>
                </div>
            </div>

    </div>
</div>

<div class="modal fade" id="editModal-importBill" role="dialog">
    <div class="modal-dialog">
        
        <div class="modal-content">
           
                <input type="hidden" name="_method" value="patch">
                <div class="modal-header" >
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" style="text-align: center;"><b>Edit Import Bill</b></h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">

                            <div class="col-sm-12" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;"><b>Product: </b></label>
                                    <div class="col-sm-9" style="margin-left: 0px; width: 407px;">
                                        <select class="form-control" id="id_product">
                                            <option value=""></option>
                                            @foreach($listP as $product)
                                                <option value="<?php echo $product->id; ?>">{{$product->name}}</option>
                                            @endforeach
                                    
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-12" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;"><b>Quantity: </b></label>

                                    <div class="col-sm-9">
                                        <input type="text" id="quantity-importBill" placeholder="Nhap so luong" class="form-control" name="quantity-importBill"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-12" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;"><b>Price: </b></label>

                                    <div class="col-sm-9">
                                        <input type="text" id="price-importBill" placeholder="Nhap gia san pham" class="form-control" name="price-importBill"/>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>

                </div>  
                <br/>
                <div class="modal-footer">
                    <input type="hidden" id="id-importBill" name="id-importBill" value=""/>
                    <input type="hidden" id="_creator_id" value="{{Session::get('id')}}"/>
                    <input type="hidden" id="_product_id" value=""/>
                    <input type="hidden" id="_quantity" value=""/>
                    <input type="hidden" id="_price" value=""/>

                    <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                        <i class="ace-icon fa fa-times red2"></i>
                        Close
                    </button>
                    <button class="btn btn-white btn-bold" type="submit" id="edit-importBill">
                        <i class="ace-icon fa fa-check bigger-110 blue"></i>
                        Edit
                    </button>
                </div>
            </div>
    </div>
</div>


<div class="modal fade" id="deleteModal-importBill" role="dialog">
            <div class="modal-dialog">
                
                <div class="modal-content">
                
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title" style=" text-align: center;"><b>Confirm</b></h3>
                        </div>
                        <div class="modal-body">
                            
                            <span id="form_output"></span>
                            <div class="row">
                                <div class="col-xs-12">
                                    <!-- PAGE CONTENT BEGINS -->
                                    <h4>You may want to delete ?</h4>

                                </div>
                            </div>

                        </div>  
                        
                        <div class="modal-footer">
                            <input type="hidden" id="importBill-id" value="" />
                            <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                                <i class="ace-icon fa fa-times red2"></i>
                                No
                            </button>
                            <button class="btn btn-white btn-warning btn-bold" id="_delete-importBill">
                                <i class="ace-icon fa fa-trash-o bigger-120 orange"></i>
                                Yes
                            </button>
                            
                        </div>
                </div>
            </div>
</div>


@endsection