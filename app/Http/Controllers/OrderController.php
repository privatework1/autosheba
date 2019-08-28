<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Category;
use Auth;
use App\Order;
use Cart;


class OrderController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:customer')->except('logout');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('admin.pages.order.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.order.create');
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
            "customer_firstName.required" => "Customer FirstName is Required.",
            "customer_lastName.required" => "Customer Lastname is Required.",
            "customer_email.required" => "Customer Email is Required.",
            "customer_phone.required" => "Customer Phone is Required.",
            "customer_address.required" => "Customer Address is Required.",
        ];
      
        // validate the form data
        $validator = Validator::make($request->all(), [
            // 'customer_firstName' => 'required',
            // 'customer_lastName' => 'required',
            // 'customer_email' => 'required',
            // 'customer_phone' => 'required',
            // 'customer_address' => 'required',
        ], $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else { 
            $cartId = Cart::content()->first();
            $order = new Order;
            $order->order_id ='ORDER-'. mt_rand(000000,111111);
            $order->customer_id = Auth::guard('customer')->user()->id;
            $order->product_id = $cartId->id;
            $order->product_quantity = $cartId->qty;
            $order->save();
            Cart::destroy();
            return redirect('/customerOrderHistory');
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
