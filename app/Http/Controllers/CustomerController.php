<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\OrderDetails;
use App\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Customer;
use Cart;
use App\Order;
use App\Product;
use DB;
use Session;
use App\Division;
use App\District;

class CustomerController extends Controller
{

    public function __construct()
    {

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      return view('site.pages.customerProfile.customerdashboard');
    }

    public function customerProfile()
    {
     
      return view('site.pages.customerProfile.pages.AccountInfo.accountInfo');
    }

    public function customereditProfile($id){
        $id=base64_decode($id);
        $editcustomer=Customer::find($id);
        return view('site.pages.customerProfile.pages.AccountInfo.edit_accountInfo',compact('editcustomer'));
    }


    public function customerupdateProfile(Request $request,$id){
        $id=base64_decode($id);
        $customer=Customer::find($id);
        $customer->name = $request->input('customer_name');
        $customer->email = $request->input('customer_email');
        $customer->phone = $request->input('customer_phone');
        $customer->address = $request->input('address');
        $customer->save();
        return redirect('/mycustomerProfile');
    }

    public function customerOrderHistory()
    {
      $orders = Order::where('customer_id',Session::get('customerId'))
        ->orderBy('created_at', 'desc')
        ->first();
      if($orders != null) {
        $products = Product::where('id', $orders->product_id)
         ->orderBy('created_at', 'desc')
         ->get();
      } else {
        $products = [];
      }
        $orders = Order::orderBy('created_at', 'DESC')->where('customer_id',Session::get('customerId'))->get();
      
        $items = OrderDetails::orderBy('created_at', 'DESC')->where('customer_id',SEssion::get('customerId'))->get();;
        return view('site.pages.customerProfile.pages.AccountInfo.orderHistory')->with('orders', $orders)->with('items', $items);
        
    }
    
    public function customerOrderReport($id){
        $id=base64_decode($id);


        $orders=[];
        $customer_order = Order::find($id);
        $customer_info =DB::table('orders')
            ->leftJoin('customers','customers.id','=','orders.customer_id')
            ->where('orders.id',$id)
            ->first();

        $shipping_info =DB::table('orders')
            ->leftJoin('shippings','shippings.id','=','orders.shipping_id')
            ->where('orders.id',$id)
            ->first();

        $shipping_method=DB::table('shipping_infos')->where('customer_id',Session::get('customerId'))->first();

        $address=DB::table('shippings')
                 ->leftJoin('divisions','divisions.id','shippings.division_id')
                 ->leftJoin('districts','districts.id','shippings.district_id')
                 ->where('shippings.id',$shipping_info->id)
                 ->first();

        $payment_info =DB::table('orders')
            ->leftJoin('payments','payments.id','=','orders.payment_id')
            ->where('orders.id',$id)
            ->first();
       

        $orderDetails_info=DB::table('order_details')
            ->leftJoin('orders','orders.id','order_details.order_id')
            ->leftJoin('items','items.id','order_details.item_id')
            ->where('order_details.order_id',$id)
            ->get();
        return view('site.pages.customerProfile.pages.AccountInfo.orderHistory',compact('customer_order','customer_info','shipping_info','payment_info','orderDetails_info','orders','address','shipping_method'));


    }
    
    

    public function customerReviewHistory()
    {
      return view('site.pages.customerProfile.pages.AccountInfo.reviewHistory');
    }

    public function customershippingAddressBook()
    {
        $divisions=Division::all();
        $districts=District::all();
        $customerId=Session::get('customerId');
        $shipping=DB::table('shippings')
                  ->leftJoin('divisions','shippings.division_id','=','divisions.id')
                  ->leftJoin('districts','shippings.district_id','=','districts.id')
                  ->leftJoin('shipping_infos','shipping_infos.shipping_id','=','shippings.id')
                  ->where('shippings.customer_id',$customerId)
                  ->first();


            
            //Shipping::where('customer_id','=',$customerId)->first();
      return view('site.pages.customerProfile.pages.AccountInfo.customershippingAddress')->with('divisions',$divisions)->with('shipping',$shipping)->with('districts',$districts);
    }
    
    public function customershippingUpdate(Request $request){

        $customerId=Session::get('customerId');
        $shipping=Shipping::where('customer_id',$customerId)->first();
        $shipping->first_name=$request->customer_firstName;
        $shipping->last_name=$request->customer_lastName;
        $shipping->email = $request->customer_email;
        $shipping->phone = $request->customer_phone;
        $shipping->is_shipping = 1;
        $shipping->division_id=$request->division_id;
        if(!empty($request->district_id)){
            $districtId=$request->district_id;
        }
        else{
            $districtId=$shipping->district_id;
        }


        $shipping->district_id=$districtId;
        $shipping->address=$request->address;

        $shipping->save();
        return back()->with('message','Successfully Updated');
    }

    public function customerWishList()
    {
      return view('site.pages.customerProfile.pages.AccountInfo.customerWishList');
    }

    public function customerChangePassword()
    {
      return view('site.pages.customerProfile.pages.AccountInfo.changePassword');
    }



    public function customerUpdatePassword(Request $request){
        $id=Session::get('customerId');
        $customer=Customer::find($id);
        $oldpassword=$request->old_password;
        $new_password=$request->new_password;
        $confirm_password=$request->password_confirm;
        if($customer){
            $verify =password_verify($oldpassword,$customer->password);
            if($verify){
                 if($new_password==$confirm_password){
                     $customer->password=bcrypt($new_password);
                     $customer->save();
                     return back()->with('message','Successfully Password Changed');
                 }
                else{
                    return back()->with('message','Password Not Match');
                }

            }else{
                return back()->with('message','Wrong Current Password');
            }
        }
        else{
          return back();
        }

    }




    public function orderWizard()
    {
      $cartProducts = Cart::Content();
      return view('site.pages.customerProfile.pages.AccountInfo.shipping_info')->with('cartProducts', $cartProducts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        return redirect()->intended('/customer');
        // return redirect()->back()->withErrors([
        //   'success' => 'New customer Created.',
        // ]);
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
