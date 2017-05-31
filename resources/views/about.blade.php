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
@include('layouts.header', array('title'=>'About'))
<div class="container">
    <br>
    <div id="homebody">
        <br>
        <h2> Worlds most popular Beer Webshop <br></h2>
        <h2> +31 6 12312312 <br></h2>
        <h2> Onderwijsboulevard 215 <br></h2>
        <h2> 5223 DE 's-Hertogenbosch <br></h2>
    </div>
</body>
</div>
@include('layouts.footer')
</body>
</html>

