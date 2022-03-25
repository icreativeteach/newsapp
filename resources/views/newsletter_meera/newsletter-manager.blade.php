@extends('base')

@section('title', 'Newsletter Management')
@section('stylesheets')

@endsection
@section('body')
<!-- <button id="button_print" style="margin: 10px" onclick="printOrderList()">Print order list</button> -->
<div class="overview-store">
<div class="sw-tabs sw-tabs--small tabs">
    <div class="sw-tabs__content" style="padding-bottom: 0px;" id="tabs-nav"> 
        <ul class="parent">
            <li>
                <a href="#tab1" class="sw-tabs-item" title="General">
                    Overview
                </a>
            </li>
            <li> 
                <a href="#tab2" class="sw-tabs-item" title="Products">
                    Analytics
                </a> 
            </li>
            <li>
                <a href="#tab3" class="sw-tabs-item" title="Theme">
                    Administration
                </a> 
            </li>
        </ul>
    </div>
</div>

<div id="tabs-content">
    <div id="tab1" class="tab-content">
        @include('newsletter.overview-data')
    </div>
    <div id="tab2" class="tab-content">
        @include('newsletter.analytics')
    </div>
    <div id="tab3" class="tab-content">
        @include('newsletter.administration')
    </div>

  </div>



<?php

//@include('order.order-list-table', ['orderListConfiguration' => $orderListConfiguration])

?>
@endsection

@section('javascripts')
<script type="text/javascript">
   //$('#tabs-nav li:first-child').addClass('active');
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
</script>
@endsection
