
jQuery(function($) {

	$('#addProducer').click(function(){
        $('#producer-name').val('');
        $('#producer-email').val('');
        $('#producer-address').val('');
        $('#producer-phone').val('');
        $('#myModal-producer').modal('show');
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });

    $('#add-producer').on('click', function(){

		
		var name = $('#producer-name').val();
		var address = $('#producer-address').val();
		var email = $('#producer-email').val();
		var phone = $('#producer-phone').val();
	
		$.ajax({
            type: 'post',
            url: "/api/v1/producers",
            dataType: "json",
            data: {
                0: {
                    name: name,
                    phone: phone,
                    email: email,
                    address: address
                }
            },
            success: function (response) {
                alert("Success !");
                $('#myModal-producer').modal('hide');
                load_data_producer();
            },
            error:function(err){
            	alert("Fail !");
            }
        });
	});

	$('a[data-role=update-producer]').on('click', function(){


    	var id = $(this).attr("id");
    	var name = $(this).attr("data-name");
    	var address = $(this).attr("data-address");
    	var phone = $(this).attr("data-phone");
    	var email = $(this).attr("data-email");
    	// alert(1);

    	// $('input[data-type=edit]').val(type);
    	$('#producer-id').val(id);
    	$('#name-producer').val(name);
    	$('#address-producer').val(address);
    	$('#email-producer').val(email);
    	$('#phone-producer').val(phone);

        $('#_name').val(name);
        $('#_phone').val(phone);
        $('#_email').val(email);
        $('#_address').val(address);

    	$('#editModal-producer').modal('show');
    });

    $('#edit-producer').on('click', function () {
        var id = $('#producer-id').val();
        var name = $('#name-producer').val();
        var address = $('#address-producer').val();
        var email = $('#email-producer').val();
        var phone = $('#phone-producer').val();

        var _name = $('#_name').val();
        var _phone = $('#_phone').val();
        var _email = $('#_email').val();
        var _address = $('#_address').val();
        

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });
        
        // if(name !== _name){
        //     $.ajax({
                
        //         url: '/api/v1/producers/'+id,
        //         type: 'patch',
        //         data: {name: name},
        //         success: function(data) {
        //             $('#flag_producer').val('true');
        //             // $('#editModal-producer').modal('hide');
        //             // load_data_producer();
        //         },
        //         error: function(err){
        //             console.log(err);
        //             $('#flag_producer').val('false');
        //         }
        //     });
        // }
        // if(phone !== _phone){
        //     $.ajax({
                
        //         url: '/api/v1/producers/'+id,
        //         type: 'patch',
        //         data: {phone: phone},
        //         success: function(data) {
        //             $('#flag_producer').val('true');
        //             // $('#editModal-producer').modal('hide');
        //             // load_data_producer();
        //         },
        //         error: function(err){
        //             console.log(err);
        //             $('#flag_producer').val('false');
        //         }
        //     });
        // }

        // if(email !== _email){
        //     $.ajax({
                
        //         url: '/api/v1/producers/'+id,
        //         type: 'patch',
        //         data: {email: email},
        //         success: function(data) {
        //             $('#flag_producer').val('true');
        //             // $('#editModal-producer').modal('hide');
        //             // load_data_producer();
        //         },
        //         error: function(err){
        //             console.log(err);
        //             $('#flag_producer').val('false');
        //         }
        //     });
        // }

        // if(address !== _address){
        //     $.ajax({
                
        //         url: '/api/v1/producers/'+id,
        //         type: 'patch',
        //         data: {address: address},
        //         success: function(data) {
        //             $('#flag_producer').val('true');
        //             // $('#editModal-producer').modal('hide');
        //             // load_data_producer();
        //         },
        //         error: function(err){
        //             console.log(err);
        //             $('#flag_producer').val('false');
        //         }
        //     });
        // }

        // var flag = $('#flag_producer').val();
        // alert(flag);
        // if(flag == 'true'){
        //     alert("Success !");
        //     $('#editModal-producer').modal('hide');
        //     load_data_producer();
        // }
        // else{
        //     alert("Fail !");
        //     $('#editModal-producer').modal('hide');
        //     load_data_producer();
        // }
        // $('#flag_producer').val("");

        $.ajax({
                
                url: '/api/v1/producers/'+id,
                type: 'patch',
                data: {name: name, phone: phone, email: email, address: address},
                success: function(res) {

                }
        });
    });

    $('a[data-role=delete-producer]').on('click', function(){

    	var id = $(this).attr("id");

        $('#producer-delete_id').val(id);
		$('#deleteModal-producer').modal('show');
		


    });
    $('#_delete-producer').on('click', function(){

    	var id = $('#producer-delete_id').val();
    	// alert(id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $.ajax({
                
                url: '/api/v1/producers/'+id,
                type: 'delete',
                data: {id: id, _method: "delete"},
                success: function(res) {
                    alert("Success !");
                    $('#deleteModal-producer').modal('hide');
                    load_data_producer();
                }
        });
    	
    });
    
    function load_data_producer(){
        $.ajax({
                    
            url: '/api/v1/producers/'+'all',
            type: 'get',
            dataType: 'json',
            success: function(data) {
                var output = "";
                for(var i = 0; i < data.length; i++){

                    output +=   "<tr>"
                                    +"<td class='text-center'>"+data[i].id+"</td>"
                                    +"<td class='text-center'>"+data[i].name+"</td>"
                                    +"<td class='text-center'>"+data[i].address+"</td>"
                                    +"<td class='text-center'>"+data[i].email+"</td>"
                                    +"<td class='text-center'>"+data[i].phone+"</td>"
                                    +"<td class='text-center'>"
                                        +"<a href='#' class='blue' data-toggle='modal' id_edit_producer="+data[i].id+" data-type='update-producer' name="+data[i].name+">"
                                            +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
                                        +"</a>"
                                    +"</td>"
                                    +"<td class='text-center'>"
                                        +"<a href='#' class='red delete_producer' id_delete_producer="+data[i].id+" data-type='delete-producer' data-toggle='modal'>"
                                            +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                                        +"</a>"
                                    +"</td>"
                                    
                                +"</tr>";

                }
                $('#body_list_producer').html(output);
                $('a[data-type=update-producer]').on('click', function(){


                    var id = $(this).attr("id_edit_producer");
                    // var name = $(this).attr("name");
                    // alert(id);

                    $.ajax({
            
                        url: '/api/v1/producers?id='+id,
                        type: 'get',
                        dataType: 'json',
                        success: function(data) {
                            // console.log(data.data.type);
                            // name = data.type;
                            // alert(data.data.type);
                            $('#name-producer').val(data.data.name);
                            $('#address-producer').val(data.data.address);
                            $('#email-producer').val(data.data.email);
                            $('#phone-producer').val(data.data.phone);
                        },
                        error: function(mess){
                            alert("Loi gi nay");
                            // console.log(mess);
                        }
                    });

                    // alert(name);

                    
                    $('#producer-id').val(id);
                    $('#editModal-producer').modal('show');
                });

                $('a[data-type=delete-producer]').on('click', function(){

                    var id = $(this).attr("id_delete_producer");

                    $('#producer-delete').val(id);
                    $('#deleteModal-producer').modal('show');
                    
                });



                // alert('success');
            },
            error: function(err){
                alert("Error load data");
            }
        });
    }

});