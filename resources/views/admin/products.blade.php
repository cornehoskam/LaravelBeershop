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
@include('layouts.admin.adminHeader', array('title'=>'Home'))
<div class="container">
    <h2>Add, change or delete a product</h2>
    <form action="/admin/products/delete" method="POST">
        {{ csrf_field() }}
        <ul class="categories">
            @foreach ($products as $product)
                <li><input type="checkbox" name="delete[]" value="{{$product->id}}"><a>{{$product->id}} {{$product->name}}</a></li><br>
            @endforeach
        </ul>
        <button type="submit">Delete</button>
        <button type="submit">Add</button>
    </form>
</div>
</body>
@include('layouts.footer')
</body>
</html>

