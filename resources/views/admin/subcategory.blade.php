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
@if($errors->any())
    <div class="{{$errors->getMessages()[0][0]}}">{{$errors->getMessages()[1][0]}}</div>
@endif
<h2>Add Subcategory</h2>
    <form action="/admin/subcategory" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <ul class="styledForm">
            <input type="hidden" name="parent_id" value="{{$parent_id}}">
            <li><label>Name<span class="required">*</span></label> <input
                        type="text" name="name" class="field-long" @if(isset($category->name))value="{{$category->name}}"@endif/></li>
            <li><input type="submit" name="save" value="Save" /></li>
        </ul>
    </form>
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

