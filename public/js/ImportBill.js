
jQuery(function($) {

	$('#addImportBill').click(function(){

        $('#myModal-importBill').modal('show');
        $('#form-importBill')[0].reset();

        
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
 
    });

    $('#add-importBill').on('click', function(){

		
		var creator_id = $('#importBill-creator_id').val();
		var product_id = $('#importBill-product_id').val();
		var quantity = $('#importBill-quantity').val();
		var price = $('#importBill-price').val();
	
		$.ajax({
            type: 'post',
            url: "/api/v1/importBills",
            dataType: "json",
            data: {
                0: {
                    creator_id: creator_id,
                    product_id: product_id,
                    quantity: quantity,
                    price: price
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

	$('a[data-role=update-importBill]').on('click', function(){


    	var id = $(this).attr("id");
    	// var creator_id = $(this).attr("data-creator_id");
    	var product_id = $(this).attr("data-product_id");
    	var quantity = $(this).attr("data-quantity");
    	var price = $(this).attr("data-price");
    	// alert(1);

    	// $('input[data-type=edit]').val(type);
    	$('#id-importBill').val(id);
    	// $('#creator_id-importBill').val(creator_id);
    	$('#product_id-importBill').val(product_id);
    	$('#quantity-importBill').val(quantity);
    	$('#price-importBill').val(price);

        // $('#_creator_id').val(creator_id);
        $('#_product_id').val(product_id);
        $('#_quantity').val(quantity);
        $('#_price').val(price);

    	$('#editModal-importBill').modal('show');
    });

    $('#edit-importBill').on('click', function () {
        var id = $('#id-importBill').val();
        // var creator_id = $('#creator_id-importBill').val();
        var product_id = $('#product_id-importBill').val();
        var quantity = $('#quantity-importBill').val();
        var price = $('#price-importBill').val();

        // var _creator_id = $('#_creator_id').val();
        var _product_id = $('#_product_id').val();
        var _quantity = $('#_quantity').val();
        var _price = $('#_price').val();
        

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        // if(creator_id !== _creator_id){
        //     $.ajax({
                
        //         url: '/api/v1/importBills/'+id,
        //         type: 'patch',
        //         data: {creator_id: creator_id, _method: "patch"},
        //         success: function(res) {

        //         }
        //     });
        // }
        if(product_id !== _product_id){
            $.ajax({
                
                url: '/api/v1/importBills/'+id,
                type: 'patch',
                data: {product_id: product_id, _method: "patch"},
                success: function(res) {

                }
            });
        }

        if(quantity !== _quantity){
            $.ajax({
                
                url: '/api/v1/importBills/'+id,
                type: 'patch',
                data: {quantity: quantity, _method: "patch"},
                success: function(res) {

                }
            });
        }

        if(price !== _price){
            $.ajax({
                
                url: '/api/v1/importBills/'+id,
                type: 'patch',
                data: {price: price, _method: "patch"},
                success: function(res) {

                }
            });
        }

        // $.ajax({
                
        //         url: '/api/v1/importBills/'+id,
        //         type: 'patch',
        //         data: {name: name, phone: phone, email: email, address: address, _method: "patch"},
        //         success: function(res) {

        //         }
        // });
    });

    $('a[data-role=delete-importBill]').on('click', function(){

    	var id = $(this).attr("id");

        $('#importBill-id').val(id);
		$('#deleteModal-importBill').modal('show');
		


    });
    $('#_delete-importBill').on('click', function(){

    	var id = $('#importBill-id').val();
    	// alert(id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $.ajax({
                
                url: '/api/v1/importBills/'+id,
                type: 'delete',
                data: {id: id, _method: "delete"},
                success: function(res) {

                }
        });
    	
		// $.ajax({

		// 	method: 'post',
  //           url: "{{ route('listimportBill/delete') }}",
  //           data: {id : id}
  //       });
	});

});