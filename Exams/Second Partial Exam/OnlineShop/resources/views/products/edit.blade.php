@extends('app')

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
        <h1>Edit Product</h1>
            <form method="post" action="{{action('ProductsController@update', $product->slug)}}">
            {{csrf_field()}}
            <input type="hidden" name="_method" value="PATCH">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="name">Name:</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{$product->name}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="slug">Slug:</label>
                    <input id="slug" type="text" class="form-control" name="slug" value="{{$product->slug}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="description">Description:</label>
                    <input id="description" type="text" class="form-control" name="description"
                           value="{{$product->description}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="image">Image:</label>
                    <input id="image" type="text" class="form-control" name="image" value="{{$product->image}}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="price">Price:</label>
                    <input id="price" type="number" step="0.01" class="form-control" name="price"
                           value="{{$product->price}}">
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
                            onclick="location.href='/products'">Cancel
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
