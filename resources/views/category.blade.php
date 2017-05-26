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
        <h2>Subcategories</h2>
        <ul id="categories">
        @foreach($subcat as $subcat)
                {{$subcat->name}}
        @endforeach
        </ul>
        <h2>Products</h2>
    </div>
</body>
</div>
@include('layouts.footer')
</body>
</html>

