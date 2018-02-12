<div class="media">

    <a class="media-left" href="{{ route('profile.index', ['username' => $user->username])  }}">
        <img class="media-object" src="{{ $user->getAvatar() }}" alt="{{ $user->getName() }}"/>
    </a>
    <div class="media-body">
        <h4 class="media-heading"><a href="{{ route('profile.index', ['username' => $user->username])  }}">{{ $user->getName() }}</a></h4>
        <p>{{ $user->location }}</p>
        <p class="pull-right">
            @if(Auth::User()->isFriendWith($user))
                <form class="form" action="{{ route('profile.delete', ['username' => $user->username]) }}" method="post">
                    <input type="submit" value="Delete Friend" class="btn btn-danger btn-xs pull-right"/>
                    <input type="hidden" name="_token" value="{{ Session::token() }}"/>
                </form>

        @elseif($user->id == Auth::User()->id)
            <p></p>
        @elseif(Auth::User()->hasFriendRequestPending($user))
                <a class="btn btn-warning btn-xs">Friend Request Send</a>
            @elseif(Auth::User()->hasFriendRequestRecieved($user))
                <a href="{{ route('friends.accept', ['username' => $user->username]) }}" class="btn btn-primary btn-xs">Accept Request</a>

            @else(!Auth::User()->isFriendWith($user) || !Auth::User()->hasFriendRequestRecieved($user) || !Auth::User()->hasFriendRequestPending($user))
                <a class="btn btn-success btn-xs" href="{{ route('friends.add', ['username' => $user->username]) }}">Add Friend</a>

                @endif
        </p>
    </div>

</div>