
jQuery(function($) {

	$('#addCatetegory').click(function(){

        
        $('#type-category').val('');
        $('#myModal').modal('show');
        
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });

	$('#add-category').on('click', function(){

		
		var data = $('#type-category').val();

		
    	$.ajax({
            type: 'post',
            url: "/api/v1/categories",
            dataType: "json",
            data: {
                0: {
                    type: data
                }
            },
            success: function (response) {
                alert("Success !");
                $('#myModal').modal('hide');
                load_data_category();
            }
        });
		
		
	});

    $('a[data-role=update-category]').on('click', function(){


    	var id = $(this).attr("id_edit_category");
    	var type = $(this).attr("data-type");
    	// alert(type);

    	$('#_type-cate').val(type);
    	$('#cate-id').val(id);
    	$('#editModal-category').modal('show');
    });

	$('#_edit-cate').on('click', function () {
        var id=$('#cate-id').val();
        var data = $('#_type-cate').val();
        // var tables = "categories";

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $.ajax({
                
                url: '/api/v1/categories/'+id,
                type: 'patch',
                data: {type: data},
                success: function(res) {
                    alert("Success !");
                    $('#editModal-category').modal('hide');
                    load_data_category();
                }
        });
    });


    $('a[data-role=delete-category]').on('click', function(){

        var id = $(this).attr("id_delete_category");

        $('#delete_cate_id').val(id);
        $('#deleteModal-category').modal('show');
    });

    $('#_delete-cate').on('click', function(){

    	var id = $('#delete_cate_id').val();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $.ajax({
                
                url: '/api/v1/categories/'+id,
                type: 'delete',
                data: {id: id},
                success: function(res) {
                    alert("Success !");
                    $('#deleteModal-category').modal('hide');
                    load_data_category();
                }
        });

    });
    
    function load_data_category(){
        $.ajax({
                    
            url: '/api/v1/categories/'+'all',
            type: 'get',
            dataType: 'json',
            success: function(data) {
                var output = "";
                for(var i = 0; i < data.length; i++){

                    output +=   "<tr>"
                                    +"<td class='text-center'>"+data[i].id+"</td>"
                                    +"<td class='text-center'>"+data[i].type+"</td>"
                                    
                                    +"<td class='text-center'>"
                                        +"<a href='#' class='blue' data-toggle='modal' id_edit_category="+data[i].id+" data-role='update-category' type="+data[i].type+">"
                                            +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
                                        +"</a>"
                                    +"</td>"
                                    +"<td class='text-center'>"
                                        +"<a href='#' class='red delete_category' id_delete_category="+data[i].id+" data-role='delete-category' data-toggle='modal'>"
                                            +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                                        +"</a>"
                                    +"</td>"
                                    
                                +"</tr>";

                }
                $('#body_list_category').html(output);
                $('a[data-role=update-category]').on('click', function(){


                    var id = $(this).attr("id_edit_category");
                    // var name = $(this).attr("name");
                    // alert(id);

                    $.ajax({
            
                        url: '/api/v1/categories/'+id,
                        type: 'get',
                        dataType: 'json',
                        success: function(data) {
                            // console.log(data.data.type);
                            // name = data.type;
                            // alert(data.data.type);
                            $('#_type-cate').val(data.data.type);
                            
                        },
                        error: function(mess){
                            alert("Loi gi nay");
                            // console.log(mess);
                        }
                    });

                    // alert(name);

                    
                    $('#cate-id').val(id);
                    $('#editModal-category').modal('show');
                });

                $('a[data-role=delete-category]').on('click', function(){

                    var id = $(this).attr("id_delete_category");

                    $('#delete_cate_id').val(id);
                    $('#deleteModal-category').modal('show');
                    
                });



                // alert('success');
            },
            error: function(err){
                alert("Error load data");
            }
        });
    }

});