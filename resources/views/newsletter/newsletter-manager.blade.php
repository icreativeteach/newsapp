@extends('base')

@section('title', 'Newsletter Management')
@section('stylesheets')

@endsection
@section('body')
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


@endsection

@section('javascripts')
<script type="text/javascript">
// $(document).ready( function () {
//     $('#myTable').DataTable();
// } );
// $(document).ready( function () {
//     $('#myTable').DataTable();
// } );


</script>
   <?php /* @include('newsletter.scripts.newslettersender')
    @include('newsletter.scripts.recipientgroup') */ ?>
    @include('newsletter.scripts.senders-js')
    @include('newsletter.scripts.recipientgroups-js')
    @include('newsletter.scripts.recipients-js')
@endsection
