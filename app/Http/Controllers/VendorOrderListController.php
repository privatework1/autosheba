<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Customer;
use App\Item;
use App\Shipping;
use App\Payment;
use Cart;
use DB;
use Session;
use App\DeliveryProcess;


class VendorOrderListController extends Controller
{
    public function __construct()
    {
      if(Session::get('vendorId')==""){
          return redirect('/login/vendor-site');
      }
    }

    public function orderList()
        
    {
       if(!empty(Session::get('vendorId'))){
           $orders =DB::table('order_details')
               ->leftJoin('items','items.id','order_details.item_id')
               ->leftJoin('customers','customers.id','order_details.customer_id')
               ->leftJoin('orders','orders.id','order_details.order_id')
               ->where('order_details.myvendor_id',Session::get('vendorId'))
               ->where('orders.order_status',0)
               ->where('orders.delivery_process',0)

               //->select('order_details.*','items.item_name','customers.first_name','customers.last_name','shippings.first_name','shippings.last_name')
               ->get();

           return view('vendor.pages.order.orderlist',compact('orders'));
       }
        else{
            return redirect('/login/vendor-site');
        }


    }

    public function orderdelete($id){
        $id=base64_decode($id);
        $order_delete=Order::where('id',$id)->delete();
        $order_details_delete=OrderDetails::where('order_id',$id)->delete();

        return back();

    }

//    public function orderstatus()
//    {
//        return view('admin.pages.order.orderstatus');
//    }

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

        return view('vendor.pages.order.orderinvoices',compact('order','customer','shipping','payment','orderDetails'));
  
  
    }



    public function paymenthistory()
    {
        return view('admin.pages.order.paymenthistory');
    }



    public function deliverylist(){
        $customers=Customer::all();
        $orders =DB::table('order_details')
            ->leftJoin('items','items.id','order_details.item_id')
            ->leftJoin('customers','customers.id','order_details.customer_id')
            ->leftJoin('orders','orders.id','order_details.order_id')
            ->where('order_details.myvendor_id',Session::get('vendorId'))
            ->where('orders.order_status',0)
            ->where('orders.delivery_process',1)

            //->select('order_details.*','items.item_name','customers.first_name','customers.last_name','shippings.first_name','shippings.last_name')
            ->get();

        return view('vendor.pages.orderdelivery.deliverylist',compact('orders','customers'));

    }

    public function createDeliveryprocess(Request $request,$orderid){
        $dt = new \DateTime('now', new \DateTimezone('Asia/Dhaka'));
        $deliver_processDate=$dt->format('Y-m-d g:i:s:A');
        $delivery_process=new DeliveryProcess();
        $delivery_process->name=$request->name;
        $delivery_process->email=$request->email;
        $delivery_process->mobile=$request->mobile;
        $delivery_process->address=$request->address;
        $delivery_process->order_id=$orderid;
        $delivery_process->process_date_time=$deliver_processDate;
        $delivery_process->process_day=$dt->format('F-g-Y');
        $delivery_process->save();
        if(!empty($delivery_process)){
            $orderupdate=Order::find($orderid);
            $orderupdate->delivery_process=1;
            $orderupdate->save();
        }
        return redirect('/orderlist')->with('message','Delivery Process Completed');
    }


    public function deliveryconfirm($orderid){
        $deliverprocess=DeliveryProcess::where('order_id',$orderid)->first();
        return view('admin.pages.orderdelivery.delivery-process-form',compact('deliverprocess','orderid'));
//        $deliveri=DB::table('orders')->where('id',$id)->update(['order_status'=>1]);
//        return redirect('/orderdeliverylist')->with('message','Delivery Completed');
    }

    public function finaldelivery(Request $request,$id){
        $dt = new \DateTime('now', new \DateTimezone('Asia/Dhaka'));
        $deliverprocess=DeliveryProcess::find($id);
        $deliverprocess->name=$request->name;
        $deliverprocess->email=$request->email;
        $deliverprocess->mobile=$request->mobile;
        $deliverprocess->address=$request->address;
        $deliverprocess->complete_process_date_time=$request->complete_process_date_time;
        $deliverprocess->process_status=1;
        $deliverprocess->save();
        if(!empty($deliverprocess)){
            $orderupdate=Order::where('id',$deliverprocess->order_id)->update(['order_status'=>1]);

        }
        return redirect('/orderdeliverylist')->with('message','Final Delivery Completed');

    }

    public function deliveryProcessBy($deliver_id){
        $id=base64_decode($deliver_id);
        $single_delivery_data=DeliveryProcess::find($id);
        return view('vendor.pages.orderdelivery.single_delivery',compact('single_delivery_data'));
    }
    public function orderStatus(){
        $customers=DB::table('customers')->get();
        $orders =DB::table('order_details')
            ->leftJoin('items','items.id','order_details.item_id')
            ->leftJoin('customers','customers.id','order_details.customer_id')
            ->leftJoin('orders','orders.id','order_details.order_id')
            ->where('order_details.myvendor_id',Session::get('vendorId'))
            ->where('orders.order_status',1)
            ->where('orders.delivery_process',1)
            ->get();
        return view('vendor.pages.orderdelivery.orderstatus',compact('orders','customers'));

    }

}
