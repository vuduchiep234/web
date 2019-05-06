
jQuery(function($) {

	$('#addProduct').click(function(){

        $('#myModal-product').modal('show');
        $('#form-product')[0].reset();

        
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
 
    });

    $('#add-product').on('click', function(){

		
		var name = $('#name-product').val();
		var price = $('#price-product').val();
        var producer = $('select#producer-product option:checked').val();
        var cate = $('select#cate-product option:checked').val();
        var image = $('select#image-product option:checked').val();
        var state = $('select#state-product option:checked').val();
        // var detail = document.getElementById('detail-product');
        var detail = $('#detail-product').text();
        
		$.ajax({
            type: 'post',
            url: "/api/v1/products",
            dataType: "json",
            data: {
                0: {
                    name: name,
                    price: price,
                    detail: detail,
                    producer_id: producer,
                    category_id: cate,
                    image_id: image,
                    state: state
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

	$('a[data-role=update-product]').on('click', function(){


    	var id = $(this).attr("id");
    	var name = $(this).attr("product-name");
        var price = $(this).attr("product-price");
        var detail = $(this).attr("product-detail");
        var producer_id = $(this).attr("product-producer_id");
        var category_id = $(this).attr("product-category_id");
        var image_id = $(this).attr("product-image_id");
        var state = $(this).attr("product-state");
    	

    	// $('input[data-type=edit]').val(type);
    	$('#product-id').val(id);
    	$('#product-name').val(name);
    	$('#product-price').val(price);
    	$('#product-detail').text(detail);
    	$('#product-producer_id').val(producer_id);
        $('#product-category_id').val(category_id);
        $('#product-image_id').val(image_id);
        $('#product-state').val(state);

        $('#_name').val(name);
        $('#_price').val(price);
        $('#_detail').val(detail);
        $('#_producer_id').val(producer_id);
        $('#_category_id').val(category_id);
        $('#_image_id').val(image_id);
        $('#_state').val(state);

    	$('#editModal-product').modal('show');
    });

    $('#edit-product').on('click', function () {
        var id = $('#product-id').val();
        var name = $('#product-name').val();
        var price = $('#product-price').val();
        var detail = $('#product-detail').text();
        var producer_id = $('select#product-producer_id option:checked').val();
        var category_id = $('select#product-category_id option:checked').val();
        var image_id = $('select#product-image_id option:checked').val();
        var state = $('select#product-state option:checked').val();

        var _name = $('#_name').val();
        var _price = $('#_price').val();
        var _detail = $('#_detail').val();
        var _producer_id = $('#_producer_id').val();
        var _category_id = $('#_category_id').val();
        var _image_id = $('#_image_id').val();
        var _state = $('#_state').val();
        

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        if(name !== _name){
            $.ajax({
                
                url: '/api/v1/products/'+id,
                type: 'patch',
                data: {name: name, _method: "patch"},
                success: function(res) {

                }
            });
        }
        if(price !== _price){
            $.ajax({
                
                url: '/api/v1/products/'+id,
                type: 'patch',
                data: {price: price, _method: "patch"},
                success: function(res) {

                }
            });
        }

        if(detail !== _detail){
            $.ajax({
                
                url: '/api/v1/products/'+id,
                type: 'patch',
                data: {detail: detail, _method: "patch"},
                success: function(res) {

                }
            });
        }

        if(producer_id !== _producer_id){
            $.ajax({
                
                url: '/api/v1/products/'+id,
                type: 'patch',
                data: {producer_id: producer_id, _method: "patch"},
                success: function(res) {

                }
            });
        }

        if(category_id !== _category_id){
            $.ajax({
                
                url: '/api/v1/products/'+id,
                type: 'patch',
                data: {category_id: category_id, _method: "patch"},
                success: function(res) {

                }
            });
        }

        if(image_id !== _image_id){
            $.ajax({
                
                url: '/api/v1/products/'+id,
                type: 'patch',
                data: {image_id: image_id, _method: "patch"},
                success: function(res) {

                }
            });
        }

        if(state !== _state){
            $.ajax({
                
                url: '/api/v1/products/'+id,
                type: 'patch',
                data: {state: state, _method: "patch"},
                success: function(res) {

                }
            });
        }

        // $.ajax({
                
        //         url: '/api/v1/products/'+id,
        //         type: 'patch',
        //         data: {name: name, phone: phone, email: email, address: address, _method: "patch"},
        //         success: function(res) {

        //         }
        // });
    });

    $('a[data-role=delete-product]').on('click', function(){

    	var id = $(this).attr("id");

        $('#product-delete_id').val(id);
		$('#deleteModal-product').modal('show');
		


    });
    $('#_delete-product').on('click', function(){

    	var id = $('#product-delete_id').val();
    	// alert(id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $.ajax({
                
                url: '/api/v1/products/'+id,
                type: 'delete',
                data: {id: id, _method: "delete"},
                success: function(res) {

                }
        });
    	
		// $.ajax({

		// 	method: 'post',
  //           url: "{{ route('listproduct/delete') }}",
  //           data: {id : id}
  //       });
	});

});