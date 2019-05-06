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
                                <a href="{{route('listProduct')}}">Quan ly san pham</a>
                            </li>
                            <li class="active">Danh sach san pham</li>
 
                        </ul><!-- /.breadcrumb -->

                    </div>
                    <div class="page-content">
                        <!-- <c:if test="${ != null}">
                            <h4 class="pink">
                                <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>

                                <a class="green" data-toggle="modal">Chua co san pham nao</a>
                            </h4>
                            <div class="hr hr-18 dotted hr-double"></div>
                        </c:if> -->

                        <div class="row" >
                            <div class="col-xs-12">

                                <div class="row">
                                    <div class="col-xs-12">
                                        <h4 >Danh sach san pham:</h4> 
                                        <button class="btn btn-sm btn-success" data-toggle="modal" id="addProduct">
                                            <i class=" "></i>
                                            Them moi
                                            
                                        </button>

                                       

                                    </div>
                                    <div style="margin-left: 700px; margin-top: -46px; margin-right: 10px;">    
                                <form method="get" action="{{route('listProduct/search')}}" id="form_search_product">
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
                                                        Ten san pham
                                                    </th>
                                                    <th class="center">
                                                        Don gia
                                                    </th>
                                                    <th class="center">
                                                        Mo ta
                                                    </th>
                                                    <th class="center">
                                                        Nha san xuat
                                                    </th>
                                                    <th class="center">
                                                        Loai san pham
                                                    </th>
                                                    <th class="center">
                                                        Image
                                                    </th>
                                                    <th class="center">
                                                        Trang thai
                                                    </th>
                                                    <th class="center">
                                                        Sua
                                                    </th><th class="center">
                                                        Xoa
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($list as $product)
                                                <tr id="<?php echo $product->id; ?>">
                                                    <td>{{ $product->id }}</td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->price }}</td>
                                                    <td>{{ $product->detail }}</td>
                                                    <td>{{ $product->producer_id }}</td>
                                                    <td>{{ $product->category_id }}</td>
                                                    <td>{{ $product->image_id }}</td>
                                                    <td>{{ $product->state }}</td>
                                                    <td class="center">
                                                        <a href="#" class="green edit-product" id="<?php echo $product->id; ?>" product-name="{{$product->name}}" product-price="{{$product->price}}" product-detail="{{$product->detail}}" product-producer_id="{{$product->producer_id}}" product-category_id="{{$product->category_id}}" product-image_id="{{$product->image_id}}" product-state="{{$product->state}}" data-role="update-product" data-toggle="modal">
                                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                        </a>
                                                    </td>
                                                    
                                                    <td class="center">
                                                        <a class="red" href="#" id="<?php echo $product->id; ?>" data-role="delete-product" data-toggle="modal">
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

