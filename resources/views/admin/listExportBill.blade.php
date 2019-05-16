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
                    <a href="{{route('listProduct')}}">Manage Warehouse</a>
                </li>
                <li class="active">Export</li>

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

                	<div class="row">
                        <div class="col-xs-12">
                            <h4 >List Export Bill</h4> 
                            <button class="btn btn-sm btn-success" data-toggle="modal" id="addExportBill" style="float: right; margin-top: -40px;">
                        <i class="ace-icon fa fa-plus bigger-110 white"></i>
                            <b>Add</b>

                        </button>

                           

                        </div>
                        <div style="margin-left: 700px; margin-top: -46px; margin-right: 10px;">    
                            <form method="get" action="{{route('listExportBill/search')}}" id="form_search_exportBill">
                                {{csrf_field()}}
                                @include('admin.search')
                                
                            </form>
                        </div>

                    </div>
                    <br>
                    
                    <!-- <div class="row">
                        <div class="col-xs-6">
                            <div class="input-group input-group-sm">
                                <input type="text" id="datepicker" class="form-control hasDatepicker">
                                <span class="input-group-addon">
                                    <i class="ace-icon fa fa-calendar"></i>
                                </span>
                            </div>
                        </div>
                    </div> -->
                    <form method="get" action="{{route('listExportBill/between')}}">
                        {{csrf_field()}}
                        <div style="margin-left: 0px;">
                            <div style="margin-left: 80px; width: 1000px;">
                                <label class="control-label col-sm-1 " for="password2" style="margin-top: 7px;">Tu ngay:</label>
                                <div class="row">
                                    <div class="control-label col-xs-12 col-sm-3 no-padding-right">
                                        <div class="input-group">
                                            <input class="form-control date-picker" id="from_date" data-date-format="yyyy-mm-dd" type="text" name="from_date">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar bigger-110"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-left: 470px; margin-top: -50px; width: 1000px;">
                                <label  style="margin-top: 7px;" class="control-label col-sm-1 " for="password2">den:</label>
                                <div class="row" style="">
                                    <div class="control-label col-xs-12 col-sm-3 no-padding-right">
                                        <div class="input-group">
                                            <input class="form-control date-picker" id="to_date" data-date-format="yyyy-mm-dd" type="text" name="to_date">
                                            <span class="input-group-addon">
                                                <i class="fa fa-calendar bigger-110"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-left: 900px; margin-top: -34px;">
                                
                                <button class="btn btn-sm btn-success" id="between_exportBill">
                                <i class=" "></i>
                                Xac nhan
                                
                                </button>
                                
                            </div>
                            
                        </div>
                    </form>
                    
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
                                            ID nguoi tao
                                        </th>
                                        <th class="center">
                                            ID hoa don
                                        </th>
                                        <th class="center">
                                            Xu ly
                                        </th><th class="center">
                                            Xoa
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="body_exportBill">

                                    @foreach($list as $exportBill)
                                    <tr id="<?php echo $exportBill->id; ?>">
                                        <td class="center" data-target="idexportBill" style="padding-top: 13px;">{{ $exportBill->id }}</td>
                                        <td class="center" data-target="creator_id" style="padding-top: 13px;">{{ $exportBill->creator_id }}</td>
                                        <td class="center" data-target="bill_id" style="padding-top: 13px;">{{ $exportBill->bill_id }}</td>
                                        <td class="center">
                                            <div class="btn-group">
                                                <button data-toggle="dropdown" class="btn btn-sm btn-danger dropdown-toggle" aria-expanded="false">
                                                    Confirm
                                                    <i class="ace-icon fa fa-angle-down icon-on-right"></i>
                                                </button>
                                                <input type="hidden" name="exportBill-id" id="exportBill-id" value="{{$exportBill->id}}">
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="#" data="<?php echo($exportBill->id) ?>" class="done" data-toggle="modal" >Thanh cong</a>
                                                    </li>

                                                    <li class="divider"></li>

                                                    <li>
                                                        <a href="#" class="fail" data="<?php echo($exportBill->id) ?>" data-toggle="modal">That bai</a>
                                                    </li>
                                                </ul>
                                            </div>

                                        </td>
                                        
                                        <td class="center" style="padding-top: 13px;">
                                            <a class="red" href="#" id="<?php echo $exportBill->id; ?>" data-role="delete-exportBill" data-toggle="modal">
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
<div class="modal fade" id="myModal-exportBill" role="dialog">
    <div class="modal-dialog">

        <form action="" method="get" id="form-exportBill">
            <!-- Modal content-->
            {{csrf_field()}}
            <div class="modal-content">
                <div class="modal-header" style="background: #1B9B25;">
                    <button type="button" class="close" data-dismiss="modal" style="color: white;">&times;</button>
                    <h3 class="modal-title" style="text-align: center; color: white;">Thong tin hoa don xuat hang</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            
                            <!-- <div class="col-sm-12" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;">ID nguoi tao: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="exportBill-creator_id" placeholder="Nhap ID tao hoa don" class="form-control" name="exportBill-creator_id"/>
                                    </div>
                                </div>

                            </div> -->

                            <div class="col-sm-12" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;">ID hoa don: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="exportBill-bill_id" placeholder="Nhap ID hoa don" class="form-control" name="exportBill-bill_id"/>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>  
                <br/>
                <div class="modal-footer">
                    <input type="hidden" name="exportBill-creator_id" id="exportBill-creator_id" value="{{Session::get('id')}}">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    
                    <button class="btn btn-info" type="submit" id="add-exportBill">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Them
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="editModal-exportBill" role="dialog">
    <div class="modal-dialog">
        
        <div class="modal-content">
            <form method="get" id="form-exportBill">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="patch">
                <div class="modal-header" style="background: rgb(255, 183, 82);">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" style="text-align: center; color: white;">Thong tin hoa don xuat hang</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            
                            <!-- <div class="col-sm-12" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;">ID nguoi tao: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="creator_id-exportBill" placeholder="Nhap ID tao hoa don" class="form-control" name="creator_id-exportBill"/>
                                    </div>
                                </div>

                            </div> -->

                            <div class="col-sm-12" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;">ID hoa don: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="bill_id-exportBill" placeholder="Nhap ID don hang" class="form-control" name="bill_id-exportBill"/>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>  
                <br/>
                <div class="modal-footer">
                    <input type="hidden" id="id-exportBill" name="id-exportBill" value=""/>
                    <input type="hidden" id="_creator_id" value="{{Session::get('id')}}"/>
                    <input type="hidden" id="_bill_id" value=""/>
                    
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    
                    <button class="btn btn-info" type="submit" id="edit-exportBill">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Sua
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="modal fade" id="deleteModal-exportBill" role="dialog">
    <div class="modal-dialog">
        
        <div class="modal-content">
            <form method="get" class="form-delete">
                <input type="hidden" name="_method" value="delete">
                {{csrf_field()}}
            
        <!-- Modal content-->
        
                <div class="modal-header" style="background: rgb(209, 91, 71);">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" style="color: white; text-align: center;">Xac nhan yeu cau</h3>
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
                    <input type="hidden" id="exportBill-id" value="" />
                    <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                        <i class="ace-icon fa fa-times red2"></i>
                        Cancel
                    </button>
                    <button class="btn btn-white btn-warning btn-bold" id="_delete-exportBill">
                        <i class="ace-icon fa fa-trash-o bigger-120 orange"></i>
                        Delete
                    </button>
                    
                </div>
            </form>
                
            
        </div>
    </div>
</div>

<div class="modal fade" id="doneModal" role="dialog">
            <div class="modal-dialog">
                
                <div class="modal-content">
                    <form method="get" class="form-delete">
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
                                    <h4>Xac nhan don hang thanh cong ?</h4>

                                </div>
                            </div>

                        </div>  
                        
                        <div class="modal-footer">
                            <input type="hidden" id="button-done" value="" />
                            <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                                <i class="ace-icon fa fa-times red2"></i>
                                Khong
                            </button>
                            <button class="btn btn-white btn-warning btn-bold" id="done-bill">
                                <i class="ace-icon fa fa-trash-o bigger-120 orange"></i>
                                Xac nhan
                            </button>
                            
                        </div>
                    </form>
                        
                    
                </div>
            </div>
</div>


@endsection