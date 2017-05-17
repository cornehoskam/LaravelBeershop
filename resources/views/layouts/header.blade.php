<title>The Beershop - {{ $title }}</title>

@section('navigation')
    <nav id="header">
        <ul>
            <li><img src="{{ URL::asset('assets/header.png') }}" width="250px" height="40px"></li>
            <li><a href="{{URL::route('home')}}"><b>Home</b></a></li>
            <li><a href="/"><b>Categories</b></a></li>
            <li><a href="/"><b>Compare</b></a></li>
            @if (Auth::check())
                @if ( Auth::user()->isAdmin )
                    <li class="navRight"><a href="{{ url('/admin') }}"><b>Admin</b></a></li>
                @endif
                <li class="navRight"><a href="/logout"><b>Logout</a></li>
            @else
                <li class="navRight"><a href="{{ url('/login') }}"><b>Login</b></a></li>
                <li class="navRight"><a href="{{ url('/register') }}"><b>Register</b></a></li>
            @endif
        </ul>
    </nav>
@show
