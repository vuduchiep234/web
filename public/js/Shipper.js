
jQuery(function($) {

	$('#addShipper').click(function(){

        $('#shipper-name').val("");
        $('#shipper-phone').val("");
        $('#shipper-state').val("");
        $('#myModal-shipper').modal('show');
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
                alert("Success !");
                $('#myModal-shipper').modal('hide');
                load_data_shipper();

            },
            error: function(err){
                alert("Fail !");
                $('#myModal-shipper').modal('hide');
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

        // if(name !== _name){
        // 	$.ajax({
                
        //         url: '/api/v1/shippers/'+id,
        //         type: 'patch',
        //         data: {name: name, _method: "patch"},
        //         success: function(res) {

        //         }
        // 	});
        // }

        if(phone !== _phone){
        	$.ajax({
                
                url: '/api/v1/shippers/'+id,
                type: 'patch',
                data: {phone: phone},
                success: function(res) {
                    alert("Success !");
                    $('#editModal-shipper').modal('hide');
                    load_data_shipper();

                },
                error: function(err){
                    alert("Fail !");
                    $('#editModal-shipper').modal('hide');
                }
        	});
        }

        // if(state !== _state){
        // 	$.ajax({
                
        //         url: '/api/v1/shippers/'+id,
        //         type: 'patch',
        //         data: {state: state, _method: "patch"},
        //         success: function(res) {

        //         }
        // 	});
        // }

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
                    alert("Success !");
                    $('#deleteModal-shipper').modal('hide');
                    load_data_shipper();

                },
                error: function(err){
                    alert("Fail !");
                    $('#deleteModal-shipper').modal('hide');
                }
        });

	});

    function load_data_shipper(){
        $.ajax({
                    
            url: '/api/v1/shippers/'+'all',
            type: 'get',
            dataType: 'json',
            success: function(data) {
                var output = "";
                for(var i = 0; i < data.length; i++){

                    output +=   "<tr>"
                                    +"<td class='text-center'>"+data[i].id+"</td>"
                                    +"<td class='text-center'>"+data[i].name+"</td>"
                                    +"<td class='text-center'>"+data[i].phone+"</td>"
                                    +"<td class='text-center'>"+data[i].state+"</td>"
                        
                                    +"<td class='text-center'>"
                                        +"<a href='#' class='blue' data-toggle='modal' id_edit_shipper="+data[i].id+" data-type='update-shipper' name="+data[i].name+">"
                                            +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
                                        +"</a>"
                                    +"</td>"
                                    +"<td class='text-center'>"
                                        +"<a href='#' class='red delete_shipper' id_delete_shipper="+data[i].id+" data-type='delete-shipper' data-toggle='modal'>"
                                            +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                                        +"</a>"
                                    +"</td>"
                                    
                                +"</tr>";

                }
                $('#body_list_shipper').html(output);
                $('a[data-type=update-shipper]').on('click', function(){


                    var id = $(this).attr("id_edit_shipper");
                    // var name = $(this).attr("name");
                    // alert(id);

                    $.ajax({
            
                        url: '/api/v1/shippers?id='+id,
                        type: 'get',
                        dataType: 'json',
                        success: function(data) {
                            // console.log(data.data.type);
                            // name = data.type;
                            // alert(data.data.type);
                            $('#name-shipper').val(data.data.name);
                            $('#phone-shipper').val(data.data.phone);
                            $('#state-shipper').val(data.data.state);

                            $('#_nameShipper').val(data.data.name);
                            $('#_phoneShipper').val(data.data.phone);
                            $('#_stateShipper').val(data.data.state);
                        },
                        error: function(mess){
                            alert("Loi gi nay");
                            // console.log(mess);
                        }
                    });

                    // alert(name);

                    
                    $('#shipper-id').val(id);
                    $('#editModal-shipper').modal('show');
                });

                $('a[data-type=delete-shipper]').on('click', function(){

                    var id = $(this).attr("id_delete_shipper");

                    $('#shipper-delete').val(id);
                    $('#deleteModal-shipper').modal('show');
                    
                });



                // alert('success');
            },
            error: function(err){
                alert("Error load data");
            }
        });
    }

});