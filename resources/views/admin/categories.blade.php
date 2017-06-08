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
    @if($errors->any())
        <div class="{{$errors->getMessages()[0][0]}}">{{$errors->getMessages()[1][0]}}</div>
    @endif
    <h2>Add, change or delete a category</h2>
    <form action="/admin/categories/delete" method="POST">
        {{ csrf_field() }}
        <ul class="categories">
            @foreach ($categories as $category)
                <li><input type="checkbox" name="delete[]" value="{{$category->id}}"><a href="/admin/category/{{$category->id}}">{{$category->id}} {{$category->name}}</a></li><br>
            @endforeach
        </ul>
        <button type="submit">Delete</button>
    </form>
    <a class="button" href="/admin/category">Add</a>
</div>
</body>
@include('layouts.footer')
</body>
</html>

