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
@include('layouts.header', array('title'=>str_replace('_', ' ', $product['name'])))
@if($subcat != null)
    @include('layouts.breadcrumb', array('length'=>4, 'nameOne'=>$cat['name'], 'nameTwo'=>$subcat['name'], 'nameThree'=>str_replace('_', ' ', $product['name'])))
@else
    @include('layouts.breadcrumb', array('length'=>3, 'nameOne'=>$cat['name'], 'nameTwo'=>str_replace('_', ' ', $product['name'])))

@endif
<div class="container">
    <br>
    <h1>{{ str_replace('_', ' ', $product['name']) }}</h1>
</body>
</div>
@include('layouts.footer')
</body>
</html>

