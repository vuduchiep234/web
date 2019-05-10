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
                <li class="active">Category</li>

            </ul><!-- /.breadcrumb -->

        </div>
        <div class="page-content">
            <!-- <c:if test="${ != null}">
                <h4 class="pink">
                    <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>

                    <a class="green" data-toggle="modal">Chua co du lieu</a>
                </h4>
                <div class="hr hr-18 dotted hr-double"></div>
            </c:if> -->

            <div class="row" >

                <div class="col-xs-12">
                    <h3 class="box-title"><b>List Category</b></h3>
                    <button class="btn btn-sm btn-success" data-toggle="modal" id="addCatetegory" style="float: right; margin-top: -40px;">
                    <i class="ace-icon fa fa-plus bigger-110 white"></i>
                        <b>Add</b>

                    </button>
                </div>

                <!-- <div class="col-xs-12" >
                    <h4>List Category</h4> 
                    
                    <button class="btn btn-sm btn-success" data-toggle="modal" id="addCatetegory">
                        <i class=" "></i>
                        Them moi
                         
                    </button>
                </div>
                <div style="margin-left: 700px; margin-top: -46px; margin-right: 10px;">    
                    <form method="get" action="{{route('listTypeProduct/search')}}" id="form_search_category">
                        {{csrf_field()}}
                        @include('admin.search')
                        
                    </form>
                </div> -->
                
            </div>
            <br>

            <div class="row" >
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-12">
                            <table id="cate-table" class="table  table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="center">
                                            ID
                                        </th>
                                        <th class="center">
                                            Type
                                        </th>

                                        <th class="center">
                                            Edit
                                        </th><th class="center">
                                            Delete
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="body_list_category">

                                    @foreach($list as $cate)
                                    <tr id="<?php echo $cate->id; ?>">
                                        <td class="center" data-target="idCate">{{ $cate->id }}</td>
                                        <td class="center" data-target="typeCate">{{ $cate->type }}</td>
                                        <td class="center">
                                            <a href="#" class="blue edit-cate" id_edit_category="<?php echo $cate->id; ?>" data-type="{{$cate->type}}" data-role="update-category" data-toggle="modal">
                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                            </a>
                                        </td>
                                        
                                        <td class="center">
                                            <a class="red" href="#" id_delete_category="<?php echo $cate->id; ?>" data-role="delete-category" data-toggle="modal">
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
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        
        <div class="modal-content">
            <!-- <form method="get" id="form-cate"> -->
                
                <!-- Modal content-->
                
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Add Category</h4>
                    </div>
                    <div class="modal-body">
                        <!-- <input type="hidden" id="csrf-token" value="{{ Session::token() }}" /> -->
                        {{csrf_field()}}
                        <span id="form_output"></span>
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="col-sm-9">
                                    <div class="form-group" >
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 22px;">Type:</label>

                                        <div class="col-sm-9">
                                            <input type="text" placeholder="Enter type category ..." class="form-control"  name="type-role" id="type-category" style="width: 400px; margin-top: 15px;"/>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>  
                    
                    <div class="modal-footer">

                        <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                            <i class="ace-icon fa fa-times red2"></i>
                            Close
                        </button>
                        <button class="btn btn-white btn-bold" type="submit" id="add-category">
                            <i class="ace-icon fa fa-check bigger-110 green"></i>
                            Add
                        </button>
                        
                    </div>
                
            <!-- </form> -->
        </div>
    </div>
</div>


<div class="modal fade" id="editModal-category" role="dialog">
    <div class="modal-dialog">
        
        <div class="modal-content">
            
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Category</h4>
                    </div>
                    <div class="modal-body">
                        <span id="form_output"></span>
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="col-sm-9">
                                    <div class="form-group" >
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 22px;">Type:</label>

                                        <div class="col-sm-9">
                                            <input type="text" placeholder="Enter type category ..." class="form-control"  name="type-role" id="_type-cate" style="width: 400px; margin-top: 15px;"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>  
                    
                    <div class="modal-footer">
                        <input type="hidden" id="cate-id" name="cate-id" value="" />
                        <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                            <i class="ace-icon fa fa-times red2"></i>
                            Close
                        </button>
                        <button class="btn btn-white btn-bold" type="submit" id="_edit-cate">
                            <i class="ace-icon fa fa-check bigger-110 blue"></i>
                            Edit
                        </button>
                        
                    </div>
           
        </div>
    </div>
</div>


<div class="modal fade" id="deleteModal-category" role="dialog">
            <div class="modal-dialog">
                
                <div class="modal-content">
                   
                <!-- Modal content-->
                
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Confirm</h4>
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
                            <input type="hidden" id="delete_cate_id" value="" />
                            <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                                <i class="ace-icon fa fa-times red2"></i>
                                CLose
                            </button>
                            <button class="btn btn-white btn-warning btn-bold" id="_delete-cate">
                                <i class="ace-icon fa fa-trash-o bigger-120 orange"></i>
                                Delete
                            </button>
                            
                        </div>
                   
                </div>
            </div>
</div>

<!-- <script type="text/javascript">
    $(document).ready(function(){
        $('#add-cate').click(function(){
            $('#myModal').modal('show');
            $('#form-cate')[0].reset();
            $('#form-output').html('');
            $('action').val('Add');
        });
    });
</script>
 -->

@endsection