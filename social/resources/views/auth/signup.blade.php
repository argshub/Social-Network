@extends('template.default')
@section('content')


    <div class="col-sm-5 pull-right">
        <form class="form-vertical" action="{{ route('auth.signup')  }}" method="post" role="form">
            <div class="form-group {{ $errors->has('first_name') ? 'has-error' : ''  }}">
                <label for="first_name" class="control-label">First Name</label>
                <input type="text" class="form-control" value="{{ Request::old('first_name') }}" name="first_name" placeholder="Valid First Name"/>
                @if($errors->has('first_name'))
                    <span class="help-block">{{ $errors->first('first_name')  }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('last_name') ? 'has-error' : ''  }}">
                <label for="last_name" class="control-label">Lirst Name</label>
                <input type="text" class="form-control" value="{{ Request::old('last_name')  }}" name="last_name" placeholder="Valid Last Name"/>
                @if($errors->has('last_name'))
                    <span class="help-block">{{ $errors->first('last_name') }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('username') ? 'has-error' : ''  }}">
                <label for="username" class="control-label">User Name</label>
                <input type="text" class="form-control" value="{{ Request::old('username')  }}" name="username" placeholder="Valid User Name"/>
                @if($errors->has('username'))
                    <span class="help-block">{{ $errors->first('username') }}</span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('password') ? 'has-error' : ''  }}">
                <label for="password" class="control-label">Password</label>
                <input type="text" class="form-control" value="{{ Request::old('password')  }}" name="password" placeholder="Valid Password"/>
                @if($errors->has('password'))
                    <span class="help-block">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''  }}">
                <label for="email" class="control-label">E-Mail Address</label>
                <input type="text" class="form-control" value="{{ Request::old('email') }}" name="email" placeholder="Valid E-Mail Address"/>
                @if($errors->has('email'))
                    <span class="help-block">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('location') ? 'has-error' : ''  }}">
                <label for="location" class="control-label">Location</label>
                <input type="text" class="form-control" value="{{ Request::old('location')  }}" name="location" placeholder="Valid Location & Address"/>
                @if($errors->has('location'))
                    <span class="help-block">{{ $errors->first('location') }}</span>
                @endif
            </div>
            <input type="hidden" name="_token" value="{{ Session::token() }}"/>
            <button type="submit" class="btn btn-success">Signup</button>
        </form>
    </div>

@stop
