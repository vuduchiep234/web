
jQuery(function($) {

	$('#addProduct').click(function(){

        $('#name-product').val("");
        $('#price-product').val("");
        $('#producer-product').val("");
        $('#cate-product').val("");
        $('#detail-product').val("");
        $('#state-product').val("");
        $('#myModal-product').modal('show');
        
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
        
        var formData = new FormData();
        formData.append('name', name);
        formData.append('price', price);
        formData.append('producer_id', producer);
        formData.append('category_id', cate);
        formData.append('state', state);
        formData.append('detail', detail);
        formData.append('file', $('input[type=file]')[0].files[0]);

        console.log(formData);
		$.ajax({
            type: 'post',
            url: "/api/v1/products",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                alert("Success !");
                $('#myModal-product').modal('hide');
                load_data_product();
            },
            error:function(err){
                alert("Fail !");
                console.log(err);
            }
        });
	});

	$('a[data-role=update-product]').on('click', function(){


    	var id = $(this).attr("id_edit_product");
    	var name = $(this).attr("product-name");
        var price = $(this).attr("product-price");
        var detail = $(this).attr("product-detail");
        var producer_id = $(this).attr("product-producer_id");
        var category_id = $(this).attr("product-category_id");
        var edit_image_url = $(this).attr("product_image");
        var state = $(this).attr("product-state");
    	// alert(edit_image_url);

    	// $('input[data-type=edit]').val(type);
    	$('#product-id').val(id);
    	$('#product-name').val(name);
    	$('#product-price').val(price);
    	$('#product-detail').text(detail);
    	$('#product-producer_id').val(producer_id);
        $('#product-category_id').val(category_id);
        $('#edit_uploadPreview').attr("src",edit_image_url);
        $('#product-state').val(state);

        $('#_name').val(name);
        $('#_price').val(price);
        $('#_detail').val(detail);
        $('#_producer_id').val(producer_id);
        $('#_category_id').val(category_id);
        $('#_image_id').val(edit_image_url);
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
        // var image_id = $('select#product-image_id option:checked').val();
        var state = $('select#product-state option:checked').val();
        var image_url = $(this).attr("product_image");

        var _name = $('#_name').val();
        var _price = $('#_price').val();
        var _detail = $('#_detail').val();
        var _producer_id = $('#_producer_id').val();
        var _category_id = $('#_category_id').val();
        var _image_url = $('#_image_id').val();
        var _state = $('#_state').val();
        
        var formData = new FormData();



        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        formData.append('id', id);

        if(name !== _name){
            formData.append('name', name);
        }
        if(price !== _price){
            formData.append('price', price);
        }

        if(detail !== _detail){
            formData.append('detail', detail);
        }

        if(producer_id !== _producer_id){
            formData.append('producer_id', producer_id);
        }

        if(category_id !== _category_id){
            formData.append('category_id', category_id);
        }

        var ins = document.getElementById('edit_image_book').files[0];
        console.log("image "+ins);
        if (ins!=null){
            formData.append('file',ins);
        }


        if(state !== _state){
            formData.append('state', state);
        }
        console.log(formData);
        $.ajax({
                
            url: '/api/v1/products/'+id,
            type: 'patch',
            contentType: false,
            processData: false,
            data: formData,
            success: function(res) {
                alert("Success !");
                $('#editModal-product').modal('hide');
                loaddata_product(id);

            },
            error: function(mess){
                alert("Error! Please, try again.");
                console.log(mess);
                $('#editModal-product').modal('hide');

            }
        });
    });

    $('a[data-role=delete-product]').on('click', function(){

    	var id = $(this).attr("id_delete_product");

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
 
    });

    $('a[data-role=import-product]').click(function(){

        $('#quantity_product').val("");

        var id = $(this).attr("id_import_product");

        $('#import_product_id').val(id);

        $('#importModal-product').modal('show');

    });

    $('#import_product').click(function(){
        var quantity = $('#quantity_product').val();
        var product_id = $('#import_product_id').val();
        // alert(product_id);
        // alert(quantity);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $.ajax({
            url: '/api/v1/importBills',
            type: 'post',
            dataType: 'json',
            data:{
                product_id: product_id,
                quantity: quantity
            },
            success: function(data){
                alert('Success !');
                $('#importModal-product').modal('hide');
                loaddata_product();
            },
            error: function(err){
                alert('Import fail');
            }
        });

    });
    
    function load_data_product() {
        $.ajax({
 
            url: '/api/v1/products/'+'all?relations[]=producer&relations[]=category&relations[]=inventory&relations[]=image',
            type: 'get',
            dataType: 'json',
            success: function(data) {
                console.log(data);
 
 
                var output = "";
                var j, q,image = "";
 
                for(var i = 0; i < data.length; i++){
                    
                    output =   "<tr row_id_product="+data[i].id+">"
                        +"<td class='center'>"+data[i].id+"</td>"
                        +"<td class='center'>"+data[i].name+"</td>"
                        // +"<td class='center'>"++"</td>"
                        // +"<td class='center'>"++"</td>"
                        +"<td class='center'>"+data[i].price+"</td>"
                        +"<td class='center'>"+data[i].detail+"</td>"
                        +"<td class='center'>"+data[i].producer.name+"</td>"
                        +"<td class='center'>"+data[i].category.type+"</td>"
                        +"<td class='center'>"+data[i].image.image_url+"</td>"
                        +"<td class='center'>"+data[i].inventory.quantity+"</td>"
                        +"<td class='center'>"
                        +"<a href='#' class='orange' data-toggle='modal' id_import_product="+data[i].id+" data-type='import-product' >"
                        +"<i class='ace-icon fa fa-edit bigger-130'></i>"
                        +"</a>"
                        +"</td>"
                        +"<td class='center'>"
                        +"<a href='#' class='blue' data-toggle='modal' id_edit_product="+data[i].id+" data-type='update-product' >"
                        +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
                        +"</a>"
                        +"</td>"
                        +"<td class='center'>"
                        +"<a href='#' class='red delete_product' id_delete_product="+data[i].id+" data-type='delete-product'>"
                        +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                        +"</a>"
                        +"</td>"
 
                        +"</tr>";
 
                }
                $("tr[row_id_product="+data[i-2].id+"]").after(output);

                $('a[data-role=delete-product]').on('click', function(){

                    var id = $(this).attr("id_delete_product");

                    $('#product-delete_id').val(id);
                    $('#deleteModal-product').modal('show');
                    
                });

                $('a[data-role=update-product]').on('click', function(){


                    var id = $(this).attr("id_edit_product");
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

                $('a[data-type=import-product]').click(function(){

                    $('#quantity_product').val("");

                    var id = $(this).attr("id_import_product");

                    $('#import_product_id').val(id);

                    $('#importModal-product').modal('show');

                });
        
            },
            error: function(err){
                alert("Error load data product");
            }
        });
    }

    function loaddata_product(id) {
        $.ajax({
 
            url: '/api/v1/products/'+id+'?relations[]=producer&relations[]=category&relations[]=inventory&relations[]=image',
            type: 'get',
            dataType: 'json',
            success: function(data) {
                console.log(data);

                var output = "";

                // for(var i = 0; i < data.length; i++){
                    
                    output =   
                        "<td class='center'>"+data.data.id+"</td>"
                        +"<td class='center'>"+data.data.name+"</td>"
                        // +"<td class='center'>"++"</td>"
                        // +"<td class='center'>"++"</td>"
                        +"<td class='center'>"+data.data.price+"</td>"
                        +"<td class='center'>"+data.data.detail+"</td>"
                        +"<td class='center'>"+data.data.producer.name+"</td>"
                        +"<td class='center'>"+data.data.category.type+"</td>"
                        +"<td class='center'>"+data.data.image.image_url+"</td>"
                        +"<td class='center'>"+data.data.inventory.quantity+"</td>"
                        +"<td class='center'>"
                        +"<a href='#' class='orange' data-toggle='modal' id_import_product="+data.data.id+" data-type='import-product' >"
                        +"<i class='ace-icon fa fa-edit bigger-130'></i>"
                        +"</a>"
                        +"</td>"
                        +"<td class='center'>"
                        +"<a href='#' class='blue' data-toggle='modal' id_edit_product="+data.data.id+" data-type='update-product' >"
                        +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
                        +"</a>"
                        +"</td>"
                        +"<td class='center'>"
                        +"<a href='#' class='red delete_product' id_delete_product="+data.data.id+" data-type='delete-product'>"
                        +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                        +"</a>"
                        +"</td>"
 
                    ;
 
                // }
                $("tr[row_id_product="+data.data.id+"]").html(output);

                $('a[data-role=delete-product]').on('click', function(){

                    var id = $(this).attr("id_delete_product");

                    $('#product-delete_id').val(id);
                    $('#deleteModal-product').modal('show');
                    
                });

                $('a[data-role=update-product]').on('click', function(){


                    var id = $(this).attr("id_edit_product");
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

                $('a[data-type=import-product]').click(function(){

                    $('#quantity_product').val("");

                    var id = $(this).attr("id_import_product");

                    $('#import_product_id').val(id);

                    $('#importModal-product').modal('show');

                });
        
            },
            error: function(err){
                alert("Error load data product");
            }
        });
    }

});