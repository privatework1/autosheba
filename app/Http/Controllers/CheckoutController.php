<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Shipping;
use Session;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Customer;
use Cart;
use App\Order;
use App\Product;
use App\Payment;
use App\OrderDetails;
use App\Division;
use App\District;
use App\Category;
use App\SubCategory;
use App\Item;
use App\ShippingMethod;
use App\ShippingInfo;
use App\PaymentType;
use Faker\Provider\zh_TW\DateTime;


class CheckoutController extends Controller
{

    public function __construct()
    {

    }

    public function shippingForm(){
        if(!empty(Session::get('shippingId'))){
            return redirect('/shipping_method');
        }

        else{
            if(!empty(Session::get('customerId'))){
                $cartProducts = Cart::Content();
                $divisions=Division::all();
                $allCategory = Category::orderBy('created_at', 'DESC')->get();
                $allSubCategory = SubCategory::orderBy('created_at', 'DESC')->get();
                $items = Item::orderBy('created_at', 'DESC')->get();
                return view('site.pages.shipping_info')->with('cartProducts', $cartProducts)->with('divisions',$divisions)->with('items', $items)->with('allCategory', $allCategory)->with('allSubCategory', $allSubCategory);

            }

            else{
                return redirect('/');
            }
        }



    }



    public function DistrictInfo($id){

        $districts=District::where('division_id','=',$id)->get();

        ?>

        <div class="form-group">
            <label class="">District</label>
            <select name="district_id" class="form-control">

                <?php foreach($districts as $district) : ?>

                    <option value="<?php echo $district->id ?>"><?php echo $district->district_name ?></option>
                <?php endforeach; ?>
            </select>
        </div>

<!--        <div class="form-group">-->
<!--            <label>Shipping Method</label><br/>-->
<!--            <input type="radio" required name="shipping_method" value="home_delivery">Home Delivery-->
<!--            <input type="radio" required name="shipping_method" value="office_collection">Office Collection-->
<!---->
<!--        </div>-->


        <?php
    }



