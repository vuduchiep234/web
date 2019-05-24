jQuery(function($) {

	// $('#find-shipper').on('click', function(){

	// 	$('#myModal-findShipper').show('modal');
	// });

	$('.find-shipper').click(function(){

		var id = $(this).attr("data");
		// alert(id);
        $('#myModal-findShipper').modal('show');
        $('#id_bill').val(id);
        // $('#form-member')[0].reset();
        
    });

    $('#random').on('click', function(){

		
		// var data = $('#form-field-1-1').val();

		
    	$.ajax({
            type: 'get',
            url: "/api/v1/shippers/available",
            dataType: "json",
            success: function (data) {
            	
            	var output = "";
            	output += "<table id='simple-table' class='table  table-bordered table-hover'>"
            				+"<thead>"
            					+"<tr>"
            						+"<th>ID</th>"
            						+"<th>Ho ten</th>"
            						+"<th>Dien thoai</th>"
            						+"<th>Trang thai</th>"
            					+"</tr>"
            				+"</thead>"
            				+"<tbody>"
            					+"<tr>"
            						+"<td id="+data.id+">"+data.id+"</td>"
            						+"<td>"+data.name+"</td>"
            						+"<td>"+data.phone+"</td>"
            						+"<td>"+data.state+"</td>"
            					+"</tr>"
            				+"</tbody>"
            			+"</table>";

            	$('#bodyModal-findShipper').html(output);

            	$('#id_shipper').val(data.id);
            }
        });
		
		
	});

	$('#_findShipper').on('click', function(){

		var id_shipper = $('#id_shipper').val();
		var id_bill = $('#id_bill').val();
		// alert(id_bill);
		$.ajax({
			url: '/api/v1/bills/'+id_bill,
			type: 'patch',
			data: {state: "activated", shipper_id: id_shipper, _method: "patch"},
			success: function(data){
				alert("Success !");
				$('#myModal-findShipper').modal('hide');
				load_data_order(id_bill);
			}
		});
	});

	$('.cancel').on('click', function(){

		var id = $(this).attr('data');

		// alert(id);
		$('#cancelModal').modal('show');
		$('#button-cancel').val(id);
	});

	$('#cancel-bill').on('click', function(){

		var id = $('#button-cancel').val();
		// alert(id);
		$.ajax({
			url: '/api/v1/bills/cancel/'+id,
			type: 'patch',
			data: {state: "cancelled"},
			success: function(data){
				alert("Success !");
				$('#cancelModal').modal('hide');
				load_data_order(id);
			},
			error: function(err){
				console.log(err);
			}
		});
	});

	$('a[data-order=delete-order]').on('click', function(){

		var id = $(this).attr('id');
		$('#order-delete').val(id);
		$('#deleteModal-order').modal('show');
	});

	$('#delete-bill').on('click', function(){
		var id = $('#order-delete').val()
		// alert(id);
		$.ajax({
			url: '/api/v1/bills/'+id,
			type: 'delete',
			data: {_method: "delete"},
			success: function(data){
				alert("Success !");
				$("tr[row_id_order="+id+"]").remove();
				$('#deleteModal-order').modal('hide');
			}
		});
	});

	$('#search_order').on('click',function(){
        // alert(1);
        var value=$('#data_search').val();
        // alert(value);
        $.ajax({
            type : 'get',
            url : '/searchOrder',
            data: {'data_search':value},
            success:function(data){
                // console.log(data);
                $('#body_list_order').html(data);
                $('.find-shipper').click(function(){

					var id = $(this).attr("data");
					// alert(id);
			        $('#myModal-findShipper').modal('show');
			        $('#id_bill').val(id);
			        // $('#form-member')[0].reset();
			        
			    });

			    $('.cancel').on('click', function(){

					var id = $(this).attr('data');

					alert(id);
					$('#cancelModal').modal('show');
					$('#button-cancel').val(id);
				});

				$('a[data-order=delete-order]').on('click', function(){

					var id = $(this).attr('id');
					$('#order-delete').val(id);
					$('#deleteModal-order').modal('show');
				});
            },
            error: function(err){
                // alert("fail");
                console.log(err);
            }
        });
    });

	function load_data_order(id){
		$.ajax({
                    
            url: '/api/v1/bills/'+id,
            type: 'get',
            dataType: 'json',
            success: function(data) {
                // console.log(data);
                var output = "";
                // for(var i = 0; i < data.length; i++){

                    output =   
                                    "<td class='text-center'>"+data.data.id+"</td>"
                                    +"<td class='text-center'>"+data.data.billdetail_id+"</td>"
                                    +"<td class='text-center'>"+data.data.user_id+"</td>"
                                    +"<td class='text-center'>"+data.data.shipper_id+"</td>"
                                    +"<td class='text-center'>"+data.data.state+"</td>"
                                 //    +"<td class='center' style='padding-top: 13px;'>"
                                 //        +"<a href='#' class='green edit-cate' data-toggle='modal'>"
                                 //            +"<i class='ace-icon fa fa-eye  bigger-130'></i>"
                                 //        +"</a>"
	                                // +"</td>"
	                                +"<td class='center'>"
	                                    
	                                    +"<div class='btn-group'>"
	                                        +"<button data-toggle='dropdown' class='btn btn-sm btn-danger dropdown-toggle' aria-expanded='false'>"
	                                            +"Action"
	                                            +"<i class='ace-icon fa fa-angle-down icon-on-right'></i>"
	                                        +"</button>"
	                                        +"<input type='hidden' name='order-id' id='order-id' value="+data.data.id+">"
	                                        +"<ul class='dropdown-menu'>"
	                                            +"<li>"
	                                                +"<a href='#' data="+data.data.id+" class='find-shipper' data-toggle='modal' >Active</a>"
	                                            +"</li>"

	                                            +"<li class='divider'></li>"

	                                            +"<li>"
	                                                +"<a href='#' class='cancel' data="+data.data.id+" data-toggle='modal'>Cancel</a>"
	                                            +"</li>"
	                                        +"</ul>"
	                                    +"</div>"
	                                +"</td>"
	                                
	                                +"<td class='center' style='padding-top: 13px;'>"

	                                    +"<a class='red' href='#' id="+data.data.id+" data-order='delete-order' data-toggle='modal'>"
	                                        +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
	                                    +"</a>"

	                                +"</td>"
                                    
                                ;
                                

                // }

                $("tr[row_id_order="+data.data.id+"]").html(output);

                $('.find-shipper').click(function(){

					var id = $(this).attr("data");
					// alert(id);
			        $('#myModal-findShipper').modal('show');
			        $('#id_bill').val(id);
			        // $('#form-member')[0].reset();
			        
			    });

			    $('.cancel').on('click', function(){

					var id = $(this).attr('data');

					alert(id);
					$('#cancelModal').modal('show');
					$('#button-cancel').val(id);
				});

				$('a[data-order=delete-order]').on('click', function(){

					var id = $(this).attr('id');
					$('#order-delete').val(id);
					$('#deleteModal-order').modal('show');
				});

                
            },
            error: function(err){
                alert("Error load data");
            }
        });
	}

});