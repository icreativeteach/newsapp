<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
   <!--  <link rel="stylesheet" href="{{ asset('css/app.css') }}">  -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <link  href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/newsletter.css') }}"> 
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"> -->
    @yield('stylesheets')
</head>

<body onload="sendReadyState()" class="custom-app">
@yield('body')

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>



<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>  -->
<!-- <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>  -->
<script type="text/javascript" src="{{ asset('js/newsletter.js') }}"></script>
 <!-- datatable css -->
   <!--  <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" defer></script> -->

@yield('javascripts')
<script>
    function sendReadyState() {
        window.parent.postMessage('sw-app-loaded', '*');

    }
</script>

</body>
</html>
