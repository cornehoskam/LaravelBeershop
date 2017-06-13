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
@include('layouts.header', array('title'=>str_replace('_', ' ', $product['name'])))
@if($subcat != null)
    @include('layouts.breadcrumb', array('length'=>4, 'nameOne'=>$cat['name'], 'nameTwo'=>$subcat['name'], 'nameThree'=>str_replace('_', ' ', $product['name'])))
@else
    @include('layouts.breadcrumb', array('length'=>3, 'nameOne'=>$cat['name'], 'nameTwo'=>str_replace('_', ' ', $product['name'])))

@endif
<div class="container">
    <br>
    <h1>{{ str_replace('_', ' ', $product['name']) }}</h1>
    <div id="productWrapper">
        <div id="productImage"><img src='{{ URL::asset('assets/products/'.$product['image_url']) }}' width='200px' height='200px'></div>
        <div id="productDetails">
            <ul class="tab">
                <li><a href="javascript:void(0)" id="defaultOpen" class="tablinks"
                       onclick="openTab(event, 'Product')">Product</a></li>
                <li><a href="javascript:void(0)" class="tablinks"
                       onclick="openTab(event, 'Information')">Information</a></li>
                <li><a href="javascript:void(0)" class="tablinks"
                       onclick="openTab(event, 'Reviews')">Reviews</a></li>
            </ul>
            <div id="Product" class="tabcontent">
                <h3>{{str_replace('_', ' ', $product->name)}}</h3><p>  &euro; {{$product->price}}</p><p> {{$product->alcohol_contents}}% VOL.</p><p> {{$product->contents_ml}} mL.</p>			</div>

            <div id="Information" class="tabcontent">
                <h3>{{str_replace('_', ' ', $product->name)}}</h3><p>{{$product->description}}</p>			</div>

            <div id="Reviews" class="tabcontent">
                <h3>Reviews</h3>
                <p>Coming soon</p>
            </div>
        </div>
        @if (Illuminate\Support\Facades\Auth::check())
        <form method="post" action=/ProductDetails.php?productid=3>
            <ul class="styledForm">
                <li><label>Amount</label> <input
                            type="number" name="amount" class="field-number"  min="0" /></li>
                <li><input type="submit" value="Add to cart" name="buy" /></li>
            </ul>
        </form>
        @endif
</body>
</div>
@include('layouts.footer')
</body>
</html>

