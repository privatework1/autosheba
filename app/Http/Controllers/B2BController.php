<?php

namespace App\Http\Controllers;

use App\Item;
use App\Poinvoice;
use App\PoinvoiceDetails;
use Illuminate\Http\Request;
use App\B2bCustomer;
use Session;
use Auth;
use DB;
use Faker\Provider\zh_TW\DateTime;
use App\B2BPurchase;
use App\B2BPurchaseDetails;
use App\User;
use Charts;
use Illuminate\Support\Facades\Input;

class B2BController extends Controller
{
     public function aa(){
         $members =DB::table('order_details')->where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
                   ->where('order_details.order_id',1)
                  ->get();
         $chart = Charts::database($members, 'geo', 'highcharts')
             ->title("Monthly Order")
             ->elementLabel("Total Order")
             ->dimensions(1000, 500)
             ->responsive(false)
             ->groupByMonth(date('Y'), true);
         return view('try',compact('chart'));
     }
    public function b2bloginForm(){
        return view('site.pages.b2b_login');
    }
    public function createb2bLogin(Request $request){
        $email=$request->b2b_email;
        $b2bInfo=B2bCustomer::where('b2bCustomer_email',$email)->first();

        $password_code=$request->b2b_code;
      if(!empty($b2bInfo)){
          if($b2bInfo->b2bCustomer_email==$email && $b2bInfo->b2bCustomer_code==$password_code){

              Auth::logout();
              Session::forget('customerId');
              Session::forget('shippingId');
              Session::forget('shippingEmail');
              Session::forget('shippingPassword');
              Session::forget('vendorId');
              Session::forget('vendorName');
              Session::put('b2bId',$b2bInfo->id);
              return redirect('/b2b-dashboard');
          }
          else{
              return back();
          }
      }
      else{
          return back();
      }
    }

    public function b2bDashboard(){
        return view('b2b.pages.index');
    }


    public function b2bpoForm(){
        $dt = new \DateTime('now', new \DateTimezone('Asia/Dhaka'));
        $purchaeDate=$dt->format('Y-m-d g:i:s:A');
        $puchaseCode=str_random(5);
        $b2bInfo=DB::table('b2b_customers')->where('id',Session::get('b2bId'))->first();
        $items=Item::all();
        return view('b2b.pages.purchase.add_purchase',compact('items','b2bInfo','puchaseCode','purchaeDate'));

    }


    public function b2bpoFindPrice(Request $request)
    {
        //$data=Product::select('price')->where('id',$request->id)->first();
        $data=DB::table('items')
            ->select('sale_price')
            ->where('id',$request->id)
            ->first();

        return response()->json($data);
    }




    public function b2bpocreateForm(Request $request){
        $dt = new \DateTime('now', new \DateTimezone('Asia/Dhaka'));
        $purchaeDate=$dt->format('Y-m-d g:i:s:A');

        if(!empty($request->file('po_company_logo'))){
            $image = $request->files->get('po_company_logo');
            $extension = $image->getClientOriginalExtension();
            $fileName = mt_rand(000000,111111).'_'.time().'.'.$extension;
            $path = $image->move('uploads/b2bcompany',$fileName);

        }
        else{
            $fileName="";
        }



        $b2bpurchase=new B2BPurchase();
        $b2bpurchase->b2bcustomer_id=Session::get('b2bId');
        $b2bpurchase->b2bpurchase_code=str_random('5');
        $b2bpurchase->b2bpurchase_date=$purchaeDate;
        $b2bpurchase->total_purchase=$request->total_amount;
        $b2bpurchase->b2bpurchase_date=$purchaeDate;
        $b2bpurchase->po_company_logo=$fileName;
        $b2bpurchase->po_company_name=$request->po_company_name;
        $b2bpurchase->po_company_email=$request->po_company_email;
        $b2bpurchase->po_company_mobile=$request->po_company_mobile;
        $b2bpurchase->po_company_address=$request->po_company_address;
        $b2bpurchase->po_company_code=$request->po_company_code;
        $b2bpurchase->po_date=$request->po_date;

        $b2bpurchase->save();
        foreach($request->product_name as $key=>$v)
        {
            $data=array(
                'b2bpurchase_id'=>$b2bpurchase->id,
                'item_id'=>$v,
                'item_quantity'=>$request->qty[$key],
                'item_price'=>$request->price[$key],
                'total_price'=>$request->qty[$key]*$request->price[$key],
                );
           $multidata= B2BPurchaseDetails::insert($data);

        }
        if($multidata){

         return redirect('/b2bpurchasesingleposlist/'.$b2bpurchase->id);
        }
    }


