
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

    // $('#edit-exportBill').on('click', function () {
    //     var id = $('#id-exportBill').val();
    //     // var creator_id = $('#creator_id-exportBill').val();
    //     var bill_id = $('#bill_id-exportBill').val();
        
    //     // var _creator_id = $('#_creator_id').val();
    //     var _bill_id = $('#_bill_id').val();
        

    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }

    //     });

        // if(creator_id !== _creator_id){
        //     $.ajax({
                
        //         url: '/api/v1/exportBills/'+id,
        //         type: 'patch',
        //         data: {creator_id: creator_id, _method: "patch"},
        //         success: function(res) {

        //         }
        //     });
        // }
        // if(bill_id !== _bill_id){
        //     $.ajax({
                
        //         url: '/api/v1/exportBills/'+id,
        //         type: 'patch',
        //         data: {bill_id: bill_id, _method: "patch"},
        //         success: function(res) {

        //         }
        //     });
        // }

        // $.ajax({
                
        //         url: '/api/v1/exportBills/'+id,
        //         type: 'patch',
        //         data: {name: name, phone: phone, email: email, address: address, _method: "patch"},
        //         success: function(res) {

        //         }
        // });
    // });

 //    $('a[data-role=delete-exportBill]').on('click', function(){

 //    	var id = $(this).attr("id");

 //        $('#exportBill-id').val(id);
	// 	$('#deleteModal-exportBill').modal('show');
		


 //    });
 //    $('#_delete-exportBill').on('click', function(){

 //    	var id = $('#exportBill-id').val();
 //    	// alert(id);

 //        $.ajaxSetup({
 //            headers: {
 //                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
 //            }

 //        });

 //        $.ajax({
                
 //                url: '/api/v1/exportBills/'+id,
 //                type: 'delete',
 //                data: {id: id, _method: "delete"},
 //                success: function(res) {

 //                }
 //        });
    			
	// });

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
            data: { _method: "patch"},
            success: function(data){

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
            data: {_method: "delete"},
            success: function(data){

            }
        });
    });



    // $('#between_exportBill').on('click', function(){

    //     var from_date = $('#from_date').val();
    //     var to_date = $('#to_date').val();
    //     // alert(from_date);
    //     // alert(to_date);
    //     alert('/api/v1/exportBills/between?from='+from_date+'&to='+to_date);
    //     $('#body_exportBill').html("<h3>Trong</h3>");

    //     const Http= new XMLHttpRequest();
    //     const url = '/api/v1/exportBills/between?from='+from_date+'&to='+to_date;
    //     Http.open("GET", url);
    //     Http.send();
    //     Http.onreadystatechange=(e)=>{
    //         console.log(Http.responseText);
    //     }

    //     // $.ajaxSetup({"cache":"false"} ) ;
        
    //     // $.ajax({
            
    //     //     url: '/api/v1/exportBills/between' ,
    //     //     type: 'get',
    //     //     dataType: 'json',

    //     //      success: function(data) {
    //     //         $('#body_exportBill').html("<h3>success</h3>");
    //     //         console.log(data);
    //     //         console.log(1);
    //     //         alert(1);
    //     //         var output = "";
                
    //     //         for(var i = 0; i < data.length; i++){

    //     //             output +=   "<tr>"
    //     //                             +"<td>"+data[i].id+"</td>"
    //     //                             +"<td>"+data[i].creator_id+"</td>"
    //     //                             +"<td>"+data[i].bill_id+"</td>"
    //     //                             +"<td>"+data[i].created_at+"</td>"
    //     //                             +"<td class='center'>"
    //     //                                     +"<div class='btn-group'>"
    //     //                                         +"<button data-toggle='dropdown' class='btn btn-sm btn-danger dropdown-toggle' aria-expanded='false'>"
    //     //                                             +"Confirm"
    //     //                                             +"<i class='ace-icon fa fa-angle-down icon-on-right'></i>"
    //     //                                         +"</button>"
    //     //                                         +"<input type='hidden' name='exportBill-id' id='exportBill-id' value='{{$exportBill->id}}'>"
    //     //                                         +"<ul class='dropdown-menu'>"
    //     //                                             +"<li>"
    //     //                                                 +"<a href='#' data='<?php echo($exportBill->id) ?>' class='done' data-toggle='modal' >Thanh cong</a>"
    //     //                                             +"</li>"

    //     //                                             +"<li class='divider'></li>"

    //     //                                             +"<li>"
    //     //                                                 +"<a href='#' class='fail' data='<?php echo($exportBill->id) ?>' data-toggle='modal'>That bai</a>"
    //     //                                             +"</li>"
    //     //                                         +"</ul>"
    //     //                                     +"</div>"

    //     //                                 +"</td>"
                                        
    //     //                                 +"<td class='center' style='padding-top: 13px;'>"
    //     //                                     +"<a class='red' href='#' id='<?php echo $exportBill->id; ?>' data-role='delete-exportBill' data-toggle='modal'>"
    //     //                                         +"<i class='ace-icon fa fa-trash-o bigger-130'></i>"
    //     //                                     +"</a>"

    //     //                                 +"</td>"
    //     //                         +"</tr>";

                    
    //     //         }
    //     //         $('#body_exportBill').html(output);
    //     //     },
    //     //     error: function(err){
    //     //         $('#body_exportBill').html("<h3>error</h3>");
    //     //         alert(err);
    //     //         console.log(err);
    //     //     }

    //     // });
    // });    

    // console.log(1);
});