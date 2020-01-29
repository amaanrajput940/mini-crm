<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::orderBy('created_at', 'desc')->paginate(10);
        return view('Admin.pages.employee.index')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::orderBy('created_at', 'desc')->get();
        return view('Admin.pages.employee.create')->with('companies', $companies);
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
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'company' => 'required'
        ]);

        Employee::create([
            'company_id' => $request->company,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'website' => $request->website,
            'phone' => $request->phone
        ]);

        return redirect()->back()->with('success','Employee information has been saved successfully');
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
    public function edit(Employee $employee)
    {
        $employee = Employee::where('id', $employee->id)->first();
        $companies = Company::orderBy('created_at', 'desc')->get();
        return view('Admin.pages.employee.edit')->with(['employee'=>$employee, "companies"=>$companies]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $employee = Employee::find($employee->id);

        $checkEmail = Employee::select('email')->where('id', $employee->id)->first();
        if($checkEmail->email == $request->email){
            return redirect()->back()->with('error', 'Email already exist please try another!');
        }

        $employee->firstname = $request->firstname;
        $employee->lastname = $request->lastname;
        $employee->email = $request->email;
        $employee->company_id = $request->company;
        //$company->name = $request->name;
        $employee->phone = $request->phone;
        if($employee->save()){
            return redirect()->back()->with('success', 'Saved');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee = Employee::find($employee->id);
        $employee->delete();

        return redirect()->back()->with('success', 'Employee account deleted!');
    }
}
