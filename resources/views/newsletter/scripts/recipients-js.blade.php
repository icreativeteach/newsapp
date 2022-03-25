<script type="text/javascript">
$(document).ready( function () {
	$.ajaxSetup({
	headers: {
	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
	});
	$('#recipient-datatable').DataTable({
		processing: true,
		serverSide: true,
		ajax: "{{ url('recipient-datatable') }}",
		columns: [
			{ data: 'id', name: 'id' },
			{ data: 'email', name: 'email' },
			{ data: 'name', name: 'name' },
		     { data: 'customer', name: 'customer' },
		     { data: 'lastmailing', name: 'lastmailing' },
		     
		     { data: 'lastread', name: 'lastread' },
		    	{ data: 'added', name: 'added' },
		    	{ data: 'double_optin_confirmed', name: 'double_optin_confirmed' },
		    	
			{ data: 'action', name: 'action', orderable: false},
		],
		order: [[0, 'desc']]
	});
});
function recipientAdd(){
	$('#recipientForm').trigger("reset");
	$('#recipientModal').html("Add recipient");
	$('#recipient-modal').modal('show');
	$('#recipientId').val('');
}   
function recipientEdit(id){
	$.ajax({
	type:"POST",
	url: "{{ url('edit-recipient') }}",
	data: { id: id },
	dataType: 'json',
	success: function(res){
		$('#recipientModal').html("Edit recipient");
		$('#recipient-modal').modal('show');
		$('#recipientId').val(res.id);
		$('#recipientName').val(res.name);
	}
	});
}  
function recipientDelete(id){
	if (confirm("Delete Record?") == true) {
		var id = id;
		// ajax
		$.ajax({
			type:"POST",
			url: "{{ url('delete-recipient') }}",
			data: { id: id },
			dataType: 'json',
			success: function(res){
				var oTable = $('#recipient-datatable').dataTable();
				oTable.fnDraw(false);
				}
			});
	}
	// var rid = id;
	// $("#deleteModal").modal('show');

	// //if (confirm("Delete Record?") == true) {
	// $('.hardDelete').on('click', function(e){
	// 	var id = rid;
	// 	alert("deleteid--rid---"+id);
	// 	// ajax
	// 	$.ajax({
	// 		type:"POST",
	// 		url: "{{ url('delete-recipientgroup') }}",
	// 		data: { id: id },
	// 		dataType: 'json',
	// 		success: function(res){
	// 			var oTable = $('#recipientgroup-datatable').dataTable();
	// 			oTable.fnDraw(false);
	// 			$("#deleteModal").modal('hide');
	// 			}
	// 		});
	//  });
	// //}
}
$('#recipientForm').submit(function(e) {
	e.preventDefault();

	$("#recipientForm").find("div .sw-field__error").remove();
    
    var email=$('#recipientEmail').val();


    

    $("#recipientEmail , #selectedRecipientGroup").each(function() {
         var data = $(this).val();
          if($(this).val() == '') {
            $(this).parent().after("<div class='sw-field__error' style='color: red;'>This field must not be empty.</div>");
            $(this).parent().addClass('custom-validation-error');
          }
    });
   

    if(email != "")
         {
            var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var testEmail = regex.test(email);
            if(testEmail== false)
            {
                 $('#recipientEmail').parent().after("<div class='sw-field__error' style='color: red;'>This value is not a valid email address.</div>");
                $('#recipientEmail').parent().addClass('custom-validation-error');
                return false;
            }    
        }
        


	var formData = new FormData(this);
	$.ajax({
			type:'POST',
			url: "{{ url('store-recipient')}}",
			data: formData,
			cache:false,
			contentType: false,
			processData: false,
		success: (data) => {
			$("#recipient-modal").modal('hide');
			var oTable = $('#recipient-datatable').dataTable();
			oTable.fnDraw(false);
			$("#recipientSave").html('Submit');
			$("#recipientSave").attr("disabled", false);
		},
		error: function(data){
			console.log(data);
		}
	});
});


//remove nameerror on keyup on update
$(document).on('keyup', '.recipientEmail', function () { 
     var emailError=$(this).parent().siblings('.sw-field__error').text();
    if(emailError)
    { 
        $(this).parent().siblings('.sw-field__error').text('');
        $(this).parent().siblings('.sw-field__error').remove();
        $(this).parent().removeClass('custom-validation-error'); 
    }
});
$(document).on('change', '.selectedRecipientGroup', function () { 
     var selectedRecipientGroupError=$(this).parent().siblings('.sw-field__error').text();
    if(selectedRecipientGroupError)
    { 
        $(this).parent().siblings('.sw-field__error').text('');
        $(this).parent().siblings('.sw-field__error').remove();
        $(this).parent().removeClass('custom-validation-error'); 
    }
});
</script>