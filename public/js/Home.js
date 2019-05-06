
jQuery(function($) {

	$('#submit_order').on('click', function(){

		
		var users_id = $('#users_id').val(); 
		var address = $('#address_users').val();
        var products_id = $('#_products_id').val();
        var quantity = $('#_quantity').val();
        var price = $('#_price').val();

        // alert(users_id);
        // alert(address);
        // alert(products_id);
        // alert(price);
        // alert(quantity);
		
		$.ajax({
            type: 'post',
            url: "/api/v1/billDetails",
            dataType: "json",
            data: {
                0: {
                    user_id: users_id,
                    product_id: products_id,
                    quantity: quantity,
                    price: price,
                    address: address
                }
            },
            success: function (response) {
            	console.log(response);
            },
            error: function(err){
                console.log(err);
            }
        });
	});

    $('#submit-comment').on('click', function(){

        
        var users_id = $('#cmtuser_id').val(); 
        var products_id = $('#cmtproduct_id').val();
        var content = $('#cmt').val();

        alert(users_id);
        alert(products_id);
        alert(content);
        
        $.ajax({
            type: 'post',
            url: "/api/v1/comments",
            dataType: "json",
            data: {
                0: {
                    user_id: users_id,
                    product_id: products_id,
                    content: content
                }
            },
            success: function (response) {
                console.log('success');
            }
        });
    });

});