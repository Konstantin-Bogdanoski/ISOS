@extends('app')

@section('content')
    <div class="container">
        <div class="container">
            <div class="container">
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
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$product['name']}}</td>
                        <td><img src="{{$product['image']}}" style="width: 40%" alt=""></td>
                        <td>{{$product['description']}}</td>
                        <td>{{$product['price']}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="container">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>
                            User
                        </th>
                        <th>
                            Quantity
                        </th>
                        <th>
                            Info
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($product->preorders as $preorder)
                        <tr>
                            <td>
                                {{$preorder['preorder_user']}}
                            </td>
                            <td>
                                {{$preorder['quantity']}}
                            </td>
                            <td>
                                {{$preorder['info']}}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if(count($product->preorders) < $product['required_number'])
                <form method="post" action="{{url('/products/'.$product['slug'].'/preorders')}}">
                    {{csrf_field()}}
                    <input type="hidden" name="product_id" value="{{$product['id']}}">
                    <input type="hidden" name="product_slug" value="{{$product['slug']}}">
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <label for="preorder_user">User:</label>
                            <input id="preorder_user" type="text" class="form-control" name="preorder_user">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <label for="quantity">Quantity:</label>
                            <input id="quantity" type="number" min="0" class="form-control" name="quantity">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <label for="info">Info:</label>
                            <input id="info" type="text" class="form-control" name="info">
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
            @endif
        </div>
        <button type="button" onclick="location.href='/products/current'"
                class="btn btn-success">
            All Current Products
        </button>
        <button type="button" onclick="location.href='/products'"
                class="btn btn-success">
            All Products
        </button>
    </div>
@endsection
