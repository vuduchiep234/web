
jQuery(function($) {

    // $.ajax({
                
    //         url: '/api/v1/roles/'+'all',
    //         type: 'get',
    //         dataType: 'json',
    //         success: function(data) {
    //             var output = "";
    //             for(var i = 0; i < data.length; i++){

    //                 output +=   "<tr>"
    //                                 +"<td>"+data[i].id+"</td>"
    //                                 +"<td>"+data[i].type+"</td>"
    //                                 +"<td class='center'>"
    //                                     +"<a href='#' class='green edit-role' id="+data[i].id+" data-type="+data[i].type+" data-role='update-role' data-toggle='modal'>"
    //                                         +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
    //                                     +"</a>"
    //                                 +"</td>"
    //                                 +"<td class='center'>"
    //                                     +"<a class='red' href='#' id='<?php echo $role->id; ?>' data-role='delete-role' data-toggle='modal'>"
    //                                         +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
    //                                     +"</a>"
    //                                 +"</td>"
    //                             +"</tr>"

    //                 // $('#cellIDRole').text(data[i].id);
    //                 // $('#cellTypeRole').text(data[i].type);
    //                 // $('#cellEditRole').html("<a href='#' class='green edit-role' id='<?php echo $role->id; ?>' data-type='{{$role->type}}' data-role='update-role' data-toggle='modal'>"
    //                 //                         + "<i class='ace-icon fa fa-pencil bigger-130'></i>"
    //                 //                     +"</a>");
    //                 // $('#cellDeleteRole').html("<a class='red' href='#' id='<?php echo $role->id; ?>' data-role='delete-role' data-toggle='modal'>"
    //                 //                         +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
    //                 //                     +"</a>");
    //             }
    //             $('#bodyRole').html(output);
    //         },
    //         error: function(err){
    //             alert(1);
    //         }
    // });

	$('#addRole').click(function(){

        $('#myModal-role').modal('show');
        $('#form-role')[0].reset();
        
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

                }
        });
    	
		
	});

    $('#search_role').on('click', function(){

        alert(1);
        $('#myModal-searchRole').modal('show');
    });

    

        // searchRoleFunction();
        // function searchRoleFunction(query = ''){

        //     $.ajax({
        //         url: "{{route('listRole/search')}}",
        //         method: "get",
        //         data: {query: query},
        //         dataType: 'json',
        //         success: function(data){
        //             $('#bodyRole').html(data.table_data)
        //         }
        //     });
        // }

        // $('#form_search_role #search').on('click', function(){
        //     var query = $('#data_search').val();
        //     alert(query);
        //     $.ajax({
        //         url: "{{route('listRole/search')}}",
        //         method: "get",
        //         data: {query: query},
        //         dataType: 'json',
        //         success: function(data){
        //             $('#bodyRole').html(data.table_data);
        //             console.log(data);
        //             console.log(1);
        //         },
        //         error:function(err){
        //             console.log(err);
        //         }
        //     });
        // });

    // $('#search-role #search').on('click', function(){

    //     var id = $('#data-search').val();
    //     // alert(id);

    //     // $.ajaxSetup({
    //     //     headers: {
    //     //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     //     }

    //     // });

    //     $.ajax({
                
    //             url: '/api/v1/roles/'+id,
    //             type: 'get',
    //             // data: {id:id},
    //             dataType: 'json',
    //             success: function(data) {
                    
    //                 // var data = JSON.stringify(data);
    //                 // alert(data[0].type);
    //                 console.log(data);
    //                 var output = "";
    //                 for(var i = 0; i < data.length; i++){

    //                     output +=   "<tr>"
    //                                     +"<td>"+data[i].id+"</td>"
    //                                     +"<td>"+data[i].type+"</td>"
    //                                     +"<td class='center'>"
    //                                         +"<a href='#' class='green edit-role' id='<?php echo $role->id; ?>' data-type='{{$role->type}}' data-role='update-role' data-toggle='modal'>"
    //                                             +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
    //                                         +"</a>"
    //                                     +"</td>"
    //                                     +"<td class='center'>"
    //                                         +"<a class='red' href='#' id='<?php echo $role->id; ?>' data-role='delete-role' data-toggle='modal'>"
    //                                             +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
    //                                         +"</a>"
    //                                     +"</td>"
    //                                 +"</tr>"

    //                     // $('#cellIDRole').text(data[i].id);
    //                     // $('#cellTypeRole').text(data[i].type);
    //                     // $('#cellEditRole').html("<a href='#' class='green edit-role' id='<?php echo $role->id; ?>' data-type='{{$role->type}}' data-role='update-role' data-toggle='modal'>"
    //                     //                         + "<i class='ace-icon fa fa-pencil bigger-130'></i>"
    //                     //                     +"</a>");
    //                     // $('#cellDeleteRole').html("<a class='red' href='#' id='<?php echo $role->id; ?>' data-role='delete-role' data-toggle='modal'>"
    //                     //                         +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
    //                     //                     +"</a>");
    //                 }
    //                 $('#bodyRole').html(output);
    //             },
    //             error: function(err){
    //                 alert(1);
    //             }
    //     });
        
        
    // });

    // $('#sidebarRole').on('click', function(){
    //     alert(1);
        
        
        
    // });

});