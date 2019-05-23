
jQuery(function($) {

	$('#addRole').click(function(){

        $('#myModal-role').modal('show');
        $('#type-role').val('');
        
    });

    

	$('#add-role').on('click', function(){

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }

        });
		
		var data = $('#type-role').val();
        // alert(data);
		
		$.ajax({
            type: 'post',
            url: "/api/v1/roles",
            dataType: "json",
            data: {
                0: {
                    type: data
                }
            },
            success: function (response) {
                alert('Success');
                $('#myModal-role').modal('hide');
                load_data_role();
                
            },
            error: function(err){
                alert('Error! Please, try again.');
                $('#myModal-role').modal('hide');
            }
        });
	});

    $('a[data-role=update-role]').on('click', function(){


    	var id = $(this).attr("id");
    	var type = $(this).attr("data-type");
    	// alert(type);

    	$('#role-type').val(type);
    	$('#role-id').val(id);
    	$('#editModal-role').modal('show');
    });

    $('#edit-role').on('click', function () {
        var id=$('#role-id').val();
        var data = $('#role-type').val();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $.ajax({
                
                url: '/api/v1/roles/'+id,
                type: 'patch',
                data: {type: data},
                success: function(data) {
                    alert('Success');
                    // console.log(data)
                    $('#editModal-role').modal('hide');
                    loaddata_role(id);
                },
                error: function(err){
                    alert('Error! Please, try again.');
                    $('#editModal-role').modal('hide');
                }
        });
    });

    $('a[data-role=delete-role]').on('click', function(){

    	var id = $(this).attr("id");

        $('#role-delete').val(id);
		$('#deleteModal-role').modal('show');
		


    });
    $('#_delete-role').on('click', function(){

    	var id = $('#role-delete').val();
        // alert(id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $.ajax({
                
                url: '/api/v1/roles/'+id,
                type: 'delete',
                data: {id: id, _method: "delete"},
                success: function(data) {
                    alert('Success');
                    $('#deleteModal-role').modal('hide');
                    $("tr[row_id_role="+id+"]").remove();
                },
                error: function(err){
                    alert('Error! Please, try again.');
                    $('#deleteModal-role').modal('hide');
                }
        });
    	
		
	});

    $('#search_role').on('click',function(){
        // alert(1);
        var value=$('#data_search').val();
        // alert(value);
        $.ajax({
            type : 'get',
            url : '/search',
            data: {'data_search':value},
            success:function(data){
                // console.log(data);
                $('#body_list_role').html(data);
                $('a[data-type=update-role]').on('click', function(){


                    var id = $(this).attr("id_edit_role");
                    // var name = $(this).attr("name");
                    // alert(id);

                    $.ajax({
            
                        url: '/api/v1/roles?id='+id,
                        type: 'get',
                        dataType: 'json',
                        success: function(data) {
                            // console.log(data.data.type);
                            // name = data.type;
                            // alert(data.data.type);
                            $('#role-type').val(data.data.type);
                            
                        },
                        error: function(mess){
                            alert("Loi gi nay");
                            // console.log(mess);
                        }
                    });

                    // alert(name);

                    
                    $('#role-id').val(id);
                    $('#editModal-role').modal('show');
                });

                $('a[data-type=delete-role]').on('click', function(){

                    var id = $(this).attr("id_delete_role");

                    $('#role-delete').val(id);
                    $('#deleteModal-role').modal('show');
                    
                });
            },
            error: function(err){
                // alert("fail");
                console.log(err);
            }
        });
    });

    function load_data_role(){
        $.ajax({
                    
            url: '/api/v1/roles/'+'all',
            type: 'get',
            dataType: 'json',
            success: function(data) {
                var output = "";
                for(var i = 0; i < data.length; i++){

                    output =   "<tr row_id_role="+data[i].id+">"
                                    +"<td class='text-center'>"+data[i].id+"</td>"
                                    +"<td class='text-center'>"+data[i].type+"</td>"
                                    
                                    +"<td class='text-center'>"
                                        +"<a href='#' class='blue' data-toggle='modal' id_edit_role="+data[i].id+" data-type='update-role' name="+data[i].name+">"
                                            +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
                                        +"</a>"
                                    +"</td>"
                                    +"<td class='text-center'>"
                                        +"<a href='#' class='red delete_role' id_delete_role="+data[i].id+" data-type='delete-role' data-toggle='modal'>"
                                            +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                                        +"</a>"
                                    +"</td>"
                                    
                                +"</tr>";

                }
                // alert(data[i-2].id);
                if(i >= 2){
                    $("tr[row_id_role="+data[i-2].id+"]").after(output);
                }
                else{
                    $("#body_list_role").html(output);
                }
                $('a[data-type=update-role]').on('click', function(){


                    var id = $(this).attr("id_edit_role");
                    // var name = $(this).attr("name");
                    // alert(id);

                    $.ajax({
            
                        url: '/api/v1/roles?id='+id,
                        type: 'get',
                        dataType: 'json',
                        success: function(data) {
                            // console.log(data.data.type);
                            // name = data.type;
                            // alert(data.data.type);
                            $('#role-type').val(data.data.type);
                            
                        },
                        error: function(mess){
                            alert("Loi gi nay");
                            // console.log(mess);
                        }
                    });

                    // alert(name);

                    
                    $('#role-id').val(id);
                    $('#editModal-role').modal('show');
                });

                $('a[data-type=delete-role]').on('click', function(){

                    var id = $(this).attr("id_delete_role");

                    $('#role-delete').val(id);
                    $('#deleteModal-role').modal('show');
                    
                });



                // alert('success');
            },
            error: function(err){
                alert("Error load data");
            }
        });
    }

    function loaddata_role(id){
        $.ajax({
                    
            url: '/api/v1/roles?id='+id,
            type: 'get',
            dataType: 'json',
            success: function(data) {
                // console.log(data);
                var output = "";
                // for(var i = 0; i < data.length; i++){

                    output =   
                                    "<td class='text-center'>"+data.data.id+"</td>"
                                    +"<td class='text-center'>"+data.data.type+"</td>"
                                    
                                    +"<td class='text-center'>"
                                        +"<a href='#' class='blue' data-toggle='modal' id_edit_role="+data.data.id+" data-type='update-role' name="+data.data.type+">"
                                            +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
                                        +"</a>"
                                    +"</td>"
                                    +"<td class='text-center'>"
                                        +"<a href='#' class='red delete_role' id_delete_role="+data.data.id+" data-type='delete-role' data-toggle='modal'>"
                                            +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                                        +"</a>"
                                    +"</td>"
                                    
                                ;
                                

                // }

                $("tr[row_id_role="+data.data.id+"]").html(output);


                $('a[data-type=update-role]').on('click', function(){


                    var id = $(this).attr("id_edit_role");
                    // var name = $(this).attr("name");
                    // alert(id);

                    $.ajax({
            
                        url: '/api/v1/roles?id='+id,
                        type: 'get',
                        dataType: 'json',
                        success: function(data) {
                            // console.log(data.data.type);
                            // name = data.type;
                            // alert(data.data.type);
                            $('#role-type').val(data.data.type);
                            
                        },
                        error: function(mess){
                            alert("Loi gi nay");
                            // console.log(mess);
                        }
                    });

                    // alert(name);

                    
                    $('#role-id').val(id);
                    $('#editModal-role').modal('show');
                });

                $('a[data-type=delete-role]').on('click', function(){

                    var id = $(this).attr("id_delete_role");

                    $('#role-delete').val(id);
                    $('#deleteModal-role').modal('show');
                    
                });



                // alert('success');
            },
            error: function(err){
                alert("Error load data");
            }
        });
    }

});