    public function createShipping(Request $request){


        $messages = [
            "shipping_name.required" => "Shipping name is Required.",
            "shipping_email.required" => "Shipping email is Required.",
            "shipping_email.unique" => "Shipping email is already exists.",
            "shipping_phone.required" => "Shipping phone is Required.",
            "shipping_phone.unique" => "Shipping phone is already exists.",
            "password.required" => "Shipping password is Required.",
        ];

        // validate the form data
        $validator = Validator::make($request->all(), [
//            'shipping_name' => 'required',
//            'shipping_email' => 'required|string|email|max:255|unique:shippings,email',
//            'shipping_phone' => 'required|unique:shippings,phone',
//            'password' => 'required|confirmed|min:6',
        ], $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {

            if(!empty(Session::get('customerId'))){
                $customerId=Session::get('customerId');
            }
            else{
               return redirect('/login/customers');
            }

            $shipping = new Shipping();
            $shipping->customer_id=$customerId;
            $shipping->first_name=$request->input('customer_firstName');
            $shipping->last_name=$request->input('customer_lastName');
            $shipping->email = $request->input('customer_email');
            $shipping->phone = $request->input('customer_phone');
            $shipping->is_shipping = 1;
            $shipping->password = bcrypt($request->input('password'));
            $shipping->division_id=$request->input('division_id');
            $shipping->district_id=$request->input('district_id');
            $shipping->address=$request->input('address');
            $shipping->save();
            Session::forget('shippingId');
            Session::forget('shippingEmail');
            Session::forget('shippingPassword');

            Session::put('shippingId',$shipping->id);
            Session::put('shippingEmail',$shipping->email);
            Session::put('shippingPassword',$request->password);
            return redirect()->intended('/payment');
            // return redirect()->back()->withErrors([
            //   'success' => 'New customer Created.',
            // ]);
        }
    }



    public function shippingMethodForm(){



            $cartProducts = Cart::Content();
            $divisions=Division::all();
            $allCategory = Category::orderBy('created_at', 'DESC')->get();
            $allSubCategory = SubCategory::orderBy('created_at', 'DESC')->get();
            $items = Item::orderBy('created_at', 'DESC')->get();
            return view('site.pages.shipping_method')->with('cartProducts', $cartProducts)->with('divisions',$divisions)->with('items', $items)->with('allCategory', $allCategory)->with('allSubCategory', $allSubCategory);;







    }

    public function createShippingMethod(Request $request){


        if(Session::get('customerId')){
            $customerId=Session::get('customerId');
            $shippingId=Shipping::where('customer_id',$customerId)->first();


        }
        else{
           return redirect('/login/customers');
        }


        $shipping_data=new ShippingInfo();
        $shipping_data->customer_id=$customerId;
        $shipping_data->shipping_id=$shippingId->id;
        $shipping_data->shipping_method_name=$request->shipping_method;
        $shipping_data->save();
        Session::put('shippingMethodId',$shipping_data->id);
        return redirect()->intended('/payment');
    }








    public function shippingLoginForm(Request $request){
        $shipping=Shipping::where('email',$request->email)->first();
        $mypassword=$request->password;
        //return $password;

        if($shipping){
            $verify =password_verify($mypassword,$shipping->password);
            if($verify) {
                Session::forget('shippingId');
                Session::forget('shippingEmail');
                Session::forget('shippingPassword');

                Session::put('shippingId',$shipping->id);
           
                return redirect('/payment');
            }else{
                return redirect('/order_confirm')->withInput();
            }
        }

        else{
            return redirect('/order_confirm')->withInput();
        }


    }



    public function paymentInfo(){




        $cartProducts = Cart::Content();

        if(Session::get('customerId')=="")
        {
            return redirect('/login/customers');
        }

        if(!empty(Session::get('shippingMethodId'))){
            $payment_type= PaymentType::select('payment_type_name')->distinct()->get();
            $divisions=Division::all();
            $shipping=Shipping::where('id',Session::get('shippingId'))->first();
            $cartProducts = Cart::Content();
            return view('site.pages.payment_info')->with('cartProducts', $cartProducts)->with('shipping',$shipping)->with('divisions',$divisions)->with('payment_type',$payment_type);

        }
        else{
            return redirect('/shipping_method');
        }


    }
    public function paymentTypeById($type){
        $paymentType=PaymentType::where('payment_type_name',$type)->first();
        if($type=="bkash"){
           echo'
            <div class="form-group">
                <label>Bkash Number</label>
                <input type="text" name="bkash_number" value="'.$paymentType->bkash_number.'" class="form-control">
            </div>
            
              <div class="form-group">
                <label>Bkash Trnsaction Number</label>
                <input type="text" name="bkash_transaction_number" class="form-control">
            </div>
           ';

        }

        if($type=="bank"){?>

            <?php $banks=PaymentType::where('payment_type_name','=','bank')->get();?>

            <div class="form-group">
                <label>Bank Name</label>
               <select name="bank_type_id" class="form-control">
                   <?php
                   foreach ($banks as $item) {?>
             <option value="<?php echo ($item->id)."N".$item->bank_name." ".($item->bank_number); ?>"><?php echo $item->bank_name." ".($item->bank_number); ?></option>
                   <?php

                   }?>
               </select>
            </div>
            



       <?php }

        if($type=="card"){?>

            <?php $cards=PaymentType::where('payment_type_name','=','card')->get();?>

            <div class="form-group">
                <label>Card Type</label>
                <select name="card_type_id" class="form-control">
                    <?php
                    foreach ($cards as $card) {?>
                        <option value="<?php echo ($card->id)."N".$card->card_name;; ?>"><?php echo $card->card_name; ?></option>
                        <?php
                    }?>

                </select>
            </div>
        <?php }


//        if($type=="Card"){
//            echo'
//            <div class="form-group">
//                <label>Card Number</label>
//                <input type="text" name="card_number" class="form-control">
//            </div>
//
//              <div class="form-group">
//                <label>CVC Number</label>
//                <input type="text" name="cvc_number" class="form-control">
//            </div>
//           ';
//
//        }
    }


//    public function updateCartQuantity(Request $request){
//        $qty= $request->quantity;
//        $id = $request->quantityId;
//
//        Cart::update($id, $qty);
//        return redirect('/payment');
//    }

    public function createPayment(Request $request){



        $payment=new Payment();
        $payment->payment_type=$request->payment_type;
        $payment->bank_info=$request->bank_type_id;
        $payment->card_info=$request->card_type_id;
        $payment->bkash_number=$request->bkash_number;
        $payment->bkash_transaction_number=$request->bkash_transaction_number;
        $payment->save();

        if(Session::get('customerId')!=""){
            $customerId=Session::get('customerId');
        }
        else{
           return redirect('/login/customers');
        }

        if(Session::get('shippingId')!=''){
            $shippingId=Session::get('shippingId');
        }
        else{

            $shipping=Shipping::where('customer_id',$customerId)->first();
            $shippingId=$shipping->id;
        }


        $dt = new \DateTime('now', new \DateTimezone('Asia/Dhaka'));
        $orderDate=$dt->format('Y-m-d g:i:s:A');
            $order=new Order();
            $order->order_code=str_random(5);
            $order->order_date=$orderDate;
            $order->customer_id=$customerId;
            $order->shipping_id=$shippingId;
            $order->order_total=Session::get('orderTotal');
            $order->payment_type=$payment->payment_type;
            $order->payment_id=$payment->id;
            $order->save();
           $orderCode=$order->order_code;

            $cartProducts=Cart::content();
            foreach($cartProducts as $cartProduct)
            {
                $orderDetail=new OrderDetails();
                $orderDetail->order_id=$order->id;
                $orderDetail->item_id=$cartProduct->id;
                $orderDetail->myvendor_id=$cartProduct->options['vendor_item'];
                $orderDetail->item_name=$cartProduct->name;
                $orderDetail->item_quantity=$cartProduct->qty;
                $orderDetail->item_price=$cartProduct->price;
                $orderDetail->total_price=$cartProduct->qty*$cartProduct->price;
                $orderDetail->customer_id=$customerId;
                $orderDetail->shipping_id=$shippingId;
                $orderDetail->payment_id=$payment->id;
                $orderDetail->order_date=$dt->format('Y-m-d g:i:s:A');
                $orderDetail->save();

                Cart::remove($cartProduct->rowId);

            }

            return redirect('/mycustomerProfile')->with('message','Successfully Order Completed');





    }

    public function updateMyuantity(Request $request){
        $qty= $request->quantity;
        $id = $request->quantityId;

        Cart::update($id, $qty);
        return redirect()->back();

    }

    public function updateCartQuantity(Request $request){
        $qty=$request->newQty;
        $rowId=$request->rowID;
        Cart::update($rowId,$qty);
        return back();
    }


    public function finalConfirmation(){

        return redirect('/customerProfile');
    }



}
