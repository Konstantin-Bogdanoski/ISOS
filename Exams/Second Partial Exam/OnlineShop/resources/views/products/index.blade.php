@extends('app')

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
                    Name
                </th>
                <th>
                    Image
                </th>
                <th>
                    Description
                </th>
                <th>
                    Price
                </th>
                <th>
                    Required orders
                </th>
                <th>
                    Actions
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($products ?? '' as $product)
                <tr>
                    <td>{{$product['name']}}</td>
                    <td><img style="width: 100px" src="{{$product['image']}}" alt=""></td>
                    <td>{{$product['description']}}</td>
                    <td>{{$product['price']}}$</td>
                    <td>
                        {{$product['required_number']}}
                    </td>
                    <td>
                        <button onclick="location.href='/products/{{$product['slug']}}'"
                                class="btn btn-info"
                                style="width: 100%">
                            Preorders
                        </button>
                        <a href="{{action('ProductsController@edit', $product['slug'])}}"
                           class="btn btn-warning" style="width: 100%">
                            Edit
                        </a>
                        <form method="post" action="{{action('ProductsController@destroy', $product['slug'])}}">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger" style="width: 100%">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="form-group col-md-2">
            <button type="button" class="btn btn-success" style="margin-left:38px"
                    onclick="location.href='/products/create'">Add Product
            </button>
        </div>
    </div>
@endsection
