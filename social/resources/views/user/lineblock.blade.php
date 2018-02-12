@if(Auth::User()->id == $user->id)
    <p></p>
    @elseif(Auth::User()->isFriendWith($user))
    <p></p>
    @elseif(Auth::User()->hasFriendRequestPending($user))
    <p></p>
    @elseif(Auth::User()->hasFriendRequestrecieved($user))
    <p></p>
    @else
<div class="media">

    <a class="media-left" href="{{ route('profile.index', ['username' => $user->username])  }}">
        <img class="media-object" src="{{ $user->getAvatar() }}" alt="{{ $user->getName() }}"/>
    </a>
    <div class="media-body">
        <h6 class="media-heading"><a href="{{ route('profile.index', ['username' => $user->username])  }}">{{ $user->getName() }}</a></h6>
        <p style="font-size: 12px;">{{ $user->location }}</p>
    </div>
    @if(Auth::User()->isFriendWith($user) || $user->id == Auth::User()->id)
        <p></p>
    @elseif(Auth::User()->hasFriendRequestPending($user))
        <a class="btn btn-warning">Friend Request Send</a>
    @elseif(Auth::User()->hasFriendRequestRecieved($user))
        <a href="{{ route('friends.accept', ['username' => $user->username]) }}" class="btn btn-primary">Accept Request</a>

    @else(!Auth::User()->isFriendWith($user) || !Auth::User()->hasFriendRequestRecieved($user) || !Auth::User()->hasFriendRequestPending($user))
        <a class="btn btn-success btn-xs pull-right" href="{{ route('friends.add', ['username' => $user->username]) }}">Add Friend</a>
    @endif
</div>
@endif