@extends('admin.master')
@section('content')

<!-- Begin Content -->
<div class="main-content">
    <div class="main-content-inner">
        <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="{{route('homeAdmin')}}">Trang chủ</a>
                </li>

                <li>
                    <a href="{{route('listProduct')}}">Quản lý tai nguyen</a>
                </li>
                <li class="active">Tai nguyen anh</li>

            </ul><!-- /.breadcrumb -->

        </div>
        <div class="page-content">
            <!-- <c:if test="${ != null}">
                <h4 class="pink">
                    <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>

                    <a class="green" data-toggle="modal">Chua co phan quyen</a>
                </h4>
                <div class="hr hr-18 dotted hr-double"></div>
            </c:if> -->

            <div class="row" >
                <div class="col-xs-12">
                    <h4>Danh sach anh</h4> 
                    
                    <button class="btn btn-sm btn-success" data-toggle="modal" id="addImage">
                        <i class=" "></i>
                        Them moi
                        
                    </button>
                </div>
                <div style="margin-left: 700px; margin-top: -46px; margin-right: 10px;">    
                    <form method="get" action="{{route('listImage/search')}}" id="form_search_image">
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
                                            Ten anh
                                        </th>
                                        <th class="center">
                                            Noi dung
                                        </th>
                                        
                                        <th class="center">
                                            Sửa
                                        </th><th class="center">
                                            Xóa
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                @foreach($list as $image)
                                <tr id="<?php echo $image->id; ?>">
                                    <td data-target="idImage">{{ $image->id }}</td>
                                    <td data-target="nameImage">{{ $image->name }}</td>
                                    <td data-target="contentImage">{{ $image->content }}</td>
                                    <td class="center">
                                        <a href="#" class="green edit-image" id="<?php echo $image->id; ?>" image-name="{{$image->name}}" image-content="{{$image->content}}" data-role="update-image" data-toggle="modal">
                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                        </a>
                                    </td>
                                    
                                    <td class="center">
                                        <a class="red" href="#" id="<?php echo $image->id; ?>" data-role="delete-image" data-toggle="modal">
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
<div class="modal fade" id="myModal-image" role="dialog">
    <div class="modal-dialog">

        <form method="post" id="form-image" enctype="multipart/form-data" action="{{route('listImage')}}">
            {{csrf_field()}}
            <!-- Modal content-->
            <div class="modal-content" >
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Anh</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->
                            <div class="col-sm-9" style="margin-left: 60px;">
                                <div class="form-group" >
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 22px;">Ten anh:</label>

                                    <div class="col-sm-9">
                                        <input type="text" placeholder="Nhập ten anh" class="form-control"  name="name-image" id="name-image" style="width: 274px; margin-top: 15px;"/>
                                    </div>
                                </div>
                                <div class="form-group" >
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 27px;">Anh:</label>

                                    
                                        <div class="col-xs-12 col-sm-9" style="margin-top: 20px">
                                
                                                <label class="ace-file-input" style="width: 275px;">
                                                    <input id="id-input-file-2" type="file" class="col-xs-12 col-sm-4" name="photos">
                                                    <!-- <span class="ace-file-container" data-title="Choose" style="width: 275px;">
                                                    <span class="ace-file-name" data-title="No File ...">
                                                    <i class=" ace-icon fa fa-upload"></i>
                                                    </span>
                                                    </span> -->
                                                    <a class="remove" href="#">
                                                        <i class=" ace-icon fa fa-times">
                                                    
                                                        </i>
                                                    </a>
                                                </label>
                                            </div>
                                    
                                </div>

                            </div>

                        </div>
                    </div>

                </div>  
                <br/>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
                    <button class="btn btn-info" type="submit" id="add-image">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Thêm
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="editModal-image" role="dialog">
    <div class="modal-dialog">

        <form method="post" id="form-image" enctype="multipart/form-data" action="">
            {{csrf_field()}}
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"> Anh</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->
                            <div class="col-sm-9" style="margin-left: 60px;">
                                <div class="form-group" >
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 22px;">Ten anh:</label>

                                    <div class="col-sm-9">
                                        <input type="text" placeholder="Nhập ten anh" class="form-control"  name="image-name" id="image-name" style="width: 274px; margin-top: 15px;"/>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-top: 50px;">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 22px;">Anh:</label>

                                    
                                    <div class="col-xs-12 col-sm-9" style="margin-top: 20px;">
                        
                                        <label class="ace-file-input" style="width: 275px;">
                                            <input id="id-input-file-2" type="file" class="col-xs-12 col-sm-4" name="image-filename">
                                            <!-- <span class="ace-file-container" data-title="Choose" style="width: 275px;">
                                            <span class="ace-file-name" data-title="No File ...">
                                            <i class=" ace-icon fa fa-upload"></i>
                                            </span>
                                            </span> -->
                                            <a class="remove" href="#">
                                                <i class=" ace-icon fa fa-times">
                                            
                                                </i>
                                            </a>
                                        </label>
                                    </div>
                                    
                                </div>

                            </div>

                        </div>
                    </div>

                </div>  
                <br/>
                <div class="modal-footer">
                    <input type="hidden" id="image-id" name="image-id" value="" />
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
                    <button class="btn btn-info" type="submit" id="edit-image">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Sua
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="deleteModal-image" role="dialog">
            <div class="modal-dialog">
                
                <div class="modal-content">
                    <form method="get" class="form-delete">
                        <input type="hidden" name="_method" value="delete">
                        {{csrf_field()}}
                    
                <!-- Modal content-->
                
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Xác nhận yêu cầu</h4>
                        </div>
                        <div class="modal-body">
                            
                            <span id="form_output"></span>
                            <div class="row">
                                <div class="col-xs-12">
                                    <!-- PAGE CONTENT BEGINS -->
                                    <h4>Bạn có muốn xóa không ?</h4>

                                </div>
                            </div>

                        </div>  
                        
                        <div class="modal-footer">
                            <input type="hidden" id="image-delete" value="" />
                            <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                                <i class="ace-icon fa fa-times red2"></i>
                                Đóng
                            </button>
                            <button class="btn btn-white btn-warning btn-bold" id="_delete-image">
                                <i class="ace-icon fa fa-trash-o bigger-120 orange"></i>
                                Xóa
                            </button>
                            
                        </div>
                    </form>
                        
                    
                </div>
            </div>
</div>


@endsection