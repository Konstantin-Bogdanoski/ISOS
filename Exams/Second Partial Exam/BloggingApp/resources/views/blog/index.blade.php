@extends('app')
@section('content')
    <div class="container">
        @foreach($blogs as $blog)
            <div class="page-item">
                <a href="/blogs/{{$blog['id']}}" class="page-link"><h1>{{$blog['title']}}</h1></a>
            </div>
        @endforeach
        <a href="{{action('BlogsController@create')}}" class="btn btn-default">Create blog</a>
    </div>
@endsection
