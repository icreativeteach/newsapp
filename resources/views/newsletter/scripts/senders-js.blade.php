<script type="text/javascript">
$(document).ready( function () {
	$.ajaxSetup({
	headers: {
	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
	});
	$('#sender-datatable').DataTable({
		processing: true,
		serverSide: true,
		ajax: "{{ url('sender-datatable') }}",
		columns: [
			{ data: 'id', name: 'id' },
			{ data: 'email', name: 'email' },
			{ data: 'name', name: 'name' },
			{ data: 'action', name: 'action', orderable: false},
		],
		order: [[0, 'desc']]
	});
});
function senderAdd(){
	$('#senderForm').trigger("reset");
	$('#senderModal').html("Add Sender");
	$('#sender-modal').modal('show');
	$('#senderId').val('');
}   
function senderEdit(id){
	$.ajax({
	type:"POST",
	url: "{{ url('edit-sender') }}",
	data: { id: id },
	dataType: 'json',
	success: function(res){
		$('#senderModal').html("Edit Sender");
		$('#sender-modal').modal('show');
		$('#senderId').val(res.id);
		$('#senderEmail').val(res.email);
		$('#senderName').val(res.name);
	}
	});
}  
function senderDelete(id){
//alert("idddd"+id);
var sid = id;
//$("#deleteModal").modal('show');
	// if (confirm("Delete Record?") == true) {
	// 	var id = id;
	// 	// ajax
	// 	$.ajax({
	// 		type:"POST",
	// 		url: "{{ url('delete-sender') }}",
	// 		data: { id: id },
	// 		dataType: 'json',
	// 		success: function(res){
	// 			var oTable = $('#sender-datatable').dataTable();
	// 			oTable.fnDraw(false);
	// 			}
	// 		});
	// }

	$("#deleteModal").modal('show');
	//if (confirm("Delete Record?") == true) {
	$('.hardDelete').on('click', function(e){
		//var id = id;
		//alert(id);
		var id = sid;
		alert("deleteid---"+id);
		// ajax
		$.ajax({
			type:"POST",
			url: "{{ url('delete-sender') }}",
			data: { id: id },
			dataType: 'json',
			success: function(res){
				var oTable = $('#sender-datatable').dataTable();
				oTable.fnDraw(false);
				$("#deleteModal").modal('hide');
				}
			});
	 });
	 //}
}
$('#senderForm').submit(function(e) {
	e.preventDefault();

	$("#senderForm").find("div .sw-field__error").remove();
    var email=$('#senderEmail').val();
    var name=$('#senderName').val();
    

    $("#senderEmail, #senderName").each(function() {
     
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
                 $('#senderEmail').parent().after("<div class='sw-field__error' style='color: red;'>This value is not a valid email address.</div>");
                $('#senderEmail').parent().addClass('custom-validation-error');
                return false;
            }    
        }
        


	var formData = new FormData(this);
	$.ajax({
			type:'POST',
			url: "{{ url('store-sender')}}",
			data: formData,
			cache:false,
			contentType: false,
			processData: false,
		success: (data) => {
			$("#sender-modal").modal('hide');
			var oTable = $('#sender-datatable').dataTable();
			oTable.fnDraw(false);
			$("#senderSave").html('Submit');
			$("#senderSave").attr("disabled", false);
		},
		error: function(data){
			console.log(data);
		}
	});
});


//remove emailerror on keyup on update
$(document).on('keyup', '.senderEmail', function () {
    var emailError=$(this).parent().siblings('.sw-field__error').text();
    if(emailError)
    {
        $(this).parent().siblings('.sw-field__error').text('');
        $(this).parent().siblings('.sw-field__error').remove();
        $(this).parent().removeClass('custom-validation-error');

    }
    
});

//remove nameerror on keyup on update
$(document).on('keyup', '.senderName', function () { 
     var nameError=$(this).parent().siblings('.sw-field__error').text();
    if(nameError)
    { 
        $(this).parent().siblings('.sw-field__error').text('');
        $(this).parent().siblings('.sw-field__error').remove();
        $(this).parent().removeClass('custom-validation-error'); 
    }
});
</script>