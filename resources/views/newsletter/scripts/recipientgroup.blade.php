<script type="text/javascript">

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

</script>

<script type="text/javascript">
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

$(document).on('click', '.recipientgroup-btn-create', function (e) { 

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
        url: "{{ url('reciptientgroup/store') }}",
        headers: {
            //'X-CSRF-TOKEN': '{{ $CSRFToken }}'
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

        data:{'_token': '{{ $CSRFToken }}',recipientGroupName : recipientGroupName},
        success: function(data){
            console.log(data);
            console.log(data.id);
            console.log(data.length);

            $('.recipientGroupName').val('');
           
            $('.recipientgroup-create-form').hide(); 
            $('.recipientgroup-list').show();

            
            var tr_str =  "<tr class='sw-data-grid__row sw-data-grid__row--0 recipientgroup-"+data.id+"' id='"+data.id+"'><td class='sw-data-grid__cell sw-data-grid__cell--selection'><div class='sw-data-grid__cell-content'><div class='sw-field--checkbox'><div class='sw-field--checkbox__content'><div class='sw-field__checkbox'><input id='deleteSelectedRecipientgroup' type='checkbox' name='deleteSelectedRecipientgroup[]' value='"+data.id+"' data-id='"+data.id+"' class='deleteSelectedRecipientgroup'><div class='sw-field__checkbox-state'><span class='sw-icon icon--small-default-checkmark-line-small sw-icon--fill' style='width: 16px; height: 16px;'><svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='16' height='16' viewBox='0 0 16 16'><defs><path id='icons-small-default-checkmark-line-small-a' d='M5.70710678,7.29289322 C5.31658249,6.90236893 4.68341751,6.90236893 4.29289322,7.29289322 C3.90236893,7.68341751 3.90236893,8.31658249 4.29289322,8.70710678 L6.29289322,10.7071068 C6.68341751,11.0976311 7.31658249,11.0976311 7.70710678,10.7071068 L11.7071068,6.70710678 C12.0976311,6.31658249 12.0976311,5.68341751 11.7071068,5.29289322 C11.3165825,4.90236893 10.6834175,4.90236893 10.2928932,5.29289322 L7,8.58578644 L5.70710678,7.29289322 Z'></path></defs><use fill='#758CA3' fill-rule='evenodd' xlink:href='#icons-small-default-checkmark-line-small-a'></use></svg></span></div></div> </div></div></td> <td class='sw-data-grid__cell'><div class='sw-data-grid__cell-content'><span class='sw-data-grid__cell-value'>"+data.name+"</span></div></td><td class='sw-data-grid__cell'><div class='sw-data-grid__cell-content'> <span class='sw-data-grid__cell-value'>"+data.id+"</span></div></td><td class='sw-data-grid__cell'><div class='sw-data-grid__cell-content'><span class='sw-data-grid__cell-value'>"+data.id+"</span></div></td><td class='sw-data-grid__cell sw-data-grid__cell--actions custom-recipientgroup-options' data-id='"+data.id+"'><div class='sw-data-grid__cell-content'><div class='sw-context-button sw-data-grid__actions-menu'><button class='sw-context-button__button'><span aria-hidden='true' class='sw-icon icon--small-more sw-icon--fill sw-icon--small'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'><path fill='#758CA3' fill-rule='evenodd' d='M3.5,9.5 C2.67157288,9.5 2,8.82842712 2,8 C2,7.17157288 2.67157288,6.5 3.5,6.5 C4.32842712,6.5 5,7.17157288 5,8 C5,8.82842712 4.32842712,9.5 3.5,9.5 Z M8,9.5 C7.17157288,9.5 6.5,8.82842712 6.5,8 C6.5,7.17157288 7.17157288,6.5 8,6.5 C8.82842712,6.5 9.5,7.17157288 9.5,8 C9.5,8.82842712 8.82842712,9.5 8,9.5 Z M12.5,9.5 C11.6715729,9.5 11,8.82842712 11,8 C11,7.17157288 11.6715729,6.5 12.5,6.5 C13.3284271,6.5 14,7.17157288 14,8 C14,8.82842712 13.3284271,9.5 12.5,9.5 Z'></path></svg></span></button></div></div></td></tr>";

 
              $("#recipientgroup-tbody").append(tr_str);
               hideDeleteAllRecipientGroup();
 
        },
        error: function (data) {
            $('.recipientgroup-create-form').show(); 
            $('.recipientgroup-list').hide();
        }
    });

});

