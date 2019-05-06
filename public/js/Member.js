
jQuery(function($) {

	$('#addMember').click(function(){

        $('#myModal-member').modal('show');
        $('#form-member')[0].reset();
        
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });

	$('#add-member').on('click', function(){

		
		var email = $('#email-member').val();
		var password = $('#password-member').val();
		var first_name = $('#first_name-member').val();
		var last_name = $('#last_name-member').val();
		var phone = $('#phone-member').val();
		var role_id = $('select#role_id-member option:checked').val();
		var image_id = $('#image_id-member').val();

        // var state = $( "select#shipper-state option:checked" ).val();

		$.ajax({
            type: 'post',
            url: "/api/v1/users",
            dataType: "json",
            data: {
                0: {
                    email: email,
                    password: password,
                    first_name: first_name,
                    last_name: last_name,
                    phone: phone,
                    role_id: role_id,
                    image_id:image_id
                }
            },
            success: function (response) {
            	
            }
        });
	});

    $('a[data-role=update-member]').on('click', function(){


    	var id = $(this).attr("id");
    	var email = $(this).attr("member-email");
    	var password = $(this).attr("member-password")
    	var first_name = $(this).attr("member-first_name");
    	var last_name = $(this).attr("member-last_name");
    	var phone = $(this).attr("member-phone");
    	var role_id = $(this).attr("member-role_id");
    	var image_id = $(this).attr("member-image_id");
    	// alert(role_id);

    	$('#member-email').val(email);
    	$('#member-password').val(password);
    	$('#first-name').val(first_name);
    	$('#last-name').val(last_name);
    	$('#member-phone').val(phone);
    	$('#member-role_id').val(role_id);
    	$('#member-image_id').val(image_id);
    	$('#member-id').val(id);
    	$('#editModal-member').modal('show');

        $('#_email').val(email);
        $('#_password').val(password);
        $('#_first-name').val(first_name);
        $('#_last-name').val(last_name);
        $('#_phone').val(phone);
        $('#_role-id').val(role_id);
        $('#_image-id').val(image_id);

        $('#member-id').val(id);
        $('#editModal-member').modal('show');
    });

    $('#_edit-member').on('click', function () {
        var id=$('#member-id').val();
        var email=$('#member-email').val();
        var password=$('#member-password').val();
        var first_name=$('#first-name').val();
        var last_name=$('#last-name').val();
        var phone=$('#member-phone').val();
        var role_id=$('select#member-role_id option:checked').val();
        var image_id=$('select#member-image_id option:checked').val();

        // alert(role_id);

        var _email = $('#_email').val();
        var _password = $('#_password').val();
        var _first_name = $('#_first-name').val();
        var _last_name = $('#_last-name').val();
        var _phone = $('#_phone').val();
        var _role_id = $('#_role-id').val();
        var _image_id = $('#_image-id').val();
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        if(email !== _email){
            $.ajax({
                
                url: '/api/v1/users/'+id,
                type: 'patch',
                data: {email: email, _method: "patch"},
                success: function(res) {

                }
            });
        }

        if(password !== _password){
            $.ajax({
                
                url: '/api/v1/users/'+id,
                type: 'patch',
                data: {password: password, _method: "patch"},
                success: function(res) {

                }
            });
        }

        if(first_name !== _first_name){
            $.ajax({
                
                url: '/api/v1/users/'+id,
                type: 'patch',
                data: {first_name: first_name, _method: "patch"},
                success: function(res) {

                }
            });
        }

        if(last_name !== _last_name){
            $.ajax({
                
                url: '/api/v1/users/'+id,
                type: 'patch',
                data: {last_name: last_name, _method: "patch"},
                success: function(res) {

                }
            });
        }

        if(phone !== _phone){
            $.ajax({
                
                url: '/api/v1/users/'+id,
                type: 'patch',
                data: {phone: phone, _method: "patch"},
                success: function(res) {

                }
            });
        }

        if(role_id !== _role_id){
            $.ajax({
                
                url: '/api/v1/users/'+id,
                type: 'patch',
                data: {role_id: role_id, _method: "patch"},
                success: function(res) {

                }
            });
        }

        if(image_id !== _image_id){
            $.ajax({
                
                url: '/api/v1/users/'+id,
                type: 'patch',
                data: {image_id: image_id, _method: "patch"},
                success: function(res) {

                }
            });
        }

        // $.ajax({
                
        //         url: '/api/v1/users/'+id,
        //         type: 'patch',
        //         data: {type: data, _method: "patch"},
        //         success: function(res) {

        //         }
        // });
    });

    $('a[data-role=delete-member]').on('click', function(){

    	var id = $(this).attr("id");

        $('#member-delete').val(id);
		$('#deleteModal-member').modal('show');
		


    });
    $('#_delete-member').on('click', function(){

    	var id = $('#member-delete').val();
        // alert(id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $.ajax({
                
                url: '/api/v1/users/'+id,
                type: 'delete',
                data: {id: id, _method: "delete"},
                success: function(res) {

                }
        });
    	
		// $.ajax({

		// 	method: 'post',
  //           url: "{{ route('listMember/deleteMember') }}",
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