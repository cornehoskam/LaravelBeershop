<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
@include('layouts.header', array('title'=>$cat['name']))
<div class="container">
    <br>
    <h1>{{$cat['name']}}</h1>
    <div id="standardList">
        @foreach($subcat as $subcat)
            {{$subcat->name}}
        @endforeach
        <h2>Products</h2>
        @foreach($products as $product)
            {{$product->name}} <br>
        @endforeach
    </div>
</body>
</div>
@include('layouts.footer')
</body>
</html>

