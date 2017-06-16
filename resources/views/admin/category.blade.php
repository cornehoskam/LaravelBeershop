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
@if($errors->any())
    <div class="{{$errors->getMessages()[0][0]}}">{{$errors->getMessages()[1][0]}}</div>
@endif
<h2>@if(isset($category->name)){{str_replace('_', ' ', $category->name)}} @else Add category @endif</h2>
    <form action="/admin/category" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <ul class="styledForm">
            <input type="hidden" name="id" value="@if(isset($category->id)){{$category->id}} @else 0 @endif" >
            <li><label>Name<span class="required">*</span></label> <input
                        pattern="[A-Za-z ]{1,25}" type="text" name="name" class="field-long" @if(isset($category->name))value="{{str_replace('_', ' ', $category->name)}}"@endif/></li>
            <li><input type="submit" name="save" value="Save" /></li>
        </ul>
    </form>
@if($category !== null)
            <form action="/admin/subcategory" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <ul class="styledForm">
                    @if(($sub_categories->first()!== null))
                    <li><label>Sub Categories</label></li>
                        @foreach ($sub_categories as $sub_category)
                            <ul class="categories">
                                 <li>&nbsp;&nbsp;<a class="button" href="/admin/subcategories/delete/{{$sub_category->id}}">Delete</a><a><input type="text" pattern="[A-Za-z ]{1,25}" name="name[{{$sub_category->id}}]" value="{{str_replace('_', ' ', $sub_category->name)}}"></a> {{$sub_category->id}} </li><br>
                            </ul>
                        @endforeach
                    <li><input type="submit" name="save" value="save" /></li>
                    @endif
                    <li><a href="/admin/subcategory/add/{{$category->id}}">
                            <input type="button" value="Add Subcategory" />
                        </a></li>
                </ul>
            </form>
@endif

<br>
<br>
<br>
<br>
<br>
<br>
<br>
@include('layouts.footer')
</body>
</html>

