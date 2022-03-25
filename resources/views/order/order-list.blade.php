@extends('base')

@section('title', 'Order list')

@section('body')
<button id="button_print" style="margin: 10px" onclick="printOrderList()">Print order list</button>

@include('order.order-list-table', ['orderListConfiguration' => $orderListConfiguration])

@endsection

@section('javascripts')
<script>
    function printOrderList() {
        window.print();
    }
</script>
@endsection
