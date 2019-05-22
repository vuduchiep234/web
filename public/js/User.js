
jQuery(function($) {

    $('#search').on('click',function(){
        // alert(1);
        var value=$('#data_search').val();
        // alert(value);
        $.ajax({
            type : 'get',
            url : '/searchUser',
            data: {'data_search':value},
            success:function(data){
                // console.log(data);
                $('#body_list_user').html(data);

                $('a[data-type=update-user]').on('click', function(){

                    var id = $(this).attr("id_edit_user");
                    
                    var role_id = $(this).attr("role_id");
                    var role = $(this).attr("role");

                    $('#user_id_').val(id);
                    $("#role_user option[value="+role_id+"]").attr('selected', 'selected');
                    $('#editModal-user').modal('show');
                });

                $('a[data-type=delete-user]').on('click', function(){

                    var id = $(this).attr("id_delete_user");

                    $('#user-delete').val(id);
                    $('#deleteModal-user').modal('show');

                });
                
            },
            error: function(err){
                alert("fail");
                console.log(err);
            }
        });
    });

    $('a[data-type=update-user]').on('click', function(){

        var id = $(this).attr("id_edit_user");
        
        var role_id = $(this).attr("role_id");
        var role = $(this).attr("role");

        $('#user_id_').val(id);
        $("#role_user option[value="+role_id+"]").attr('selected', 'selected');
        $('#editModal-user').modal('show');
    });

    $('a[data-type=delete-user]').on('click', function(){

        var id = $(this).attr("id_delete_user");

        $('#user-delete').val(id);
        $('#deleteModal-user').modal('show');

    });


    $('#edit-user').on('click', function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });

        var id = $('#user_id_').val();
        
        var role_id = $("#role_user option:selected").attr('value');
        // var name = $('#user_name').val();
        // alert(role_id);

        $.ajax({

            url: '/api/v1/users/'+id,
            type: 'patch',
            dataType: "json",
            data: {
                id: id,
                role_id: role_id
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

            url: '/api/v1/users/'+id,
            type: 'delete',
            
            success: function () {
                alert('Success !');
                $('#deleteModal-user').modal('hide');
                $("tr[row_id_user="+id+"]").remove();
            },
            error: function(mess){
                alert("Error! Please, try again.");
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
                        +"<td class='text-center'>"+data.data.role.type+"</td>"
                        // +"<td class='text-center'>"
                        //     +"<a href='#' class='text-yellow' data-toggle='modal' id_edit_user="+data[i].id+" data-type='import-user' name="+data[i].name+" email="+data[i].email+" password="+data[i].password+">"
                        //         +"<i class='ace-icon fa fa-pencil-square-o bigger-130'></i>"
                        //     +"</a>"
                        // +"</td>"
                        +"<td class='text-center'>"
                        +"<a href='#' class='blue' data-toggle='modal' id_edit_user="+data.data.id+" data-type='update-user' name="+data.data.name+" email="+data.data.email+" password="+data.data.password+" role_id="+data.data.role_id+" role="+data.data.role.roleType+">"
                        +"<i class='ace-icon fa fa-pencil bigger-130'></i>"
                        +"</a>"
                        +"</td>"
                        +"<td class='text-center'>"
                        +"<a href='#' class='red delete_user' id_delete_user="+data.data.id+" data-type='delete-user'>"
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
