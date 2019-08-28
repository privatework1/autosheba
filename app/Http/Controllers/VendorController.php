<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Vendor;

class VendorController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth')->except('logout');
    }  
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $vendors = Vendor::orderBy('created_at', 'DESC')->get();
      return view('admin.pages.vendor.index')->with('vendors', $vendors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('admin.pages.vendor.create');
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
        "vendor_name.required" => "Vendor Name is Required.",
        "vendor_address.required" => "Vendor Address is Required.",
        "authorized_person.required" => "Authorized Person is Required.",
        "vendor_mobile_no.required" => "Vendor Mobile No. is Required.",
      ];
    
      // validate the form data
      $validator = Validator::make($request->all(), [
        'vendor_name' => 'required',
        'vendor_address' => 'required',
        'authorized_person' => 'required',
        'vendor_mobile_no' => 'required',
      ], $messages);
      if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
      } else {
        if($request->files->get('vendorLogo') == "") { 
          $vendor = new Vendor;
          $vendor->vendor_name = $request->input('vendor_name');
          $vendor->vendor_tag_line = $request->input('tag_line');
          $vendor->vendor_address = $request->input('vendor_address');
          $vendor->vendor_website = $request->input('vendor_website');
          $vendor->vendor_authorized_person_name = $request->input('authorized_person');
          $vendor->vendor_contact_reference = $request->input('contact_reference');
          $vendor->vendor_phone = $request->input('vendor_phone_no');
          $vendor->vendor_mobile = $request->input('vendor_mobile_no');
          $vendor->vendor_fax = $request->input('vendor_fax');
          $vendor->vendor_email = $request->input('vendor_email');
          $vendor->vendor_title = $request->input('vendor_title');
          $vendor->vendor_password=bcrypt($request->password);

          if($request->input('is_company')!= "") {
            $vendor->vendor_is_company = "Yes";
          } else {
            $vendor->vendor_is_company = "No";
          }

          if($request->input('is_customer')!= "") {
            $vendor->vendor_is_customer = "Yes";
          } else {
            $vendor->vendor_is_customer = "No";
          }

          if($request->input('is_supplier')!= "") {
            $vendor->vendor_is_supplier = "Yes";
          } else {
            $vendor->vendor_is_supplier = "No";
          }

          if($request->input('is_approved_vendor')!= "") {
            $vendor->vendor_is_approved_vendor = "Yes";
          } else {
            $vendor->vendor_is_approved_vendor = "No";
          }

          if($request->input('is_active')!= "") {
            $vendor->vendor_status = "Yes";
          } else {
            $vendor->vendor_status = "No";
          }
          $vendor->save();
          return redirect()->back()->withErrors([
            'success' => 'New Vendor Added.',
          ]);
        } else {
          $vendor = new Vendor;
          $vendor->vendor_name = $request->input('vendor_name');
          $vendor->vendor_tag_line = $request->input('tag_line');
          $vendor->vendor_address = $request->input('vendor_address');
          $vendor->vendor_website = $request->input('vendor_website');
          $vendor->vendor_authorized_person_name = $request->input('authorized_person');
          $vendor->vendor_contact_reference = $request->input('contact_reference');
          $vendor->vendor_phone = $request->input('vendor_phone_no');
          $vendor->vendor_mobile = $request->input('vendor_mobile_no');
          $vendor->vendor_fax = $request->input('vendor_fax');
          $vendor->vendor_email = $request->input('vendor_email');
          $vendor->vendor_title = $request->input('vendor_title');
          $vendor->vendor_password=bcrypt($request->password);

          if($request->input('is_company')!= "") {
            $vendor->vendor_is_company = "Yes";
          } else {
            $vendor->vendor_is_company = "No";
          }

          if($request->input('is_customer')!= "") {
            $vendor->vendor_is_customer = "Yes";
          } else {
            $vendor->vendor_is_customer = "No";
          }

          if($request->input('is_supplier')!= "") {
            $vendor->vendor_is_supplier = "Yes";
          } else {
            $vendor->vendor_is_supplier = "No";
          }

          if($request->input('is_approved_vendor')!= "") {
            $vendor->vendor_is_approved_vendor = "Yes";
          } else {
            $vendor->vendor_is_approved_vendor = "No";
          }

          if($request->input('is_active')!= "") {
            $vendor->vendor_status = "Yes";
          } else {
            $vendor->vendor_status = "No";
          }

          // vendor logo
          $image = $request->files->get('vendorLogo');
          $extension = $image->getClientOriginalExtension();
          $fileName = mt_rand(000000,111111).'_'.time().'.'.$extension;
          $path = $image->move('uploads/Vendor',$fileName);
          $vendor->vendor_logo = $fileName;
          $vendor->save();
          return redirect()->back()->withErrors([
              'success' => 'New Vendor Added.',
          ]);
        }
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
      $vendor = Vendor::findOrfail($id);
      return view('admin.pages.vendor.view')->with('vendor', $vendor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $vendor = Vendor::findOrfail($id);
      return view('admin.pages.vendor.edit')->with('vendor', $vendor);
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
        "vendor_name.required" => "Vendor Name is Required.",
        "vendor_address.required" => "Vendor Address is Required.",
        "authorized_person.required" => "Authorized Person is Required.",
        "vendor_mobile_no.required" => "Vendor Mobile No. is Required.",
      ];
    
      // validate the form data
      $validator = Validator::make($request->all(), [
        'vendor_name' => 'required',
        'vendor_address' => 'required',
        'authorized_person' => 'required',
        'vendor_mobile_no' => 'required',
      ], $messages);
      if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
      } else {
        if($request->files->get('vendorLogo') == "") { 
          $vendor = Vendor::find($id);
          $vendor->vendor_name = $request->input('vendor_name');
          $vendor->vendor_tag_line = $request->input('tag_line');
          $vendor->vendor_address = $request->input('vendor_address');
          $vendor->vendor_website = $request->input('vendor_website');
          $vendor->vendor_authorized_person_name = $request->input('authorized_person');
          $vendor->vendor_contact_reference = $request->input('contact_reference');
          $vendor->vendor_phone = $request->input('vendor_phone_no');
          $vendor->vendor_mobile = $request->input('vendor_mobile_no');
          $vendor->vendor_fax = $request->input('vendor_fax');
          $vendor->vendor_email = $request->input('vendor_email');
          $vendor->vendor_title = $request->input('vendor_title');
          $vendor->vendor_password=bcrypt($request->password);

          if($request->input('is_company')!= "") {
            $vendor->vendor_is_company = "Yes";
          } else {
            $vendor->vendor_is_company = "No";
          }

          if($request->input('is_customer')!= "") {
            $vendor->vendor_is_customer = "Yes";
          } else {
            $vendor->vendor_is_customer = "No";
          }

          if($request->input('is_supplier')!= "") {
            $vendor->vendor_is_supplier = "Yes";
          } else {
            $vendor->vendor_is_supplier = "No";
          }

          if($request->input('is_approved_vendor')!= "") {
            $vendor->vendor_is_approved_vendor = "Yes";
          } else {
            $vendor->vendor_is_approved_vendor = "No";
          }

          if($request->input('is_active')!= "") {
            $vendor->vendor_status = "Yes";
          } else {
            $vendor->vendor_status = "No";
          }
          $vendor->save();
          return redirect()->back()->withErrors([
            'success' => 'Vendor Successfully Updated.',
          ]);
        } else {
          $vendor = Vendor::find($id);
          $vendor->vendor_name = $request->input('vendor_name');
          $vendor->vendor_tag_line = $request->input('tag_line');
          $vendor->vendor_address = $request->input('vendor_address');
          $vendor->vendor_website = $request->input('vendor_website');
          $vendor->vendor_authorized_person_name = $request->input('authorized_person');
          $vendor->vendor_contact_reference = $request->input('contact_reference');
          $vendor->vendor_phone = $request->input('vendor_phone_no');
          $vendor->vendor_mobile = $request->input('vendor_mobile_no');
          $vendor->vendor_fax = $request->input('vendor_fax');
          $vendor->vendor_email = $request->input('vendor_email');
          $vendor->vendor_title = $request->input('vendor_title');
          $vendor->vendor_password=bcrypt($request->password);

          if($request->input('is_company')!= "") {
            $vendor->vendor_is_company = "Yes";
          } else {
            $vendor->vendor_is_company = "No";
          }

          if($request->input('is_customer')!= "") {
            $vendor->vendor_is_customer = "Yes";
          } else {
            $vendor->vendor_is_customer = "No";
          }

          if($request->input('is_supplier')!= "") {
            $vendor->vendor_is_supplier = "Yes";
          } else {
            $vendor->vendor_is_supplier = "No";
          }

          if($request->input('is_approved_vendor')!= "") {
            $vendor->vendor_is_approved_vendor = "Yes";
          } else {
            $vendor->vendor_is_approved_vendor = "No";
          }

          if($request->input('is_active')!= "") {
            $vendor->vendor_status = "Yes";
          } else {
            $vendor->vendor_status = "No";
          }
          //existing logo
          // Existing Image Remove
          if($vendor->vendor_logo != '') {
            unlink('uploads/Vendor/'.$vendor->vendor_logo);
          }

          // vendor logo
          $image = $request->files->get('vendorLogo');
          $extension = $image->getClientOriginalExtension();
          $fileName = mt_rand(000000,111111).'_'.time().'.'.$extension;
          $path = $image->move('uploads/Vendor',$fileName);
          $vendor->vendor_logo = $fileName;
          $vendor->save();
          return redirect()->back()->withErrors([
              'success' => 'Vendor Successfully Updated.',
          ]);
        }
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
      $vendor = Vendor::findOrfail($id);
      //Existing Image Deleted
      if($vendor->vendor_logo != '') {
        unlink('uploads/Vendor/'.$vendor->vendor_logo);
      }
      $vendor->delete();
      return redirect()->back()->withErrors([
        'success' => 'Successfully Vendor Deleted.',
      ]);
    }
}
