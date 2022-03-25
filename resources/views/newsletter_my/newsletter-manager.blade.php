@extends('base')

@section('title', 'Newsletter Management')
@section('stylesheets')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endsection
@section('body')
<div class="row">
    <div class="col-md-12">
        <table style="border: 1px solid black; border-collapse: collapse;">
            <thead style="border: 1px solid black; border-collapse: collapse;">
                <tr>
                    <th>head data</th>
                    <th>head data</th>
                    <th>head data</th>
                </tr>
            </thead>
            <tbody style='border: 1px solid black; border-collapse: collapse;'>
                <tr>
                    <td>abc</td>
                    <td>abc</td>
                    <td>abc</td>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- <div class="col-md-6">
        fdghdfh
    </div> -->
    <a href="#"><button id="adddata" style="margin: 10px">Add</button></a>
      <a href="{{ url('newslettergetdata') }}?{{ $data }}"><button style="margin: 10px">getdata</button></a>
</div>
@endsection

@section('javascripts')
<!-- <script>
    function printOrderList() {
        window.print();
    }
</script> -->
@endsection