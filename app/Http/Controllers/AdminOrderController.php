<?php

namespace App\Http\Controllers;

use App\OrderDetails;
use Illuminate\Http\Request;
use App\Order;
use App\Customer;
use App\Item;
use App\Shipping;
use App\Payment;
use Cart;
use DB;
use Vsmoraes\Pdf\Pdf;

class AdminOrderController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth')->except('logout');
    }
    
    public function orderlist()
    {
        $orders = Order::orderBy('created_at', 'DESC')->where('order_status',0)->where('delivery_process',0)->get();
        $customers = Customer::orderBy('created_at', 'DESC')->get();
        $shippings = Shipping::orderBy('created_at', 'DESC')->get();
        $items = Item::orderBy('created_at', 'DESC')->get();
        return view('admin.pages.order.orderlist')->with('orders', $orders)->with('customers', $customers)->with('items', $items)->with('shippings',$shippings);
   
   
    }

    public function orderdelete($id){
        $id=base64_decode($id);
        $order_delete=Order::where('id',$id)->delete();
        $order_details_delete=OrderDetails::where('order_id',$id)->delete();

            return back();
        
    }

    public function orderstatus()
    {
        return view('admin.pages.order.orderstatus');
    }

    public function orderinvoices($id)
    {
        $id=base64_decode($id);
        $order = Order::find($id);
        $customer =DB::table('orders')
            ->leftJoin('customers','customers.id','=','orders.customer_id')
            ->where('orders.id',$id)
            ->first();

        $shipping =DB::table('orders')
            ->leftJoin('shippings','shippings.id','=','orders.shipping_id')
            ->where('orders.id',$id)
            ->first();

        $payment =DB::table('orders')
            ->leftJoin('payments','payments.id','=','orders.payment_id')
            ->where('orders.id',$id)
            ->first();

        $orderDetails=DB::table('order_details')
                      ->leftJoin('orders','orders.id','order_details.order_id')
                      ->leftJoin('items','items.id','order_details.item_id')
                      ->where('order_details.order_id',$id)
                      ->get();

        return view('admin.pages.order.orderinvoices',compact('order','customer','shipping','payment','orderDetails'));
   
   
    }

    

    public function paymenthistory()
    {
        return view('admin.pages.order.paymenthistory');
    }
}
