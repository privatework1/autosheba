<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Category;
use Auth;
use App\Order;
use Cart;
use App\Customer;
use App\Product;
use DB;
use Session;
use App\Division;
use App\District;
use App\DeliveryProcess;

class AdminOrderDeliveryController extends Controller
{
    
    
    public function deliveryprocess($orderid){

        return view('admin.pages.orderdelivery.delivery-process-form',compact('orderid'));
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
    
    
    public function deliverylist(){
        $customers=Customer::all();
        $orders=Order::where('order_status',0)->where('delivery_process',1)->get();
//            DB::table('orders')
//                ->where('orders.order_status',0)
//                ->where('orders.delivery_process',1)
//                ->get();
        return view('admin.pages.orderdelivery.deliverylist',compact('orders','customers'));
    
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
        return view('admin.pages.orderdelivery.single_delivery',compact('single_delivery_data'));
    }
    public function orderStatus(){
        $customers=DB::table('customers')->get();
        $orders=DB::Table('orders')->where('order_status',1)->where('delivery_process',1)->get();
        return view('admin.pages.orderdelivery.orderstatus',compact('orders','customers'));

    }



}
