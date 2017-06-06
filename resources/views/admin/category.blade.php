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
<h2>@if(isset($category->name)){{$category->name}} @else Add category @endif</h2>
    <form action="/admin/category" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <ul class="styledForm">
            <input type="hidden" name="id" value="@if(isset($category->id)){{$category->id}} @else 0 @endif" >
            <li><label>Name<span class="required">*</span></label> <input
                        type="text" name="name" class="field-long" @if(isset($category->name))value="{{$category->name}}"@endif/></li>
            <li><input type="submit" name="save" value="Save" /></li>
        </ul>
    </form>
           @if(($sub_categories->first()!== null))
            <form action="/admin/product" method="POST" enctype="multipart/form-data">
                <ul class="styledForm">
                    <li><label>Sub Categories</label></li>
                        @foreach ($sub_categories as $sub_category)
                            <ul class="categories">
                                 <li><input type="checkbox" name="delete[]" value="{{$sub_category->id}}"><a href="/admin/category/{{$sub_category->id}}">{{$sub_category->id}} {{$sub_category->name}}</a></li><br>
                            </ul>
                        @endforeach
                    <li><input type="submit" name="save" value="Save" /></li>
                </ul>
            </form>
            @endif
<br>
<br>
<br>
<br>
@include('layouts.footer')
</body>
</html>