    public function purchasesinglepoList($b2bpurchaseId){
        $dt = new \DateTime('now', new \DateTimezone('Asia/Dhaka'));
        $purchaeDate=$dt->format('Y-m-d g:i:s:A');
        $b2bpurchase = B2BPurchase::where('id',$b2bpurchaseId)->first();
        $b2bInfo=DB::table('b2b_customers')->where('id',Session::get('b2bId'))->first();

        $b2bpurchaseDetails=DB::table('b2_b_purchase_details')
            ->leftJoin('b2_b_purchases','b2_b_purchases.id','b2_b_purchase_details.b2bpurchase_id')
            ->leftJoin('items','items.id','b2_b_purchase_details.item_id')
            ->where('b2_b_purchase_details.b2bpurchase_id',$b2bpurchaseId)
            ->get();
        return view('b2b.pages.purchase.single_polist',compact('purchaeDate','b2bInfo','b2bpurchase','b2bpurchaseDetails'));

    }

    public function b2bpoList(){
        $b2bpurchases=B2BPurchase::where('b2bcustomer_id',Session::get('b2bId'))->get();
        return view('b2b.pages.purchase.purchase_list',compact('b2bpurchases'));
    }

    public function b2bsinglePurchase($id){
        $id=base64_decode($id);
        $dt = new \DateTime('now', new \DateTimezone('Asia/Dhaka'));
        $purchaeDate=$dt->format('Y-m-d g:i:s:A');
        $b2bInfo=DB::table('b2b_customers')->where('id',Session::get('b2bId'))->first();

        $b2bpurchase = B2BPurchase::find($id);
        $b2bpurchaseDetails=DB::table('b2_b_purchase_details')
            ->leftJoin('b2_b_purchases','b2_b_purchases.id','b2_b_purchase_details.b2bpurchase_id')
            ->leftJoin('items','items.id','b2_b_purchase_details.item_id')
            ->where('b2_b_purchase_details.b2bpurchase_id',$id)
            ->get();

        return view('b2b.pages.purchase.single_purchase',compact('purchaeDate','b2bInfo','b2bpurchase','b2bpurchaseDetails'));

    }

    

    public function b2bgenerateInvoiceForm(Request $request){

        $b2bpurchaseDetails=[];
        $items=[];
        $b2bpurchases=[];
        
        if($request->purchase_code!=""){
            $purchaseOrder=B2BPurchase::find($request->purchase_code);
            $purchaseCode=$purchaseOrder->b2bpurchase_code;
            $b2bpurchaseDetails=DB::table('b2_b_purchase_details')
                ->leftJoin('b2_b_purchases','b2_b_purchases.id','b2_b_purchase_details.b2bpurchase_id')
                ->leftJoin('items','items.id','b2_b_purchase_details.item_id')
                ->where('b2_b_purchase_details.b2bpurchase_id',$request->purchase_code)
                ->get();
            $items=Item::all();



        }
        else{
            $purchaseCode='';
        }
        $b2bpurchases=B2BPurchase::all();
      
        return view('b2b.pages.invoice.generate_invoice',compact('b2bpurchases','items','b2bpurchaseDetails','purchaseCode'));
    }



    public function b2binvoiceType(Request $request){
        $items=Item::all();
        $dt = new \DateTime('now', new \DateTimezone('Asia/Dhaka'));
        $purchaeDate=$dt->format('Y-m-d g:i:s:A');
        $puchaseCode=str_random(5);
        $b2bInfo=DB::table('b2b_customers')->where('id',Session::get('b2bId'))->first();

        if($request->radiodata=="newinvoice"){

            return view('b2b.pages.invoice.new_invoice',compact('items','b2bInfo','puchaseCode','purchaeDate'));
        }
        else{
            
            return view('b2b.pages.invoice.exist_po',compact('items','b2bInfo','puchaseCode','purchaeDate'));
        }

    }

