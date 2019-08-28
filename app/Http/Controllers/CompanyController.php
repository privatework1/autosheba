<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::orderBy('created_at', 'DESC')->get();
        return view('admin.pages.company.index')->with('companies', $companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            "company_name.required" => "Company name is Required.",
        ];
      
          // validate the form data
        $validator = Validator::make($request->all(), [
        'company_name' => 'required',
        ], $messages);
        if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
        } else { 
        $company = new Company;
        $company->company_name = $request->input('company_name');
        $company->save();
        return redirect()->back()->withErrors([
            'success' => 'New Company Created.',
        ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::findOrfail($id);
        return view('admin.pages.company.edit')->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $messages = [
            "company_name.required" => "Company name is Required.",
        ];
      
          // validate the form data
        $validator = Validator::make($request->all(), [
        'company_name' => 'required',
        ], $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
            } else { 
            $company = Company::findOrfail($id);
            $company->company_name = $request->input('company_name');
            $company->save();
            return redirect()->back()->withErrors([
                'success' => 'Successfully Company Updated.',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::findOrfail($id);
        $company->delete();
        return redirect()->back()->withErrors([
            'success' => 'Successfully Company Deleted.',
        ]);
    }
}
