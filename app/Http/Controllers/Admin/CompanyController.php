<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Mail\CompanyNotificantion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $lang = 'de'; //this value should dynamic
        App::setLocale($lang);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::orderBy('created_at', 'desc')->paginate(10);
        return view('Admin.pages.company.index')->with('companies', $companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.pages.company.create');
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
            'name' => 'required'
        ]);

        $logo = null;

        if($request->has('logo'))
        {
            $file = $request->file('logo');
            $filename = 'company-logo-' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public', $filename);
            $logo = $filename;
        }

        $company = Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $logo
        ]);

        Mail::to('amaanrajput940@gmail.com')->send( new CompanyNotificantion($company));

        return redirect()->back()->with('success','Company has been added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $company = Company::where('id', $company->id)->first();
        return view('Admin.pages.company.edit')->with('company',$company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $company = Company::find($company->id);

        $checkEmail = Company::select('email')->where('id', $company->id)->first();
        if($checkEmail->email == $request->email){
            return redirect()->back()->with('error', 'Email already exist please try another!');
        }

        $logo = null;

        if($request->has('logo'))
        {
            $file = $request->file('logo');
            $filename = 'company-logo-' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public', $filename);
            $logo = $filename;
        }

        $company->name = $request->name;
        $company->email = $request->email;
        //$company->name = $request->name;
        $company->website = $request->website;
        $company->logo = $logo;
        if($company->save()){
            return redirect()->back()->with('success', 'Saved');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company = Company::find($company->id);
        $company->delete();

        return redirect()->back()->with('success', 'Company deleted!');
    }
}
