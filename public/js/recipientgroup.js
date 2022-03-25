

$( document ).ready(function() {
function hideDeleteAllRecipientGroup(){
        if ($('#recipientgroup-tbody').children().length>0)
        {      
            $('.deleteAllRecipientgroup').show();
        }
        else
        {  
            $('.deleteAllRecipientgroup').hide();
        }
    }
    hideDeleteAllRecipientGroup();
});




 // default on page load
$('.recipientgroup-create-form').hide();
$('.recipientgroup-edit-form').hide(); 
$('.deleterecipientgroup-bulk').hide();

// //click of create sender button
$('.btn-create-recipientgroup').click(function(){
    $('.recipientgroup-create-form').show(); 
    $('.recipientgroup-list').hide();
    $('.recipientgroup-edit-form').hide();
});

$(document).on('click', '.btn-create-recipientgroup', function (e) { 
  
    e.preventDefault();
    $("#createRecipientGroup").find("div .sw-field__error").remove();
    var recipientGroupName=$('.recipientGroupName').val();
    
    $(".recipientGroupName").each(function() {
         var data = $(this).val();
          if($(this).val() == '') {
            $(this).parent().after("<div class='sw-field__error' style='color: red;'>This field must not be empty.</div>");
            $(this).parent().addClass('custom-validation-error');
          }
    });

     $.ajax
    ({
        type:'POST',
        url: "{{ url('newslettersender/store') }}",
        headers: {
            //'X-CSRF-TOKEN': '{{ $CSRFToken }}'
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data:{'_token': '{{ $CSRFToken }}',email : email,name : name},
        success: function(data){
            console.log(data);
            console.log(data.id);
            console.log(data.length);

            $('.email').val('');
            $('.name').val('');
            $('.newsletter-sender-create-form').hide(); 
            $('.newsletter-sender-list').show();

            //$('.newsletter-sender-edit-form').hide();
             //console.log("insertdata"+data);
             
            //$('#sender-tbody').
            //for(var i=0 ;i<data.length ; i++){
             //   console.log(data[i].id);
                // 
            //}
            var tr_str =  "<tr class='sw-data-grid__row sw-data-grid__row--0 sender-"+data.id+"' id="+data.id+"><td class='sw-data-grid__cell sw-data-grid__cell--selection'><div class='sw-data-grid__cell-content'><div class='sw-field--checkbox'><div class='sw-field--checkbox__content'><div class='sw-field__checkbox'><input id='deleteSelectedSender' type='checkbox' name='deleteSelectedSender[]' value='"+data.id+" 'data-id='"+data.id+"' class='deleteSelectedSender'> <div class='sw-field__checkbox-state'> <span class='sw-icon icon--small-default-checkmark-line-small sw-icon--fill' style='width: 16px; height: 16px;'> <svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='16' height='16' viewBox='0 0 16 16'><defs><path id='icons-small-default-checkmark-line-small-a' d='M5.70710678,7.29289322 C5.31658249,6.90236893 4.68341751,6.90236893 4.29289322,7.29289322 C3.90236893,7.68341751 3.90236893,8.31658249 4.29289322,8.70710678 L6.29289322,10.7071068 C6.68341751,11.0976311 7.31658249,11.0976311 7.70710678,10.7071068 L11.7071068,6.70710678 C12.0976311,6.31658249 12.0976311,5.68341751 11.7071068,5.29289322 C11.3165825,4.90236893 10.6834175,4.90236893 10.2928932,5.29289322 L7,8.58578644 L5.70710678,7.29289322 Z'></path></defs><use fill='#758CA3' fill-rule='evenodd' xlink:href='#icons-small-default-checkmark-line-small-a'></use> </svg> </span> </div> </div> </div> </div> </td> <td class='sw-data-grid__cell'> <div class='sw-data-grid__cell-content'> <div> <a href='#/sw/product/detail/c95cce60de474cbea135422fd4094985' class=''>"+ data.email+" </a> </div> </div> </td> <td class='sw-data-grid__cell'> <div class='sw-data-grid__cell-content'> <span class='sw-data-grid__cell-value'> "+ data.name+" </span> </div> </td> <td class='sw-data-grid__cell sw-data-grid__cell--actions custom-options' data-id='"+data.id+"' id='"+data.name+"'> <div class='sw-data-grid__cell-content'> <div class='sw-context-button sw-data-grid__actions-menu'> <button class='sw-context-button__button'> <span aria-hidden='true' class='sw-icon icon--small-more sw-icon--fill sw-icon--small'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'> <path fill='#758CA3' fill-rule='evenodd' d='M3.5,9.5 C2.67157288,9.5 2,8.82842712 2,8 C2,7.17157288 2.67157288,6.5 3.5,6.5 C4.32842712,6.5 5,7.17157288 5,8 C5,8.82842712 4.32842712,9.5 3.5,9.5 Z M8,9.5 C7.17157288,9.5 6.5,8.82842712 6.5,8 C6.5,7.17157288 7.17157288,6.5 8,6.5 C8.82842712,6.5 9.5,7.17157288 9.5,8 C9.5,8.82842712 8.82842712,9.5 8,9.5 Z M12.5,9.5 C11.6715729,9.5 11,8.82842712 11,8 C11,7.17157288 11.6715729,6.5 12.5,6.5 C13.3284271,6.5 14,7.17157288 14,8 C14,8.82842712 13.3284271,9.5 12.5,9.5 Z'></path> </svg> </span> </button> <!----></div> <!----></div> </td></tr>";

 
              $("#sender-tbody").append(tr_str);
               hideDeleteAllSender();


             
        },
        error: function (data) {
            $('.newsletter-sender-create-form').show(); 
            $('.newsletter-sender-list').hide(); 
            //$('.newsletter-sender-edit-form').hide();
            //$('#emailError').text(data.responseJSON.errors.email);
            //$('#nameError').text(data.responseJSON.errors.name);
        }
    });

});