//remove nameerror on keyup on update
$(document).on('keyup', '.recipientGroupName', function () { 
     var recipientGroupNameError=$(this).parent().siblings('.sw-field__error').text();
    if(recipientGroupNameError)
    { 
        $(this).parent().siblings('.sw-field__error').text('');
        $(this).parent().siblings('.sw-field__error').remove();
        $(this).parent().removeClass('custom-validation-error'); 
    }
});
//cancel click of create form    
$(document).on('click', '.recipientgroup-btn-create-cancel', function () { 
    $('.recipientgroup-list').show();
    $('.recipientgroup-create-form').hide(); 

});

$('body').click(function() {
   $('.custom-recipientgroup-context').remove();
   $('.custom-recipientgroup-options').removeClass('show');
});



$(document).on('click', '.custom-recipientgroup-options' , function(e){
    e.preventDefault();
    $(".custom-recipientgroup-context").remove();
    var dataid = $(this).attr("data-id");
    var getClass = $(this);
    var col   = getClass.position();
    var colLeft = col.left ;
    var colTop = col.top ;
    var newTop = colTop + 46 + "px";
    var newLeft = colLeft + 12 + "px";
        if ($(this).hasClass('show')){
            $(this).removeClass('show');
            $(".custom-recipientgroup-context").remove();
        } 
        else 
        {
            $(this).addClass('show');
            $(this).after("<div class='sw-context-menu custom-recipientgroup-context' style='width: 220px;'><div class='sw-context-menu__content'><div class='sw-tooltip--wrapper edit-recipientgroup' data-id ="+dataid+"><a href='#' class='sw-context-menu-item sw-entity-listing__context-menu-edit-action'><span class='sw-context-menu-item__text'>Edit</span></a></div><div class='sw-tooltip--wrapper delete-recipientgroup' data-id ="+dataid+"><div class='sw-context-menu-item sw-entity-listing__context-menu-edit-delete sw-context-menu-item--danger'><span class='sw-context-menu-item__text'>Delete</span></div></div></div></div>");
           var styles = {'top': newTop, 'left' : newLeft, 'position': 'absolute'}
            $( ".custom-recipientgroup-context" ).css(styles);
        }
   });

    //get deta for edit     
    $(document).on('click', '.edit-recipientgroup', function(e){
        e.preventDefault();
        var dataid = $(this).data('id');
        $.ajax
            ({
                type:'GET',
                url: "{{ url('reciptientgroup/edit/')}}/"+dataid,
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{dataid : dataid},
                success: function(data){ 
                // console.log(data);   
                    $('.recipientgroup-edit-form').show();
                    $('.recipientgroup-create-form').hide(); 
                    $('.recipientgroup-list').hide();
                    $('.editRecipientGroupName').val(data.name);
                    $('.recipientgroupId').val(data.id);
                }
            });
    });

    //update data
    $(document).on('click', '.recipientgroup-btn-update', function (e) { 
       // alert("fhdg");
        e.preventDefault();
        $("#editRecipientGroup").find("div .sw-field__error").remove();
       
        var recipientGroupName=$('.editRecipientGroupName').val();
        
        var dataid=$('.recipientgroupId').val();
        // alert(email);
        // alert(name);
        alert(dataid);

        $(".editRecipientGroupName").each(function() {
         var data = $(this).val();
          if($(this).val() == '') {
            $(this).parent().after("<div class='sw-field__error' style='color: red;'>This field must not be empty.</div>");
            $(this).parent().addClass('custom-validation-error');
          }
        });
        
        $.ajax
        ({
            type:'POST',
            url: "{{ url('reciptientgroup/update/')}}/"+dataid,
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{recipientGroupName : recipientGroupName},
            success: function(data){
                console.log(data);
                $('.recipientgroup-create-form').hide(); 
                $('.recipientgroup-edit-form').hide();
                $('.recipientgroup-list').show(); 

                 var updatedTr =  "<tr class='sw-data-grid__row sw-data-grid__row--0 recipientgroup-"+data.id+"' id='"+data.id+"'><td class='sw-data-grid__cell sw-data-grid__cell--selection'><div class='sw-data-grid__cell-content'><div class='sw-field--checkbox'><div class='sw-field--checkbox__content'><div class='sw-field__checkbox'><input id='deleteSelectedRecipientgroup' type='checkbox' name='deleteSelectedRecipientgroup[]' value='"+data.id+"' data-id='"+data.id+"' class='deleteSelectedRecipientgroup'><div class='sw-field__checkbox-state'><span class='sw-icon icon--small-default-checkmark-line-small sw-icon--fill' style='width: 16px; height: 16px;'><svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='16' height='16' viewBox='0 0 16 16'><defs><path id='icons-small-default-checkmark-line-small-a' d='M5.70710678,7.29289322 C5.31658249,6.90236893 4.68341751,6.90236893 4.29289322,7.29289322 C3.90236893,7.68341751 3.90236893,8.31658249 4.29289322,8.70710678 L6.29289322,10.7071068 C6.68341751,11.0976311 7.31658249,11.0976311 7.70710678,10.7071068 L11.7071068,6.70710678 C12.0976311,6.31658249 12.0976311,5.68341751 11.7071068,5.29289322 C11.3165825,4.90236893 10.6834175,4.90236893 10.2928932,5.29289322 L7,8.58578644 L5.70710678,7.29289322 Z'></path></defs><use fill='#758CA3' fill-rule='evenodd' xlink:href='#icons-small-default-checkmark-line-small-a'></use></svg></span></div></div> </div></div></td> <td class='sw-data-grid__cell'><div class='sw-data-grid__cell-content'><span class='sw-data-grid__cell-value'>"+data.name+"</span></div></td><td class='sw-data-grid__cell'><div class='sw-data-grid__cell-content'> <span class='sw-data-grid__cell-value'>"+data.id+"</span></div></td><td class='sw-data-grid__cell'><div class='sw-data-grid__cell-content'><span class='sw-data-grid__cell-value'>"+data.id+"</span></div></td><td class='sw-data-grid__cell sw-data-grid__cell--actions custom-recipientgroup-options' data-id='"+data.id+"'><div class='sw-data-grid__cell-content'><div class='sw-context-button sw-data-grid__actions-menu'><button class='sw-context-button__button'><span aria-hidden='true' class='sw-icon icon--small-more sw-icon--fill sw-icon--small'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'><path fill='#758CA3' fill-rule='evenodd' d='M3.5,9.5 C2.67157288,9.5 2,8.82842712 2,8 C2,7.17157288 2.67157288,6.5 3.5,6.5 C4.32842712,6.5 5,7.17157288 5,8 C5,8.82842712 4.32842712,9.5 3.5,9.5 Z M8,9.5 C7.17157288,9.5 6.5,8.82842712 6.5,8 C6.5,7.17157288 7.17157288,6.5 8,6.5 C8.82842712,6.5 9.5,7.17157288 9.5,8 C9.5,8.82842712 8.82842712,9.5 8,9.5 Z M12.5,9.5 C11.6715729,9.5 11,8.82842712 11,8 C11,7.17157288 11.6715729,6.5 12.5,6.5 C13.3284271,6.5 14,7.17157288 14,8 C14,8.82842712 13.3284271,9.5 12.5,9.5 Z'></path></svg></span></button></div></div></td></tr>";

                $(".recipientgroup-"+data.id).replaceWith(updatedTr);
                 
            },
            error: function (data) {
                console.log(data);
                $('.recipientgroup-create-form').hide(); 
                $('.recipientgroup-edit-form').show();
                $('.recipientgroup-list').hide(); 
              
            }
        });
    });

  
