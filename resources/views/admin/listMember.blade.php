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
                    <a href="{{route('listMember')}}">Quản lý thành viên</a>
                </li>
                <li class="active">Danh sách thành viên</li>

            </ul><!-- /.breadcrumb -->
 
        </div>
        <div class="page-content">
            <!-- <c:ì tét="$Ơ != null}">
                <h4 class="pink">
                    <i class="ace-icon fa fa-hand-o-right icon-animated-hand-pointer blue"></i>

                    <a class="green" data-toggle="modal">Chua co thanh vien nao</a>
                </h4>
                <div class="hr hr-18 dotted hr-double"></div>
            </c:ì> -->

            <div class="row" >
                <div class="col-xs-12">
                    <h4>Danh sach thanh vien</h4> 
                    
                    <button class="btn btn-sm btn-success" data-toggle="modal" id="addMember">
                        <i class=" "></i>
                        Them moi
                        
                    </button>
                </div>
                <div style="margin-left: 700px; margin-top: -46px; margin-right: 10px;">    
                    <form method="get" action="{{route('listMember/search')}}" id="form_search_member">
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
                                        <!-- 'email', 'first_name', 'last_name', 'password', 'phone', 'role_id', 'image_id' -->
                                        <th class="center">
                                            ID
                                        </th>
                                        <th class="center">
                                            Email
                                        </th>
                                        <th class="center">
                                            Mật khẩu
                                        </th>
                                        <th class="center">
                                            Họ
                                        </th>
                                        <th class="center">
                                            Tên
                                        </th>
                                        <th class="center">
                                            Điện thoại
                                        </th>
                                        <th class="center">
                                            Phân quyền
                                        </th>
                                        <th class="center">
                                            Image
                                        </th>
                                        <th class="center">
                                            Sửa
                                        </th><th class="center">
                                            Xóa
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($list as $member)
                                    <tr id="<?php echo $member->id; ?>">
                                        <td data-target="idMember">{{ $member->id }}</td>
                                        <td data-target="emailMember">{{ $member->email }}</td>
                                        <td data-target="passwordMember">{{ $member->password }}</td>
                                        <td data-target="first_name">{{ $member->first_name }}</td>
                                        <td data-target="last_name">{{ $member->last_name }}</td>
                                        <td data-target="phoneMember">{{ $member->phone }}</td>
                                        <td data-target="role_id">{{ $member->role_id }}</td>
                                        <td data-target="image_id">{{ $member->image_id }}</td>

                                        <td class="center">
                                            <a href="#" class="green edit-member" id="<?php echo $member->id; ?>" member-email="{{$member->email}}" member-password="{{$member->password}}" member-first_name="{{$member->first_name}}" member-last_name="{{$member->last_name}}" member-phone="{{$member->phone}}" member-role_id="{{ $member->role_id }}" member-image_id="{{ $member->image_id }}" data-role="update-member" data-toggle="modal">
                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                            </a>
                                        </td>
                                        
                                        <td class="center">
                                            <a class="red" href="#" id="<?php echo $member->id; ?>" data-role="delete-member" data-toggle="modal">
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

<div class="modal fade" id="myModal-member" role="dialog">
    <div class="modal-dialog">

        <form action="" method="get" id="form-member">
            <!-- Modal content-->
            {{csrf_field()}}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thông tin thành viên</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->

                            <div class="col-sm-9">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Email: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="email-member" placeholder="Nhập email" class="form-control" name="email-member"/>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Mật khẩu: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="password-member" placeholder="Nhập mật khẩu" class="form-control" name="password-member"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Họ: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="first_name-member" placeholder="Nhập họ" class="form-control" name="first-name"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tên: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="last_name-member" placeholder="Nhập tên" class="form-control" name="last-name"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Điện thoại: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="phone-member" placeholder="Nhập số điện thoại" class="form-control" name="phone-member"/>
                                    </div>
                                </div>

                            </div>

                             <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2">Phân quyền:</label>
                                    <div class="col-xs-12 col-sm-9" style="width: 300px;">
                                        <select class="form-control" id="role_id-member">
                                            <option value=""></option>
                                            @foreach($listRole as $role)
                                                <option value="<?php echo $role->id; ?>">{{$role->type}}</option>
                                            @endforeach
                                    
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2">Image:</label>
                                    <div class="col-xs-12 col-sm-9" style="width: 300px;">
                                        <select class="form-control" id="image_id-member">
                                            <option value=""></option>
                                            @foreach($listImage as $image)
                                                <option value="<?php echo $image->id; ?>">{{$image->name}}</option>
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
                    <button class="btn btn-info" type="submit" id="add-member">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Thêm
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="editModal-member" role="dialog">
    <div class="modal-dialog">

        <form method="get" action="">
            <input type="hidden" name="_method" value="patch">
            {{csrf_field()}}
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thông tin thành viên</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->

                            <div class="col-sm-9">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Email: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="member-email" placeholder="Nhập email" class="form-control" name="member-email"/>
                                    </div>
                                </div>

                            </div>
                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Mật khẩu: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="member-password" placeholder="Nhập mật khẩu" class="form-control" name="member-password"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Họ: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="first-name" placeholder="Nhập họ" class="form-control" name="first-name"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Tên: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="last-name" placeholder="Nhập tên" class="form-control" name="last-name"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Điện thoại: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="member-phone" placeholder="Nhập số điện thoại" class="form-control" name="member-phone"/>
                                    </div>
                                </div>

                            </div>

                             <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2">Phân quyền:</label>
                                    <div class="col-xs-12 col-sm-9" style="width: 300px;">
                                        <select class="form-control" id="member-role_id">
                                            <option value=""></option>
                                            @foreach($listRole as $role)
                                                <option value="<?php echo $role->id; ?>">{{$role->type}}</option>
                                            @endforeach
                                
                                    
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2">Image:</label>
                                    <div class="col-xs-12 col-sm-9" style="width: 300px;">
                                        <select class="form-control" id="member-image_id">
                                            <option value=""></option>
                                            @foreach($listImage as $image)
                                                <option value="<?php echo $image->id; ?>">{{$image->name}}</option>
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
                    <input type="hidden" id="member-id" name="member-id" value="" />
                    <input type="hidden" id="_email" value="" />
                    <input type="hidden" id="_password" value="" />
                    <input type="hidden" id="_firt-name" value="" />
                    <input type="hidden" id="_last-name" value="" />
                    <input type="hidden" id="_phone" value="" />
                    <input type="hidden" id="_role-id" value="" />
                    <input type="hidden" id="_image-id" value="" />
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
                    <input class="btn btn-info" type="submit" value="Edit" id="_edit-member" >

                </div>
            </div>
        </form>
    </div>
</div>


<div class="modal fade" id="deleteModal-member" role="dialog">
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
                    <input type="hidden" id="member-delete" value="" />
                    <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                        <i class="ace-icon fa fa-times red2"></i>
                        Đóng
                    </button>
                    <button class="btn btn-white btn-warning btn-bold" id="_delete-member">
                        <i class="ace-icon fa fa-trash-o bigger-120 orange"></i>
                        Xóa
                    </button>
                    
                </div>
            </form>
                
            
        </div>
    </div>
</div>


@endsection