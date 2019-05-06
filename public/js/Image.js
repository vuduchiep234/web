
jQuery(function($) {

	$('#addImage').click(function(){

        $('#myModal-image').modal('show');
        $('#form-image')[0].reset();
        
    });

    

	// $('#add-image').on('click', function(){

	// 	$.ajaxSetup({
	//         headers: {
	//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	//         }

 //        });
		
	// 	var data = $('#type-image').val();
 //        // alert(data);
		
	// 	$.ajax({
 //            type: 'post',
 //            url: "/api/v1/images",
 //            dataType: "json",
 //            data: {
 //                0: {
 //                    type: data
 //                }
 //            },
 //            success: function (response) {
            	
 //            }
 //        });
	// });

    $('a[data-role=update-image]').on('click', function(){


    	var id = $(this).attr("id");
    	var type = $(this).attr("data-type");
    	// alert(type);

    	$('#image-type').val(type);
    	$('#image-id').val(id);
    	$('#editModal-image').modal('show');
    });

    $('#edit-image').on('click', function () {
        var id=$('#image-id').val();
        var data = $('#image-type').val();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $.ajax({
                
                url: '/api/v1/images/'+id,
                type: 'patch',
                data: {type: data, _method: "patch"},
                success: function(res) {

                }
        });
    });

    $('a[data-role=delete-image]').on('click', function(){

    	var id = $(this).attr("id");

        $('#image-delete').val(id);
		$('#deleteModal-image').modal('show');
		


    });
    $('#_delete-image').on('click', function(){

    	var id = $('#image-delete').val();
        // alert(id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $.ajax({
                
                url: '/api/v1/images/'+id,
                type: 'delete',
                data: {id: id, _method: "delete"},
                success: function(res) {

                }
        });
    	
		// $.ajax({

		// 	method: 'post',
  //           url: "{{ route('listimage/deleteimage') }}",
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