@extends('app')

@section('content')
    <div class="container">
        <h2>
            {{$company->name}}
        </h2>
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br/>
        @endif
        @if ( !$company->vehicles->count() )
            Your company has no vehicles.
        @else
            <table class="table table-striped">
                <thead>
                <tr>
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
                        <td>{{$vehicle["mark"]}}</td>
                        <td>{{$vehicle["description"]}}</td>
                        <td>{{$vehicle["released_at"]}}</td>
                        <td>{{$vehicle["price"]}}</td>
                        <td>
                            <a href="{{'/companies/'.$company->slug.'/vehicles/'.$vehicle["slug"].'/edit'}}"
                               class="btn btn-warning" style="width: 100%">Edit</a><br><br>
                            <form action="{{'/companies/'.$company['slug'].'/vehicles/'.$vehicle["slug"]}}"
                                  method="post">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="DELETE">
                                <input type="hidden" name="companySlug" value={{$company->slug}}>
                                <input type="hidden" name="vehicleSlug" value={{$vehicle->slug}}>
                                <button class="btn btn-danger" style="width: 100%" type="submit">Delete</button>
                            </form>
                            <br>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
        <div class="form-group">
            <button class="btn btn-info" type="button"
                    onclick="location.href='/companies'">Companies
            </button>
            <button type="button" class="btn btn-success" style="margin-left:38px"
                    onclick="location.href='/companies/{{$company->slug}}/vehicles/create'">Add Vehicle
            </button>
        </div>
    </div>
@endsection
