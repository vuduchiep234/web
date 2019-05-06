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

                            <li class="active">Quan ly ban hang</li>
                            <li class="active">Danh sach Shipper</li>
                            
                        </ul><!-- /.breadcrumb -->

                    </div>
                    <div class="page-content">
                        <!-- <c:if test="${ != null}">
                            <h4 class="pink">
                                <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>

                                <a class="green" data-toggle="modal">Chua co thanh vien nao</a>
                            </h4>
                            <div class="hr hr-18 dotted hr-double"></div>
                        </c:if> -->

                        <div class="row" >
                            <div class="col-xs-12">
                                <h4>Danh sach Shipper</h4> 
                                <button class="btn btn-sm btn-success" data-toggle="modal" id="addShipper">
                                    <i class=" "></i>
                                    Them moi
                                    
                                </button>
                            </div>
                            <div style="margin-left: 700px; margin-top: -46px; margin-right: 10px;">    
                                <form method="get" action="{{route('listShipper/search')}}" id="form_search_shipper">
                                    {{csrf_field()}}
                                    @include('admin.search')
                                    
                                </form>
                            </div>
                        </div>
                        <br>
                        <div class="row" >
                            <div class="col-xs-12">
                                
                                <div class="row">
                                    <div class="col-xs-12">
                                        <table id="simple-table" class="table  table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="center">
                                                        ID
                                                    </th>
                                                    <th class="center">
                                                        Ho ten
                                                    </th>
                                                    <th class="center">
                                                        So dien thoai
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

                                                @foreach($list as $shipper)
                                                <tr id="<?php echo $shipper->id; ?>">
                                                    <td class="center" data-target="idShipper">{{ $shipper->id }}</td>
                                                    <td class="center" data-target="nameShipper">{{ $shipper->name }}</td>
                                                    <td class="center" data-target="phoneShipper">{{ $shipper->phone }}</td>
                                                    <td class="center" data-target="stateShipper">{{ $shipper->state }}</td>
                                                    
                                                    <td class="center">
                                                        <a href="#" class="green edit-shipper" id="<?php echo $shipper->id; ?>" shipper-name="{{$shipper->name}}" shipper-phone="{{$shipper->phone}}" shipper-state="{{$shipper->state}}" data-role="update-shipper" data-toggle="modal">
                                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                        </a>
                                                    </td>
                                                    
                                                    <td class="center">
                                                        <a class="red" href="#" id="<?php echo $shipper->id; ?>" data-role="delete-shipper" data-toggle="modal">
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


<div class="modal fade" id="myModal-shipper" role="dialog">
    <div class="modal-dialog">

        <form action="" method="get" id="form-shipper">
            <!-- Modal content-->
            {{csrf_field()}}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thong tin Shipper</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            
                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Ho ten: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="shipper-name" placeholder="Nhap ho ten" class="form-control" name="shipper-name"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Dien thoai: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="shipper-phone" placeholder="Nhap so dien thoai" class="form-control" name="shipper-phone"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2">Trang thai:</label>
                                    <div class="col-xs-12 col-sm-9" style="width: 300px;">
                                        <select class="form-control" id="shipper-state">
                                            <option value=""></option>
                                            <option value="1">Ranh</option>
                                            <option value="0">Ban</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>  
                <br/>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    
                    <button class="btn btn-info" type="submit" id="add-shipper">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Them
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="editModal-shipper" role="dialog">
    <div class="modal-dialog">
        
        <div class="modal-content">
            <form method="get" id="form-shipper">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="patch">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thong tin nha san xuat</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            
                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Ho ten: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="name-shipper" placeholder="Nhap ho ten" class="form-control" name="name-shipper"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Dien thoai: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="phone-shipper" placeholder="Nhap so dien thoai" class="form-control" name="phone-shipper"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2">Trang thai:</label>
                                    <div class="col-xs-12 col-sm-9" style="width: 300px;">
                                        <select class="form-control" id="state-shipper">
                                            <option value=""></option>
                                            <option value="1">Ranh</option>
                                            <option value="0">Ban</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>  
                <br/>
                <div class="modal-footer">
                    <input type="hidden" id="shipper-id" name="shipper-id" value="" />
                    <input type="hidden" id="_nameShipper" value="" />
                    <input type="hidden" id="_phoneShipper" value="" />
                    <input type="hidden" id="_stateShipper" value="" />

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    
                    <button class="btn btn-info" type="submit" id="edit-shipper">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Sua
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="modal fade" id="deleteModal-shipper" role="dialog">
            <div class="modal-dialog">
                
                <div class="modal-content">
                    <form method="put" class="form-delete">
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
                                    <h4>Ban co muon xoa khong ?</h4>

                                </div>
                            </div>

                        </div>  
                        
                        <div class="modal-footer">
                            <input type="hidden" id="shipper-delete" value="" />
                            <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                                <i class="ace-icon fa fa-times red2"></i>
                                Cancel
                            </button>
                            <button class="btn btn-white btn-warning btn-bold" id="_delete-shipper">
                                <i class="ace-icon fa fa-trash-o bigger-120 orange"></i>
                                Delete
                            </button>
                            
                        </div>
                    </form>
                        
                    
                </div>
            </div>
</div>


@endsection