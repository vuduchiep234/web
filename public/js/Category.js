
jQuery(function($) {

	$('#addCatetegory').click(function(){

        $('#myModal').modal('show');
        $('#form-cate')[0].reset();
        
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });

	$('#action').on('click', function(){

		
		var data = $('#form-field-1-1').val();

		
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
            	
            }
        });
		
		
	});

    $('a[data-role=update]').on('click', function(){


    	var id = $(this).attr("id");
    	var type = $(this).attr("data-type");
    	// alert(type);

    	$('input[data-type=edit]').val(type);
    	$('#cate-id').val(id);
    	$('#editModal').modal('show');
    });

    
		
	// $('#_edit-cate').on('click', function(){

	// 	var id = $('#cate-id').val();
	// 	var data = $('#_type-cate').val();
		
	// 	$.ajax({
				
	// 			headers : {
 //                'Accept' : 'application/json',
 //                'Content-Type' : 'application/json',
 //                'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS'
 //            },
 //            url : 'http://127.0.0.1:8000/api/v1/categories/'+id,
 //            type : 'PATCH',
 //            data : JSON.stringify({type: data}),
 //            success : function(response, textStatus, jqXhr) {
 //                console.log(" Successfully Patched!");
 //            },
 //            error : function(jqXHR, textStatus, errorThrown) {
 //                // log the error to the console
 //                console.log("The following error occured: " + textStatus, errorThrown);
 //            },
 //            complete : function() {
 //                console.log("Venue Patch Ran");
 //            }
	// 	});

 //    });

	$('#_edit-cate').on('click', function () {
        var id=$('#cate-id').val();
        var data = $('#_type-cate').val();
        var tables = "categories";

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $.ajax({
                
                url: '/api/v1/categories/'+id,
                type: 'patch',
                data: {type: data, _method: "patch"},
                success: function(res) {

                }
        });
    });


    $('a[data-role=delete]').on('click', function(){

        var id = $(this).attr("id");

        $('#button-delete').val(id);
        $('#deleteModal').modal('show');
    });

    $('#_delete-cate').on('click', function(){

    	var id = $('#button-delete').val();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $.ajax({
                
                url: '/api/v1/categories/'+id,
                type: 'delete',
                data: {id: id, _method: "delete"},
                success: function(res) {

                }
        });

		// $.ajax({

		// 	method: 'post',
  //           url: "{{ route('listTypeProduct/delete') }}",
  //           data: {id : id},
  //           success: function (response) {
  //           	alert(response);
  //           },
  //           error: function(err){
  //           	console.log(err.responseText);
  //           }
  //       });
	});
});