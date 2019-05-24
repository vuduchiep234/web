jQuery(function($) { 

    $('#sign_in').click(function(){

        var email = $('#email_login').val();
        var password = $('#password_login').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/api/v1/users/login',
            type: 'post',
            dataType: 'json',
            data:{
                username: email,
                password: password
            },
            success: function(data){
                // alert(data);
                // alert("Success !");
                console.log(data);
                if(data.User.role_id == 1){
                    window.location.href="/homePage";
                }
                else if(data.User.role_id == 2){
                    window.location.href="/homeAdmin";
                }
                else{
                    alert('You need register account');
                }
                
                
                
            },
            error: function(mess){
                alert("Login fail !");
            }

        });
    });

    $('.logout').click(function(){

        var id = $(this).attr('data_id');
        // alert(id);
        // var password = $('#password_login').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#confirm_logout').modal('show');

        $('#logout_user').click(function(){

            $.ajax({
                url: '/api/v1/users/logout',
                type: 'post',
                dataType: 'json',
                data:{
                    user_id: id
                },
                success: function(data){

                    window.location.href="/homePage";
                   
                },
                error: function(){
                    
                }

            });
        });

        
    });

    $('._change_password').click(function(){

        // var user_id = $('#change_user_id').val();
        // alert($('#password_login').val());

        $('#changePassword-user').modal('show');

        
    });

    //Change Password chua hoan thanh...^^

    $('#change_password').click(function(){

        var current_password = $('#current').val();
        var new_password = $('#new').val();
        var confirm_password = $('#confirm').val();
        var user_id = $('#change_user_id').val();

        // alert(user_id);
        // alert(current_password);
        // alert(new_password);
        // alert(confirm_password);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // $('#confirm_logout').modal('show');

        $.ajax({
            url: 'api/v1/users/changePassword',
            type: 'patch',
            dataType: 'json',
            data: {
                'id': user_id,
                'old_password': current_password,
                'new_password': new_password,
                'c_new_password': confirm_password
            },
            success: function(data){

                alert('Success !');
                $('#changePassword-user').modal('hide');
               
            },
            error: function(err){
                console.log(err);
            }

        });


    });

    $('#register').on('click', function () {
        var name = $('#name_user').val();
        var email = $('#email_user').val();
        var password = $('#password_user').val();
        var retype_pass = $('#re_password_user').val();
        if (name == "" || email == "" || password == "" || retype_pass == "") {
            alert("Nhap day du thong tin")
        } else if (password != retype_pass) {
            alert("Mat khau xac nhan khong dung")
        } else if (password.length<6) {
            alert("Mat khau phai it nhat 6 ki tu")
        }else {
            $.ajax({

                url: "/api/v1/users/register",
                type: 'post',
                dataType: "json",
                data: {

                    name: name,
                    email: email,
                    password: password,
                    c_password: password,
                    role_id: 1

                },
                success: function () {
                    alert("success!");
                    window.location.href = "/login"
                    // alert("success!");
                },
                error: function (err) {
                    console.log(err);
                    alert(err);
                }
            });
        }


    });

    $('.auction_').click(function(){
        var product_id = $(this).attr('product_id');
        var auction_id = $(this).attr('auction_id');
        var user_id = $(this).attr('user_id');
        // alert(user_id);
        if(user_id != ""){
             $('#product_id').val(product_id);
             $('#auction_id').val(auction_id);

            $('#myModal-auction').modal('show');
        }
        else{
            alert('You are not login')
        }
       
    });

    

    $('#_auction').click(function(){
        var product_id = $('#product_id').val();
        var auction_id = $('#auction_id').val();
        // alert(book_id);
        var price = $('#price').val();
        // alert(quantity);
        var user_id = $('#user_id').val();
        // alert(user_id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            
            url: '/api/v1/auctions/auction',
            type: 'post',
            dataType: "json",
            data: {
                user_id: user_id,
                product_id: product_id,
                auction_id: auction_id,
                offer: price
            },
            success: function(data){
                if(data["Message"]){
                    alert(data["Message"]);
                }
                else if (data["Error Message"]) {
                    alert(data["Error Message"]);
                }
                $('#myModal-auction').modal('hide');
                console.log(data);
            },
            error: function(err){
                alert("Must register card to continue");
                console.log(err);
            }
        });

    });

    $('#_register_card').click(function(){

        var id = $(this).attr('data_id');
        // alert(id);
        $('#card_user_id').val(id);
        $('#card').modal('show');
    });

    $('#register_card').click(function(){
        var user_id = $('#card_user_id').val();
        // alert(user_id);
        var address = $('#address').val();
        var phone = $('#phone').val();
        // alert(address);
        // alert(phone);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/api/v1/cards',
            type: 'post',
            dataType: 'json',
            data: {
                0:{
                user_id: user_id,
                address: address,
                phone: phone
                }
                
            },
            success: function(data){
                alert('Success !');
                $('#card').modal('hide');
                // $('#_register_card').text("");
            },
            error: function(err){
                console.log(err);
                alert('Error! Please, try again.');
                $('#card').modal('hide');
            }
        });

    });

    $('#winner').click(function(){

        var product_id = $(this).attr('product_id');
        var auction_id = $(this).attr('auction_id');
        // alert(product_id);
        // alert(auction_id);
        $.ajax({

            url: '/api/v1/auctions/productAll?productId='+product_id+'&auction_id='+auction_id,
            type: 'get',
            dataType: 'json',
            success: function(data) {

                var name_user = "";

                var user_id = data[0].winner.user_id;
 
                $.ajax({

                    url: '/api/v1/users?id='+user_id,
                    type: 'get',
                    dataType: 'json',
                    success: function(data) {
                        
                        $('#name_user').text(data.data.name);

                    },
                    error: function(err){
                        console.log(err);
                    }
                });


                output = 

                        "<tr >"
                            +"<td class='text-center'>"+data[0].winner.product_id+"</td>"
                            +"<td class='text-center'>"+data[0].product.name+"</td>"
                            +"<td class='text-center'>"+data[0].winner.user_id+"</td>"
                            +"<td class='text-center' id='name_user'></td>"
                            +"<td class='text-center'>"+data[0].winner.offer+"</td>"
                            +"<td class='text-center'>"+data[0].winner.created_at+"</td>"  
                        +"</tr>";
                $('#data_winner').html(output);

                console.log(output);
            },
            error: function(err){
                alert('Error!');
                console.log(err);
            }

        });
    });

    $('#my_history').click(function(){

        var product_id = $(this).attr('product_id');
        var auction_id = $(this).attr('auction_id');
        var user_id = $(this).attr('user_id');
        // alert(product_id);
        // alert(auction_id);
        // alert(user_id);
        $.ajax({

            url: '/api/v1/auctions/productAll?productId='+product_id+'&auction_id='+auction_id,
            type: 'get',
            dataType: 'json',
            success: function(data) {

                var name_user = "";
                var output = "";
                var output1 = "";
                var flag = 0;
 
                $.ajax({

                    url: '/api/v1/users?id='+user_id,
                    type: 'get',
                    dataType: 'json',
                    success: function(data) {
                        
                        $('.name_user').text(data.data.name);

                    },
                    error: function(err){
                        console.log(err);
                    }
                });

                

                    for(var j = 0; j < data[0].auction_products.length; j++){
                        if(data[0].auction_products[j].user_id == user_id){
                            flag = 1;
                            output += 

                            "<tr >"
                                +"<td class='text-center'>"+data[0].auction_products[j].product_id+"</td>"
                                +"<td class='text-center'>"+data[0].product.name+"</td>"
                                +"<td class='text-center'>"+user_id+"</td>"
                                +"<td class='text-center name_user'></td>"
                                +"<td class='text-center'>"+data[0].auction_products[j].offer+"</td>"
                                +"<td class='text-center'>"+data[0].auction_products[j].created_at+"</td>"  
                            +"</tr>";
                            
                        }
                        
                    }
                    if(flag == 0){

                            output= "<tr>"
                                +"<td class='text-center' colspan='6'>No Data Found</td>"
                           +"</tr>";
                           
                        
                    }
                    $('#data_history').html(output);
                
                
                
                

                console.log(output);
            },
            error: function(err){
                alert('Error!');
                console.log(err);
            }

        });
    });

    $('#data_search').keyup(function(){ 
        var value = $('#data_search').val();
        // alert(value);
        if(value != '')
        {
         // var _token = $('input[name="_token"]').val();
            $.ajax({
                type : 'get',
                url : '/searchProductUser',
                data: {'data_search':value},
                success:function(data){
                    console.log(data);
                   $('#dataList').fadeIn();  
                    $('#dataList').html(data);
                },
                error: function(err){
                    console.log(err);
                }
            });
        }
    });

    $(document).on('click', 'li', function(){  
        $('#data_search').val($(this).text());  
        $('#dataList').fadeOut();  
    });
    
});
