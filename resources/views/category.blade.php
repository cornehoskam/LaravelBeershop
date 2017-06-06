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
        @foreach($subcat as $subcat)
            @php
                $route = "/Category/".$cat['name']."/".$subcat->name;
                echo "<a href='".$route."'>".$subcat->name." </a>";
            @endphp
        @endforeach
        <h2>Products</h2>
        @if($empty)
            This category does not have any products listed!
        @endif
        @foreach($products as $product)
            @php
                $route = "/Product/".$product['name'];
                    echo "<a href='".$route."'>".$product->name."</a><br>";
            @endphp
        @endforeach
    </div>
</body>
</div>
@include('layouts.footer')
</body>
</html>

