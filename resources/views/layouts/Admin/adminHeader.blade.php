<title>The Beershop - {{ $title }}</title>

@section('navigation')
    <nav id="header">
        <ul>
            <li><img src="{{ URL::asset('assets/header.png') }}" width="250px" height="40px"></li>
            <li><a href="/admin/products"><b>Products</b></a></li>
            <li><a href="/admin/categories"><b>Categories</b></a></li>
            <li><a href="/admin/users"><b>Users</b></a></li>
            <li><a href="/admin/orders"><b>Orders</b></a></li>
            <li class="navRight"><a href="/logout"><b>Logout</b></a></li>
            <li class="navRight"><a href="{{ url('/') }}"><b>Home</b></a></li>
        </ul>
    </nav>
@show
