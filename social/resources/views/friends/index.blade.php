@extends('template.default')
@section('content')
    @include('user/authblock')<hr>
    <div class="col-sm-4">
        <p>Your Friends List</p>
        @if(!$friends->count())
            <p>No friends</p>
            @else
        @foreach($friends as $user)
            @include('user.userblock')
            @endforeach
            @endif
    </div>
    <div class="col-sm-4">
        <p>Friends Request Recieved</p>
        @if(!$request->count())
            <p>No friends Request</p>
        @else
            @foreach($request as $user)
                @include('user.userblock')
            @endforeach
        @endif
    </div>
    <div class="col-sm-4">
        <p>Friends Request Send</p>
        @if(!$requests->count())
            <p>No friends Request</p>
        @else
            @foreach($requests as $user)
                @include('user.userblock')
            @endforeach
        @endif
    </div>


@stop