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
                    <a href="{{route('listProduct')}}">Quan ly san pham</a>
                </li>
                <li class="active">Nha san xuat</li>

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

                    </div>
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
                                            Ten nha san xuat
                                        </th>
                                        <th class="center">
                                            Dia chi
                                        </th>
                                        <th class="center">
                                            Email
                                        </th>
                                        <th class="center">
                                            Dien thoai
                                        </th>
                                        
                                        <th class="center">
                                            Sua
                                        </th><th class="center">
                                            Xoa
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($list as $producer)
                                    <tr id="<?php echo $producer->id; ?>">
                                        <td data-target="idProducer">{{ $producer->id }}</td>
                                        <td data-target="nameProducer">{{ $producer->name }}</td>
                                        <td data-target="addressProducer">{{ $producer->address }}</td>
                                        <td data-target="emailProducer">{{ $producer->email }}</td>
                                        <td data-target="phoneProducer">{{ $producer->phone }}</td>

                                        <td class="center">
                                            <a href="#" class="green edit-producer" id="<?php echo $producer->id; ?>" data-name="{{$producer->name}}" data-address="{{$producer->address}}" data-phone="{{$producer->phone}}" data-email="{{$producer->email}}" data-role="update-producer" data-toggle="modal">
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

        <form action="" method="get" id="form-producer">
            <!-- Modal content-->
            {{csrf_field()}}
            <div class="modal-content">
                <div class="modal-header" style="background: #1B9B25;">
                    <button type="button" class="close" data-dismiss="modal" style="color: white;">&times;</button>
                    <h3 class="modal-title" style="text-align: center; color: white;">Thong tin nha san xuat</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            
                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;">Ten NSX: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="producer-name" placeholder="Nhap ten nha san xuat" class="form-control" name="producer-name"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;">Dia chi: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="producer-address" placeholder="Nhap dia chi" class="form-control" name="producer-address"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;">Email: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="producer-email" placeholder="Nhap email" class="form-control" name="producer-email"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;">Dien thoai: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="producer-phone" placeholder="Nhap so dien thoai" class="form-control" name="producer-phone"/>
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>

                </div>  
                <br/>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    
                    <button class="btn btn-info" type="submit" id="add-producer">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Them
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="editModal-producer" role="dialog">
    <div class="modal-dialog">
        
        <div class="modal-content">
            <form method="get" id="form-producer">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="patch">
                <div class="modal-header" style="background: rgb(255, 183, 82);">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" style="text-align: center; color: white;">Thong tin nha san xuat</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            
                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;">Ten NSX: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="name-producer" placeholder="Nhap ten nha san xuat" class="form-control" name="name-producer"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;">Dia chi: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="address-producer" placeholder="Nhap dia chi" class="form-control" name="address-producer"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;">Email: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="email-producer" placeholder="Nhap email" class="form-control" name="email-producer"/>
                                    </div>
                                </div>

                            </div>

                            <div class="col-sm-9" style="margin-top: 5px;">
                                <div class="form-group">
                                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1" style="margin-top: 7px;">Dien thoai: </label>

                                    <div class="col-sm-9">
                                        <input type="text" id="phone-producer" placeholder="Nhap so dien thoai" class="form-control" name="phone-producer"/>
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

                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    
                    <button class="btn btn-info" type="submit" id="edit-producer">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Sua
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="modal fade" id="deleteModal-producer" role="dialog">
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
                    </form>
                        
                    
                </div>
            </div>
</div>


@endsection