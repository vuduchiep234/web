
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
                data: {type: data, _method: "patch"},
                success: function(res) {
                    alert('Success');
                    $('#editModal-role').modal('hide');
                    load_data_role();
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
                success: function(res) {
                    alert('Success');
                    $('#deleteModal-role').modal('hide');
                    load_data_role();
                }
        });
    	
		
	});

    $('#search_role').on('click', function(){

        alert(1);
        $('#myModal-searchRole').modal('show');
    });

    function load_data_role(){
        $.ajax({
                    
            url: '/api/v1/roles/'+'all',
            type: 'get',
            dataType: 'json',
            success: function(data) {
                var output = "";
                for(var i = 0; i < data.length; i++){

                    output +=   "<tr>"
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
                $('#body_list_role').html(output);
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