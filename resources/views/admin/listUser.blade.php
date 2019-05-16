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

                    <form method="get" action="" id="form_search_user">
                        {{csrf_field()}}
                        @include('admin.search')
                        
                    </form>
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
                      <th class="text-center">Password</th>
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
                            <td class="text-center">{{$user->password}}</td>
                            <td class="text-center">{{$user->role_id}}</td>
                            <td class="text-center">
                                <a href="#" class="text-blue" id="<?php echo $user->id; ?>" name="{{$user->name}}" email="{{$user->email}}" password="{{$user->password}}" role_id="{{$user->role_id}}" data-type="update-user" data-toggle="modal">
                                    <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>
                            </td>
                            
                            <td class="text-center">
                                <a class="text-red" href="#" id="<?php echo $user->id; ?>" data-type="delete-user" data-toggle="modal">
                                    <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>

                            </td>
                        </tr>

                    @endforeach

                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
    <!-- /.content -->

 <div class="modal fade" id="myModal-user" role="dialog">
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" style="text-align: center;"><b>Add User</b></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="col-sm-11">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 5px;"><b>Name: </b></label>

                                    <div class="col-sm-9" style="margin-left: -15px; width: 380px;">
                                        <input type="text" id="name_user" placeholder="Enter name ..." class="form-control" name="email-user"/>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-11" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 5px;"><b>Email: </b></label>

                                    <div class="col-sm-9" style="margin-left: -15px; width: 380px;">
                                        <input type="text" id="email_user" placeholder="Enter email ..." class="form-control" name="password-user"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-11" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 5px;"><b>Password: </b></label>

                                    <div class="col-sm-9" style="margin-left: -15px; width: 380px;">
                                        <input type="text" id="password_user" placeholder="Enter password ..." class="form-control" name="first-name"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-11" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label style="margin-top: 5px;" class="control-label col-sm-3 no-padding-right" for="password2"><b>Role:</b></label>
                                    <div class="col-sm-9" style="margin-left: -15px; width: 382px;">
                                        <select class="form-control" id="role_id_user">
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
                  <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                        <i class="ace-icon fa fa-times red2"></i>
                        Close
                    </button>
                    <button class="btn btn-white btn-bold" type="submit" id="add-user">
                        <i class="ace-icon fa fa-check bigger-110 green"></i>
                        Add
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

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
                            <!-- PAGE CONTENT BEGINS -->

                            <!-- <div class="col-sm-11">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 5px;">Name: </label>

                                    <div class="col-sm-9" style="margin-left: -15px; width: 380px;">
                                        <input type="text" id="user_name" placeholder="Enter name ..." class="form-control" name="email-user"/>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-11" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 5px;">Email: </label>

                                    <div class="col-sm-9" style="margin-left: -15px; width: 380px;">
                                        <input type="text" id="user_email" placeholder="Enter email ..." class="form-control" name="password-user"/>
                                    </div>
                                </div>

                            </div> -->

                            <!-- <div class="col-sm-11" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 5px;">Password: </label>

                                    <div class="col-sm-9" style="margin-left: -15px; width: 380px;">
                                        <input type="text" id="user_password" placeholder="Enter password ..." class="form-control" name="first-name"/>
                                    </div>
                                </div>

                            </div> -->

                            <div class="col-sm-11" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label style="margin-top: 5px;" class="control-label col-sm-3 no-padding-right" for="password2"><b>Role:</b></label>
                                    <div class="col-sm-9" style="margin-left: -15px; width: 382px;">
                                        <select class="form-control" id="role_id-member">
                                            <option value=""></option>
                                            @foreach($listR as $role)
                                                <option value="<?php echo $role->id; ?>">{{$role->type}}</option>
                                            @endforeach
                                    
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-11" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="control-label col-sm-3 no-padding-right" for="password2" style="margin-top: 5px;"><b>Role:</b></label>

                                    <div class="input-group " style="width: 382px;" >

                                        <select class="form-control" id="role_id-user">
                                            <option value=""></option>
                                            @foreach($listR as $role)
                                                <option value="<?php echo $role->id; ?>">{{$role->type}}</option>
                                            @endforeach
                                    
                                        </select>
                                      /btn-group
                                      <input type="hidden" class="form-control" id="role_id_user">
                                      <input type="text" class="form-control" id="role_user">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <br/>
                <div class="modal-footer">
                    <input type="hidden" id="user_id_" name="user-id" value="" />
                    <input type="hidden" id="name" value="" />
                    <input type="hidden" id="email" value="" />
                    <input type="hidden" id="password" value="" />
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
                            <button class="btn btn-white btn-warning btn-bold" id="delete-user">
                                <i class="ace-icon fa fa-trash-o bigger-120 orange"></i>
                                Delete
                            </button>

                </div>
            <!-- </form> -->


        </div>
    </div>
</div>



@endsection



