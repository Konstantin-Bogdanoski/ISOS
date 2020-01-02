<?php

namespace App\Http\Controllers;

use App\Company;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Scalar\String_;

/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */
class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Company $company)
    {
        return view('vehicles.show', compact('company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Company $company)
    {
        return view('vehicles.create', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $vehicle = $this->validate(request(), [
            'mark' => 'required',
            'slug' => 'required',
            'released_at' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $companySlug = $this->validate(request(), [
            'companySlug' => 'required'
        ]);

        $company = Company::where('slug', $companySlug['companySlug'])->first();
        $vehicle['company_id'] = $company['id'];

        Vehicle::create($vehicle);
        return redirect("/companies/" . $company->slug . "/vehicles")->with('message', 'Vehicle created.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $slug
     * @return void
     */
    public function edit($companySlug, $vehicleSlug)
    {
        $company = Company::where('slug', $companySlug)->first();
        $vehicle = Vehicle::where('slug', $vehicleSlug)->first();
        $slug = $vehicleSlug;
        return view('vehicles.edit', compact('vehicle', 'slug', 'company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request)
    {
        $vehicle = Vehicle::where('slug', $request->get('vehicleSlug'))->first();

        var_dump($vehicle);

        $this->validate(request(), [
            'mark' => 'required',
            'slug' => 'required',
            'released_at' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        $vehicle->mark = $request->get('mark');
        $vehicle->slug = $request->get('slug');
        $vehicle->released_at = $request->get('released_at');
        $vehicle->description = $request->get('description');
        $vehicle->price = $request->get('price');

        $companySlug = $this->validate(request(), [
            'companySlug' => 'required'
        ]);

        $company = Company::where('slug', $companySlug['companySlug'])->first();
        $vehicle['company_id'] = $company['id'];

        $vehicle->save();
        return redirect("/companies/" . $company->slug . "/vehicles")->with('message', 'Vehicle updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $companySlug
     * @param $vehicleSlug
     * @return Response
     */
    public function destroy($companySlug, $vehicleSlug)
    {
        $vehicle = Vehicle::where('slug', $vehicleSlug)->first();
        $vehicle->delete();
        return redirect('companies/' . $companySlug . "/vehicles")->with('success', 'Vehicle has been  deleted');
    }
}
