
jQuery(function($) {

    $('#addAuctionProduct').click(function(){

        $('#product').val("");
        $('#auction').val("");
        $('#offer').val("");
        
        $('#myModal-auction_product').modal('show');
        
    });

    $('#search_auction_product').on('click',function(){
        // alert(1);
        var value=$('#data_search').val();
        // alert(value);
        $.ajax({
            type : 'get',
            url : '/searchAuctionProduct',
            data: {'data_search':value},
            success:function(data){
                // console.log(data);
                $('#body_list_auction_product').html(data);

                $('a[data-type=update-auction_product]').on('click', function(){

                    var id = $(this).attr("id_edit_auction_product");
                    
                    var product_id = $(this).attr("product_id");
                    var auction_id = $(this).attr("auction_id");

                    $('#auction_product_id').val(id);
                    $("#_product option[value="+product_id+"]").attr('selected', 'selected');
                    $("#_auction option[value="+auction_id+"]").attr('selected', 'selected');
                    $('#editModal-auction_product').modal('show');
                });

                $('a[data-type=delete-auction_product]').on('click', function(){

                    var id = $(this).attr("id_delete_auction_product");

                    $('#id_auction_product').val(id);
                    $('#deleteModal-auction_product').modal('show');

                });
                
            },
            error: function(err){
                alert("fail");
                console.log(err);
            }
        });
    });

    $('a[data-type=update-auction_product]').on('click', function(){

        var id = $(this).attr("id_edit_auction_product");
        
        var product_id = $(this).attr("product_id");
        var auction_id = $(this).attr("auction_id");

        $.ajax({

            url: 'api/v1/auctions/productAll?productId='+product_id+'&auction_id='+auction_id,
            type: 'get',
            dataType: 'json',
            success: function(data) {

                $('#name_product').text(data[0].product.name);
                $('#price').text(data[0].winner.offer);
                var output = "";
                var name_user = "";

                var user_id = data[0].winner.user_id;
 
                $.ajax({

                    url: 'api/v1/users?id='+user_id+'&relations[]=card',
                    type: 'get',
                    dataType: 'json',
                    success: function(data) {
                        // console.log(data);
                        $('#name_user').text(data.data.name);
                        $('#email').text(data.data.email);
                        if(data.data.role_id == 2){
                            $('#address').remove();
                            $('#phone').remove();
                            $('#_address').remove();
                            $('#_phone').remove();
                            $('#address_users').val("Ha Noi");
                        }

                    },
                    error: function(err){
                        console.log(err);
                    }
                });

                var id_product = data[0].winner.product_id;

                $.ajax({

                    url: 'api/v1/products/'+id_product+'?relations[]=inventory',
                    type: 'get',
                    dataType: 'json',
                    success: function(data) {
                        
                        $('#quantity').text(data.data.inventory.quantity);
                        $('#_quantity').val(data.data.inventory.quantity);
                    },
                    error: function(err){
                        console.log(err);
                    }
                });
                // alert(user_id);
                $('#users_id').val(user_id); 
                $('#address_users').val("Ha Noi");
                $('#_products_id').val(id_product);
                
                $('#_price').val(data[0].winner.offer);
            }

        });
        
        $('#displayModal-winner').modal('show');
    });

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
            success: function () {
                alert("Success !");
                $('#displayModal-winner').modal('hide');
                (".modal-footer").html("");
            },
            error: function(){
                alert("Error! Please, try again.");
            }
        });
    });

    $('a[data-type=delete-auction_product]').on('click', function(){

        var id = $(this).attr("id_delete_auction_product");

        $('#id_auction_product').val(id);
        $('#deleteModal-auction_product').modal('show');

    });

    $('#add-auction_product').on('click', function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        var user_id = $('#user_id').val();
        
        var product_id = $("#product option:selected").attr('value');
        var auction_id = $("#auction option:selected").attr('value');
        var offer = $('#offer').val();
        // alert(user_id);
        // alert(product_id);
        // alert(auction_id);
        // alert(offer);

        $.ajax({

            url: '/api/v1/auctions/auction',
            type: 'post',
            dataType: "json",
            data: {
                user_id: user_id,
                product_id: product_id,
                auction_id: auction_id,
                offer: offer
            },
            success: function (data) {
                alert('Success !');
                console.log(data);
                $('#myModal-auction_product').modal('hide');
                loaddata_auction_product(product_id, auction_id);
            },
            error: function(mess){
                alert("Error! Please, try again.");
                alert(mess);
                $('#myModal-auction_product').modal('hide');

            }
        });
    });


    
    function loaddata_auction_product(product_id, auction_id) {
        $.ajax({

            url: 'api/v1/auctions/productAll?productId='+product_id+'&auction_id='+auction_id,
            type: 'get',
            dataType: 'json',
            success: function(data) {
                var output = "";
                var name_user = "";
                var role_id = 2;

                var user_id = data[0].auction_products[0].user_id;
 
                $.ajax({

                        url: 'api/v1/users?id='+user_id,
                        type: 'get',
                        dataType: 'json',
                        success: function(data) {
                            name_user = data.data.name;
                            role_id = data.data.role_id;
                        },
                        error: function(err){
                            console.log(err);
                        }
                    });
                
                for(var i = 0; i < data.length; i++){
                    var ap = 0;
                    var j = 0 
                    for(j; j < data[i].auction_products.length - 1; j++){
                        ap = data[i].auction_products[j].id;
                        // alert(ap);
                    }
                    if(role_id == 2){
                    
                        output +=   "<tr row_id_auction_product="+data[i].auction_products[j].id+">"
                            +"<td class='text-center'>"+data[i].id+"</td>"
                            +"<td class='text-center'>"+data[i].product.name+"</td>"
                            +"<td class='text-center'>"+name_user+"</td>"
                            +"<td class='text-center'>"+data[i].created_at+"</td>"
                            +"<td class='text-center'>"+data[i].duration+"</td>"
                            +"<td class='text-center'>"+data[i].auction_products[0].offer+"</td>"
                     
                            +"<td class='text-center'>"
                                +"<a href='#' class='blue' id_edit_auction_product="+data[i].id+" product="+data[i].product.name+" duration="+data[i].duration+" user_id="+data[i].winner.user_id+" product_id="+data[i].winner.product_id+" auction_id="+data[i].winner.auction_id+" data-type='auction_product' data-toggle='modal'>"
                                    +"<i class='ace-icon fa fa-eye-slash bigger-130 brown'></i>"
                                +"</a>"
                            +"</td>"

                                
                                +"<td class='text-center'>happenning"
                                    
                                +"</td>"
                                
                            +"</tr>"

                        ;
                    }

                }
                // alert(ap);
                $("#body_list_auction_product").append(output);
                

                $('a[data-type=update-auction_product]').on('click', function(){

                    var id = $(this).attr("id_edit_auction_product");
                    
                    var product_id = $(this).attr("product_id");
                    var auction_id = $(this).attr("auction_id");

                    $('#auction_product_id').val(id);
                    $("#_product option[value="+product_id+"]").attr('selected', 'selected');
                    $("#_auction option[value="+auction_id+"]").attr('selected', 'selected');
                    $('#editModal-auction_product').modal('show');
                });

                $('a[data-type=delete-auction_product]').on('click', function(){

                    var id = $(this).attr("id_delete_auction_product");

                    $('#id_auction_product').val(id);
                    $('#deleteModal-auction_product').modal('show');

                });
            },
            error: function(err){
                alert("Fail !");
                console.log(err);
            }
        });
    }

    


    $('#delete-auction_product').on('click', function(){

        var id = $('#id_auction_product').val();
        // alert(id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $.ajax({

            url: '/api/v1/auction_product/'+id,
            type: 'delete',
            
            success: function () {
                alert('Success !');
                $('#deleteModal-auction_product').modal('hide');
                $("tr[row_id_auction_product="+id+"]").remove();
            },
            error: function(mess){
                alert("Error! Please, try again.");
                console.log(mess);
            }
        });


    });

    
});
