
jQuery(function($) {

    // $('.dropdown_user li').click(function(){

    //     // $('#publisher_id').val($(this).text());
    //     // $('#edit_publisher_id').val($(this).text());
    //     $('#user_role_id').val($(this).attr('id'));
    //     $('#user_role').val($(this).text());

    // });

    // $('#add_user').click(function(){

    //     $('#name_user').val("");
    //     $('#email_user').val("");
    //     $('#password_user').val("");
    //     $('#role_id_user').val("");
    //     $('#myModal-user').modal('show');

    // });

    // $('#add-user').on('click', function(){

    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }

    //     });

    //     var name = $('#name').val();

    //     var email = $('#_email').val();

    //     var password = $('#password').val();

    //     var role_id = $('#user_role_id').val();

    //     $.ajax({

    //         url: "/api/v1/users",
    //         type: 'post',
    //         dataType: 'json',
    //         data: {
    //             0:{
    //                 name: name,
    //                 email: email,
    //                 password: password,
    //                 role_id: role_id
    //             }
    //         },
    //         success: function () {
    //             alert("success!");
    //             $('#myModal-user').modal('hide');
    //             loaddata_user();
    //         },
    //         error: function(mess){
    //             alert("error! Please, try again.");
    //             console.log(mess);
    //         }
    //     });
    // });


    $('a[data-type=update-user]').on('click', function(){

        var id = $(this).attr("id_edit_user");
        var name = $(this).attr("name");
        var email = $(this).attr("email");
        var password = $(this).attr("password");
        var role_id = $(this).attr("role_id");
        var role = $(this).attr("role");

        // alert(id);
       

        $('#user_id_').val(id);
        $('#user_name').val(name);
        $('#user_email').val(email);
        $('#user_password').val(password);
        $('#user_role_id').val(id);
        $('#user_role').val(role);
        $('#editModal-user').modal('show');
    });

    $('a[data-type=delete-user]').on('click', function(){

        var id = $(this).attr("id_delete_user");

        $('#user-delete').val(id);
        $('#deleteModal-user').modal('show');

    });


    // $.ajax({

    //     url: 'api/v1/users/'+'all?relations[]=role',
    //     type: 'get',
    //     dataType: 'json',
    //     success: function(data) {
    //         var output = "";

    //         for(var i = 0; i < data.length; i++){
               
    //             output +=   "<tr>"
    //                             +"<td class='text-center'>"+data[i].id+"</td>"
    //                             +"<td class='text-center'>"+data[i].name+"</td>"
    //                             +"<td class='text-center'>"+data[i].email+"</td>"
    //                             // +"<td class='text-center'>"+data[i].password+"</td>"
    //                             +"<td class='text-center'>"+data[i].role.roleType+"</td>"
    //                             // +"<td class='text-center'>"
    //                             //     +"<a href='#' class='text-yellow' data-toggle='modal' id_edit_user="+data[i].id+" data-type='import-user' name="+data[i].name+" email="+data[i].email+" password="+data[i].password+">"
    //                             //         +"<i class='ace-icon fa fa-pencil-square-o bigger-130'></i>"
    //                             //     +"</a>"
    //                             // +"</td>"
    //                             +"<td class='text-center'>"
    //                                 +"<a href='#' class='text-blue' data-toggle='modal' id_edit_user="+data[i].id+" data-type='update-user' name="+data[i].name+" email="+data[i].email+" password="+data[i].password+" role_id="+data[i].role_id+" role="+data[i].role.roleType+">"
    //                                     +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
    //                                 +"</a>"
    //                             +"</td>"
    //                             +"<td class='text-center'>"
    //                                 +"<a href='#' class='text-red delete_user' id_delete_user="+data[i].id+" data-type='delete-user'>"
    //                                     +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
    //                                 +"</a>"
    //                             +"</td>"

    //                         +"</tr>";

    //         }
    //         $('#body_list_user').html(output);
    //         // $('#addUser').click(function(){


    //         //     $('#name_user').val("");
    //         //     $('#email_user').val("");
    //         //     $('#password_user').val("");
    //         //     $('#role_user').val("");
                
    //         //     $('#myModal-user').modal('show');

    //         // });
    //         $('a[data-type=update-user]').on('click', function(){

    //             var id = $(this).attr("id_edit_user");
    //             var name = $(this).attr("name");
    //             var email = $(this).attr("email");
    //             var password = $(this).attr("password");
    //             var role_id = $(this).attr("role_id");
    //             var role = $(this).attr("role");

    //             // alert(id);
               

    //             $('#user_id_').val(id);
    //             $('#user_name').val(name);
    //             $('#user_email').val(email);
    //             $('#user_password').val(password);
    //             $('#user_role_id').val(id);
    //             $('#user_role').val(role);
    //             $('#editModal-user').modal('show');
    //         });

    //         $('a[data-type=delete-user]').on('click', function(){

    //             var id = $(this).attr("id_delete_user");

    //             $('#user-delete').val(id);
    //             $('#deleteModal-user').modal('show');

    //         });
    //     },
    //     error: function(err){
    //         alert("Fail !");
    //     }
    // });

    $('#_edit-user').on('click', function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        var id = $('#user_id_').val();
        var name = $('#user_name').val();
        var email = $('#user_email').val();
        var password = $('#user_password').val();
        var role_id = $('#user_role_id').val();
        // var name = $('#user_name').val();
        // alert(id);

        $.ajax({

            url: '/api/v1/users/patch?id='+id,
            type: 'patch',
            dataType: "json",
            data: {
                role_id: role_id,
            },
            success: function () {
                alert('Success !');
                $('#editModal-user').modal('hide');

                loaddata_user(id);
                
            },
            error: function(mess){
                alert("error! Please, try again.");
                // console.log(mess);
                $('#editModal-user').modal('hide');

            }
        });
    });


    $('#_delete-user').on('click', function(){

        var id = $('#user-delete').val();
        // alert(id);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        $.ajax({

            url: '/api/v1/users/delete/'+id,
            type: 'delete',
            data: {id: id},
            success: function () {
                alert('Success !');
                $('#deleteModal-user').modal('hide');
                $("tr[row_id_user="+id+"]").remove();
            },
            error: function(mess){
                alert("error! Please, try again.");
                console.log(mess);
            }
        });


    });
    function loaddata_user(id) {
        $.ajax({

            url: 'api/v1/users?id='+id+'&relations[]=role',
            type: 'get',
            dataType: 'json',
            success: function(data) {
                var output = "";

                // for(var i = 0; i < data.length; i++){

                    output =   
                        "<td class='text-center'>"+data.data.id+"</td>"
                        +"<td class='text-center'>"+data.data.name+"</td>"
                        +"<td class='text-center'>"+data.data.email+"</td>"
                        // +"<td class='text-center'>"+data[i].password+"</td>"
                        +"<td class='text-center'>"+data.data.role.roleType+"</td>"
                        // +"<td class='text-center'>"
                        //     +"<a href='#' class='text-yellow' data-toggle='modal' id_edit_user="+data[i].id+" data-type='import-user' name="+data[i].name+" email="+data[i].email+" password="+data[i].password+">"
                        //         +"<i class='ace-icon fa fa-pencil-square-o bigger-130'></i>"
                        //     +"</a>"
                        // +"</td>"
                        +"<td class='text-center'>"
                        +"<a href='#' class='text-blue' data-toggle='modal' id_edit_user="+data.data.id+" data-type='update-user' name="+data.data.name+" email="+data.data.email+" password="+data.data.password+" role_id="+data.data.role_id+" role="+data.data.role.roleType+">"
                        +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
                        +"</a>"
                        +"</td>"
                        +"<td class='text-center'>"
                        +"<a href='#' class='text-red delete_user' id_delete_user="+data.data.id+" data-type='delete-user'>"
                        +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                        +"</a>"
                        +"</td>"

                    ;

                // }
                $("tr[row_id_user="+data.data.id+"]").html(output);
                // $('#addUser').click(function(){


                //     $('#name_user').val("");
                //     $('#email_user').val("");
                //     $('#password_user').val("");
                //     $('#role_user').val("");

                //     $('#myModal-user').modal('show');

                // });
                $('a[data-type=update-user]').on('click', function(){

                    var id = $(this).attr("id_edit_user");
                    var name = $(this).attr("name");
                    var email = $(this).attr("email");
                    var password = $(this).attr("password");
                    var role_id = $(this).attr("role_id");
                    var role = $(this).attr("role");


                    $('#user_id_').val(id);
                    $('#user_name').val(name);
                    $('#user_email').val(email);
                    $('#user_password').val(password);
                    $('#user_role_id').val(id);
                    $('#user_role').val(role);
                    $('#editModal-user').modal('show');
                });

                $('a[data-type=delete-user]').on('click', function(){

                    var id = $(this).attr("id_delete_user");

                    $('#user-delete').val(id);
                    $('#deleteModal-user').modal('show');

                });
            },
            error: function(err){
                alert("Fail !");
            }
        });
    }

    
});
