
jQuery(function($) {

	$('#addImportBill').click(function(){

        $('#product_id').val("");
        $('#importBill-quantity').val("");
        $('#importBill-price').val("");
        $('#myModal-importBill').modal('show');
        
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
 
    });

    $('#add-importBill').on('click', function(){

		
		var creator_id = $('#importBill-creator_id').val();
		var product_id = $("select#product_id option:checked").val();
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
            	alert("Success !");
                $('#myModal-importBill').modal('hide');
                load_data_import();
            },
            error:function(err){
            	alert("Error! Please, try again.");
                $('#myModal-importBill').modal('hide');
                console.log(err);
            }
        });
	});

	$('a[data-role=update-importBill]').on('click', function(){


    	var id = $(this).attr("id_edit_import");
    	// var creator_id = $(this).attr("data-creator_id");
    	var product_id = $(this).attr("data-product_id");
    	var quantity = $(this).attr("data-quantity");
    	var price = $(this).attr("data-price");
    	// alert(1);

    	// $('input[data-type=edit]').val(type);
    	$('#id-importBill').val(id);
    	// $('#creator_id-importBill').val(creator_id);
    	$("#id_product option[value="+product_id+"]").attr('selected', 'selected');
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
        var product_id = $('#id_product option:selected').attr('value');
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

        var data = {};

        data.id = parseInt(id);

        if(product_id !== _product_id){
            data.product_id = product_id;
        }

        if(quantity !== _quantity){
            data.quantity = parseInt(quantity);
        }

        if(price !== _price){
            data.price = parseInt(price);
        }
        console.log(data);
        $.ajax({
                
                url: '/api/v1/importBills/'+id,
                type: 'patch',
                data: data,
                success: function(res) {
                    alert('Success !');
                    loaddata_import(id);
                    $('#editModal-importBill').modal('hide');
                },
                error:function(err){
                    alert("Error! Please, try again.");
                    $('#editModal-importBill').modal('hide');
                    console.log(err);
                }
            });

    });

    $('a[data-role=delete-importBill]').on('click', function(){

    	var id = $(this).attr("id_delete_import");

        $('#importBill-id').val(id);
		$('#deleteModal-importBill').modal('show');
		


    });
    $('#_delete-importBill').on('click', function(){

    	var id = $('#importBill-id').val();
    	alert(id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $.ajax({
                
                url: '/api/v1/importBills/'+id,
                type: 'delete',
                data: {id: id},
                success: function(res) {
                    $("tr[row_id_import="+id+"]").remove();
                    $('#deleteModal-importBill').modal('hide');
                },
                error:function(err){
                    alert("Error! Please, try again.");
                    $('#deleteModal-importBill').modal('hide');
                    console.log(err);
                }
        });

	});

    function load_data_import(){
        $.ajax({
                    
            url: '/api/v1/importBills/'+'all?relations[]=product&relations[]=creator',
            type: 'get',
            dataType: 'json',
            success: function(data) {
                var output = "";
                for(var i = 0; i < data.length; i++){

                    output =   "<tr row_id_import="+data[i].id+">"
                                    +"<td class='text-center'>"+data[i].id+"</td>"
                                    +"<td class='text-center'>"+data[i].creator.name+"</td>"
                                    +"<td class='text-center'>"+data[i].product.name+"</td>"
                                    +"<td class='text-center'>"+data[i].quantity+"</td>"
                                    +"<td class='text-center'>"+data[i].price+"</td>"
                                    +"<td class='text-center'>"
                                        +"<a href='#' class='blue' data-toggle='modal' id_edit_import="+data[i].id+" import_product_id="+data[i].creator_id+" data-quantity="+data[i].quantity+" data-price="+data[i].price+" data-role='update-importBill'>"
                                            +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
                                        +"</a>"
                                    +"</td>"
                                    +"<td class='text-center'>"
                                        +"<a href='#' class='red delete_import' id_delete_import="+data[i].id+" data-role='delete-importBill' data-toggle='modal'>"
                                            +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                                        +"</a>"
                                    +"</td>"
                                    
                                +"</tr>";

                }
                if(i >= 2){
                    $("tr[row_id_import="+data[i-2].id+"]").after(output);
                }
                else{
                    $("#body_list_import").html(output);
                }
                
                // $('#body_list_import').html(output);
                $('a[data-role=update-importBill]').on('click', function(){


                    var id = $(this).attr("id_edit_import");
                    // var creator_id = $(this).attr("data-creator_id");
                    var product_id = $(this).attr("import_product_id");
                    var quantity = $(this).attr("data-quantity");
                    var price = $(this).attr("data-price");
                    // alert(1);

                    // $('input[data-type=edit]').val(type);
                    $('#id-importBill').val(id);
                    // $('#creator_id-importBill').val(creator_id);
                    $("#id_product option[value="+product_id+"]").attr('selected', 'selected');
                    $('#quantity-importBill').val(quantity);
                    $('#price-importBill').val(price);

                    // $('#_creator_id').val(creator_id);
                    $('#_product_id').val(product_id);
                    $('#_quantity').val(quantity);
                    $('#_price').val(price);

                    $('#editModal-importBill').modal('show');
                });

                $('a[data-role=delete-importBill]').on('click', function(){

                    var id = $(this).attr("id");

                    $('#importBill-id').val(id);
                    $('#deleteModal-importBill').modal('show');

                });

                // alert('success');
            },
            error: function(err){
                alert("Error load data");
            }
        });
    }

    function loaddata_import(id){
        $.ajax({
                    
            url: '/api/v1/importBills/'+id+'?relations[]=product&relations[]=creator',
            type: 'get',
            dataType: 'json',
            success: function(data) {
                var output = "";
                // for(var i = 0; i < data.length; i++){

                    output = 
                            "<td class='text-center'>"+data.data.id+"</td>"
                            +"<td class='text-center'>"+data.data.creator.name+"</td>"
                            +"<td class='text-center'>"+data.data.product.name+"</td>"
                            +"<td class='text-center'>"+data.data.quantity+"</td>"
                            +"<td class='text-center'>"+data.data.price+"</td>"
                            +"<td class='text-center'>"
                                +"<a href='#' class='blue' data-toggle='modal' id_edit_import="+data.data.id+" import_product_id="+data.data.creator_id+" data-quantity="+data.data.quantity+" data-price="+data.data.price+" data-role='update-importBill'>"
                                    +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
                                +"</a>"
                            +"</td>"
                            +"<td class='text-center'>"
                                +"<a href='#' class='red delete_import' id_delete_import="+data.data.id+" data-role='delete-importBill' data-toggle='modal'>"
                                    +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                                +"</a>"
                            +"</td>"
                            
                        ;

                // }
               
                $("tr[row_id_import="+data.data.id+"]").html(output);
          
                
                // $('#body_list_import').html(output);
                $('a[data-role=update-importBill]').on('click', function(){


                    var id = $(this).attr("id_edit_import");
                    // var creator_id = $(this).attr("data-creator_id");
                    var product_id = $(this).attr("import_product_id");
                    var quantity = $(this).attr("data-quantity");
                    var price = $(this).attr("data-price");
                    // alert(1);

                    // $('input[data-type=edit]').val(type);
                    $('#id-importBill').val(id);
                    // $('#creator_id-importBill').val(creator_id);
                    $("#id_product option[value="+product_id+"]").attr('selected', 'selected');
                    $('#quantity-importBill').val(quantity);
                    $('#price-importBill').val(price);

                    // $('#_creator_id').val(creator_id);
                    $('#_product_id').val(product_id);
                    $('#_quantity').val(quantity);
                    $('#_price').val(price);

                    $('#editModal-importBill').modal('show');
                });

                $('a[data-role=delete-importBill]').on('click', function(){

                    var id = $(this).attr("id");

                    $('#importBill-id').val(id);
                    $('#deleteModal-importBill').modal('show');

                });



                // alert('success');
            },
            error: function(err){
                alert("Error load data");
            }
        });
    }

    $('#search_import').on('click',function(){
        // alert(1);
        var value=$('#data_search').val();
        // alert(value);
        $.ajax({
            type : 'get',
            url : '/searchImport',
            data: {'data_search':value},
            success:function(data){
                // console.log(data);
                $('#body_list_import').html(data);

                $('a[data-role=update-importBill]').on('click', function(){


                    var id = $(this).attr("id_edit_import");
                    // var creator_id = $(this).attr("data-creator_id");
                    var product_id = $(this).attr("import_product_id");
                    var quantity = $(this).attr("data-quantity");
                    var price = $(this).attr("data-price");
                    // alert(1);

                    // $('input[data-type=edit]').val(type);
                    $('#id-importBill').val(id);
                    // $('#creator_id-importBill').val(creator_id);
                    $("#id_product option[value="+product_id+"]").attr('selected', 'selected');
                    $('#quantity-importBill').val(quantity);
                    $('#price-importBill').val(price);

                    // $('#_creator_id').val(creator_id);
                    $('#_product_id').val(product_id);
                    $('#_quantity').val(quantity);
                    $('#_price').val(price);

                    $('#editModal-importBill').modal('show');
                });

                $('a[data-role=delete-importBill]').on('click', function(){

                    var id = $(this).attr("id");

                    $('#importBill-id').val(id);
                    $('#deleteModal-importBill').modal('show');

                });
                
            },
            error: function(err){
                alert("fail");
                console.log(err);
            }
        });
    });

});