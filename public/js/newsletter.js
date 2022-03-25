$('.tab-content').hide();
$('.tab-content:first').show();
$('#tabs-nav li').on('click',function(e){
    var id = $(this).find('a').attr('href');
    e.preventDefault();
    e.stopPropagation();
    var parent = $(this).parent().hasClass('parent');
    var child = $(this).parent().hasClass('child');
    if(parent){
        //hide other parent content
        $('div#tabs-content .tab-content').hide();            
    }        
    if(child){    
        //hide other child content                     
        $(this).parents('.tabs').next().find('.tab-content').hide();
    }
    //bydefault tab show 
    $(this).parents('.tabs').next().find(id+' .child li:first').trigger('click');
    //show clicked tab
    $(id).show();
});


        /*
        $('#tabs-nav li:first-child').addClass('active');
        $('.tab-content').hide();
        $('.tab-content:first').show();

    // Click function
    $('#tabs-nav li').click(function(){
        $('.tab-content').hide();
      $('#tabs-nav li').removeClass('active');
      $(this).addClass('active');
      alert("active");
     var deactiveTab = $('#tabs-nav li').find('a').attr('href');
        $(deactiveTab).fadeOut();
        $(this).parent('ul').addClass('maintabs');
        $('.maintabs').find('li').show();   
      var activeTab = $(this).find('a').attr('href');
      $(activeTab).fadeIn();
      return false;
    });
    */


