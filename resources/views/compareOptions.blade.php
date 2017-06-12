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
@include('layouts.header', array('title'=>"Compare"))
@include('layouts.breadcrumb', array('length'=>2, 'nameOne'=>"Compare"))

<div class="container">
    <br>
    {{ Form::open(['route' => 'compareDetails', 'id' => 'form']) }}
    <ul class="styledForm">
        <li>
            {{Form::select('productOne', $dropdownProducts)}}
        </li>
        <li>
            {{Form::select('productTwo', $dropdownProducts)}}
        </li>

        <li><input type="submit" name="compare" value="Compare!"/></li>
    </ul>
    {{Form::close()}}
</div>
@include('layouts.footer')
</body>
</html>
