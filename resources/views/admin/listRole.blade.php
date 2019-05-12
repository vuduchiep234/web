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
                    <a href="{{route('listProduct')}}">Manage User</a>
                </li>
                <li class="active">List Role</li>

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
                    <h3 class="box-title"><b>List Role</b></h3>
                    <button class="btn btn-sm btn-success" data-toggle="modal" id="addRole" style="float: right; margin-top: -40px;">
                    <i class="ace-icon fa fa-plus bigger-110 white"></i>
                        <b>Add</b>

                    </button>
                </div>

                <!-- <div class="col-xs-12" >
                    <h4>List Role</h4> 
                    
                    <button class="btn btn-sm btn-success" data-toggle="modal" id="addRole">
                        <i class=" "></i>
                        Add
                          
                    </button>
                </div> -->
                <!-- <div style="margin-left: 700px; margin-top: -46px; margin-right: 10px;">

                    <form method="get" action="{{route('listRole/searchRole')}}" id="form_search_role">
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
                            <table id="simple-table" class="table table-role table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            ID
                                        </th>
                                        <th class="text-center">
                                            Role Type
                                        </th>
                                        
                                        <th class="text-center">
                                            Edit
                                        </th><th class="text-center">
                                            Delete
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="body_list_role">

                                @foreach($list as $role)
                                <tr id="<?php echo $role->id; ?>">
                                    <td class="text-center" data-target="idRole">{{ $role->id }}</td>
                                    <td class="text-center" data-target="typeRole">{{ $role->type }}</td>
                                    <td class="text-center">
                                        <a href="#" class="blue edit-role" id="<?php echo $role->id; ?>" data-type="{{$role->type}}" data-role="update-role" data-toggle="modal">
                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                        </a>
                                    </td>
                                    
                                    <td class="text-center">
                                        <a class="red" href="#" id="<?php echo $role->id; ?>" data-role="delete-role" data-toggle="modal">
                                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                        </a>

                                    </td>
                                </tr>

                                @endforeach

                                
                                </tbody>
                            </table>

                        </div>
                        <div style="margin-left: 12px;">{!! $list->links() !!}</div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div><!-- /.main-content -->
<!-- End Content -->


<!-- Modal -->
<div class="modal fade" id="myModal-role" role="dialog">
    <div class="modal-dialog">

        <!-- <form method="get" id="form-role">
            {{csrf_field()}} -->
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align: center;"> Add Role </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->
                            <div class="col-sm-9" >
                                <div class="form-group" >
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 22px;">Role Type:</label>

                                    <div class="col-sm-9">
                                        <input type="text" placeholder="Input role type ..." class="form-control"  name="type-role" id="type-role" style="width: 400px; margin-top: 15px;"/>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>  
                <br/>
                <div class="modal-footer">
                    <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                        <i class="ace-icon fa fa-times red2"></i>
                        Close
                    </button>
                    <button class="btn btn-white btn-bold" type="submit" id="add-role">
                        <i class="ace-icon fa fa-check bigger-110 green"></i>
                        Add
                    </button>
                </div>
            </div>
        <!-- </form> -->
    </div>
</div>

<div class="modal fade" id="editModal-role" role="dialog">
    <div class="modal-dialog">

        <!-- <form action="" method="get">
                    
            <input type="hidden" name="_method" value="patch">
            {{csrf_field()}} -->
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align: center;"> Edit Role</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->

                            <!-- <div class="col-sm-9">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="width: 150px;">Nhap ID</label>

                                    <div class="col-sm-9">
                                        <input type="text" placeholder="Nhap ID" class="form-control" name="id"/>
                                    </div>
                                </div>

                            </div> -->

                            <br>

                            <div class="col-sm-9">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top:  12px;">Role Type:</label>

                                    <div class="col-sm-9">
                                        <input type="text" placeholder="Nhập phân quyền" class="form-control" name="role-type" id="role-type" style="width: 400px; margin-top: 5px;" />
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>  
                <br/>
                <div class="modal-footer">
                    <input type="hidden" id="role-id" name="role-id" value="" />
                    <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                        <i class="ace-icon fa fa-times red2"></i>
                        Close
                    </button>
                    <button class="btn btn-white btn-bold blue" type="submit" id="edit-role">
                        <i class="ace-icon fa fa-check bigger-110 blue"></i>
                        Edit
                    </button>
                </div>
            </div>
        <!-- </form> -->
    </div>
</div>

<div class="modal fade" id="deleteModal-role" role="dialog">
            <div class="modal-dialog">
                
                <div class="modal-content">
                    <!-- <form method="get" class="form-delete">
                        <input type="hidden" name="_method" value="delete">
                        {{csrf_field()}} -->
                    
                <!-- Modal content-->
                
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" style="text-align: center;">Confirm</h4>
                        </div>
                        <div class="modal-body">
                            
                            <span id="form_output"></span>
                            <div class="row">
                                <div class="col-xs-12">
                                    <!-- PAGE CONTENT BEGINS -->
                                    <h4 class='center'>You may want to delete ?</h4>

                                </div>
                            </div>

                        </div>  
                        
                        <div class="modal-footer">
                            <input type="hidden" id="role-delete" value="" />
                            <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                                <i class="ace-icon fa fa-times red2"></i>
                                Close
                            </button>
                            <button class="btn btn-white btn-warning btn-bold" id="_delete-role">
                                <i class="ace-icon fa fa-trash-o bigger-120 orange"></i>
                                Delete
                            </button>
                            
                        </div>
                    <!-- </form> -->
                        
                    
                </div>
            </div>
</div>

<!--  -->

@endsection