@extends('app')
{{--@author Konstantin Bogdanoski (konstantin.b@live.com)--}}
@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br/>
        @endif
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br/>
        @endif
        <form method="post" action="{{route('news.comments.update', [$news['id'], $comment['id']])}}">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="news_id" value="{{$news['id']}}">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="username">Username</label>
                    <input id="username" type="text" class="form-control" name="username" value="{{$comment->username}}"
                           required readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="comment_text">Comment</label>
                    <input id="comment_text" type="text" class="form-control" name="comment_text"
                           value="{{$comment->comment_text}}" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2" style="margin-left: 300px">
                    <button type="submit" class="btn btn-success" style="margin-left:38px">Submit</button>
                </div>
                <div class="form-group col-md-2">
                    <button type="reset" class="btn btn-warning" style="margin-left:38px">Reset</button>
                </div>
                <div class="form-group col-md-2">
                    <button type="button" class="btn btn-danger" style="margin-left:38px"
                            onclick="location.href='{{'/news/'.$news['id']}}'">Cancel
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
