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

			}
		});
	});

	$('.cancel').on('click', function(){

		var id = $(this).attr('data');

		alert(id);
		$('#cancelModal').modal('show');
		$('#button-cancel').val(id);
	});

	$('#cancel-bill').on('click', function(){

		var id = $('#button-cancel').val();
		alert(id);
		$.ajax({
			url: '/api/v1/bills/cancel/'+id,
			type: 'patch',
			data: {state: "cancelled", _method: "patch"},
			success: function(data){

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

			}
		});
	});

});