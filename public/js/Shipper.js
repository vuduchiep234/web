
jQuery(function($) {

	$('#addShipper').click(function(){

        $('#myModal-shipper').modal('show');
        $('#form-shipper')[0].reset();
        
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });

	$('#add-shipper').on('click', function(){

		
		var name = $('#shipper-name').val();
		var phone = $('#shipper-phone').val();
		var state = $( "select#shipper-state option:checked" ).val();
		// alert(state);
		
		$.ajax({
            type: 'post',
            url: "/api/v1/shippers",
            dataType: "json",
            data: {
                0: {
                    name: name,
                    phone: phone,
                    state: state
                }
            },
            success: function (response) {
            	// alert("Success");
            	// return back();
            }
        });
	});

    $('a[data-role=update-shipper]').on('click', function(){


    	var id = $(this).attr("id");
    	var name = $(this).attr("shipper-name");
    	var phone = $(this).attr("shipper-phone");
    	var state = $(this).attr("shipper-state");
    	

    	$('#name-shipper').val(name);
    	$('#phone-shipper').val(phone);
    	$('#state-shipper').val(state);

    	$('#_nameShipper').val(name);
    	$('#_phoneShipper').val(phone);
    	$('#_stateShipper').val(state);

    	$('#shipper-id').val(id);
    	$('#editModal-shipper').modal('show');
    });

    $('#edit-shipper').on('click', function () {

        var id=$('#shipper-id').val();
        var name=$('#name-shipper').val();
        var phone=$('#phone-shipper').val();
        var state = $( "select#state-shipper option:checked" ).val();
        // alert(name);
        var _name = $('#_nameShipper').val();
        var _phone = $('#_phoneShipper').val();
        var _state = $('#_stateShipper').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        if(name !== _name){
        	$.ajax({
                
                url: '/api/v1/shippers/'+id,
                type: 'patch',
                data: {name: name, _method: "patch"},
                success: function(res) {

                }
        	});
        }

        if(phone !== _phone){
        	$.ajax({
                
                url: '/api/v1/shippers/'+id,
                type: 'patch',
                data: {phone: phone, _method: "patch"},
                success: function(res) {

                }
        	});
        }

        if(state !== _state){
        	$.ajax({
                
                url: '/api/v1/shippers/'+id,
                type: 'patch',
                data: {state: state, _method: "patch"},
                success: function(res) {

                }
        	});
        }

        // $.ajax({
                
        //         url: '/api/v1/shippers/'+id,
        //         type: 'patch',
        //         data: {name: name, phone: phone, state: state, _method: "patch"},
        //         success: function(res) {

        //         }
        // });
    });

    $('a[data-role=delete-shipper]').on('click', function(){

    	var id = $(this).attr("id");

        $('#shipper-delete').val(id);
		$('#deleteModal-shipper').modal('show');
		


    });
    $('#_delete-shipper').on('click', function(){

    	var id = $('#shipper-delete').val();
        // alert(id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $.ajax({
                
                url: '/api/v1/shippers/'+id,
                type: 'delete',
                data: {id: id, _method: "delete"},
                success: function(res) {

                }
        });

	});


});