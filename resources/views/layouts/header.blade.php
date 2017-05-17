<title>The Beershop - {{ $title }}</title>

@section('navigation')
    <nav id="header">
        <ul>
            <li><img src="{{ URL::asset('assets/header.png') }}" width="250px" height="40px"></li>
            <li><a href="{{URL::route('home')}}"><b>Home</b></a></li>
            <li><a href="/"><b>Categories</b></a></li>
            <li><a href="/"><b>Compare</b></a></li>
        </ul>
    </nav>
@show
