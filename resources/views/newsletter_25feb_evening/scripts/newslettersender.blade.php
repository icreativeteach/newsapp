<script type="text/javascript">

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
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{email : email,name : name},
        success: function(data){
            $('.email').val('');
            $('.name').val('');
            $('.newsletter-sender-create-form').hide(); 
            $('.newsletter-sender-list').show();
            //$('.newsletter-sender-edit-form').hide();
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

//open action dropdown
$('.custom-options').on('click', function(e){
    e.preventDefault();
    var dataid = $(this).attr("data-id");
    //var elmId = $(this).attr("id");
    alert(dataid);
    // alert(elmId);
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
            $("td.sw-data-grid__cell--actions").after("<div class='sw-context-menu custom-context' style='width: 220px;'><div class='sw-context-menu__content'><div class='sw-tooltip--wrapper edit-newslettersender'><a href='#' class='sw-context-menu-item sw-entity-listing__context-menu-edit-action'><span class='sw-context-menu-item__text'>Edit</span></a></div><div class='sw-tooltip--wrapper delete-newslettersender'><div class='sw-context-menu-item sw-entity-listing__context-menu-edit-delete sw-context-menu-item--danger'><span class='sw-context-menu-item__text'>Delete</span></div></div></div></div>");
           var styles = {'top': newTop, 'left' : newLeft, 'position': 'absolute'}
            $( ".custom-context" ).css(styles);
        }
         
    //get deta for edit     
    $('.edit-newslettersender').on('click', function(e){
        e.preventDefault();
        $.ajax
            ({
                type:'GET',
                url: "{{ url('newslettersender/edit/')}}/"+dataid,
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{dataid : dataid},
                success: function(data){    
                    $('.newsletter-sender-edit-form').show();
                    $('.newsletter-sender-create-form').hide(); 
                    $('.newsletter-sender-list').hide();
                    $('.editSenderEmail').val(data.email);
                    $('.editSenderName').val(data.name);
                }
            });

    });
          

    //update data
    $(document).on('click', '.newslettersender-btn-update', function (e) { 
        e.preventDefault();
        $("#editNewslettersender").find("div .sw-field__error").remove();
       
        var email=$('.editSenderEmail').val();
        var name=$('.editSenderName').val();

        $(".editSenderEmail, .editSenderName").each(function() {
         var data = $(this).val();
          if($(this).val() == '') {
            $(this).parent().after("<div class='sw-field__error' style='color: red;'>This field must not be empty.</div>");
            $(this).parent().addClass('custom-validation-error');
          }
        });
        if(email != "")
         {
            alert("email type");
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
                $('.newsletter-sender-create-form').hide(); 
                $('.newsletter-sender-edit-form').hide();
                $('.newsletter-sender-list').show();
            },
            error: function (data) {
                console.log(data);
                $('.newsletter-sender-create-form').hide(); 
                $('.newsletter-sender-edit-form').show();
                $('.newsletter-sender-list').hide(); 
               //$('#editSenderEmailError').text(data.responseJSON.errors.email);
              // $('#editSenderNameError').text(data.responseJSON.errors.name);
            }
        });
    });

    $('.delete-newslettersender').on('click', function(e){
    alert("delete script");

        e.preventDefault();
        $.ajax
            ({
                type:'DELETE',
                url: "{{ url('newslettersender/delete/')}}/"+dataid,
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{dataid : dataid},
                success: function(data){  
                console.log(data);  
                //location.reload(true);

                    // $('.newsletter-sender-edit-form').show();
                    // $('.newsletter-sender-create-form').hide(); 
                     //$('.newsletter-sender-list').show();
                }
            });

    });

});



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

//delete multiple sender
var idArray = [];
$(document).on('click', '.deleteSelectedSender', function () { 
   $('.deletesender-bulk').show();
   /*$('div.newsletter-sender-list').find('.sw-data-grid__bulk').remove();
        $(".newsletter-sender-list .sw-data-grid__table").before("<div class='sw-data-grid__bulk'><span class='sw-data-grid__bulk-selected sw-data-grid__bulk-selected-label'>Selected:</span> <span class='sw-data-grid__bulk-selected sw-data-grid__bulk-selected-count'>1</span> <!----> <span class='sw-data-grid__bulk-selected bulk-link'><!----> <!----> <a class='link link-danger delete-selectednewslettersender'>Delete</a></span></div>");*/

    var id = $(this).val();
    if($(this).is(":checked")) {
        idArray.push(id);
         $('.delete-sender-count').text(idArray.length);
    }
    else
    {
        idArray.splice($.inArray(id, idArray), 1);
        $('.delete-sender-count').text(idArray.length);
    }
    if(idArray.length == 0)
    {
        $('.deletesender-bulk').hide();
    }
});

//delete selected sender
$(document).on('click', '.delete-selectednewslettersender', function () { 
    alert(idArray);
    $.ajax
    ({
        type:'DELETE',
        url: "{{ url('newslettersender/multidelete')}}",
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data:{idArray : idArray},
        success: function(data){  
            idArray.length = 0;
        }
    });
});

 $("#deleteAllSender").click(function () {
   
   var dataArray = [];
    $('input:checkbox').not(this).prop('checked', this.checked);
     //alert(data.length);
     //$("#deleteSelectedSender").click
      if($('#deleteSelectedSender').prop("checked") == true){
        console.log("Checkbox is checked.");
        $('.deleteSelectedSender').each(function(){
            var getId= $(this).val();
            dataArray.push(getId);
        });      
      }
      else if($('.deleteSelectedSender').prop("checked") == false){
        console.log("Checkbox is unchecked.");
        var getId= $(this).val();
        dataArray.splice($.inArray(getId, dataArray), 1);
      }
      console.log("full arary----------"+dataArray);
    
 });

</script>
