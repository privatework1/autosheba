<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use DB;

class LoadMoreController extends Controller
{
    function load_data(Request $request)
    {
        if($request->ajax())
        {
            if($request->id > 0)
            {
                $data=Item::orderBy('id', 'DESC')->where('id', '<', $request->id)->limit(1)->get();
//
//
//                $data = DB::table('items')
//                    ->where('id', '<', $request->id)
//                    ->orderBy('id', 'DESC')
//                    ->limit(1)
//                    ->get();
            }
            else
            {
                $data=Item::orderBy('id', 'DESC')->limit(3)->get();
//
//                $data = DB::table('items')
//                    ->orderBy('id', 'DESC')
//                    ->limit(3)
//                    ->get();
            }
            $output = '';
            $last_id = '';
     
            if(!$data->isEmpty())
            {


                foreach($data as $row)
                { 
                    $output .= '

               <div class="special"> <a href="" class="special-link">
                           <p class="special-img"> <img src="' . url("uploads/ItemImages/") ."/".$row->item_images[0]. '"  alt=""> </p>
                           <h3><span>'.$row->item_name.'</span></h3>
                       </a>
                       <p class="special-info"> <a href="#" class="special-categ"></a> <span class="special-price">BDT 122</span> <a href="'.url("itemdetails/")."/".$row->id.'" class="special-add">+ Add to cart</a> </p>
                   </div>
                  
        ';
                    $last_id = $row->id;
                }
                $output .= '
       <div id="load_more">
        <button type="button" style="background: red;" name="load_more_button" class="" data-id="'.$last_id.'" id="load_more_button">Load More</button>
       </div>
       
      
       
       ';
            }
            else
            {
                $output .= '
       <div id="load_more">
        <button type="button" name="load_more_button" class="">No Data Found</button>
       </div>
      
      
       ';
            }
            echo $output;
        }
    }
}
