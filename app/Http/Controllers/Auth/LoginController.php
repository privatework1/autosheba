<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Shipping;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\Payment;
use App\OrderDetails;
use App\Division;
use App\District;
use App\Category;
use App\SubCategory;
use App\Item;
use App\ShippingMethod;
use App\ShippingInfo;
use Cart;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:customer')->except('logout');
    }

    public function showCustomerLoginForm()
    {
        $cartProducts = Cart::Content();
        $divisions=Division::all();
        $allCategory = Category::orderBy('created_at', 'DESC')->get();
        $allSubCategory = SubCategory::orderBy('created_at', 'DESC')->get();
        $items = Item::orderBy('created_at', 'DESC')->get();
        
      return view('site.pages.customerlogin')->with('cartProducts', $cartProducts)->with('divisions',$divisions)->with('items', $items)->with('allCategory', $allCategory)->with('allSubCategory', $allSubCategory);;
    }

    public function customerLogin(Request $request)
    {


        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {


            $customerId=Auth::guard('customer')->user()->id;
            $shipping=Shipping::where('customer_id',$customerId)->first();
//            if(!empty($shipping->id)){
//                return $shipping->id;
//                exit();
//            }
//            else{
//                return 'dg';
//                exit();
//            }






                Session::forget('vendorId');
                Session::forget('customerId');
                Session::forget('shippingMethodId');
                Session::put('customerId',$customerId);
                return redirect()->intended('/shipping_method');
            }



        return back()->withInput($request->only('email', 'remember'));
    }

    public function customerLoginFromOrderConfirm(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect('/orderWizard');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
}
