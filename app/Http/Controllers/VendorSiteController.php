<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Vendor;
use App\Customer;
use Cart;
use App\Category;
use App\SubCategory;
use App\Product;
use App\Item;
use Session;
use Auth;



class VendorSiteController extends Controller
{
    public function __construct()
    {
        if(Session::get('vendorId')==""){}
        return redirect('/');
    }
    
    
    public function index()
    {

        return view('vendor.pages.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCategory = Category::orderBy('created_at', 'DESC')->get();
        $allSubCategory = SubCategory::orderBy('created_at', 'DESC')->get();
        $items = Item::orderBy('created_at', 'DESC')->get();
        return view('site.pages.vendorRegister')->with('items', $items)->with('allCategory', $allCategory)->with('allSubCategory', $allSubCategory);;

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
        }


        else {
            if($request->files->get('vendorLogo') == "") {
              $vendorlog='';
            }
            else{
                $image = $request->files->get('vendorLogo');
                $extension = $image->getClientOriginalExtension();
                $fileName = mt_rand(000000,111111).'_'.time().'.'.$extension;
                $path = $image->move('uploads/Vendor',$fileName);
              }

            if($request->input('is_company')!= "") {
                $vendorCompany = "Yes";
            } else {
                $vendorCompany = "No";
            }

            if($request->input('is_customer')!= "") {
                $vendorCustomer = "Yes";
            } else {
                $vendorCustomer = "No";
            }

            if($request->input('is_supplier')!= "") {
                $vendorSupplier = "Yes";
            } else {
                $vendorSupplier = "No";
            }

            if($request->input('is_approved_vendor')!= "") {
                $vendorAprove = "Yes";
            } else {
                $vendorAprove = "No";
            }

            if($request->input('is_active')!= "") {
                $vendorStatus = "Yes";
            } else {
                $vendorStatus = "No";
            }
            $vendor=new Vendor();
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
            $vendor->vendor_is_company=$vendorCompany;
            $vendor->vendor_is_customer =$vendorCustomer;
            $vendor->vendor_is_supplier=$vendorSupplier;
            $vendor->vendor_is_approved_vendor=$vendorAprove;
            $vendor->vendor_status=$vendorStatus;
            $vendor->vendor_password=str_random(5);
            $vendor->vendor_logo=$fileName;
            $vendor->save();
            return redirect()->back()->withErrors([
                'success' => 'Vendor Successfully Added.',
            ]);
            
        }
    }



    public function vendorLoginForm(){
        $allCategory = Category::orderBy('created_at', 'DESC')->get();
        $allSubCategory = SubCategory::orderBy('created_at', 'DESC')->get();
        $items = Item::orderBy('created_at', 'DESC')->get();
        return view('site.pages.vendorlogin')->with('items', $items)->with('allCategory', $allCategory)->with('allSubCategory', $allSubCategory);;

    }

    public function createVendorLogin(Request $request){
        $email=$request->email;
        $vendorInfo=Vendor::where('vendor_email',$email)->first();

        $password=$request->password;

        if($vendorInfo){
            if(password_verify($password,$vendorInfo->vendor_password)){
                Auth::logout();
                Session::forget('shippingId');
                Session::forget('shippingEmail');
                Session::forget('shippingPassword');
                Session::forget('vendorId');
                Session::forget('vendorName');
                Session::put('vendorId',$vendorInfo->id);
                Session::put('vendorName',$vendorInfo->vendor_name);
                return redirect('/vendor-site');
            }
            else{
                return back();
            }
        }

      
    }

    public function VendorLogout(){
        Auth::logout();
        Session::forget('shippingId');
        Session::forget('shippingEmail');
        Session::forget('shippingPassword');
        Session::forget('vendorId');
        Session::forget('vendorName');
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vendor = Vendor::find($id);
        return view('vendor.pages.vendor.view')->with('vendor', $vendor);
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
        return view('vendor.pages.vendor.edit')->with('vendor', $vendor);
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
