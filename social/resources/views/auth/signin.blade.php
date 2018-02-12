@extends('template.default')
@section('content')
    <div class="col-sm-7">
        <h1>Departure. It's Home</h1>
        <p>The Best Ever Social Network</p>
    </div>
    <div class="col-sm-5 pull-right">
        <form class="form-vertical" action="{{ route('auth.signin')  }}" method="post" role="form">
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''  }}">
                <label for="email" class="control-label">E-Mail Address</label>
                <input type="text" class="form-control" value="{{ Request::old('email') }}" name="email" placeholder="Valid E-Mail Address"/>
                @if($errors->has('email'))
                    <span class="help-block">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('password') ? 'has-error' : ''  }}">
                <label for="password" class="control-label">Password</label>
                <input type="text" class="form-control" value="{{ Request::old('password') }}" name="password" placeholder="Valid Password"/>
                @if($errors->has('password'))
                    <span class="help-block">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label>
                    <input class="checkmark" type="checkbox" name="remember" /> Remember Me
                </label>
            </div>
            <input type="hidden" name="_token" value="{{ Session::token() }}"/>
            <button type="submit" class="btn btn-success">Sign In</button>
        </form>
    </div>

@stop