<div class="modal fade" id="myModal-product" role="dialog">
    <div class="modal-dialog" style="width: 1000px;">

        <form action="" method="get">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background: #1B9B25;">
                    <button type="button" class="close" data-dismiss="modal" style="color: white;">&times;</button>
                    <h3 class="modal-title" style="text-align: center; color: white;">Thong tin san pham</h3>
                </div>
                <div class="modal-body" style="width: 600px;">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;">San pham: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="name-product" placeholder="Nhap ten san pham" class="form-control" name="name-product" style="width: 275px;"/>
                                    </div>
                                </div>

                            </div>
                            
                            <div>  </div>
                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;">Gia: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="price-product" placeholder="Nhap gia san pham" class="form-control" name="price-product" style="width: 275px;"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2" style="margin-top: 7px;">NSX:</label>
                                    <div class="col-xs-12 col-sm-9" style="width: 300px;">
                                        <select class="form-control" id="producer-product" >
                                            <option value=""></option>
                                            
                                            @foreach($listProducer as $producer)
                                                <option value="<?php echo $producer->id; ?>">{{$producer->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2" style="margin-top: 7px;">Loai SP:</label>
                                    <div class="col-xs-12 col-sm-9" style="width: 300px;">
                                        <select class="form-control" id="cate-product">
                                            <option value=""></option>
                                            @foreach($listCate as $cate)
                                                <option value="<?php echo $cate->id; ?>">{{$cate->type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2" style="margin-top: 7px;">Image:</label>
                                    <div class="col-xs-12 col-sm-9" style="width: 300px;">
                                        <select class="form-control" id="image-product">
                                            <option value=""></option>
                                            
                                            @foreach($listImage as $image)
                                                <option value="<?php echo $image->id; ?>">{{$image->name}}</option>
                                            @endforeach
                                    
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2" style="margin-top: 7px;">Trang thai:</label>
                                    <div class="col-xs-12 col-sm-9" style="width: 300px;">
                                        <select class="form-control" id="state-product">
                                            <option value=""></option>
                                            
                                            <option value="1">San sang</option>
                                            <option value="0">Khong san sang</option>
                                            <!-- <option value="AL">Dang hoat dong</option> -->
                                            <!-- <option value="AR">Arkansas</option> -->
                                
                                    
                                        </select>
                                    </div>
                                </div>
                            </div>

                            


                        </div>

                    </div>

                </div>  
                <div class="col-sm-9" >
                                <div class="form-group">
                                    <div class="clearfix" style="float: right; margin-top: -270px; height: 200px; width: 200px; margin-left: -100px;">
                                        <h5 class="header blue">Mo ta</h5>
                                        <div class="widget-box widget-color-green" style="width: 400px;">
                                    <div class="widget-header widget-header-small"> <div class="wysiwyg-toolbar btn-toolbar center inline"> <div class="btn-group">  <a class="btn btn-sm btn-default active" data-edit="bold" title="" data-original-title="Bold (Ctrl/Cmd+B)"><i class=" ace-icon fa fa-bold"></i></a>  <a class="btn btn-sm btn-default" data-edit="italic" title="" data-original-title="Change Title!"><i class=" ace-icon ace-icon fa fa-leaf"></i></a>  <a class="btn btn-sm btn-default" data-edit="strikethrough" title="" data-original-title="Strikethrough"><i class=" ace-icon fa fa-strikethrough"></i></a>  </div> <div class="btn-group">  <a class="btn btn-sm btn-default" data-edit="insertunorderedlist" title="" data-original-title="Bullet list"><i class=" ace-icon fa fa-list-ul"></i></a>  <a class="btn btn-sm btn-default" data-edit="insertorderedlist" title="" data-original-title="Number list"><i class=" ace-icon fa fa-list-ol"></i></a>  </div> <div class="btn-group">  <a class="btn btn-sm btn-default active" data-edit="justifyleft" title="" data-original-title="Align Left (Ctrl/Cmd+L)"><i class=" ace-icon fa fa-align-left"></i></a>  <a class="btn btn-sm btn-default" data-edit="justifycenter" title="" data-original-title="Center (Ctrl/Cmd+E)"><i class=" ace-icon fa fa-align-center"></i></a>  <a class="btn btn-sm btn-default" data-edit="justifyright" title="" data-original-title="Align Right (Ctrl/Cmd+R)"><i class=" ace-icon fa fa-align-right"></i></a>  </div>  </div>   </div>

                                    <div class="widget-body">
                                        <div class="widget-main no-padding">
                                            <div class="wysiwyg-editor" id="detail-product" style="height: 142px;" contenteditable="true"></div>

                                        </div>
                                    </div>
                                        </div>
                                    </div>
                                </div>
                </div>
                <br/>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>

                    <button class="btn btn-info" type="submit" id="add-product">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Them
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="editModal-product" role="dialog">
            <div class="modal-dialog" style="width: 1000px;">

        <form action="" method="get">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background: rgb(255, 183, 82);">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" style="text-align: center; color: white;">Thong tin san pham</h3>
                </div>
                <div class="modal-body" style="width: 600px;">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;">San pham: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="product-name" placeholder="Nhap ten san pham" class="form-control" name="product-name" style="width: 275px;"/>
                                    </div>
                                </div>

                            </div>
                            
                            <div>  </div>
                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;">Gia: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="product-price" placeholder="Nhap gia san pham" class="form-control" name="product-price" style="width: 275px;"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2" style="margin-top: 7px;">NSX:</label>
                                    <div class="col-xs-12 col-sm-9" style="width: 300px;">
                                        <select class="form-control" id="product-producer_id" >
                                            <option value=""></option>
                                            
                                            @foreach($listProducer as $producer)
                                                <option value="<?php echo $producer->id; ?>">{{$producer->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2" style="margin-top: 7px;">Loai SP:</label>
                                    <div class="col-xs-12 col-sm-9" style="width: 300px;">
                                        <select class="form-control" id="product-category_id">
                                            <option value=""></option>
                                            @foreach($listCate as $cate)
                                                <option value="<?php echo $cate->id; ?>">{{$cate->type}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2" style="margin-top: 7px;">Image:</label>
                                    <div class="col-xs-12 col-sm-9" style="width: 300px;">
                                        <select class="form-control" id="product-image_id">
                                            <option value=""></option>
                                            
                                            @foreach($listImage as $image)
                                                <option value="<?php echo $image->id; ?>">{{$image->name}}</option>
                                            @endforeach
                                    
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2" style="margin-top: 7px;">Trang thai:</label>
                                    <div class="col-xs-12 col-sm-9" style="width: 300px;">
                                        <select class="form-control" id="product-state">
                                            <option value=""></option>
                                            
                                            <option value="1">San sang</option>
                                            <option value="0">Khong san sang</option>
                                            <!-- <option value="AL">Dang hoat dong</option> -->
                                            <!-- <option value="AR">Arkansas</option> -->
                                
                                    
                                        </select>
                                    </div>
                                </div>
                            </div>

                            


                        </div>

                    </div>

                </div>  
                <div class="col-sm-9" >
                                <div class="form-group">
                                    <div class="clearfix" style="float: right; margin-top: -270px; height: 200px; width: 200px; margin-left: -100px;">
                                        <h5 class="header blue">Mo ta</h5>
                                        <div class="widget-box widget-color-green" style="width: 400px;">
                                    <div class="widget-header widget-header-small"> <div class="wysiwyg-toolbar btn-toolbar center inline"> <div class="btn-group">  <a class="btn btn-sm btn-default active" data-edit="bold" title="" data-original-title="Bold (Ctrl/Cmd+B)"><i class=" ace-icon fa fa-bold"></i></a>  <a class="btn btn-sm btn-default" data-edit="italic" title="" data-original-title="Change Title!"><i class=" ace-icon ace-icon fa fa-leaf"></i></a>  <a class="btn btn-sm btn-default" data-edit="strikethrough" title="" data-original-title="Strikethrough"><i class=" ace-icon fa fa-strikethrough"></i></a>  </div> <div class="btn-group">  <a class="btn btn-sm btn-default" data-edit="insertunorderedlist" title="" data-original-title="Bullet list"><i class=" ace-icon fa fa-list-ul"></i></a>  <a class="btn btn-sm btn-default" data-edit="insertorderedlist" title="" data-original-title="Number list"><i class=" ace-icon fa fa-list-ol"></i></a>  </div> <div class="btn-group">  <a class="btn btn-sm btn-default active" data-edit="justifyleft" title="" data-original-title="Align Left (Ctrl/Cmd+L)"><i class=" ace-icon fa fa-align-left"></i></a>  <a class="btn btn-sm btn-default" data-edit="justifycenter" title="" data-original-title="Center (Ctrl/Cmd+E)"><i class=" ace-icon fa fa-align-center"></i></a>  <a class="btn btn-sm btn-default" data-edit="justifyright" title="" data-original-title="Align Right (Ctrl/Cmd+R)"><i class=" ace-icon fa fa-align-right"></i></a>  </div>  </div>   </div>

                                    <div class="widget-body">
                                        <div class="widget-main no-padding">
                                            <div class="wysiwyg-editor" id="product-detail" style="height: 142px;" contenteditable="true"></div>

                                        </div>
                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <br/>
                <div class="modal-footer">
                    <input type="hidden" id="product-id" name="role-id" value="" />

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>

                    <button class="btn btn-info" type="submit" id="edit-product">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Sua
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="deleteModal-product" role="dialog">
            <div class="modal-dialog">
                
                <div class="modal-content">
                    <form method="get" class="form-delete">
                        {{csrf_field()}}
                    
                <!-- Modal content-->
                
                        <div class="modal-header" style="background: rgb(209, 91, 71);">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title" style="color: white; text-align: center;">Xac nhan yeu cau</h3>
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
                            <input type="hidden" id="product-delete_id" value="" />
                            <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                                <i class="ace-icon fa fa-times red2"></i>
                                Cancel
                            </button>
                            <button class="btn btn-white btn-warning btn-bold" id="_delete-product">
                                <i class="ace-icon fa fa-trash-o bigger-120 orange"></i>
                                Delete
                            </button>
                            
                        </div>
                    </form>
                        
                    
                </div>
            </div>
</div>

@endsection