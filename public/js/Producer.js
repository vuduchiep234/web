
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
            error: function(err){
                alert('Error! Please, try again.');
                $('#myModal-producer').modal('hide');
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
        
        var data = {};
        data.id = parseInt(id);
        if(name !== _name){
            data.name = name;
        }

        if(phone !== _phone){
            data.phone = phone;
        }

        if(email !== _email){
            data.email = email;
        }

        if(address !== _address){
            data.address = address;
        }
        console.log(data);
        $.ajax({
                
            url: '/api/v1/producers/'+id,
            type: 'patch',
            data: data,
            success: function(res) {
                alert("Success !");
                $('#editModal-producer').modal('hide');
                loaddata_producer(id);

            },
            error: function(err){
                alert('Error! Please, try again.');
                $('#editModal-producer').modal('hide');
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
                $("tr[row_id_producer="+id+"]").remove();
            },
            error: function(err){
                alert('Error! Please, try again.');
                $('#deleteModal-producer').modal('hide');
            }
        });
    	
    });

    $('#search').on('click',function(){
        // alert(1);
        var value=$('#data_search').val();
        // alert(value);
        $.ajax({
            type : 'get',
            url : '/searchProducer',
            data: {'data_search':value},
            success:function(data){
                // console.log(data);
                $('#body_list_producer').html(data);

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
                
            },
            error: function(err){
                alert("fail");
                console.log(err);
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

                    output =   "<tr row_id_producer="+data[i].id+">"
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

                if(i >= 2){
                    $("tr[row_id_producer="+data[i-2].id+"]").after(output);
                }
                else{
                    $("#body_list_producer").html(output);
                }
               
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

    function loaddata_producer(id){
        $.ajax({
                    
            url: '/api/v1/producers/'+id,
            type: 'get',
            dataType: 'json',
            success: function(data) {
                var output = "";
                
                    output =   
                                    "<td class='text-center'>"+data.data.id+"</td>"
                                    +"<td class='text-center'>"+data.data.name+"</td>"
                                    +"<td class='text-center'>"+data.data.address+"</td>"
                                    +"<td class='text-center'>"+data.data.email+"</td>"
                                    +"<td class='text-center'>"+data.data.phone+"</td>"
                                    +"<td class='text-center'>"
                                        +"<a href='#' class='blue' data-toggle='modal' id_edit_producer="+data.data.id+" data-type='update-producer'>"
                                            +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
                                        +"</a>"
                                    +"</td>"
                                    +"<td class='text-center'>"
                                        +"<a href='#' class='red delete_producer' id_delete_producer="+data.data.id+" data-type='delete-producer' data-toggle='modal'>"
                                            +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                                        +"</a>"
                                    +"</td>"
                                    
                                ;

                
                $("tr[row_id_producer="+data.data.id+"]").html(output);
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