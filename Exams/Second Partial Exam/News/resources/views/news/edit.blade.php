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
        <form method="post" action="{{action('NewsController@update', $news->id)}}">
            {{csrf_field()}}
            <input type="hidden" name="num_upvotes" value="0">
            <input type="hidden" name="_method" value="PATCH">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="news_title">Title</label>
                    <input id="news_title" type="text" class="form-control" name="news_title"
                           value="{{$news->news_title}}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="news_description">Description</label>
                    <input id="news_description" type="text" class="form-control" name="news_description"
                           value="{{$news->news_description}}" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="news_link">Link</label>
                    <input id="news_link" type="url" class="form-control" name="news_link" value="{{$news->news_link}}"
                           required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="created_at">Created at</label>
                    <input id="created_at" type="datetime-local" class="form-control" name="created_at"
                           value="{{$news->created_at}}" required>
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
                            onclick="location.href='/news'">Cancel
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
