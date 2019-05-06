
jQuery(function($) {

	$('#addProducer').click(function(){

        $('#myModal-producer').modal('show');
        $('#form-producer')[0].reset();

        
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
            	console.log("success");
            },
            error:function(err){
            	console.log("fail");
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

        if(name !== _name){
            $.ajax({
                
                url: '/api/v1/producers/'+id,
                type: 'patch',
                data: {name: name, _method: "patch"},
                success: function(res) {

                }
            });
        }
        if(phone !== _phone){
            $.ajax({
                
                url: '/api/v1/producers/'+id,
                type: 'patch',
                data: {phone: phone, _method: "patch"},
                success: function(res) {

                }
            });
        }

        if(email !== _email){
            $.ajax({
                
                url: '/api/v1/producers/'+id,
                type: 'patch',
                data: {email: email, _method: "patch"},
                success: function(res) {

                }
            });
        }

        if(address !== _address){
            $.ajax({
                
                url: '/api/v1/producers/'+id,
                type: 'patch',
                data: {address: address, _method: "patch"},
                success: function(res) {

                }
            });
        }

        // $.ajax({
                
        //         url: '/api/v1/producers/'+id,
        //         type: 'patch',
        //         data: {name: name, phone: phone, email: email, address: address, _method: "patch"},
        //         success: function(res) {

        //         }
        // });
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

                }
        });
    	
		// $.ajax({

		// 	method: 'post',
  //           url: "{{ route('listProducer/delete') }}",
  //           data: {id : id}
  //       });
	});

});