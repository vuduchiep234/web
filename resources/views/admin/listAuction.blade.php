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
                    <a href="{{route('listAuction')}}">Manage Auction</a>
                </li>
                <li class="active">Auction</li>

            </ul><!-- /.breadcrumb -->

        </div>
        <div class="page-content">

            <div class="row" >

                <div class="col-xs-12">
                    <h3 class="box-title"><b>List Auction</b></h3>
                    <button class="btn btn-sm btn-success" data-toggle="modal" id="addAuction" style="float: right; margin-top: -40px;">
                    <i class="ace-icon fa fa-plus bigger-110 white"></i>
                        <b>Add</b>

                    </button>
                </div>

                <div style="margin-left: 700px; margin-top: -46px; margin-right: 10px;">

                    <!-- <form method="get" action="" id="form_search_auction"> -->
                        <!-- {{csrf_field()}} -->
                        @include('admin.search')
                        
                    <!-- </form> -->
                </div>
                
            </div>
            <br>

            <div class="row" >
                <div class="col-xs-12">

                    <div class="row">
                        <div class="col-xs-12">
                            <table id="simple-table" class="table table-auction table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">
                                            ID
                                        </th>
                                        <th class="text-center">
                                            Duration
                                        </th>
                                        
                                        <!-- <th class="text-center">
                                            Edit
                                        </th><th class="text-center">
                                            Delete
                                        </th> -->
                                    </tr>
                                </thead>
                                <tbody id="body_list_auction">

                                @foreach($list as $auction)
                                <tr row_id_auction="<?php echo $auction->id; ?>">
                                    <td class="text-center" data-target="idauction">{{ $auction->id }}</td>
                                    <td class="text-center" data-target="typeauction">{{ $auction->duration }}</td>
                                    <!-- <td class="text-center">
                                        <a href="#" class="blue edit-auction" id="<?php echo $auction->id; ?>" data-type="{{$auction->type}}" data-type="update-auction" data-toggle="modal">
                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                        </a>
                                    </td>
                                    
                                    <td class="text-center">
                                        <a class="red" href="#" id="<?php echo $auction->id; ?>" data-type="delete-auction" data-toggle="modal">
                                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                        </a>

                                    </td> -->
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
<div class="modal fade" id="myModal-auction" role="dialog">
    <div class="modal-dialog">

        <!-- <form method="get" id="form-auction">
            {{csrf_field()}} -->
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" style="text-align: center;"><b> Add Auction </b></h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <!-- PAGE CONTENT BEGINS -->
                            <div class="col-sm-9" >
                                <div class="form-group" >
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 5px;"><b>Duration:</b></label>

                                    <div class="input-group bootstrap-timepicker " style=" margin-top: 15px;">
                                        <input id="timepicker1" type="text" class="form-control">
                                        <span class="input-group-addon">
                                            <i class="fa fa-clock-o bigger-110"></i>
                                        </span>
                                    </div>

                                    <!-- <div class="col-sm-9">
                                        <input type="text" placeholder="Input duration ..." class="form-control"  name="duration" id="duration" style="width: 400px; margin-top: 15px;"/>
                                    </div> -->
                                </div>

                            </div>

                        </div>
                    </div>

                </div>  
                <br/>
                <div class="modal-footer">
                    <input type="hidden" name="creator_id" id="creator_id" value="{{Session::get('user_id')}}">
                    <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                        <i class="ace-icon fa fa-times red2"></i>
                        Close
                    </button>
                    <button class="btn btn-white btn-bold" type="submit" id="add-auction">
                        <i class="ace-icon fa fa-check bigger-110 green"></i>
                        Add
                    </button>
                </div>
            </div>
        <!-- </form> -->
    </div>
</div>

<div class="modal fade" id="editModal-auction" auction="dialog">
    <div class="modal-dialog">

        <!-- <form action="" method="get">
                    
            <input type="hidden" name="_method" value="patch">
            {{csrf_field()}} -->
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" style="text-align: center;"><b> Edit Auction </b></h3>
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
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top:  12px;"><b>Duration:</b></label>

                                    <div class="col-sm-9">
                                        <input type="text" placeholder="" class="form-control" name="_duration" id="_duration" style="width: 400px; margin-top: 5px;" />
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>  
                <br/>
                <div class="modal-footer">
                    <input type="hidden" id="creator_id_" name="creator_id_" value="{{Session::get('user_id')}}" />
                    <input type="hidden" name="duration_" id="duration_" value="">
                    <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                        <i class="ace-icon fa fa-times red2"></i>
                        Close
                    </button>
                    <button class="btn btn-white btn-bold blue" type="submit" id="edit-auction">
                        <i class="ace-icon fa fa-check bigger-110 blue"></i>
                        Edit
                    </button>
                </div>
            </div>
        <!-- </form> -->
    </div>
</div>

<div class="modal fade" id="deleteModal-auction" auction="dialog">
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
                                    <h4 class='center'>You may want to delete ?</h4>

                                </div>
                            </div>

                        </div>  
                        
                        <div class="modal-footer">
                            <input type="hidden" id="auction-delete" value="" />
                            <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                                <i class="ace-icon fa fa-times red2"></i>
                                Close
                            </button>
                            <button class="btn btn-white btn-warning btn-bold" id="_delete-auction">
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