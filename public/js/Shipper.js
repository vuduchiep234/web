
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
        var data = {};
        data.id = parseInt(id);
        if(name !== _name){
        	data.name = name;
        }

        if(phone !== _phone){
            data.phone = phone;
        }

        if(state !== _state){
            data.state = state;
        }

        console.log(data);
    	$.ajax({
            
            url: '/api/v1/shippers/'+id,
            type: 'patch',
            data: data,
            success: function(res) { 
                alert("Success !");
                $('#editModal-shipper').modal('hide');
                loaddata_shipper(id);

            },
            error: function(err){
                alert("Fail !");
                console.log(err);
                $('#editModal-shipper').modal('hide');
            }
    	});
        

        // if(state !== _state){
        // 	$.ajax({
                
        //         url: '/api/v1/shippers/'+id,
        //         type: 'patch',
        //         data: {state: state, id: id},
        //         success: function(res) {
        //             alert("Success !");
        //             $('#editModal-shipper').modal('hide');
        //             loaddata_shipper(id);
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
                    $("tr[row_id_shipper="+id+"]").remove();

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

                    output =   "<tr row_id_shipper="+data[i].id+">"
                                    +"<td class='center'>"+data[i].id+"</td>"
                                    +"<td class='center'>"+data[i].name+"</td>"
                                    +"<td class='center'>"+data[i].phone+"</td>"
                                    +"<td class='center'>"+data[i].state+"</td>"
                        
                                    +"<td class='center'>"
                                        +"<a href='#' class='blue' data-toggle='modal' id_edit_shipper="+data[i].id+" data-type='update-shipper' name="+data[i].name+">"
                                            +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
                                        +"</a>"
                                    +"</td>"
                                    +"<td class='center'>"
                                        +"<a href='#' class='red delete_shipper' id_delete_shipper="+data[i].id+" data-type='delete-shipper' data-toggle='modal'>"
                                            +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                                        +"</a>"
                                    +"</td>"
                                    
                                +"</tr>";

                }
                if(i >= 2){
                    $("tr[row_id_shipper="+data[i-2].id+"]").after(output);
                }
                else{
                    $("#body_list_shipper").html(output);
                }
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

    function loaddata_shipper(id){
        $.ajax({
                    
            url: '/api/v1/shippers?id='+id,
            type: 'get',
            dataType: 'json',
            success: function(data) {
                var output = "";
                // for(var i = 0; i < data.length; i++){

                    output =   
                                    "<td class='text-center'>"+data.data.id+"</td>"
                                    +"<td class='text-center'>"+data.data.name+"</td>"
                                    +"<td class='text-center'>"+data.data.phone+"</td>"
                                    +"<td class='text-center'>"+data.data.state+"</td>"
                        
                                    +"<td class='text-center'>"
                                        +"<a href='#' class='blue' data-toggle='modal' id_edit_shipper="+data.data.id+" data-type='update-shipper'>"
                                            +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
                                        +"</a>"
                                    +"</td>"
                                    +"<td class='text-center'>"
                                        +"<a href='#' class='red delete_shipper' id_delete_shipper="+data.data.id+" data-type='delete-shipper' data-toggle='modal'>"
                                            +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                                        +"</a>"
                                    +"</td>"
                                    
                                ;

                // }
                $("tr[row_id_shipper="+data.data.id+"]").html(output);
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

    $('#search_shipper').on('click',function(){
        // alert(1);
        var value=$('#data_search').val();
        // alert(value);
        $.ajax({
            type : 'get',
            url : '/searchShipper',
            data: {'data_search':value},
            success:function(data){
                // console.log(data);
                $('#body_list_shipper').html(data);

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
                
            },
            error: function(err){
                alert("fail");
                console.log(err);
            }
        });
    });

});