<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\B2bCustomer;

class B2BCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      $this->middleware('auth')->except('logout');
    }
    
    public function index()
    {
      $b2bcustomers = B2bCustomer::orderBy('created_at', 'DESC')->get();
      return view('admin.pages.b2bCustomer.index')->with('b2bcustomers', $b2bcustomers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.b2bCustomer.create');
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
        "customer_name.required" => "Customer Name is Required.",
        "customer_address.required" => "Customer Address is Required.",
        "customer_code.required" => "Customer Code is Required.",
        "customer_mobile.required" => "Customer Mobile No. is Required.",
      ];
    
      // validate the form data
      $validator = Validator::make($request->all(), [
        'customer_name' => 'required',
        'customer_address' => 'required',
        'customer_code' => 'required',
        'customer_mobile' => 'required',
      ], $messages);
      if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
      }


      else {

           if(!empty($request->file('customerLogo'))){
             $image = $request->files->get('customerLogo');
             $extension = $image->getClientOriginalExtension();
             $fileName = mt_rand(000000,111111).'_'.time().'.'.$extension;
             $path = $image->move('uploads/b2bcustomer',$fileName);

           }
        else{
          $fileName="";
          }
        if($request->input('is_company')!= "") {
          $b2bCustomer_is_company="Yes";
        } else {
          $b2bCustomer_is_company= "No";
        }

        if($request->input('is_active')!= "") {
          $b2bCustomer_status ="Yes";
        } else {
          $b2bCustomer_status ="No";
        }


        $b2bcustomer = new B2bCustomer;
        $b2bcustomer->b2bCustomer_name = $request->input('customer_name');
        $b2bcustomer->b2bCustomer_tag_line = $request->input('tag_line');
        $b2bcustomer->b2bCustomer_address = $request->input('customer_address');
        $b2bcustomer->b2bCustomer_website = $request->input('customer_website');
        $b2bcustomer->b2bCustomer_code = $request->input('customer_code');
        $b2bcustomer->b2bCustomer_contact_person = $request->input('contact_person');
        $b2bcustomer->b2bCustomer_phone = $request->input('customer_phone');
        $b2bcustomer->b2bCustomer_mobile = $request->input('customer_mobile');
        $b2bcustomer->b2bCustomer_position = $request->input('customer_position');
        $b2bcustomer->b2bCustomer_email = $request->input('customer_email');
        $b2bcustomer->b2bCustomer_title = $request->input('customer_title');
        $b2bcustomer->b2bCustomer_logo = $fileName;
        $b2bcustomer->b2bCustomer_is_company=$b2bCustomer_is_company;
        $b2bcustomer->b2bCustomer_status=$b2bCustomer_status;
        $b2bcustomer->save();
        return redirect()->back()->withErrors([
            'success' => 'New B2BCustomer Added.',
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
      $b2bCustomer = B2bCustomer::findOrfail($id);
      return view('admin.pages.b2bCustomer.view')->with('b2bCustomer', $b2bCustomer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $b2bCustomer = B2bCustomer::findOrfail($id);
      return view('admin.pages.b2bCustomer.edit')->with('b2bCustomer', $b2bCustomer);
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
        "customer_name.required" => "Customer Name is Required.",
        "customer_address.required" => "Customer Address is Required.",
        "customer_code.required" => "Customer Code is Required.",
        "customer_mobile.required" => "Customer Mobile No. is Required.",
      ];
    
      // validate the form data
      $validator = Validator::make($request->all(), [
        'customer_name' => 'required',
        'customer_address' => 'required',
        'customer_code' => 'required',
        'customer_mobile' => 'required',
      ], $messages);
      if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
      }


      else {

        $b2bcustomer = B2bCustomer::find($id);

        if(!empty($request->file('customerLogo'))){
          unlink('uploads/b2bcustomer/'.$b2bcustomer->b2bCustomer_logo);
          $image = $request->files->get('customerLogo');
          $extension = $image->getClientOriginalExtension();
          $fileName = mt_rand(000000,111111).'_'.time().'.'.$extension;
          $path = $image->move('uploads/b2bcustomer',$fileName);

        }
        else{
          $fileName=$b2bcustomer->b2bCustomer_logo;
        }

        if($request->input('is_company')!= "") {
          $b2bCustomer_is_company="Yes";
        } else {
          $b2bCustomer_is_company= "No";
        }

        if($request->input('is_active')!= "") {
          $b2bCustomer_status ="Yes";
        } else {
          $b2bCustomer_status ="No";
        }


        $b2bcustomer->b2bCustomer_name = $request->input('customer_name');
        $b2bcustomer->b2bCustomer_tag_line = $request->input('tag_line');
        $b2bcustomer->b2bCustomer_address = $request->input('customer_address');
        $b2bcustomer->b2bCustomer_website = $request->input('customer_website');
        $b2bcustomer->b2bCustomer_contact_person = $request->input('contact_person');
        $b2bcustomer->b2bCustomer_phone = $request->input('customer_phone');
        $b2bcustomer->b2bCustomer_mobile = $request->input('customer_mobile');
        $b2bcustomer->b2bCustomer_position = $request->input('customer_position');
        $b2bcustomer->b2bCustomer_email = $request->input('customer_email');
        $b2bcustomer->b2bCustomer_title = $request->input('customer_title');
        $b2bcustomer->b2bCustomer_logo = $fileName;
        $b2bcustomer->b2bCustomer_is_company=$b2bCustomer_is_company;
        $b2bcustomer->b2bCustomer_status=$b2bCustomer_status;
        $b2bcustomer->save();
        return redirect()->back()->withErrors([
            'success' => 'Successfully B2BCustomer Updated.',
        ]);

      }


    }


  


    public function destroy($id)
    {
      $b2bCustomer = B2bCustomer::find($id);
      // Existing Image Remove
      if($b2bCustomer->b2bCustomer_logo != '') {
        unlink('uploads/b2bcustomer/'.$b2bCustomer->b2bCustomer_logo);
      }
      $b2bCustomer->delete();
      return redirect()->back()->withErrors([
        'success' => 'Successfully B2BCustomer Deleted.',
      ]);
    }
}
