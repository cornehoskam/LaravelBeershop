<title>The Beershop - {{ $title }}</title>
@php
    $categories = App\categorie::all();
@endphp
@section('navigation')
    <nav id="header">
        <ul>
            <li><img src="{{ URL::asset('assets/header.png') }}" width="250px" height="40px"></li>
            <li><a href="{{URL::route('home')}}"><b>Home</b></a></li>
            <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn"><b>Categories</b></a>
                <div class="dropdown-content">
                    @foreach($categories as $cat)
                        @php
                            $route = "/Category/".$cat->name;
                            echo "<a href='".$route."'>".$cat->name." </a>"
                        @endphp
                    @endforeach
                </div>
            </li>
            <li><a href="/"><b>Compare</b></a></li>
            @if (Auth::check())
                <li class="navRight"><a href="/logout"><b>Logout</b></a></li>
                @if ( Auth::user()->isAdmin )
                    <li class="navRight"><a href="{{ url('/admin') }}"><b>Admin</b></a></li>
                @endif
            @else
                <li class="navRight"><a href="{{ url('/login') }}"><b>Login</b></a></li>
                <li class="navRight"><a href="{{ url('/register') }}"><b>Register</b></a></li>
            @endif
            <li><a href="{{URL::route('about')}}"><b>About</b></a></li>
        </ul>
        <br>
        <div id="searchbar">
            {{ Form::open(['route' => 'search', 'id' => 'form']) }}
                <input  type="text" name="query" size="55">
                <input  type="submit" name="submit" value="Search">
            {{Form::close()}}

        </div>
        <br>
    </nav>
@show
