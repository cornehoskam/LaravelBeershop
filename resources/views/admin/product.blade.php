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
<h2>@if(isset($product->name)){{str_replace('_', ' ', $product['name'])}} @else Add product @endif</h2>
    <form action="/admin/product" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <ul class="styledForm">
            <input type="hidden" name="id" value="@if(isset($product->id)){{$product->id}} @else 0 @endif" >
            <input type="hidden" name="image_default" value="@if(isset($product->image_url)){{$product->image_url}} @else null @endif" >
            <li><label>Image<span class="required">*</span></label> <input
                        type="file" name="image_url"</li>
            @if(isset($product->image_url))<li><img src="{{ URL::asset('assets/products/'.$product->image_url) }}" width='200px' height='200px'></li>@endif
            <li><label>Name<span class="required">*</span></label> <input
                        type="text" pattern="[A-Za-z ]{1,25}" name="name" class="field-long" @if(isset($product->name))value="{{str_replace('_', ' ', $product['name'])}}"@endif/></li>
            <li><label>Price (in €)<span class="required">*</span></label> <input
                        type="number" step="any" name="price" class="field-long" @if(isset($product->price))value="{{$product->price}}"@endif/></li>
            <li><label>Alcohol (in %vol)<span class="required">*</span></label> <input
                        type="number" step="any" name="alcohol_contents" class="field-long"
                       @if(isset($product->alcohol_contents))value="{{$product->alcohol_contents}}"@endif/></li>
            <li><label>Contents (in ml)<span class="required">*</span></label> <input
                        type="number" step="any" name="contents_ml" class="field-long"@if(isset($product->contents_ml))value="{{$product->contents_ml}}"@endif /></li>
            <li><label>Category<span class="required">*</span></label> <select
                        name="parent_category" class="field-select"@if(isset($product->parent_category))value="{{$product->parent_category}}"@endif>

                @foreach($categories as $category)
                        <option value="{{$category->id}}" @if(isset($product->parent_category) && $category->id == $product->parent_category) selected @endif>{{$category->name}}</option>
                @endforeach
                </select></li>
            <li><label>Subcategory</label> <select
                       name="parent_sub_category" class="field-select"@if(isset($product->parent_category))value="{{$product->parent_category}}"@endif>
                    <option value="">Select a sub category</option>
                    @foreach($sub_categories as $sub_category)
                        <option value="{{$sub_category->id}}" @if(isset($product->parent_sub_category) && $sub_category->id == $product->parent_sub_category) selected @endif>{{$sub_category->name}}</option>
                    @endforeach
                </select></li>
            <li><label>Description</label> <textarea name="description" id="Description"
                                                     class="field-long field-textarea"> @if(isset($product->description)){{$product->description}}@endif</textarea></li>
            <li><input type="submit" name="save" value="Save" /></li>
        </ul>
    </form>
<br>
<br>
<br>
<br>
@include('layouts.footer')
</body>
</html>

