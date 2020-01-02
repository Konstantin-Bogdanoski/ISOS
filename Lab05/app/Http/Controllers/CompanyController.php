<?php /** @noinspection PhpIncompatibleReturnTypeInspection */

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use function Psy\debug;

/**
 * @author Konstantin Bogdanoski (konstantin.b@live.com)
 */
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $companies = Company::all()->toArray();
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $company = $this->validate(request(), [
            'name' => 'required',
            'slug' => 'required',
            'founded_at' => 'required',
            'description' => 'required',
        ]);

        Company::create($company);

        return redirect('companies')->with('success', 'Company has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return void
     */
    public function show($slug)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @return Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company', 'slug'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $slug
     * @return Response
     * @throws ValidationException
     */
    public function update(Request $request, $slug)
    {
        $company = Company::where('slug', $slug)->first();
        $this->validate(request(), [
            'name' => 'required',
            'slug' => 'required',
            'founded_at' => 'required',
            'description' => 'required',
        ]);
        $company->name = $request->get('name');
        $company->slug = $request->get('slug');
        $company->founded_at = $request->get('founded_at');
        $company->description = $request->get('description');
        $company->save();
        return redirect('companies')->with('success', 'Company has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $slug
     * @return void
     */
    public function destroy($slug)
    {
        $company = Company::where('slug', $slug)->first();
        $company->delete();
        return redirect('companies')->with('success', 'Company has been  deleted');
    }
}
