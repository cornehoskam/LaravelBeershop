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
@include('layouts.Admin.adminHeader', array('title'=>'Home'))
<div class="container">
    @if($errors->any())
        <div class="{{$errors->getMessages()[0][0]}}">{{$errors->getMessages()[1][0]}}</div>
    @endif
    <h2>Edit Categories</h2>
        <a class="button" href="/admin/category">Add New Category</a>

        <form action="/admin/categories/delete" method="POST">
        {{ csrf_field() }}
        <ul class="categories">
            @foreach ($categories as $category)
                <li><input type="checkbox" name="delete[]" value="{{$category->id}}"><a href="/admin/category/{{$category->id}}">{{$category->id}}. {{str_replace('_', ' ', $category->name)}}</a></li><br>
            @endforeach
        </ul>
        <button type="submit" class="btn btn-default">Delete Selected</button>
    </form>
</div>
</body>
@include('layouts.footer')
</body>
</html>