//remove emailerror on keyup on update
    $(document).on('keyup', '.editRecipientGroupName', function () {
        var editRecipientGroupNameError=$(this).parent().siblings('.sw-field__error').text();
        if(editRecipientGroupNameError)
        {
            $(this).parent().siblings('.sw-field__error').text('');
            $(this).parent().siblings('.sw-field__error').remove();
            $(this).parent().removeClass('custom-validation-error');

        }
        
    });

//cancel click of edit form
$(document).on('click', '.recipientgroup-btn-edit-cancel', function () { 
    $('.recipientgroup-list').show();
    $('.recipientgroup-edit-form').hide(); 

});

 /*$('div.newsletter-sender-list').find('.sw-data-grid__bulk').remove();
        $(".newsletter-sender-list .sw-data-grid__table").before("<div class='sw-data-grid__bulk'><span class='sw-data-grid__bulk-selected sw-data-grid__bulk-selected-label'>Selected:</span> <span class='sw-data-grid__bulk-selected sw-data-grid__bulk-selected-count'>1</span> <!----> <span class='sw-data-grid__bulk-selected bulk-link'><!----> <!----> <a class='link link-danger delete-selectednewslettersender'>Delete</a></span></div>");*/


 //delete-recipientgroup       

 //Open Popup on single sender delete
