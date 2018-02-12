<div class="media">

    <a class="media-left" href="{{ route('profile.index', ['username' => Auth::user()->username])  }}">
        <img class="media-object" src="{{ Auth::user()->getAvatar() }}" alt="{{ Auth::user()->getName() }}"/>
    </a>
    <div class="media-body">
        <h4 class="media-heading"><a href="{{ route('profile.index', ['username' => Auth::user()->username])  }}">{{ Auth::user()->getName() }}</a></h4>
        <p>{{ Auth::user()->location }}</p>
    </div>
</div>