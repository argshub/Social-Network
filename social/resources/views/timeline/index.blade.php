@extends('template.default')
@section('content')



<div class="container text-center">
    <div class="row">
        <div class="col-sm-3 well">
            <div class="well">
                <p><a href="{{ route('profile.index', ['username' => Auth::User()->username]) }}">{{ Auth::User()->getName() }}</a></p>
                <img src="{{ Auth::User()->getAvatar() }}" class="img-circle" height="65" width="65" alt="{{ Auth::User()->getName() }}">
            </div>
            <div class="well">
                <p><a href="#">Interests</a></p>
                <p>
                    <span class="label label-default">News</span>
                    <span class="label label-primary">W3Schools</span>
                    <span class="label label-success">Labels</span>
                    <span class="label label-info">Football</span>
                    <span class="label label-warning">Gaming</span>
                    <span class="label label-danger">Friends</span>
                </p>
            </div>
            <div class="alert alert-success fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <p><strong>Ey!</strong></p>
                People are looking at your profile. Find out who.
            </div>
            <p><a href="#">Link</a></p>
            <p><a href="#">Link</a></p>
            <p><a href="#">Link</a></p>
        </div>
        <div class="col-sm-7">

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default text-left">
                        <div class="panel-body">
                            <form class="form" action="{{ route('status.post') }}" method="post">
                                <div class="form-group-sm {{ $errors->has('status') ? 'has-error' : '' }}">
                                    <textarea name="status" class="form-control" placeholder="What's Up...{{ Auth::User()->getName() }}"></textarea>
                                    @if($errors->has('status'))
                                    <span class="help-block">{{ $errors->first('status')  }}</span>
                                        @endif
                                </div>
                                <input type="hidden" name="_token" value="{{ Session::token()  }}">
                                <button type="submit" class="btn btn-info btn-xs pull-right">Post Status</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            @if(!$statuses->count())
                <p>No Status in your Timeline</p>
            @else
                @foreach($statuses as $status)
            <div class="row">
                <div class="col-sm-3">
                    <div class="well">
                        <img src="{{ $status->user->getAvatar() }}" class="img-circle" height="55" width="55" alt="{{ $status->user->getName() }}">
                        <p class="list-inline"><a href="{{ route('profile.index', ['username' => $status->user->username]) }}">{{ $status->user->getName() }}</a></p>
                    </div>
                </div>
                <div class="col-sm-9">
                    <div class="well">
                        <p>{{ $status->body }}</p>
                    </div>
                    <ul class="list-inline">
                        <li class="pull-left">{{ $status->created_at->diffForHumans() }}</li>
                        <li class="pull-center">{{ $status->likes->count() }} {{ str_plural('like', $status->likes->count()) }}</li>

                            <li class="pull-right"><a href="{{ route('status.like', ['statusId' => $status->id]) }}"><span class="glyphicon glyphicon-thumbs-up"></span> Like</a></li>

                    </ul>
                    <div class="row">
                        <div class="col-sm-6 pull-right">
                            @foreach($status->replies as $reply)
                            <div class="media">
                                <a class="pull-left" href="{{ route('profile.index', ['username' => $reply->user->username]) }}">
                                    <img class="media-object" src="{{ $reply->user->getAvatar() }}" alt="{{ $reply->user->getName() }}"/>
                                </a>
                                <div class="media-body">
                                    <h5 class="media-heading"><a href="{{ route('profile.index', ['username' => $reply->user->username]) }}">{{ $reply->user->getName() }}</a></h5>
                                    <p>{{ $reply->body }}</p>
                                    <ul class="list-inline">
                                        <li>{{ $reply->created_at->diffForHumans() }}</li>
                                        <li>{{ $status->likes->count() }} {{ str_plural('like', $status->likes->count()) }}</li>
                                        <li class="pull-right"><a href="{{ route('status.like', ['statusId' => $reply->id]) }}"><span class="glyphicon glyphicon-thumbs-up"></span> Like</a></li>
                                    </ul>
                                </div>
                            </div><br>
                                @endforeach
                        </div>
                    </div>

                        <form role="form" action="{{ route('status.reply', ['statusId' => $status->id]) }}" method="post">
                            <div class="form-group-sm {{ $errors->has("reply-{$status->id}") ? ' has-error' : '' }}">
                                <textarea name="reply-{{ $status->id }}" class="form-control" placeholder="Mention It-{{ Auth::User()->getName() }}"></textarea>
                                @if($errors->has("reply-{$status->id}"))
                                    <span class="help-block">{{ $errors->first("reply-{$status->id}") }}</span>
                                    @endif
                            </div>
                               <input type="submit" class="btn btn-primary btn-xs pull-right" value="Reply">
                            <input type="hidden" name="_token" value="{{ Session::token() }}"/>


                        </form>

                </div>
            </div><hr>
                @endforeach
                    {!! $statuses->render() !!}
                @endif



        </div>
        <div class="col-sm-2">
            <p>People you Appear</p>


            @foreach($users as $user)
                    @include('user.lineblock')
                @endforeach

        </div>
    </div>
</div>

@stop