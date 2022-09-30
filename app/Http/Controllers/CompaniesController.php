<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::query()
            ->where('user_id', Auth::user()->id)
            ->when(request()->input('search'), function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })->get()->map(fn ($company) => [
                'id' => $company->id,
                'name' => $company->name,
                'email' => $company->email,
                'location' => $company->location,
                'created_at' => $company->created_at->format('d/m/Y'),
            ]);
        return Inertia::render('Companies/Index', [
            'userCompanies' => $companies,
            'filters' => request()->only(['search']),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Companies/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'companyName' => 'required|string|max:100',
            'companyEmail' => 'required|email|max:100',
            'location' => 'required|string|max:255',
        ]);

        $createdCompany = new Company();
        $createdCompany->name = $request->companyName;
        $createdCompany->email = $request->companyEmail;
        $createdCompany->location = $request->location;
        $user = Auth::user();
        $user->companies()->save($createdCompany);

        return Redirect::route('companies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return Inertia::render('Companies/Edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'companyName' => 'required|string|max:100',
            'companyEmail' => 'required|email|max:100',
            'location' => 'required|string|max:255',
        ]);

        $company->name = $request->companyName;
        $company->email = $request->companyEmail;
        $company->location = $request->location;
        $company->save();

        return Redirect::route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return Redirect::route('companies.index');
    }
}
