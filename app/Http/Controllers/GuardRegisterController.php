<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Customer;
use Cart;
use App\Category;
use App\SubCategory;
use App\Product;
use App\Item;
use Session;
use Auth;



class GuardRegisterController extends Controller
{
    protected $redirectTo = '/customer';

    public function __construct()
    {
      $this->middleware('guest:customer');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    //Show customer Registration Form
    public function showCustomerRegisterForm()
    {
        $allCategory = Category::orderBy('created_at', 'DESC')->get();
        $allSubCategory = SubCategory::orderBy('created_at', 'DESC')->get();
        $items = Item::orderBy('created_at', 'DESC')->get();
      return view('site.pages.customerRegister')->with('items', $items)->with('allCategory', $allCategory)->with('allSubCategory', $allSubCategory);;
    
    
    }

    public function showregisterFromOrderConfirm()
    {
        $cartProducts = Cart::Content();
      return view('site.pages.orderConfirmCustomerRegister',compact('cartProducts'));
    }

    public function store(Request $request)
    {
      $messages = [
        "customer_name.required" => "Customer name is Required.",
        "customer_email.required" => "Customer email is Required.",
        "customer_email.unique" => "Customer email is already exists.",
        "customer_phone.required" => "Customer phone is Required.",
        "customer_phone.unique" => "Customer phone is already exists.",
        "password.required" => "Customer password is Required.",
      ];

      // validate the form data
      $validator = Validator::make($request->all(), [
        // 'customer_name' => 'required',
        // 'customer_email' => 'required|string|email|max:255|unique:customers,email',
        // 'customer_phone' => 'required|unique:customers,phone',
        // 'password' => 'required|confirmed|min:6',
      ], $messages);
      if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
      } else { 
        $customer = new Customer;
        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name');
        $customer->name = $request->input('customer_name');
        $customer->email = $request->input('customer_email');
        $customer->phone = $request->input('customer_phone');
        $customer->address = $request->input('address');
        $customer->is_customer = 1;
        $customer->password = bcrypt($request->input('password'));
          if(Session::get('vendorId')){
              $vendorId=Session::get('vendorId');
          }
          else{
              $vendorId=0;
          }
        $customer->vendor_id=$vendorId;
        $customer->save();
        //return redirect('/shipping');
        Session::put('customerId',$customer->id);
        return redirect('/shipping');
      }
    }

    public function registerFromOrderConfirm(Request $request)
    {
      $messages = [
        "customer_name.required" => "Customer name is Required.",
        "customer_email.required" => "Customer email is Required.",
        "customer_email.unique" => "Customer email is already exists.",
        "customer_phone.required" => "Customer phone is Required.",
        "customer_phone.unique" => "Customer phone is already exists.",
        "password.required" => "Customer password is Required.",
      ];

      // validate the form data
      $validator = Validator::make($request->all(), [
        'customer_name' => 'required',
        'customer_email' => 'required|string|email|max:255|unique:customers,email',
        'customer_phone' => 'required|unique:customers,phone',
        'password' => 'required|confirmed|min:6',
      ], $messages);
      if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
      } else { 
        $customer = new Customer;
        $customer->name = $request->input('customer_name');
        $customer->email = $request->input('customer_email');
        $customer->phone = $request->input('customer_phone');
        $customer->is_customer = 1;
        $customer->password = bcrypt($request->input('password'));
        $customer->save();
        return redirect('/order_confirm');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
