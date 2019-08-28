<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Cart;
use App\Item;

class CartController extends Controller
{
    public function addToCart(Request $request) {

     
        $itemID = $request->input('itemById');
        $item = Item::where('id', $itemID)->first();
        $size_array=explode(",",$item->item_size);


        $itemsize=$request->item_size;



      //$size=$request->item_size;
        $color=$item->color;
        $a=Cart::add([
            'id' => $item->id,
            'name' => $item->item_name,
            'price' => $item->sale_price,
            'qty' => $request->input('qty'),
            'options' => ['image' => $item->item_images[0],'color'=>$color,'size'=>$itemsize,'vendor_item'=>$item['vendor_id']],
        ]);

     
        
        return redirect('/cart');
    }

    public function cartRemove($rowId) {
        Cart::remove($rowId);
        return redirect('/cart');
    }

    public function cart() 
    {
        $cartItems = Cart::Content();
        return view('site.pages.cart')->with('cartItems', $cartItems);
    }
}
