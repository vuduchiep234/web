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
                    <a href="{{route('listUser')}}">Manage User</a>
                </li>
                <li class="active">List User</li>

            </ul><!-- /.breadcrumb -->

        </div>
        <div class="page-content">

            <div class="row" >

                <div class="col-xs-12">
                    <h3 class="box-title"><b>List User</b></h3>
                    <!-- <button class="btn btn-sm btn-success" data-toggle="modal" id="add_user" style="float: right; margin-top: -40px;">
                    <i class="ace-icon fa fa-plus bigger-110 white"></i>
                        <b>Add</b>

                    </button> -->
                </div>

                <div style="margin-left: 700px; margin-top: -46px; margin-right: 10px;">

                    
                        <div class="input-group">

        <input id="data_search" name="data_search" type="text" class="form-control search-query" placeholder="Nhap tu khoa tim kiem ...">
        <span class="input-group-btn">
            <button type="submit" class="btn btn-purple btn-sm" id="search_user">
                <span class="ace-icon fa fa-search icon-on-right bigger-110"></span>
                Search
            </button>
        </span>
    </div>
                        
                   
                </div>
                
            </div>
            <br>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                      <th class="text-center">ID</th>
                      <th class="text-center">Name</th>
                      <th class="text-center">Email</th>
                      <!-- <th class="text-center">Password</th> -->
                      <th class="text-center">Role</th>
                      <th class="text-center">Edit</th>
                      <th class="text-center">Delete</th>
                    </tr>
                </thead>
                <tbody id="body_list_user">
                    @foreach($list as $user)

                        <tr row_id_user="<?php echo $user->id; ?>">
                            <td class="text-center">{{$user->id}}</td>
                            <td class="text-center">{{$user->name}}</td>
                            <td class="text-center">{{$user->email}}</td>
                            <!-- <td class="text-center">{{$user->password}}</td> -->
                            <td class="text-center">{{$user->type}}</td>
                            <td class="text-center">
                                <a href="#" class="blue" id_edit_user="<?php echo $user->id; ?>" name="{{$user->name}}" email="{{$user->email}}" password="{{$user->password}}" role_id="{{$user->role_id}}" role="{{$user->type}}" data-type="update-user" data-toggle="modal">
                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>
                            </td>
                            
                            <td class="text-center">
                                <a class="red" href="#" id_delete_user="<?php echo $user->id; ?>" data-type="delete-user" data-toggle="modal">
                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>

                            </td>
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

<div class="modal fade" id="editModal-user" role="dialog">
    <div class="modal-dialog">
<!-- 
        <form method="get" action="">
            <input type="hidden" name="_method" value="patch">
            {{csrf_field()}} -->
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 style="text-align: center;" class="modal-title"><b>Edit User</b></h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="col-sm-11" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label style="margin-top: 5px;" class="control-label col-sm-3 no-padding-right" for="password2"><b>Role:</b></label>
                                    <div class="col-sm-9" style="margin-left: -15px; width: 382px;">
                                        <select class="form-control" id="role_user">
                                            <option value=""></option>
                                            @foreach($listR as $role)
                                                <option value="<?php echo $role->id; ?>">{{$role->type}}</option>
                                            @endforeach
                                    
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <br/>
                <div class="modal-footer">
                    <input type="hidden" id="user_id_" name="user-id" value="" />

                    <input type="hidden" id="role_id" value="" />

                    <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                        <i class="ace-icon fa fa-times red2"></i>
                        Close
                    </button>
                    <button class="btn btn-white btn-bold blue" type="submit" id="edit-user">
                        <i class="ace-icon fa fa-check bigger-110 blue"></i>
                        Edit
                    </button>

                </div>
            </div>
        <!-- </form> -->
    </div>
</div>


<div class="modal fade" id="deleteModal-user" role="dialog">
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
                    <input type="hidden" id="user-delete" value="" />
                    <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                                <i class="ace-icon fa fa-times red2"></i>
                                Close
                            </button>
                            <button class="btn btn-white btn-warning btn-bold" id="_delete-user">
                                <i class="ace-icon fa fa-trash-o bigger-120 orange"></i>
                                Delete
                            </button>

                </div>
            <!-- </form> -->


        </div>
    </div>
</div>



@endsection



