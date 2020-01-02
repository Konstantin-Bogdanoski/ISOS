@extends('app')

@section('content')
    <div class="container">
        <h2>Create A Vehicle</h2><br/>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br/>
        @endif
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div><br/>
        @endif
        <form method="post" action="{{url('/companies/'.$company->slug.'/vehicles')}}">
            {{csrf_field()}}
            <input type="hidden" name="companySlug" value={{$company->slug}}>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="mark">Mark:</label>
                    <input id="mark" type="text" class="form-control" name="mark">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="slug">Slug:</label>
                    <input id="slug" type="text" class="form-control" name="slug">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="description">Description:</label>
                    <input id="description" type="text" class="form-control" name="description">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="released_at">Released:</label>
                    <input id="released_at" type="date" class="form-control" name="released_at">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="form-group col-md-4">
                    <label for="price">Price:</label>
                    <input id="price" type="number" class="form-control" name="price">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2" style="margin-left: 300px">
                    <button type="submit" class="btn btn-success" style="margin-left:38px">Add Vehicle</button>
                </div>
                <div class="form-group col-md-2">
                    <button type="reset" class="btn btn-warning" style="margin-left:38px">Reset</button>
                </div>
                <div class="form-group col-md-2">
                    <button type="button" class="btn btn-danger" style="margin-left:38px"
                            onclick="location.href='/companies/'">Cancel
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
