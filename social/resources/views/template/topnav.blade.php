<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ route('home') }}">Xenon</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            @if(Auth::check())
                <ul class="nav navbar-nav">

                </ul>
                <form class="navbar-form navbar-left" action="{{ route('search.index') }}" role="search">
                    <div class="form-group input-group">
                        <input type="text" name="query" class="form-control" placeholder="Search..">
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                      </span>
                    </div>
                </form>

            @endif
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li class="dropdown">
                        <a href="javascript:void()" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->getName() }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('profile.index', ['username' => Auth::user()->username]) }}">Profile</a></li>
                            <li><a href="{{ route('home') }}">Timeline</a></li>
                            <li><a href="{{ route('profile.edit', ['id' => Auth::user()->id]) }}">Update Profile</a></li>
                            <li><a href="{{ route('friends.index') }}">Friends List</a></li>
                            <li><a href="{{ route('auth.signout') }}">Sign Out</a></li>
                        </ul>
                    </li>
                @else
                    <li><a href="{{ route('auth.signup')  }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="{{ route('auth.signin')  }}"><span class="glyphicon glyphicon-log-in"></span> Sign In</a></li>

                @endif
            </ul>
        </div>
    </div>
</nav>
