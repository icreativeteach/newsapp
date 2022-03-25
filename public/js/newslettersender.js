
$( document ).ready(function() {
function hideDeleteAllSender(){
        if ($('#sender-tbody').children().length>0)
        {      
            $('.deleteAllSender').show();
        }
        else
        {  
            $('.deleteAllSender').hide();
        }
    }
hideDeleteAllSender();    
});






//default on page load
$('.newsletter-sender-create-form').hide();
$('.newsletter-sender-edit-form').hide(); 
$('.deletesender-bulk').hide();

//click of create sender button
$('.newsletter-btn-create-sender').click(function(){
    $('.newsletter-sender-create-form').show(); 
    $('.newsletter-sender-list').hide();
    $('.newsletter-sender-edit-form').hide();
});

//store data
$(document).on('click', '.newslettersender-btn-create', function (e) { 
    e.preventDefault();
    $("#createNewslettersender").find("div .sw-field__error").remove();
    var email=$('.email').val();
    var name=$('.name').val();
    $(".email, .name").each(function() {
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
                 $('.email').parent().after("<div class='sw-field__error' style='color: red;'>This value is not a valid email address.</div>");
                $('.email').parent().addClass('custom-validation-error');
                return false;
            }    
        }
      
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


//remove emailerror on keyup on update
$(document).on('keyup', '.email', function () {
    var emailError=$(this).parent().siblings('.sw-field__error').text();
    if(emailError)
    {
        $(this).parent().siblings('.sw-field__error').text('');
        $(this).parent().siblings('.sw-field__error').remove();
        $(this).parent().removeClass('custom-validation-error');

    }
    
});

//remove nameerror on keyup on update
$(document).on('keyup', '.name', function () { 
     var nameError=$(this).parent().siblings('.sw-field__error').text();
    if(nameError)
    { 
        $(this).parent().siblings('.sw-field__error').text('');
        $(this).parent().siblings('.sw-field__error').remove();
        $(this).parent().removeClass('custom-validation-error'); 
    }
});

//cancel click of create form    
$(document).on('click', '.newslettersender-btn-create-cancel', function () { 
    $('.newsletter-sender-list').show();
    $('.newsletter-sender-create-form').hide(); 

});

$('body').click(function() {
   $('.custom-context').remove();
   $('.custom-options').removeClass('show');
});

// $('.custom-options').click(function(event){
//    event.stopPropagation();
// });
//open action dropdown

$(document).on('click', '.custom-options' , function(e){
    e.preventDefault();
     $(".custom-context").remove();
    var dataid = $(this).attr("data-id");
    var getClass = $(this);
    var col   = getClass.position();
    var colLeft = col.left ;
    var colTop = col.top ;
    var newTop = colTop + 46 + "px";
    var newLeft = colLeft + 12 + "px";
        if ($(this).hasClass('show')){
            $(this).removeClass('show');
            $(".custom-context").remove();
        } 
        else 
        {
            $(this).addClass('show');
            $(this).after("<div class='sw-context-menu custom-context' style='width: 220px;'><div class='sw-context-menu__content'><div class='sw-tooltip--wrapper edit-newslettersender' data-id ="+dataid+"><a href='#' class='sw-context-menu-item sw-entity-listing__context-menu-edit-action'><span class='sw-context-menu-item__text'>Edit</span></a></div><div class='sw-tooltip--wrapper delete-newslettersender' data-id ="+dataid+"><div class='sw-context-menu-item sw-entity-listing__context-menu-edit-delete sw-context-menu-item--danger'><span class='sw-context-menu-item__text'>Delete</span></div></div></div></div>");
           var styles = {'top': newTop, 'left' : newLeft, 'position': 'absolute'}
            $( ".custom-context" ).css(styles);
        }
   });      
    //get deta for edit     
    $(document).on('click', '.edit-newslettersender', function(e){
        e.preventDefault();
        var dataid = $(this).data('id');
        $.ajax
            ({
                type:'GET',
                url: "{{ url('newslettersender/edit/')}}/"+dataid,
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{dataid : dataid},
                success: function(data){ 
                // console.log(data);   
                    $('.newsletter-sender-edit-form').show();
                    $('.newsletter-sender-create-form').hide(); 
                    $('.newsletter-sender-list').hide();
                    $('.editSenderEmail').val(data.email);
                    $('.editSenderName').val(data.name);
                    $('.senderId').val(data.id);
                }
            });

    });
          

    //update data
    $(document).on('click', '.newslettersender-btn-update', function (e) { 
       // alert("fhdg");
        e.preventDefault();
        $("#editNewslettersender").find("div .sw-field__error").remove();
       
        var email=$('.editSenderEmail').val();
        var name=$('.editSenderName').val();
        var dataid=$('.senderId').val();
        // alert(email);
        // alert(name);
        alert(dataid);

        $(".editSenderEmail, .editSenderName").each(function() {
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
                 $('.editSenderEmail').parent().after("<div class='sw-field__error' style='color: red;'>This value is not a valid email address.</div>");
                $('.editSenderEmail').parent().addClass('custom-validation-error');
                return false;
            }    
        }
        $.ajax
        ({
            type:'POST',
            url: "{{ url('newslettersender/update/')}}/"+dataid,
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{email : email,name : name},
            success: function(data){
                console.log(data);
                $('.newsletter-sender-create-form').hide(); 
                $('.newsletter-sender-edit-form').hide();
                $('.newsletter-sender-list').show();
                // hideDeleteAllSender();

                // $("."+data.id).remove();
                // $("."+data.id).find("#dataemail").text(data.email);
               //  $("."+data.id).find("#dataemail").text(data.email);



                 var updatedTr =  "<tr class='sw-data-grid__row sw-data-grid__row--0 sender-"+data.id+"' id="+data.id+"><td class='sw-data-grid__cell sw-data-grid__cell--selection'><div class='sw-data-grid__cell-content'><div class='sw-field--checkbox'><div class='sw-field--checkbox__content'><div class='sw-field__checkbox'><input id='deleteSelectedSender' type='checkbox' name='deleteSelectedSender[]' value="+data.id+"  data-id="+data.id+" class='deleteSelectedSender'> <div class='sw-field__checkbox-state'> <span class='sw-icon icon--small-default-checkmark-line-small sw-icon--fill' style='width: 16px; height: 16px;'> <svg xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink' width='16' height='16' viewBox='0 0 16 16'><defs><path id='icons-small-default-checkmark-line-small-a' d='M5.70710678,7.29289322 C5.31658249,6.90236893 4.68341751,6.90236893 4.29289322,7.29289322 C3.90236893,7.68341751 3.90236893,8.31658249 4.29289322,8.70710678 L6.29289322,10.7071068 C6.68341751,11.0976311 7.31658249,11.0976311 7.70710678,10.7071068 L11.7071068,6.70710678 C12.0976311,6.31658249 12.0976311,5.68341751 11.7071068,5.29289322 C11.3165825,4.90236893 10.6834175,4.90236893 10.2928932,5.29289322 L7,8.58578644 L5.70710678,7.29289322 Z'></path></defs><use fill='#758CA3' fill-rule='evenodd' xlink:href='#icons-small-default-checkmark-line-small-a'></use> </svg> </span> </div> </div> </div> </div> </td> <td class='sw-data-grid__cell'> <div class='sw-data-grid__cell-content'> <div> <a href='#/sw/product/detail/c95cce60de474cbea135422fd4094985' class=''>"+ data.email+" </a> </div> </div> </td> <td class='sw-data-grid__cell'> <div class='sw-data-grid__cell-content'> <span class='sw-data-grid__cell-value'> "+ data.name+" </span> </div> </td> <td class='sw-data-grid__cell sw-data-grid__cell--actions custom-options' data-id='"+data.id+"' id='"+data.name+"'> <div class='sw-data-grid__cell-content'> <div class='sw-context-button sw-data-grid__actions-menu'> <button class='sw-context-button__button'> <span aria-hidden='true' class='sw-icon icon--small-more sw-icon--fill sw-icon--small'> <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'> <path fill='#758CA3' fill-rule='evenodd' d='M3.5,9.5 C2.67157288,9.5 2,8.82842712 2,8 C2,7.17157288 2.67157288,6.5 3.5,6.5 C4.32842712,6.5 5,7.17157288 5,8 C5,8.82842712 4.32842712,9.5 3.5,9.5 Z M8,9.5 C7.17157288,9.5 6.5,8.82842712 6.5,8 C6.5,7.17157288 7.17157288,6.5 8,6.5 C8.82842712,6.5 9.5,7.17157288 9.5,8 C9.5,8.82842712 8.82842712,9.5 8,9.5 Z M12.5,9.5 C11.6715729,9.5 11,8.82842712 11,8 C11,7.17157288 11.6715729,6.5 12.5,6.5 C13.3284271,6.5 14,7.17157288 14,8 C14,8.82842712 13.3284271,9.5 12.5,9.5 Z'></path> </svg> </span> </button> <!----></div> <!----></div> </td></tr>";

 
              //$("#sender-tbody").append(tr_str);
                $(".sender-"+data.id).replaceWith(updatedTr);
                 

               // console.log($("#"+data.id));
                  //$("tr").find("#"+dataid).remove();
                  //$("#"+dataid).find('tr td .editSenderEmail').remove();
                 // alert("doneemeail");
                 // $("."+data.id).find('.editSenderName').val(data.name);
                 // alert("doneneme");
                 
                 

            },
            error: function (data) {
                console.log(data);
                $('.newsletter-sender-create-form').hide(); 
                $('.newsletter-sender-edit-form').show();
                $('.newsletter-sender-list').hide(); 
              
            }
        });
    });

    // //on popup single delete sender delete
    // $('.sender-delete-popup-delete').on('click', function(e){
    //     var dataid = $(this).data('id');
    //     alert(dataid);
    //     //console.log("testtt"+dataid);
    //     e.preventDefault();
    //     $.ajax
    //         ({
    //             type:'DELETE',
    //             url: "{{ url('newslettersender/delete/')}}/"+dataid,
    //             headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //             },
    //             data:{dataid : dataid},
    //             success: function(data){  
    //             console.log('popup close on single dlete'); 
    //             $('.popup').fadeOut(300);
    //             $("."+data).remove();
    //             hideDeleteAllSender();
    //             }
    //         });
    // });

// });



//remove emailerror on keyup on update
    $(document).on('keyup', '.editSenderEmail', function () {
        var emailError=$(this).parent().siblings('.sw-field__error').text();
        if(emailError)
        {
            $(this).parent().siblings('.sw-field__error').text('');
            $(this).parent().siblings('.sw-field__error').remove();
            $(this).parent().removeClass('custom-validation-error');

        }
        
    });
    //remove nameerror on keyup on update
    $(document).on('keyup', '.editSenderName', function () { 
        var nameError=$(this).parent().siblings('.sw-field__error').text();
        if(nameError)
        { 
            $(this).parent().siblings('.sw-field__error').text('');
            $(this).parent().siblings('.sw-field__error').remove();
            $(this).parent().removeClass('custom-validation-error'); 
        }
    });
//cancel click of edit form
$(document).on('click', '.newslettersender-btn-edit-cancel', function () { 
    $('.newsletter-sender-list').show();
    $('.newsletter-sender-edit-form').hide(); 

});








 // show and hide selected checkbox and bulk   
    $('.deletesender-bulk').hide();
    $(document).on('change', '#deleteAllSender', function() {  

        $('.deletesender-bulk').show();           
        $(".deleteSelectedSender").prop("checked", this.checked);
        $(".newsletter-btn-create-sender").addClass('disabled');
      
        
        $(".delete-sender-count").html($("input.deleteSelectedSender:checked").length);
        if ($('.deleteAllSender:checked').length == 0 )
        {
            $('.deletesender-bulk').hide();
            $(".newsletter-btn-create-sender").removeClass('disabled');
        }
    }); 
    $(document).on('click', '.deleteSelectedSender', function() {
      
        $('.deletesender-bulk').show();   
        $(".newsletter-btn-create-sender").addClass('disabled'); 
        if ($('.deleteSelectedSender:checked').length == $('.deleteSelectedSender').length) {
            $('#deleteAllSender').prop('checked', true);
            $(".newsletter-btn-create-sender").addClass('disabled');
        } 
        else if ($('.deleteSelectedSender:checked').length == 0)
        {
            alert("len0");
            $('#deleteAllSender').prop('checked', false);
            $('.deletesender-bulk').hide();
            $(".newsletter-btn-create-sender").removeClass('disabled');
               
        }
        else {
            $('#deleteAllSender').prop('checked', false);

        }
        $(".delete-sender-count").html($("input.deleteSelectedSender:checked").length);
        
    }); 




    var idArray = [];
// delete selected(and all) records from database
$('.delete-selectednewslettersender').on('click', function(e) {
    if(idArray){
        idArray = [];
    }
    $('.popup').fadeIn(300);
      $('.popup').css('display','flex'); 
    
    $(".deleteSelectedSender:checked").each(function() {  
        //idArray.push($(this).val());
        idArray.push($(this).data('id'));
        
    }); 


    $('.sender-delete-popup-delete').on('click', function(e){

            alert('multiple');
            alert(idArray);
        console.log("final delete hhhh");
        e.preventDefault();
        $.ajax
        ({
            type:'DELETE',
            url: "{{ url('newslettersender/multidelete')}}",
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{idArray : idArray},
            success: function(data){  
            console.log(data); 
            idArray = [];
             console.log(idArray);
             console.log("close popup on finale delete");
            $('.popup').fadeOut(300);
            var deletedSenderIds = [];
            deletedSenderIds = data.split(",");
            console.log(deletedSenderIds.length);
                   for (var i=0; i < deletedSenderIds.length; i++ ) { 
                       $(".sender-"+deletedSenderIds[i]).remove();
                   } 
                  $('.deletesender-bulk').hide();
                  $('#deleteAllSender').prop('checked', false);
                  $(".newsletter-btn-create-sender").removeClass('disabled');
                  hideDeleteAllSender();    
            }
        });
    });

    if(idArray.length <=0)  {  
        document.getElementById("deleteAllSender").checked = false;
         $('.deletesender-bulk').hide(); 
    }


});


//Open Popup on single sender delete
$(document).on('click', '.delete-newslettersender', function (e) {
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

//close popup on cancel popup btn
$('.sender-delete-popup-cancel').on('click', function(e){
    console.log("cancel"); 
    $('.popup').fadeOut(300);
    return false;
});

    
 
// Close Popup
$('.closeBtn').on('click', function () {
    console.log("close popup");
  $('.popup').fadeOut(300);
  return false;
});
 
// Close Popup when Click outside
$('.popup').on('click', function () {
    console.log("outside popup close");
  $('.popup').fadeOut(300);
}).children().click(function () {
  return false;
});
 
// }

