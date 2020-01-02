@extends('app')

@section('content')
    <div class="container">
        <h2>
            {{$company->name}}
        </h2>
        @if ( !$company->vehicles->count() )
            Your company has no vehicles.
        @else
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Mark</th>
                    <th>Description</th>
                    <th>Released At</th>
                    <th>Price</th>
                    <th colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($company->vehicles as $vehicle)
                    <tr>
                        <td>{{$vehicle["id"]}}</td>
                        <td>{{$vehicle["mark"]}}</td>
                        <td>{{$vehicle["description"]}}</td>
                        <td>{{$vehicle["released_at"]}}</td>
                        <td>{{$vehicle["price"]}}</td>
                        {{--<td>
                            <a href="{{action('VehicleController@edit', $vehicle["slug"])}}"
                               class="btn btn-warning">Edit</a><br><br>
                            <form action="{{action('VehicleController@destroy', $vehicle["slug"])}}" method="post">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                            <br>
                            <button class="btn btn-info" type="button"
                                    onclick="location.href='/companies'">Companies
                            </button>
                        </td>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
        <div class="form-group col-md-2">
            <button type="button" class="btn btn-success" style="margin-left:38px"
                    onclick="location.href='/companies/{{$company->slug}}/vehicles/create'">Add Vehicle
            </button>
        </div>
    </div>
@endsection
