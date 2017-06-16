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
@include('layouts.header', array('title'=>"Order Details"))
@if($errors->any())
    <div class="{{$errors->getMessages()[0][0]}}">{{$errors->getMessages()[1][0]}}</div>
@endif
<div class="container">
    <h1>Order Details</h1>
    <p>Please fill in these details</p>
    <form method="post" action='/order/place' id="userInfoForm">
        {{ csrf_field() }}
        <ul class="styledForm">
<input type="hidden" name="id" value="{{$user->id}}">
            <li><label>First Name<span class="required">*</span></label> <input
                        type="text" name="firstName" class="field-long" @if(isset($user['firstName'])) value="{{$user->firstName}}" @endif ></li>
            <li><label>Last Name<span class="required">*</span></label> <input
                        type="text" name="lastName" class="field-long" @if(isset($user['lastName'])) value="{{$user->lastName}}" @endif ></li>
            <li><label>Address<span class="required">*</span></label> <input
                        type="text" name="address" class="field-long" @if(isset($user['address'])) value="{{$user->address}}" @endif></li>
            <li><label>City<span class="required">*</span></label> <input
                        type="text" name="city" class="field-long" @if(isset($user['city'])) value="{{$user->city}}" @endif></li>
            <li><label>Dutch Postal Code <span class="required">*</span></label> <input
                        type="text" step="any" name="postalCode" class="field-long" pattern="^[1-9][0-9]{3} ?(?!sa|sd|ss|SA|SD|SS)[A-Za-z]{2}$"  @if(isset($user['postalCode'])) value="{{$user->postalCode}}" @endif ></li>
            </li>
            <li><input type="submit" name="Next" value="Next" id="Next"/></li>
        </ul>
    </form>
</div>
</body>
</div>
@include('layouts.footer')
</body>
</html>

