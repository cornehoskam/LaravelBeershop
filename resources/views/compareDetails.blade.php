<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ URL::asset('js/tabsScript.js') }}"></script>
</head>
<body onload="DetailPageLoaded()">
@include('layouts.header', array('title'=>"Compare Details"))
@include('layouts.breadcrumb', array('length'=>3, 'nameOne'=>"Compare", 'nameTwo'=>'Details'))

<div class="container">
    <br>
    <div id='wrapperCompare'>
        <div id='compareBlockOne'>
             <h3>{{str_replace('_', ' ', $productOne->name)}}</h3>
             <p>Alcohol: {{$productOne->alcohol_contents}}%</p>
             <p>Price per unit: €{{$productOne->price}}</p>
             <p>Contents: {{$productOne->contents_ml}} ml</p>
             <img src='{{ URL::asset('assets/products/'.$productOne['image_url']) }}' width='200px' height='200px'> <br><br>
        </div>
        <div id='compareBlockTwo'>
            <h3>{{str_replace('_', ' ', $productTwo->name)}}</h3>
            <p>Alcohol: {{$productTwo->alcohol_contents}}%</p>
            <p>Price per unit: €{{$productTwo->price}}</p>
            <p>Contents: {{$productTwo->contents_ml}} ml</p>
            <img src='{{ URL::asset('assets/products/'.$productTwo['image_url']) }}' width='200px' height='200px'> <br><br>
        </div>
    </div>
</div>
@include('layouts.footer')
</body>
</html>
