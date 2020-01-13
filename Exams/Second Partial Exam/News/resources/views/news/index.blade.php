@extends('app')
{{--@author Konstantin Bogdanoski (konstantin.b@live.com)--}}
@section('content')
    <div class="container">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br/>
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <th>
                    Title
                </th>
                <th>
                    Upvotes
                </th>
                <th>
                    Comments
                </th>
                <th>
                    Date
                </th>
                <th>
                    Actions
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($news ?? '' as $new)
                <tr>
                    <td><a href="http://{{$new['news_link']}}">{{$new['news_title']}}</a></td>
                    <td>{{$new['num_upvotes']}}</td>
                    <td><a class="btn btn-info" style="width: 100%"
                           href="{{action('NewsController@show', $new['id'])}}">{{count($new->comments)}}</a></td>
                    <td>{{$new['created_at']}}</td>
                    <td>
                        <a href="{{action('NewsController@edit', $new['id'])}}"
                           class="btn btn-warning" style="width: 100%">
                            Edit
                        </a>
                        <form method="post" action="{{action('NewsController@destroy', $new['id'])}}">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="DELETE">
                            <button style="width: 100%" type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="form-group col-md-2">
            <button type="button" class="btn btn-success" style="margin-left:38px"
                    onclick="location.href='/news/create'">Create News
            </button>
        </div>
    </div>
@endsection
