@extends('app')
@section('content')
    <div class="container jumbotron">
        <form method="post" action="{{action('BlogsController@store')}}">
            {{csrf_field()}}
            <label for="username">Username</label>
            <input id="username" type="text" name="username"><br>
            <label for="title">Title</label>
            <input id="title" type="text" name="title"><br>
            <label for="description">Description</label>
            <textarea id="description" type="text" name="description">Enter your desription</textarea><br>
        </form>
    </div>
@endsection
