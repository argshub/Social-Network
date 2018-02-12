@extends('template.default')
@section('content')
    <div class="col-sm-6">
        <p>Your Search Results for {{ Request::input('query') }}</p>
    @if(!$users->count())
        <p>No Users Found</p>
        @else
            @foreach($users as $user)
                @include('user.userblock')
            @endforeach

        @endif

    </div>

    @stop