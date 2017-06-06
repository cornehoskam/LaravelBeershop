@section('breadcrumb')
    <ul class="breadcrumb">
        @if($length >= 1)
            <li><a>Home</a></li>
            @if($length >= 2)
                <li><a>{{$nameOne}}</a></li>
                @if($length >= 3)
                    <li><a>{{$nameTwo}}</a></li>
                    @if($length >= 4)
                        <li><a>{{$nameThree}}</a></li>
                    @endif
                @endif
            @endif
        @endif

    </ul>
@show