    public function b2bpoinvicesearchNumber(Request $request){
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('b2_b_purchases')
                ->where('b2_b_purchases.po_company_code', 'LIKE', "%{$query}%")
                 ->where('b2_b_purchases.b2bcustomer_id',Session::get('b2bId'))
                ->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row)
            {
                $output .= '
       <li><a href="#">'.$row->po_company_code.'</a></li>
       ';
            }
            $output .= '</ul>';
            echo $output;
        }
    }

    public function b2binvoiceForExistPo(Request $request){

        $dt = new \DateTime('now', new \DateTimezone('Asia/Dhaka'));
        $purchaeDate=$dt->format('Y-m-d g:i:s:A');
        $existpo = B2BPurchase::where('po_company_code',$request->ponumber)->first();
        $b2bInfo=DB::table('b2b_customers')->where('id',Session::get('b2bId'))->first();

        $b2bInfo=DB::table('b2b_customers')->where('id',Session::get('b2bId'))->first();
        $b2bexistpoDetails=DB::table('b2_b_purchase_details')
            ->leftJoin('b2_b_purchases','b2_b_purchases.id','b2_b_purchase_details.b2bpurchase_id')
            ->leftJoin('items','items.id','b2_b_purchase_details.item_id')
            ->where('b2_b_purchase_details.b2bpurchase_id',$existpo->id)
            ->get();
        $items=Item::all();

        return view('b2b.pages.invoice.exist_po',compact('purchaeDate','b2bInfo','existpo','b2bexistpoDetails','items'));



    }

    public function b2bcreateinvoiceForExistPo(Request $request){
        $dt = new \DateTime('now', new \DateTimezone('Asia/Dhaka'));
        $purchaeDate=$dt->format('Y-m-d g:i:s:A');

        $singlePoData=B2BPurchase::where('po_company_code',Session::get('poCompanyCode'))->first();

        if(Input::get('alldatabtn')==1){
            $b2bexistpoinvoice=new Poinvoice();
            $b2bexistpoinvoice->b2bcustomer_id=Session::get('b2bId');
            $b2bexistpoinvoice->poinvoice_code=str_random('5');
            $b2bexistpoinvoice->poinvoice_company_logo=$singlePoData->po_company_logo;
            $b2bexistpoinvoice->poinvoice_company_name=$request->myinvoice_company_name;
            $b2bexistpoinvoice->b2b_purchase_id=$singlePoData->id;
            $b2bexistpoinvoice->poinvoice_company_email=$request->myinvoice_company_email;
            $b2bexistpoinvoice->poinvoice_company_mobile=$request->myinvoice_company_mobile;
            $b2bexistpoinvoice->poinvoice_company_address=$request->myinvoice_company_address;
            $b2bexistpoinvoice->poinvoice_company_code=$request->myinvoice_company_code;
            $b2bexistpoinvoice->poinvoice_date=$request->myinvoice_date;
            //var_dump($b2bexistpoinvoice);

          
            $b2bexistpoinvoice->save();
            foreach($request->item_Id as $key=>$v)
            {
                $data=array(
                    'b2bpurchaseinvoice_id'=>$b2bexistpoinvoice->id,
                    'item_id'=>$v,
                    'item_quantity'=>$request->item_quantity[$key],
                    'item_price'=>$request->item_price[$key],
                    'total_price'=>$request->item_quantity[$key]*$request->item_price[$key],
                );
                $multiprivousdata= PoinvoiceDetails::insert($data);

            }

            $mytotal = 0;
            foreach($request->product_name as $key=>$v)
            {
                $data=array(
                    'b2bpurchaseinvoice_id'=>$b2bexistpoinvoice->id,
                    'item_id'=>$v,
                    'item_quantity'=>$request->qty[$key],
                    'item_price'=>$request->price[$key],
                    'total_price'=>$request->qty[$key]*$request->price[$key],

                );
                $mytotal+=$request->qty[$key]*$request->price[$key];
                $multidata= PoinvoiceDetails::insert($data);

            }


            $updatetotlPrurchase=Session::get('multiprevious_purchaseamount')+$mytotal;






            if($multiprivousdata && $multidata){
               return redirect('/b2bexistsingleposlist/'.$b2bexistpoinvoice->id."/".$updatetotlPrurchase);
           
            }

        }
        else{
            $b2bpoinvoice=new Poinvoice();
            $b2bpoinvoice->b2bcustomer_id=Session::get('b2bId');
            $b2bpoinvoice->poinvoice_code=str_random('5');
            $b2bpoinvoice->total_purchase=Session::get('singleprevious_purchaseamount');
            $b2bpoinvoice->poinvoice_company_logo=$singlePoData->po_company_logo;
            $b2bpoinvoice->poinvoice_company_name=$request->poinvoice_company_name;
            $b2bpoinvoice->b2b_purchase_id=$singlePoData->id;
            $b2bpoinvoice->poinvoice_company_email=$request->poinvoice_company_email;
            $b2bpoinvoice->poinvoice_company_mobile=$request->poinvoice_company_mobile;
            $b2bpoinvoice->poinvoice_company_address=$request->poinvoice_company_address;
            $b2bpoinvoice->poinvoice_company_code=$request->poinvoice_company_code;
            $b2bpoinvoice->poinvoice_date=$request->poinvoice_date;

            $b2bpoinvoice->save();
            foreach($request->item_Id as $key=>$v)
            {
                $data=array(
                    'b2bpurchaseinvoice_id'=>$b2bpoinvoice->id,
                    'item_id'=>$v,
                    'item_quantity'=>$request->item_quantity[$key],
                    'item_price'=>$request->item_price[$key],
                    'total_price'=>$request->item_quantity[$key]*$request->item_price[$key],
                );
                $multidata= PoinvoiceDetails::insert($data);

            }



            if($multidata){
                return redirect('/b2bsingleposlist/'.$b2bpoinvoice->id);

            }
        }
        

    }
    
    public function ExistsinglePoinvoiceList($b2bexistpoinvoiceId,$updatetotlPrurchase){
        $dt = new \DateTime('now', new \DateTimezone('Asia/Dhaka'));
        $purchaeDate=$dt->format('Y-m-d g:i:s:A');
        $b2bpurchaseinvoice = Poinvoice::where('id',$b2bexistpoinvoiceId)->first();


        DB::table('poinvoices')->where('id',$b2bexistpoinvoiceId)->update(['total_purchase'=>$updatetotlPrurchase]);

        $b2bInfo=DB::table('b2b_customers')->where('id',Session::get('b2bId'))->first();
        $b2bpurchaseinvoiceDetails=DB::table('poinvoice_details')
            ->leftJoin('poinvoices','poinvoices.id','poinvoice_details.b2bpurchaseinvoice_id')
            ->leftJoin('items','items.id','poinvoice_details.item_id')
            ->where('poinvoice_details.b2bpurchaseinvoice_id',$b2bexistpoinvoiceId)
            ->get();
        Session::forget('multiprevious_purchaseamount');

        return view('b2b.pages.invoice.single_poinvoicelist',compact('purchaeDate','b2bInfo','b2bpurchaseinvoice','b2bpurchaseinvoiceDetails'));

    }


    public function singlepoinvoiceList($b2bpoinvoice){
        $dt = new \DateTime('now', new \DateTimezone('Asia/Dhaka'));
        $purchaeDate=$dt->format('Y-m-d g:i:s:A');
        $b2bpurchaseinvoice = Poinvoice::where('id',$b2bpoinvoice)->first();
        $b2bInfo=DB::table('b2b_customers')->where('id',Session::get('b2bId'))->first();

        $b2bpurchaseinvoiceDetails=DB::table('poinvoice_details')
            ->leftJoin('poinvoices','poinvoices.id','poinvoice_details.b2bpurchaseinvoice_id')
            ->leftJoin('items','items.id','poinvoice_details.item_id')
            ->where('poinvoice_details.b2bpurchaseinvoice_id',$b2bpoinvoice)
            ->get();

        Session::forget('singleprevious_purchaseamount');
        return view('b2b.pages.invoice.single_poinvoicelist',compact('purchaeDate','b2bInfo','b2bpurchaseinvoice','b2bpurchaseinvoiceDetails'));


    }


    public function b2bUpdateCompanyLogo(Request $request,$id){
        $updatedata=B2BPurchase::find($id);

        if(!empty($request->file('uplogo'))){
            $image = $request->files->get('uplogo');
            $extension = $image->getClientOriginalExtension();
            $fileName = mt_rand(000000,111111).'_'.time().'.'.$extension;
            $path = $image->move('uploads/b2bcompany',$fileName);

        }
        else{
            $fileName="";
        }

        $updatedata->po_company_logo=$fileName;
        $updatedata->save();
        return back();


    }





























    public function b2bcreatePoinvoice(Request $request){
        $dt = new \DateTime('now', new \DateTimezone('Asia/Dhaka'));
        $purchaeDate=$dt->format('Y-m-d g:i:s:A');

        if(!empty($request->file('poinvoice_company_logo'))){
            $image = $request->files->get('poinvoice_company_logo');
            $extension = $image->getClientOriginalExtension();
            $fileName = mt_rand(000000,111111).'_'.time().'.'.$extension;
            $path = $image->move('uploads/b2bcompany',$fileName);

        }
        else{
            $fileName="";
        }


        $b2bpoinvoice=new Poinvoice();
        $b2bpoinvoice->b2bcustomer_id=Session::get('b2bId');
        $b2bpoinvoice->poinvoice_code=str_random('5');
        $b2bpoinvoice->total_purchase=$request->total_amount;
        $b2bpoinvoice->poinvoice_company_logo=$fileName;
        $b2bpoinvoice->poinvoice_company_name=$request->poinvoice_company_name;
        $b2bpoinvoice->poinvoice_company_email=$request->poinvoice_company_email;
        $b2bpoinvoice->poinvoice_company_mobile=$request->poinvoice_company_mobile;
        $b2bpoinvoice->poinvoice_company_address=$request->poinvoice_company_address;
        $b2bpoinvoice->poinvoice_company_code=$request->poinvoice_company_code;
        $b2bpoinvoice->poinvoice_date=$request->poinvoice_date;

        $b2bpoinvoice->save();
        foreach($request->product_name as $key=>$v)
        {
            $data=array(
                'b2bpurchaseinvoice_id'=>$b2bpoinvoice->id,
                'item_id'=>$v,
                'item_quantity'=>$request->qty[$key],
                'item_price'=>$request->price[$key],
                'total_price'=>$request->qty[$key]*$request->price[$key],
            );
            $multidata= PoinvoiceDetails::insert($data);

        }
        if($multidata){
            $dt = new \DateTime('now', new \DateTimezone('Asia/Dhaka'));
            $purchaeDate=$dt->format('Y-m-d g:i:s:A');
            $b2bpurchaseinvoice = Poinvoice::where('id',$b2bpoinvoice->id)->first();
            $b2bInfo=DB::table('b2b_customers')->where('id',Session::get('b2bId'))->first();

            $b2bpurchaseinvoiceDetails=DB::table('poinvoice_details')
                ->leftJoin('poinvoices','poinvoices.id','poinvoice_details.b2bpurchaseinvoice_id')
                ->leftJoin('items','items.id','poinvoice_details.item_id')
                ->where('poinvoice_details.b2bpurchaseinvoice_id',$b2bpoinvoice->id)
                ->get();
            return view('b2b.pages.invoice.single_poinvoicelist',compact('purchaeDate','b2bInfo','b2bpurchaseinvoice','b2bpurchaseinvoiceDetails'));

        }
    }













    
    
    public function createb2bgenerateInvoiceForm(Request $request){
        $previuse_amount=Session::get('previous_purchaseamount');
        $b2bpurchase=B2BPurchase::where('b2bpurchase_code',Session::get('purchaseCode'))->first();


      // return  $previuse_amount+$request->total_amount;

        $dt = new \DateTime('now', new \DateTimezone('Asia/Dhaka'));
        $purchaeDate=$dt->format('Y-m-d g:i:s:A');
        $b2bpurchase->b2bpurchase_date=$purchaeDate;
        $b2bpurchase->total_purchase=$previuse_amount+$request->total_amount;
        $b2bpurchase->save();
        foreach($request->product_name as $key=>$v)
        {
            $data=array(
                'b2bpurchase_id'=>$b2bpurchase->id,
                'item_id'=>$v,
                'item_quantity'=>$request->qty[$key],
                'item_price'=>$request->price[$key],
                'total_price'=>$request->qty[$key]*$request->price[$key],
            );
            B2BPurchaseDetails::insert($data);
            Session::forget('previous_purchaseamount');
            Session::forget('purchaseCode');
            return back()->with('message','New Invoice Successfully Generated');
        }

    }


    public function b2bfinalInvoiceList(){
        $b2bpurchases=B2BPurchase::all();
        $b2bpoinvoicess=Poinvoice::all();
        return view('b2b.pages.invoice.invoice_list',compact('b2bpurchases','b2bpoinvoicess'));
    }



    public function b2bsingleInvoice($id){
        $id=base64_decode($id);
        $dt = new \DateTime('now', new \DateTimezone('Asia/Dhaka'));
        $purchaeDate=$dt->format('Y-m-d g:i:s:A');
        $b2bInfo=DB::table('b2b_customers')->where('id',Session::get('b2bId'))->first();
        $b2bpoinvoice = Poinvoice::find($id);
        $items=Item::all();
        $b2bpoinvoices=DB::table('poinvoice_details')
            ->leftJoin('poinvoices','poinvoices.id','poinvoice_details.b2bpurchaseinvoice_id')
            ->leftJoin('items','items.id','poinvoice_details.item_id')
            ->where('poinvoice_details.b2bpurchaseinvoice_id',$id)
            ->get();

        return view('b2b.pages.invoice.single_invoice',compact('purchaeDate','b2bInfo','b2bpoinvoice','b2bpoinvoices','items'));
    }







    public function b2bLogout(){
        Auth::logout();
        Session::forget('shippingId');
        Session::forget('shippingEmail');
        Session::forget('shippingPassword');
        Session::forget('b2bId');

        return redirect('/');
    }

}
