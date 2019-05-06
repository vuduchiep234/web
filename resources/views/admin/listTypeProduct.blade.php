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
                <li class="active">Loai san pham</li>

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
                <div class="col-xs-12" >
                    <h4>Danh sach Phan quyen</h4> 
                    
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
                </div>
                
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
                                            Sua
                                        </th><th class="center">
                                            Xoa
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($list as $cate)
                                    <tr id="<?php echo $cate->id; ?>">
                                        <td data-target="idCate">{{ $cate->id }}</td>
                                        <td data-target="typeCate">{{ $cate->type }}</td>
                                        <td class="center">
                                            <a href="#" class="green edit-cate" id="<?php echo $cate->id; ?>" data-type="{{$cate->type}}" data-role="update" data-toggle="modal">
                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                            </a>
                                        </td>
                                        
                                        <td class="center">
                                            <a class="red" href="#" id="<?php echo $cate->id; ?>" data-role="delete" data-toggle="modal">
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
            <form method="get" id="form-cate">
                
                <!-- Modal content-->
                
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Thong tin loai san pham</h4>
                    </div>
                    <div class="modal-body">
                        <!-- <input type="hidden" id="csrf-token" value="{{ Session::token() }}" /> -->
                        {{csrf_field()}}
                        <span id="form_output"></span>
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Type: </label>

                                        <div class="col-sm-9">
                                            <input type="text"  id="form-field-1-1" placeholder="Nhap loai san pham" class="form-control" name="type-cate"/>
                                        </div>
                                        <span style="color: red; margin-left: 112px;" id="error-cate" ></span>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>  
                    
                    <div class="modal-footer">
                        <input type="hidden" id="button-action" value="insert" />
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <input class="btn btn-info" type="submit" value="Add" id="action" >
                        
                    </div>
                
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog">
        
        <div class="modal-content">
            <form method="get" id="form-cate" >
                <!-- action="{{route('listTypeProduct/editCategory')}}" -->
                <!-- Modal content-->
                <input type="hidden" name="_method" value="patch">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Thong tin loai san pham</h4>
                    </div>
                    <div class="modal-body">
                        <!-- <input type="hidden" id="csrf-token" value="{{ Session::token() }}" /> -->
                        {{csrf_field()}}
                        <span id="form_output"></span>
                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Type: </label>

                                        <div class="col-sm-9">
                                            <input type="text" data-type="edit" id="_type-cate" placeholder="Nhap loai san pham" class="form-control" name="cate-type" />
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>  
                    
                    <div class="modal-footer">
                        <input type="hidden" id="cate-id" name="cate-id" value="" />
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Đóng</button>
                        <input class="btn btn-info" type="submit" value="Edit" id="_edit-cate" >
                        
                    </div>
                
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="deleteModal" role="dialog">
            <div class="modal-dialog">
                
                <div class="modal-content">
                    <form method="get" class="form-delete">
                        <input type="hidden" name="_method" value="delete">
                        {{csrf_field()}}
                    
                <!-- Modal content-->
                
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Delete Form</h4>
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
                            <input type="hidden" id="button-delete" value="" />
                            <button class="btn btn-white btn-round pull-left" data-dismiss="modal">
                                <i class="ace-icon fa fa-times red2"></i>
                                Cancel
                            </button>
                            <button class="btn btn-white btn-warning btn-bold" id="_delete-cate">
                                <i class="ace-icon fa fa-trash-o bigger-120 orange"></i>
                                Delete
                            </button>
                            
                        </div>
                    </form>
                        
                    
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