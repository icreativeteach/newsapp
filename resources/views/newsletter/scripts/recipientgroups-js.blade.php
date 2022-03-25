<script type="text/javascript">
$(document).ready( function () {
	$.ajaxSetup({
	headers: {
	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
	});
	$('#recipientgroup-datatable').DataTable({
		processing: true,
		serverSide: true,
		ajax: "{{ url('recipientgroup-datatable') }}",
		columns: [
			{ data: 'id', name: 'id' },
			{ data: 'name', name: 'name' },
			{ data: 'number_of_recipients', name: 'number_of_recipients' },
			{ data: 'action', name: 'action', orderable: false},
		],
		order: [[0, 'desc']]
	});
});
function recipientgroupAdd(){
	$('#recipientgroupForm').trigger("reset");
	$('#recipientgroupModal').html("Add recipientgroup");
	$('#recipientgroup-modal').modal('show');
	$('#recipientgroupId').val('');
}   
function recipientgroupEdit(id){
	$.ajax({
	type:"POST",
	url: "{{ url('edit-recipientgroup') }}",
	data: { id: id },
	dataType: 'json',
	success: function(res){
		$('#recipientgroupModal').html("Edit recipientgroup");
		$('#recipientgroup-modal').modal('show');
		$('#recipientgroupId').val(res.id);
		$('#recipientgroupName').val(res.name);
	}
	});
}  
function recipientgroupDelete(id){
	if (confirm("Delete Record?") == true) {
		var id = id;
		// ajax
		$.ajax({
			type:"POST",
			url: "{{ url('delete-recipientgroup') }}",
			data: { id: id },
			dataType: 'json',
			success: function(res){
				var oTable = $('#recipientgroup-datatable').dataTable();
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
$('#recipientgroupForm').submit(function(e) {
	e.preventDefault();

	$("#recipientgroupForm").find("div .sw-field__error").remove();
    
    var name=$('#recipientgroupName').val();
    

    $("#recipientgroupName").each(function() {
     
         var data = $(this).val();
          if($(this).val() == '') {
            $(this).parent().after("<div class='sw-field__error' style='color: red;'>This field must not be empty.</div>");
            $(this).parent().addClass('custom-validation-error');
          }
    });
    
        


	var formData = new FormData(this);
	$.ajax({
			type:'POST',
			url: "{{ url('store-recipientgroup')}}",
			data: formData,
			cache:false,
			contentType: false,
			processData: false,
		success: (data) => {
			$("#recipientgroup-modal").modal('hide');
			var oTable = $('#recipientgroup-datatable').dataTable();
			oTable.fnDraw(false);
			$("#recipientgroupSave").html('Submit');
			$("#recipientgroupSave").attr("disabled", false);
		},
		error: function(data){
			console.log(data);
		}
	});
});


//remove nameerror on keyup on update
$(document).on('keyup', '.recipientgroupName', function () { 
     var nameError=$(this).parent().siblings('.sw-field__error').text();
    if(nameError)
    { 
        $(this).parent().siblings('.sw-field__error').text('');
        $(this).parent().siblings('.sw-field__error').remove();
        $(this).parent().removeClass('custom-validation-error'); 
    }
});
</script>