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
                                <a href="{{route('listProduct')}}">Manage Product</a>
                            </li>
                            <li class="active">List Product</li>
 
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
                                        <h4 >List Product:</h4> 
                                        <button class="btn btn-sm btn-success" data-toggle="modal" id="addProduct" style="float: right; margin-top: -40px;">
                                        <i class="ace-icon fa fa-plus bigger-110 white"></i>
                                            <b>Add</b>

                                        </button>

                                       

                                    </div>
                                    <div style="margin-left: 700px; margin-top: -46px; margin-right: 10px;">    
                                
                                    <div class="input-group">

        <input id="data_search" name="data_search" type="text" class="form-control search-query" placeholder="Nhap tu khoa tim kiem ...">
        <span class="input-group-btn">
            <button type="submit" class="btn btn-purple btn-sm" id="search_product">
                <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                Search
            </button>
        </span>
    </div>
                        
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
                                                        Name
                                                    </th>
                                                    <th class="center">
                                                        Price
                                                    </th>
                                                    <th class="center">
                                                        Detail
                                                    </th>
                                                    <th class="center">
                                                        Producer
                                                    </th>
                                                    <th class="center">
                                                        Category
                                                    </th>
                                                    <th class="center">
                                                        Image
                                                    </th>
                                                    <th class="center">
                                                        Quantity
                                                    </th>
                                                     <!-- <th class="center">
                                                        Import
                                                    </th> -->
                                                    <th class="center">
                                                        Edit
                                                    </th><th class="center">
                                                        Delete
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody id="body_list_product">
                                                @foreach($list as $product)

                                                <tr row_id_product="<?php echo $product->id; ?>">
                                                    <td class="center">{{ $product->id }}</td>
                                                    <td class="center">{{ $product->name }}</td>
                                                    <td class="center">{{ $product->price }}</td>
                                                    <td class="center">{{ $product->detail }}</td>
                                                    <td class="center">{{ $product->nameProducer }}</td>
                                                    <td class="center">{{ $product->type }}</td>
                                                    <td class="center">{{ $product->image_url }}</td>
                                                    <td class="center">{{ $product->quantity }}</td>
                                                    <!-- <td class="center">
                                                        <a class="orange" href="#" id_import_product="<?php echo $product->id; ?>" data-role="import-product" data-toggle="modal">
                                                            <i class="ace-icon fa fa-edit bigger-130"></i>
                                                        </a>

                                                    </td> -->
                                                    <td class="center">
                                                        <a href="#" class="blue edit-product" id_edit_product="<?php echo $product->id; ?>" product-name="{{$product->name}}" product-price="{{$product->price}}" product-detail="{{$product->detail}}" product-producer_id="{{$product->producer_id}}" product-category_id="{{$product->category_id}}" product_image="{{$product->image_url}}" product-state="{{$product->state}}" data-role="update-product" data-toggle="modal">
                                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                        </a>
                                                    </td>
                                                    
                                                    <td class="center">
                                                        <a class="red" href="#" id_delete_product="<?php echo $product->id; ?>" data-role="delete-product" data-toggle="modal">
                                                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                        </a>

                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                 <div style="margin-left: 0px;">{!! $list->links() !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.main-content -->
            <!-- End Content -->

<div class="modal fade" id="myModal-product" role="dialog">
    <div class="modal-dialog" style="width: 1000px;">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" style="text-align: center;"><b>Add Product</b></h3>
                </div>
                <div class="modal-body" style="width: 600px;">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;"><b>Name: </b></label>

                                    <div class="col-sm-9">
                                        <input type="text" id="name-product" placeholder="Enter product name ..." class="form-control" name="name-product" style="width: 275px;"/>
                                    </div>
                                </div>

                            </div>
                            
                            <div>  </div>
                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;"><b>Price: </b></label>

                                    <div class="col-sm-9">
                                        <input type="text" id="price-product" placeholder="Enter price ..." class="form-control" name="price-product" style="width: 275px;"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2" style="margin-top: 7px;"><b>Producer: </b></label>
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
                                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2" style="margin-top: 7px;"><b>Category: </b></label>
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

                            

                            <!-- <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2" style="margin-top: 7px;"><b>Image: </b></label>
                                    
                                </div>
                            </div> -->


                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2" style="margin-top: 7px;"><b>State: </b></label>
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

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;"><b>Image: </b></label>

                                    <div class="col-sm-9" style=" width: 300px; margin-top: 7px;">

                                        <input type="file" id="image_product" onchange="PreviewImage();"  />
                                        <img id="uploadPreview" style="width: 50px; height: 50px; margin-top:5px;" />
                                        <script type="text/javascript">

                                            function PreviewImage() {
                                                var oFReader = new FileReader();
                                                oFReader.readAsDataURL(document.getElementById("image_product").files[0]);

                                                oFReader.onload = function (oFREvent) {
                                                    document.getElementById("uploadPreview").src = oFREvent.target.result;
                                                };
                                            };

                                        </script>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>  
                <div class="col-sm-9" >
                                <div class="form-group">
                                    <div class="clearfix" style="float: right; margin-top: -320px; height: 400px; width: 200px; margin-left: -100px;">
                                        <h5 class="header blue"><b>Describe</b></h5>
                                        <div class="widget-box widget-color-green" style="width: 400px;">
                                    <div class="widget-header widget-header-small"> <div class="wysiwyg-toolbar btn-toolbar center inline"> <div class="btn-group">  <a class="btn btn-sm btn-default active" data-edit="bold" title="" data-original-title="Bold (Ctrl/Cmd+B)"><i class=" ace-icon fa fa-bold"></i></a>  <a class="btn btn-sm btn-default" data-edit="italic" title="" data-original-title="Change Title!"><i class=" ace-icon ace-icon fa fa-leaf"></i></a>  <a class="btn btn-sm btn-default" data-edit="strikethrough" title="" data-original-title="Strikethrough"><i class=" ace-icon fa fa-strikethrough"></i></a>  </div> <div class="btn-group">  <a class="btn btn-sm btn-default" data-edit="insertunorderedlist" title="" data-original-title="Bullet list"><i class=" ace-icon fa fa-list-ul"></i></a>  <a class="btn btn-sm btn-default" data-edit="insertorderedlist" title="" data-original-title="Number list"><i class=" ace-icon fa fa-list-ol"></i></a>  </div> <div class="btn-group">  <a class="btn btn-sm btn-default active" data-edit="justifyleft" title="" data-original-title="Align Left (Ctrl/Cmd+L)"><i class=" ace-icon fa fa-align-left"></i></a>  <a class="btn btn-sm btn-default" data-edit="justifycenter" title="" data-original-title="Center (Ctrl/Cmd+E)"><i class=" ace-icon fa fa-align-center"></i></a>  <a class="btn btn-sm btn-default" data-edit="justifyright" title="" data-original-title="Align Right (Ctrl/Cmd+R)"><i class=" ace-icon fa fa-align-right"></i></a>  </div>  </div>   </div>

                                    <div class="widget-body">
                                        <div class="widget-main no-padding">
                                            <div class="wysiwyg-editor" id="detail-product" style="height: 190px;" contenteditable="true"></div>

                                        </div>
                                    </div>
                                        </div>
                                    </div>
                                </div>
                </div>
                <br/>
                <div class="modal-footer">
                    <div class="modal-footer">
                    <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                        <i class="ace-icon fa fa-times red2"></i>
                        Close
                    </button>
                    <button class="btn btn-white btn-bold" type="submit" id="add-product">
                        <i class="ace-icon fa fa-check bigger-110 green"></i>
                        Add
                    </button>
                </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="editModal-product" role="dialog">
            <div class="modal-dialog" style="width: 1000px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" style="text-align: center;"><b>Edit Product</b></h3>
                </div>
                <div class="modal-body" style="width: 600px;">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;"><b>Name: </b></label>

                                    <div class="col-sm-9">
                                        <input type="text" id="product-name" placeholder="Nhap ten san pham" class="form-control" name="product-name" style="width: 275px;"/>
                                    </div>
                                </div>

                            </div>
                            
                            <div>  </div>
                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;"><b>Price: </b></label>

                                    <div class="col-sm-9">
                                        <input type="text" id="product-price" placeholder="Nhap gia san pham" class="form-control" name="product-price" style="width: 275px;"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2" style="margin-top: 7px;"><b>Producer: </b></label>
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
                                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2" style="margin-top: 7px;"><b>Category: </b></label>
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
                                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2" style="margin-top: 7px;"><b>State: </b></label>
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

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 5px;"><b>Image: </b></label>

                                    <div class="col-sm-9" style="margin-left: 0px; width: 300px; margin-top: 7px;">

                                        <input type="file" id="edit_image_book" onchange="edit_PreviewImage();"  />
                                        <img id="edit_uploadPreview" style="width: 50px; height: 50px; margin-top: 5px;" />
                                        <script type="text/javascript">

                                            function edit_PreviewImage() {
                                                var oFReader = new FileReader();
                                                oFReader.readAsDataURL(document.getElementById("edit_image_book").files[0]);

                                                oFReader.onload = function (oFREvent) {
                                                    document.getElementById("edit_uploadPreview").src = oFREvent.target.result;
                                                };
                                            };

                                        </script>
                                    </div>
                                </div>

                            </div>


                        </div>

                    </div>

                </div>  
                <div class="col-sm-9" >
                                <div class="form-group">
                                    <div class="clearfix" style="float: right; margin-top: -320px; height: 200px; width: 200px; margin-left: -100px;">
                                        <h5 class="header blue"><b>Describe</b></h5>
                                        <div class="widget-box widget-color-green" style="width: 400px;">
                                    <div class="widget-header widget-header-small"> <div class="wysiwyg-toolbar btn-toolbar center inline"> <div class="btn-group">  <a class="btn btn-sm btn-default active" data-edit="bold" title="" data-original-title="Bold (Ctrl/Cmd+B)"><i class=" ace-icon fa fa-bold"></i></a>  <a class="btn btn-sm btn-default" data-edit="italic" title="" data-original-title="Change Title!"><i class=" ace-icon ace-icon fa fa-leaf"></i></a>  <a class="btn btn-sm btn-default" data-edit="strikethrough" title="" data-original-title="Strikethrough"><i class=" ace-icon fa fa-strikethrough"></i></a>  </div> <div class="btn-group">  <a class="btn btn-sm btn-default" data-edit="insertunorderedlist" title="" data-original-title="Bullet list"><i class=" ace-icon fa fa-list-ul"></i></a>  <a class="btn btn-sm btn-default" data-edit="insertorderedlist" title="" data-original-title="Number list"><i class=" ace-icon fa fa-list-ol"></i></a>  </div> <div class="btn-group">  <a class="btn btn-sm btn-default active" data-edit="justifyleft" title="" data-original-title="Align Left (Ctrl/Cmd+L)"><i class=" ace-icon fa fa-align-left"></i></a>  <a class="btn btn-sm btn-default" data-edit="justifycenter" title="" data-original-title="Center (Ctrl/Cmd+E)"><i class=" ace-icon fa fa-align-center"></i></a>  <a class="btn btn-sm btn-default" data-edit="justifyright" title="" data-original-title="Align Right (Ctrl/Cmd+R)"><i class=" ace-icon fa fa-align-right"></i></a>  </div>  </div>   </div>

                                    <div class="widget-body">
                                        <div class="widget-main no-padding">
                                            <div class="wysiwyg-editor" id="product-detail" style="height: 190px;" contenteditable="true"></div>

                                        </div>
                                    </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <br/>
                <div class="modal-footer">
                    <input type="hidden" id="product-id"value="" />
                    <input type="hidden" id="_name"  value="" />
                    <input type="hidden" id="_price"  value="" />
                    <input type="hidden" id="_detail"  value="" />
                    <input type="hidden" id="_product_id"  value="" />
                    <input type="hidden" id="_category_id"  value="" />
                    <input type="hidden" id="_image_id"  value="" />
                    <input type="hidden" id="_state"  value="" />
                    <!-- <input type="hidden" id="_name"  value="" /> -->
                    <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                        <i class="ace-icon fa fa-times red2"></i>
                        Close
                    </button>
                    <button class="btn btn-white btn-bold" type="submit" id="edit-product">
                        <i class="ace-icon fa fa-check bigger-110 blue"></i>
                        Edit
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="deleteModal-product" role="dialog">
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
                                    <h4 class="center">You may want to delete ?</h4>

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

<div class="modal fade" id="importModal-product" role="dialog">
    <div class="modal-dialog">

        <!-- <form id="form-author"> -->
            <!-- {{csrf_field()}} -->
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title center"><b> Import Product </b></h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->
                            <div class="col-sm-9" >
                                <div class="form-group" >
                                    <label class="col-sm-4 control-label no-padding-right" for="form-field-1" style="margin-top: 22px;"><b>Quantity:</b></label>

                                    <div class="col-sm-7">
                                        <input type="text" placeholder="Enter input data ..." class="form-control"  name="quantity" id="quantity_product" style="width: 350px; margin-top: 15px;"/>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
                <br/>
                <div class="modal-footer">
                    <input type="hidden" name="import_product_id" id="import_product_id">

                    <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                        <i class="ace-icon fa fa-times red2"></i>
                        Close
                    </button>
                    <button class="btn btn-white btn-bold" type="submit" id="import_product">
                        <i class="ace-icon fa fa-check bigger-110 orange"></i>
                        Ok
                    </button>
                </div>
            </div>
        <!-- </form> -->
    </div>
</div>

@endsection