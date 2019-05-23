
jQuery(function($) {

	$('#addExportBill').click(function(){

        $('#myModal-exportBill').modal('show');
        $('#form-exportBill')[0].reset();

        
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    });

    $('#add-exportBill').on('click', function(){

		
		var creator_id = $('#exportBill-creator_id').val();
		var bill_id = $('#exportBill-bill_id').val();
        // alert(creator_id);
        // alert(bill_id);
		
		$.ajax({
            type: 'post',
            url: "/api/v1/exportBills",
            dataType: "json",
            data: {
                0: {
                    creator_id: creator_id,
                    bill_id: bill_id
                }
            },
            success: function (response) {
            	console.log("success");
                load_data_export();
            },
            error:function(err){
            	console.log("fail");
            }
        });
	});

	$('a[data-role=update-exportBill]').on('click', function(){


    	var id = $(this).attr("id");
    	// var creator_id = $(this).attr("data-creator_id");
    	var bill_id = $(this).attr("data-bill_id");

    	// $('input[data-type=edit]').val(type);
    	$('#id-exportBill').val(id);
    	// $('#creator_id-exportBill').val(creator_id);
    	$('#bill_id-exportBill').val(bill_id);
    	
        // $('#_creator_id').val(creator_id);
        $('#_bill_id').val(bill_id);
       

    	$('#editModal-exportBill').modal('show');
    });

   

    $('.done').on('click', function(){

        var id = $(this).attr('data');

        alert(id);
        $('#doneModal').modal('show');
        $('#button-done').val(id);
    });

    $('#done-bill').on('click', function(){

        var id = $('#button-done').val();
        alert(id);

        $.ajax({
            url: '/api/v1/exportBills/confirm/'+id,
            type: 'patch',
            data: { id: id},
            success: function(data){
                alert("Success !");
                $('#doneModal').modal('hide');
            },
            error: function(err){
                console.log(err);
            }
        });
    });

    $('a[data-role=delete-exportBill]').on('click', function(){

        var id = $(this).attr('id');
        $('#exportBill-id').val(id);
        $('#deleteModal-exportBill').modal('show');
    });

    $('#_delete-exportBill').on('click', function(){
        var id = $('#exportBill-id').val();
        // alert(id);
        $.ajax({
            url: '/api/v1/exportBills/'+id,
            type: 'delete',
            data: {id: id},
            success: function(data){
                alert("Success !");
                $('#deleteModal-exportBill').modal('hide');
                $("tr[row_id_export="+id+"]").remove();
            },
            error: function(err){
                console.log(err);
            }
        });
    });

    function load_data_export(){
        $.ajax({
                    
            url: '/api/v1/exportBills/'+'all',
            type: 'get',
            dataType: 'json',
            success: function(data) {
                var output = "";
                for(var i = 0; i < data.length; i++){

                    output =   "<tr row_id_export="+data[i].id+">"
                                    +"<td class='text-center'>"+data[i].id+"</td>"
                                    +"<td class='text-center'>"+data[i].creator_id+"</td>"
                                    +"<td class='text-center'>"+data[i].bill_id+"</td>"
                                    
                                    +"<td class='center'>"
                                        +"<div class='btn-group'>"
                                            +"<button data-toggle='dropdown' class='btn btn-sm btn-danger dropdown-toggle' aria-expanded='false'>"
                                                +"Confirm"
                                                +"<i class='ace-icon fa fa-angle-down icon-on-right'></i>"
                                            +"</button>"
                                            +"<input type='hidden' name='exportBill-id' id='exportBill-id' value="+data[i].id+">"
                                            +"<ul class='dropdown-menu'>"
                                                +"<li>"
                                                    +"<a href='#' data="+data[i].id+" class='done' data-toggle='modal' >Done</a>"
                                                +"</li>"

                                                
                                            +"</ul>"
                                        +"</div>"

                                        +"</td>"
                                    +"<td class='center' style='padding-top: 13px;'>"
                                        +"<a class='red' href='#' id="+data[i].id+" data-role='delete-exportBill' data-toggle='modal'>"
                                            +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
                                        +"</a>"

                                    +"</td>"
                                    
                                +"</tr>";

                }
                if(i >= 2){
                    $("tr[row_id_export="+data[i-2].id+"]").after(output);
                }
                else{
                    $("#body_list_export").html(output);
                }
                $('.done').on('click', function(){

                    var id = $(this).attr('data');

                    alert(id);
                    $('#doneModal').modal('show');
                    $('#button-done').val(id);
                });

                $('a[data-role=delete-exportBill]').on('click', function(){

                    var id = $(this).attr('id');
                    $('#exportBill-id').val(id);
                    $('#deleteModal-exportBill').modal('show');
                });
                
            },
            error: function(err){
                alert("Error load data");
            }
        });
    }

});