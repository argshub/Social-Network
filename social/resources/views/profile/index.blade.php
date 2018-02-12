@extends('template.default')
@section('content')
    @include('user/usersblock')<hr>
    <div class="col-sm-6">
        @if(!$statuses->count())
            <p>{{ $user->getName() }} no post, Yet</p>
        @else
            @foreach($statuses as $status)
                <div class="row">
                    <div class="col-sm-3">
                        <div class="well">
                            <img src="{{ $status->user->getAvatar() }}" class="img-circle" height="55" width="55" alt="{{ $status->user->getName() }}">
                            <p class="list-inline">{{ $status->user->getName() }}</p>
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
                                            <h5 class="media-heading"><a href="#">{{ $reply->user->getName() }}</a></h5>
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
                        @if($authUserIsFriend || Auth::User()->id == $status->user->id)
                        <form role="form" action="{{ route('status.reply', ['statusId' => $status->id]) }}" method="post">
                            <div class="form-group-sm {{ $errors->has("reply-{$status->id}") ? ' has-error' : '' }}">
                                <textarea name="reply-{{ $status->id }}" class="form-control" placeholder="Mention It-{{ Auth::User()->getName() }}"></textarea>
                                @if($errors->has("reply-{$status->id}"))
                                    <span class="help-block">{{ $errors->first("reply-{$status->id}") }}</span>
                                @endif
                            </div>
                            <input type="submit" class="btn btn-primary btn-xs pull-right" value="Reply">
                            <input type="hidden" name="_token" value="{{ Session::token() }}"/>
                        @endif

                        </form>

                    </div>
                </div><hr>
            @endforeach

        @endif
    </div>
    <div class="col-sm-6">

    </div>

    @stop