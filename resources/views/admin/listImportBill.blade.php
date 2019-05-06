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
                    <a href="{{route('listProduct')}}">Quan ly kho</a>
                </li>
                <li class="active">Nhap hang</li>

            </ul><!-- /.breadcrumb -->

        </div>
        <div class="page-content">
            <!-- <c:if test="${ != null}">
                <h4 class="pink">
                    <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>

                    <a class="green" data-toggle="modal">Chua co nha san xuat</a>
                </h4>
                <div class="hr hr-18 dotted hr-double"></div>
            </c:if> -->

            <div class="row" >
                <div class="col-xs-12">

                	<div class="row">
                        <div class="col-xs-12">
                            <h4 >Danh sach don nhap hang</h4> 
                            <button class="btn btn-sm btn-success" data-toggle="modal" id="addImportBill">
                                <i class=" "></i>
                                Them moi
                                
                            </button>

                           

                        </div>
                        <div style="margin-left: 700px; margin-top: -46px; margin-right: 10px;">    
                            <form method="get" action="{{route('listImportBill/search')}}" id="form_search_importBill">
                                {{csrf_field()}}
                                @include('admin.search')
                                
                            </form>
                        </div>
                    </div>

                        <br>
                        <form method="get" action="{{route('listImportBill/between')}}">
                        {{csrf_field()}}
                        <div style="margin-left: 0px;">
                            <div style="margin-left: 80px; width: 1000px;">
                                <label class="control-label col-sm-1 " for="password2" style="margin-top: 7px;">Tu ngay:</label>
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
                                <label  style="margin-top: 7px;" class="control-label col-sm-1 " for="password2">den:</label>
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
                                Xac nhan
                                
                                </button>
                                
                            </div>
                            
                        </div>
                    </form>
                    
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
                                            ID nguoi nhap
                                        </th>
                                        <th class="center">
                                            ID san pham
                                        </th>
                                        <th class="center">
                                            So luong
                                        </th>
                                        <th class="center">
                                            Gia
                                        </th>
                                        
                                        <th class="center">
                                            Sua
                                        </th><th class="center">
                                            Xoa
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($list as $importBill)
                                    <tr id="<?php echo $importBill->id; ?>">
                                        <td data-target="idImportBill">{{ $importBill->id }}</td>
                                        <td data-target="creator_id">{{ $importBill->creator_id }}</td>
                                        <td data-target="product_id">{{ $importBill->product_id }}</td>
                                        <td data-target="quantity">{{ $importBill->quantity }}</td>
                                        <td data-target="price">{{ $importBill->price }}</td>

                                        <td class="center">
                                            <a href="#" class="green edit-importBill" id="<?php echo $importBill->id; ?>" data-creator_id="{{$importBill->creator_id}}" data-product_id="{{$importBill->product_id}}" data-quantity="{{$importBill->quantity}}" data-price="{{$importBill->price}}" data-role="update-importBill" data-toggle="modal">
                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                            </a>
                                        </td>
                                        
                                        <td class="center">
                                            <a class="red" href="#" id="<?php echo $importBill->id; ?>" data-role="delete-importBill" data-toggle="modal">
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

        <form action="" method="get" id="form-importBill">
            <!-- Modal content-->
            {{csrf_field()}}
            <div class="modal-content">
                <div class="modal-header" style="background: #1B9B25;">
                    <button type="button" class="close" data-dismiss="modal" style="color: white;">&times;</button>
                    <h3 class="modal-title" style="text-align: center; color: white;">Thong tin hoa don nhap hang</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            
                            <!-- <div class="col-sm-12" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;">ID nguoi tao: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="importBill-creator_id" placeholder="Nhap ID tao hoa don" class="form-control" name="importBill-creator_id"/>
                                    </div>
                                </div>

                            </div> -->

                            <div class="col-sm-12" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;">ID san pham: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="importBill-product_id" placeholder="Nhap ID san pham" class="form-control" name="importBill-product_id"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-12" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;">So luong: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="importBill-quantity" placeholder="Nhap so luong" class="form-control" name="importBill-quantity"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-12" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;">Gia: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="importBill-price" placeholder="Nhap gia san pham" class="form-control" name="importBill-price"/>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>

                </div>  
                <br/>
                <div class="modal-footer">
                    <input type="hidden" name="importBill-creator_id" id="importBill-creator_id" value="{{Session::get('id')}}">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    
                    <button class="btn btn-info" type="submit" id="add-importBill">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Them
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="editModal-importBill" role="dialog">
    <div class="modal-dialog">
        
        <div class="modal-content">
            <form method="get" id="form-importBill">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="patch">
                <div class="modal-header" style="background: rgb(255, 183, 82);">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" style="text-align: center; color: white;">Thong tin nha san xuat</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            
                            <!-- <div class="col-sm-12" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;">ID nguoi tao: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="creator_id-importBill" placeholder="Nhap ID tao hoa don" class="form-control" name="creator_id-importBill"/>
                                    </div>
                                </div>

                            </div> -->

                            <div class="col-sm-12" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;">ID san pham: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="product_id-importBill" placeholder="Nhap ID san pham" class="form-control" name="product_id-importBill"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-12" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;">So luong: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="quantity-importBill" placeholder="Nhap so luong" class="form-control" name="quantity-importBill"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-12" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;">Gia: </label>

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

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    
                    <button class="btn btn-info" type="submit" id="edit-importBill">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Sua
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="modal fade" id="deleteModal-importBill" role="dialog">
            <div class="modal-dialog">
                
                <div class="modal-content">
                    <form method="get" class="form-delete">
                        <input type="hidden" name="_method" value="delete">
                        {{csrf_field()}}
                    
                <!-- Modal content-->
                
                        <div class="modal-header" style="background: rgb(209, 91, 71);">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title" style="text-align: center; color: white;">Xac nhan yeu cau</h3>
                        </div>
                        <div class="modal-body">
                            
                            <span id="form_output"></span>
                            <div class="row">
                                <div class="col-xs-12">
                                    <!-- PAGE CONTENT BEGINS -->
                                    <h4>Ban co muon xoa khong ?</h4>

                                </div>
                            </div>

                        </div>  
                        
                        <div class="modal-footer">
                            <input type="hidden" id="importBill-id" value="" />
                            <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                                <i class="ace-icon fa fa-times red2"></i>
                                Cancel
                            </button>
                            <button class="btn btn-white btn-warning btn-bold" id="_delete-importBill">
                                <i class="ace-icon fa fa-trash-o bigger-120 orange"></i>
                                Delete
                            </button>
                            
                        </div>
                    </form>
                        
                    
                </div>
            </div>
</div>


@endsection