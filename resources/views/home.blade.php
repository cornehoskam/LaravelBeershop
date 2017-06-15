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
@include('layouts.header', array('title'=>'Home'))
<div class="container">
    <br>
    <div id="homebody">
        <h2>Want something different? Why not try</h2>
        @php
        $route = "/Product/".$product['name'];
        echo "<h2><a href='".$route."'>".str_replace('_', ' ', $product['name'])."</a></h2>"
        @endphp
        <h3><i> {{$product['description']}}</i></h3>
        <img src="{{ URL::asset('assets/products/'.$product['image_url']) }}" width='200px' height='200px'><br><br>
        @if (Illuminate\Support\Facades\Auth::check())
            <form method="post" action=/cart>
                {{ csrf_field() }}
                <ul class="styledForm">
                    <input type="hidden" name="product_id" value="{{$product->id}}"/>
                    <li><label>Amount</label> <input
                                type="number" name="amount" class="field-number"  min="1" /></li>
                    <li><input type="submit" value="Add to cart" name="buy" /></li>
                </ul>
            </form>
        @endif
    </div>
</body>
</div>
@include('layouts.footer')
</body>
</html>

