@extends('app')

@section('content')
    <div class="container">
        <br/>
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br/>
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Founded At</th>
                <th>Number of vehicles</th>
                <th colspan="2">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($companies as $company)
                <tr>
                    <td>{{$company["name"]}}</td>
                    <td>{{$company["description"]}}</td>
                    <td>{{$company["founded_at"]}}</td>
                    <td>{{$company[0]["num"]}}</td>
                    <td>
                        <a href="{{action('CompanyController@edit', $company["slug"])}}"
                           class="btn btn-warning" style="width: 100%">Edit</a><br><br>
                        <form action="{{action('CompanyController@destroy', $company["slug"])}}" method="post">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="DELETE">
                            <button style="width: 100%" class="btn btn-danger" type="submit">Delete</button>
                        </form>
                        <br>
                        <button class="btn btn-info" type="button" style="width: 100%"
                                onclick="location.href='/companies/{{$company["slug"]}}/vehicles'">Vehicles
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="form-group col-md-2">
            <button type="button" class="btn btn-success" style="margin-left:38px"
                    onclick="location.href='/companies/create'">Add Company
            </button>
        </div>
    </div>
@endsection
