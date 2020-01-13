@extends('app')
{{--@author Konstantin Bogdanoski (konstantin.b@live.com)--}}
@section('content')
    <div class="frames-container-application text-center">
        <div class="jumbotron">
            <h1>{{$news['news_title']}}</h1>
            <div style="height: 5%">
                <a class="lead" href="{{$news['news_link']}}">Link to source</a><br>
                <span class="lead">{{$news['created_at']}}</span><br>
                <span class="lead font-weight-bold">Upvotes - {{$news['num_upvotes']}}</span>
            </div>
        </div>
    </div>
    <div class="container">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br/>
        @endif
        <div class="jumbotron" style="height: 50%">
                <span class="h2">
                    {{$news['news_description']}}
                </span>
        </div>
        <div class="frame-comments" style="height: 50%">
            <h2>Comments:</h2>
            @foreach($news->comments as $comment)
                <div class="jumbotron">
                    <div>
                        <div class="h3">
                            {{$comment['username']}}
                        </div>
                        <div>
                            {{$comment['created_at']}}
                        </div>
                    </div>
                    <div>
                        {{$comment['comment_text']}}
                    </div>
                    <div>
                        <a href="{{route('news.comments.edit', [$news['id'], $comment['id']])}}"
                           class="btn btn-warning" style="width: 100%">
                            Edit
                        </a>
                        <form method="post" action="{{route('news.comments.destroy', [$news['id'], $comment['id']])}}">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="DELETE">
                            <button style="width: 100%" type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container">
        <form method="post" action="{{'/news/'.$news['id'].'/comments'}}">
            {{csrf_field()}}
            <input type="hidden" name="news_id" value="{{$news['id']}}">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control" name="username" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="comment_text">Comment</label>
                    <input id="comment_text" type="text" class="form-control" name="comment_text" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2" style="margin-left: 300px">
                    <button type="submit" class="btn btn-success" style="margin-left:38px">Submit</button>
                </div>
                <div class="form-group col-md-2">
                    <button type="reset" class="btn btn-warning" style="margin-left:38px">Reset</button>
                </div>
            </div>
        </form>
    </div>
@endsection