$(document).on('click', '.delete-recipientgroup', function (e) {

  $('div.recipientgroup-list').find('.sw-data-grid__bulk').remove();
  $(".recipientgroup-list .sw-data-grid__table").before("<div class='sw-data-grid__bulk'><span class='sw-data-grid__bulk-selected sw-data-grid__bulk-selected-label'>Selected:</span> <span class='sw-data-grid__bulk-selected sw-data-grid__bulk-selected-count'>1</span> <!----> <span class='sw-data-grid__bulk-selected bulk-link'><!----> <!----> <a class='link link-danger delete-selectednewslettersender'>Delete</a></span></div>");


  
    if(idArray){
        idArray = [];
    }
    // var dataid = $(this).data('id');
    idArray.push($(this).data('id'));
        //alert(dataid);
        console.log("inhhhhh");
        e.preventDefault();
        alert("delete popup");
      $('.popup').fadeIn(300);
      $('.popup').css('display','flex');
        
       //on popup single delete sender delete
        $('.sender-delete-popup-delete').on('click', function(e){

            alert('single');

            alert(idArray);
            
            //console.log("testtt"+dataid);
            e.preventDefault();
            $.ajax
                ({
                    type:'DELETE',
                    // url: "{{ url('newslettersender/delete/')}}/"+dataid,
                    url: "{{ url('newslettersender/multidelete')}}",
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{idArray : idArray},
                    success: function(data){
                        console.log('popup close on single dlete');
                        console.log(data);
                        idArray = []; 
                        $('.popup').fadeOut(300);
                        var deletedSenderIds = [];
                        deletedSenderIds = data.split(",");
                        console.log(deletedSenderIds.length);
                        for (var i=0; i < deletedSenderIds.length; i++ ) { 
                            $(".sender-"+deletedSenderIds[i]).remove();
                        }
                        // $("."+data).remove();
                        hideDeleteAllSender();
                        if ($('.deleteAllSender:checked').length > 0 )
                        {
                            $('.deletesender-bulk').show();
                        }
                        else{
                            $('.deletesender-bulk').hide();
                        }
                    }
                });
        });
});


</script>

