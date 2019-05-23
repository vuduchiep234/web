
jQuery(function($) {

	$('#addAuction').click(function(){

        $('#myModal-auction').modal('show');
        $('#type-auction').val('');
        
    });

    $('#search_auction').on('click',function(){
        // alert(1);
        var value=$('#data_search').val();
        // alert(value);
        $.ajax({
            type : 'get',
            url : '/searchAuction',
            data: {'data_search':value},
            success:function(data){
                // console.log(data);
                $('#body_list_auction').html(data);
                
            },
            error: function(err){
                // alert("fail");
                console.log(err);
            }
        });
    });

	$('#add-auction').on('click', function(){

		$.ajaxSetup({
	        headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        }

        });
		
		var data = $('#timepicker1').val();
        var creator_id = $('#creator_id').val();
        // alert(creator_id);
        if(data.indexOf(':') == 1){
            data = '0'+data;
        }
        // alert(data);
		
		$.ajax({
            type: 'post',
            url: "/api/v1/auctions",
            dataType: "json",
            data: {
                0: {
                    creator_id: creator_id,
                    duration: data
                }
            },
            success: function (response) {
                alert('Success !');
                $('#myModal-auction').modal('hide');
                load_data_auction();
                
            },
            error: function(err){
                alert('Error! Please, try again.');
                $('#myModal-auction').modal('hide');
                console.log(err);
            }
        });
	});

    $('a[data-auction=update-auction]').on('click', function(){


    	var id = $(this).attr("id");
    	var type = $(this).attr("data-type");
    	// alert(type);

    	$('#auction-type').val(type);
    	$('#auction-id').val(id);
    	$('#editModal-auction').modal('show');
    });

    $('#edit-auction').on('click', function () {
        var id=$('#auction-id').val();
        var data = $('#auction-type').val();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $.ajax({
                
                url: '/api/v1/auctions/'+id,
                type: 'patch',
                data: {type: data},
                success: function(data) {
                    alert('Success');
                    // console.log(data)
                    $('#editModal-auction').modal('hide');
                    loaddata_auction(id);
                },
                error: function(err){
                    alert('Error! Please, try again.');
                    $('#editModal-auction').modal('hide');
                }
        });
    });

    $('a[data-auction=delete-auction]').on('click', function(){

    	var id = $(this).attr("id");

        $('#auction-delete').val(id);
		$('#deleteModal-auction').modal('show');
		


    });
    $('#_delete-auction').on('click', function(){

    	var id = $('#auction-delete').val();
        // alert(id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $.ajax({
                
                url: '/api/v1/auctions/'+id,
                type: 'delete',
                data: {id: id, _method: "delete"},
                success: function(data) {
                    alert('Success');
                    $('#deleteModal-auction').modal('hide');
                    $("tr[row_id_auction="+id+"]").remove();
                },
                error: function(err){
                    alert('Error! Please, try again.');
                    $('#deleteModal-auction').modal('hide');
                }
        });
    	
		
	});

    $('#search').on('click',function(){
        // alert(1);
        var value=$('#data_search').val();
        // alert(value);
        $.ajax({
            type : 'get',
            url : '/search',
            data: {'data_search':value},
            success:function(data){
                // console.log(data);
                $('#body_list_auction').html(data);
                $('a[data-type=update-auction]').on('click', function(){


                    var id = $(this).attr("id_edit_auction");
                    // var name = $(this).attr("name");
                    // alert(id);

                    $.ajax({
            
                        url: '/api/v1/auctions?id='+id,
                        type: 'get',
                        dataType: 'json',
                        success: function(data) {
                            // console.log(data.data.type);
                            // name = data.type;
                            // alert(data.data.type);
                            $('#auction-type').val(data.data.type);
                            
                        },
                        error: function(mess){
                            alert("Loi gi nay");
                            // console.log(mess);
                        }
                    });

                    // alert(name);

                    
                    $('#auction-id').val(id);
                    $('#editModal-auction').modal('show');
                });

                $('a[data-type=delete-auction]').on('click', function(){

                    var id = $(this).attr("id_delete_auction");

                    $('#auction-delete').val(id);
                    $('#deleteModal-auction').modal('show');
                    
                });
            },
            error: function(err){
                alert("fail");
                // console.log(err);
            }
        });
    });

    function load_data_auction(){
        $.ajax({
                    
            url: '/api/v1/auctions/'+'all',
            type: 'get',
            dataType: 'json',
            success: function(data) {
                var output = "";
                for(var i = 0; i < data.length; i++){

                    output =   "<tr row_id_auction="+data[i].id+">"
                                    +"<td class='text-center'>"+data[i].id+"</td>"
                                    +"<td class='text-center'>"+data[i].duration+"</td>"
                                    
                                    // +"<td class='text-center'>"
                                    //     +"<a href='#' class='blue' data-toggle='modal' id_edit_auction="+data[i].id+" data-type='update-auction' name="+data[i].name+">"
                                    //         +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
                                    //     +"</a>"
                                    // +"</td>"
                                    // +"<td class='text-center'>"
                                    //     +"<a href='#' class='red delete_auction' id_delete_auction="+data[i].id+" data-type='delete-auction' data-toggle='modal'>"
                                    //         +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                                    //     +"</a>"
                                    // +"</td>"
                                    
                                +"</tr>";

                }
                if(i >= 2){
                    $("tr[row_id_auction="+data[i-2].id+"]").after(output);
                }
                else{
                    $("#body_list_auction").html(output);
                }
                
                $('a[data-type=update-auction]').on('click', function(){


                    var id = $(this).attr("id_edit_auction");
                    // var name = $(this).attr("name");
                    // alert(id);

                    $.ajax({
            
                        url: '/api/v1/auctions?id='+id,
                        type: 'get',
                        dataType: 'json',
                        success: function(data) {
                            // console.log(data.data.type);
                            // name = data.type;
                            // alert(data.data.type);
                            $('#auction-type').val(data.data.type);
                            
                        },
                        error: function(mess){
                            alert("Loi gi nay");
                            // console.log(mess);
                        }
                    });

                    // alert(name);

                    
                    $('#auction-id').val(id);
                    $('#editModal-auction').modal('show');
                });

                $('a[data-type=delete-auction]').on('click', function(){

                    var id = $(this).attr("id_delete_auction");

                    $('#auction-delete').val(id);
                    $('#deleteModal-auction').modal('show');
                    
                });



                // alert('success');
            },
            error: function(err){
                alert("Error load data");
            }
        });
    }

    function loaddata_auction(id){
        $.ajax({
                    
            url: '/api/v1/auctions?id='+id,
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
                                        +"<a href='#' class='blue' data-toggle='modal' id_edit_auction="+data.data.id+" data-type='update-auction' name="+data.data.type+">"
                                            +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
                                        +"</a>"
                                    +"</td>"
                                    +"<td class='text-center'>"
                                        +"<a href='#' class='red delete_auction' id_delete_auction="+data.data.id+" data-type='delete-auction' data-toggle='modal'>"
                                            +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                                        +"</a>"
                                    +"</td>"
                                    
                                ;
                                

                // }

                $("tr[row_id_auction="+data.data.id+"]").html(output);


                $('a[data-type=update-auction]').on('click', function(){


                    var id = $(this).attr("id_edit_auction");
                    // var name = $(this).attr("name");
                    // alert(id);

                    $.ajax({
            
                        url: '/api/v1/auctions?id='+id,
                        type: 'get',
                        dataType: 'json',
                        success: function(data) {
                            // console.log(data.data.type);
                            // name = data.type;
                            // alert(data.data.type);
                            $('#auction-type').val(data.data.type);
                            
                        },
                        error: function(mess){
                            alert("Loi gi nay");
                            // console.log(mess);
                        }
                    });

                    // alert(name);

                    
                    $('#auction-id').val(id);
                    $('#editModal-auction').modal('show');
                });

                $('a[data-type=delete-auction]').on('click', function(){

                    var id = $(this).attr("id_delete_auction");

                    $('#auction-delete').val(id);
                    $('#deleteModal-auction').modal('show');
                    
                });



                // alert('success');
            },
            error: function(err){
                alert("Error load data");
            }
        });
    }

});