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
                    Preorders
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>
                        {{$product['name']}}
                    </td>
                    <td>
                        <img style="width: 100px" src="{{$product['image']}}" alt="">
                    </td>
                    <td>
                        {{$product['description']}}
                    </td>
                    <td>
                        {{$product['price']}}
                    </td>
                    <td>
                        <button onclick="location.href='/products/{{$product['slug']}}/preorders'"
                                class="btn btn-info"
                                style="width: 69%">
                            {{$product['required_number']}}
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
