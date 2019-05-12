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
                <li class="active">Producer</li>

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

                    <div class="col-xs-12">
                        <h3 class="box-title"><b>Producer</b></h3>
                        <button class="btn btn-sm btn-success" data-toggle="modal" id="addProducer" style="float: right; margin-top: -40px;">
                        <i class="ace-icon fa fa-plus bigger-110 white"></i>
                            <b>Add</b>

                        </button>
                    </div>

                    <!-- <div class="row">
                        <div class="col-xs-12">
                            <h4 >Danh sach nha san xuat</h4> 
                            <button class="btn btn-sm btn-success" data-toggle="modal" id="addProducer">
                                <i class=" "></i>
                                Them moi
                                
                            </button>

                           

                        </div>
                        <div style="margin-left: 700px; margin-top: -46px; margin-right: 10px;">    
                                <form method="get" action="{{route('listProducer/search')}}" id="form_search_producer">
                                    {{csrf_field()}}
                                    @include('admin.search')
                                    
                                </form>
                            </div>

                    </div> -->
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
                                            Address
                                        </th>
                                        <th class="center">
                                            Email
                                        </th>
                                        <th class="center">
                                            Phone
                                        </th>
                                        
                                        <th class="center">
                                            Edit
                                        </th><th class="center">
                                            Delete
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="body_list_producer">

                                    @foreach($list as $producer)
                                    <tr id="<?php echo $producer->id; ?>">
                                        <td class="center" data-target="idProducer">{{ $producer->id }}</td>
                                        <td class="center" data-target="nameProducer">{{ $producer->name }}</td>
                                        <td class="center" data-target="addressProducer">{{ $producer->address }}</td>
                                        <td class="center" data-target="emailProducer">{{ $producer->email }}</td>
                                        <td class="center" data-target="phoneProducer">{{ $producer->phone }}</td>

                                        <td class="center">
                                            <a href="#" class="blue edit-producer" id="<?php echo $producer->id; ?>" data-name="{{$producer->name}}" data-address="{{$producer->address}}" data-phone="{{$producer->phone}}" data-email="{{$producer->email}}" data-role="update-producer" data-toggle="modal">
                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                            </a>
                                        </td>
                                        
                                        <td class="center">
                                            <a class="red" href="#" id="<?php echo $producer->id; ?>" data-role="delete-producer" data-toggle="modal">
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
<div class="modal fade" id="myModal-producer" role="dialog">
    <div class="modal-dialog">

        <!--  -->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" style="text-align: center;">Add Producer</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            
                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;">Name: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="producer-name" placeholder="Enter producer name ..." class="form-control" name="producer-name" style="width: 400px; margin-top: 0px;"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;">Address: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="producer-address" placeholder="Enter address ..." class="form-control" name="producer-address" style="width: 400px; margin-top: 0px;"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;">Email: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="producer-email" placeholder="Enter email ..." class="form-control" name="producer-email" style="width: 400px; margin-top: 0px;"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;">Phone: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="producer-phone" placeholder="Enter phone number ..." class="form-control" name="producer-phone" style="width: 400px; margin-top: 0px;"/>
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
                    <button class="btn btn-white btn-bold" type="submit" id="add-producer">
                        <i class="ace-icon fa fa-check bigger-110 green"></i>
                        Add
                    </button>
                </div>
            </div>
        <!-- </form> -->
    </div>
</div>

<div class="modal fade" id="editModal-producer" role="dialog">
    <div class="modal-dialog">
        
        <div class="modal-content">
            
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" style="text-align: center;">Edit Producer</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            
                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;">Name: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="name-producer" placeholder="Enter producer name ..." class="form-control" name="name-producer" style="width: 400px; margin-top: 0px;"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;">Address: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="address-producer" placeholder="Enter address ..." class="form-control" name="address-producer" style="width: 400px; margin-top: 0px;"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;">Email: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="email-producer" placeholder="Enter email ..." class="form-control" name="email-producer" style="width: 400px; margin-top: 0px;"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;">Phone: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="phone-producer" placeholder="Enter phone number ..." class="form-control" name="phone-producer" style="width: 400px; margin-top: 0px;"/>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>

                </div>  
                <br/>
                <div class="modal-footer">
                    <input type="hidden" id="producer-id" name="producer-id" value=""/>
                    <input type="hidden" id="_name" value=""/>
                    <input type="hidden" id="_phone" value=""/>
                    <input type="hidden" id="_email" value=""/>
                    <input type="hidden" id="_address" value=""/>
                    <input type="hidden" id="flag_producer" value=""/>
                    <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                        <i class="ace-icon fa fa-times red2"></i>
                        Close
                    </button>
                    <button class="btn btn-white btn-bold" type="submit" id="edit-producer">
                        <i class="ace-icon fa fa-check bigger-110 blue"></i>
                        Edit
                    </button>
                </div>
            </div>
        <!-- </form> -->
    </div>
</div>


<div class="modal fade" id="deleteModal-producer" role="dialog">
            <div class="modal-dialog">
                
                <div class="modal-content">
                    <!-- <form method="get" class="form-delete">
                        <input type="hidden" name="_method" value="delete">
                        {{csrf_field()}}
                     -->
                <!-- Modal content-->
                
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h3 class="modal-title" style=" text-align: center;">Confirm</h3>
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
                            <input type="hidden" id="producer-delete_id" value="" />
                            <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                                <i class="ace-icon fa fa-times red2"></i>
                                Cancel
                            </button>
                            <button class="btn btn-white btn-warning btn-bold" id="_delete-producer">
                                <i class="ace-icon fa fa-trash-o bigger-120 orange"></i>
                                Delete
                            </button>
                            
                        </div>
                    <!-- </form> -->
                        
                    
                </div>
            </div>
</div>


@endsection