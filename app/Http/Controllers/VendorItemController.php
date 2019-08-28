<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Category;
use App\Item;
use App\Vendor;
use Session;

class VendorItemController extends Controller
{
    public function __construct()
    {
        if(Session::get('vendorId')==""){
            return redirect('/login/vendor-site');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::orderBy('created_at', 'DESC')->where('vendor_id','=',Session::get('vendorId'))->get();
        $categories = Category::all();
        $vendors = Vendor::all();
        return view('vendor.pages.item.index')->with('items', $items)->with('categories', $categories)->with('vendors', $vendors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $allCategory = Category::orderBy('created_at', 'DESC')->get();
        $allVendor = Vendor::orderBy('created_at', 'DESC')->get();
        return view('vendor.pages.item.create')->with('allCategory', $allCategory)->with('allVendor', $allVendor);
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
            "item_name.required" => "Item Name is Required.",
            "item_category.required" => "Item Category is Required.",
            "cost_price.required" => "Cost Price is Required.",
            "sell_price.required" => "Sale Price is Required.",
            "tax_rate.required" => "Tax Rate is Required.",
            "reorder_quantity.required" => "Reorder Quantity is Required.",
            "warrenty.required" => "Warrenty is Required.",
            "item_part_of.required" => "Item Part Of is Required.",
            "item_model_no.required" => "Item Model No is Required.",
        ];

        // validate the form data
        $validator = Validator::make($request->all(), [
            'item_name' => 'required',
            'item_category' => 'required',
            'cost_price' => 'required',
            'sell_price' => 'required',
            'tax_rate' => 'required',
            'reorder_quantity' => 'required',
            'warrenty' => 'required',
            'item_part_of' => 'required',
            'item_model_no' => 'required',
        ], $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {


            $item = new Item;
            if ($request->files->get('itemImages') == "") {
                $item->item_images="";
            }

            else{
                $images = $request->files->get('itemImages');
                foreach ($images as $image)
                {
                    $extension = $image->getClientOriginalExtension();
                    $fileName = mt_rand(000000,111111).'_'.time().'.'.$extension;
                    $path = $image->move('uploads/ItemImages',$fileName);
                    $data[] = $fileName;
                }
                $item->item_images = $data;
            }

            if (Session::get('vendorId') != "") {
                $vendorId = Session::get('vendorId');
            } else {
                $vendorId = 0;
            }


            $item->vendor_id = $vendorId;
            $item->item_name = $request->input('item_name');
            $item->item_category = $request->input('item_category');
            $item->item_type = $request->input('item_type');
            $item->item_subcategory = $request->input('item_subcategories');
            $item->item_supplier = $request->input('item_supplier');
            $item->cost_price = $request->input('cost_price');
            $item->sale_price = $request->input('sell_price');
            $item->tax_rate = $request->input('tax_rate');
            $item->reorder_quantity = $request->input('reorder_quantity');
            $item->item_description = $request->input('item_description');

            // Warrenty Section
            $item->warrenty = $request->input('warrenty');
            if ($request->input('warrenty') == 'yes') {
                $item->warrenty_type = $request->input('warrenty_type');

                $item->warrenty_end_date = $request->input('warrentyEndDate');
                $item->warrenty_details = $request->input('warrentyCondition');
            } else {
                $item->warrenty_type = null;
                $item->warrenty_end_date = null;
                $item->warrenty_details = null;
            }

            $item->color = $request->input('item_color');
            $item->part_of = $request->input('item_part_of');
            $item->model_no = $request->input('item_model_no');
            $item->save();
            return redirect()->back()->withErrors([
                'success' => 'New Item Added.',
            ]);





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
        $item = Item::findOrfail($id);
        return view('vendor.pages.item.view')->with('item', $item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Item::findOrfail($id);
        $allCategory = Category::orderBy('created_at', 'DESC')->get();
        $allVendor = Vendor::orderBy('created_at', 'DESC')->get();
        return view('vendor.pages.item.edit')->with('item', $item)->with('allCategory', $allCategory)->with('allVendor',$allVendor);
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
        $messages = [
            "item_name.required" => "Item Name is Required.",
            "item_category.required" => "Item Category is Required.",
            "cost_price.required" => "Cost Price is Required.",
            "sell_price.required" => "Sale Price is Required.",
            "tax_rate.required" => "Tax Rate is Required.",
            "reorder_quantity.required" => "Reorder Quantity is Required.",
            "warrenty.required" => "Warrenty is Required.",
            "item_part_of.required" => "Item Part Of is Required.",
            "item_model_no.required" => "Item Model No is Required.",
        ];

        // validate the form data
        $validator = Validator::make($request->all(), [
            'item_name' => 'required',
            'item_category' => 'required',
            'cost_price' => 'required',
            'sell_price' => 'required',
            'tax_rate' => 'required',
            'reorder_quantity' => 'required',
            'warrenty' => 'required',
            'item_part_of' => 'required',
            'item_model_no' => 'required',
        ], $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            if($request->files->get('itemImages') == "") {
                $item = Item::findOrfail($id);
                $item->item_name = $request->input('item_name');
                $item->item_category = $request->input('item_category');
                $item->item_type = $request->input('item_type');
                $item->item_subcategory = $request->input('item_subcategories');
                $item->item_supplier = $request->input('item_supplier');
                $item->cost_price = $request->input('cost_price');
                $item->sale_price = $request->input('sell_price');
                $item->tax_rate = $request->input('tax_rate');
                $item->reorder_quantity = $request->input('reorder_quantity');
                $item->item_description = $request->input('item_description');

                // Warrenty Section
                $item->warrenty = $request->input('warrenty');
                if($request->input('warrenty')== 'yes') {
                    $item->warrenty_type = $request->input('warrenty_type');


                    if(!empty($request->warrentyEndDate)){
                        $item->warrenty_end_date =$request->input('warrentyEndDate');
                    }
                    $item->warrenty_end_date=$item->warrenty_end_date;

                    $item->warrenty_end_date = $request->input('warrentyEndDate');
                    $item->warrenty_details = $request->input('warrentyCondition');
                } else {
                    $item->warrenty_type = null;
                    $item->warrenty_end_date = null;
                    $item->warrenty_details = null;
                }

                $item->color = $request->input('item_color');
                $item->part_of = $request->input('item_part_of');
                $item->model_no = $request->input('item_model_no');
                $item->save();
                return redirect()->back()->withErrors([
                    'success' => 'Successfully Item Updated.',
                ]);
            } else {
                $item = Item::findOrfail($id);
                $item->item_name = $request->input('item_name');
                $item->item_category = $request->input('item_category');
                $item->item_type = $request->input('item_type');
                $item->item_subcategory = $request->input('item_subcategories');
                $item->item_supplier = $request->input('item_supplier');
                $item->cost_price = $request->input('cost_price');
                $item->sale_price = $request->input('sell_price');
                $item->tax_rate = $request->input('tax_rate');
                $item->reorder_quantity = $request->input('reorder_quantity');
                $item->item_description = $request->input('item_description');

                // Warrenty Section
                $item->warrenty = $request->input('warrenty');
                if($request->input('warrenty') == 'yes') {
                    $item->warrenty_type = $request->input('warrenty_type');
                    $item->warrenty_end_date = $request->input('warrentyEndDate');
                    $item->warrenty_details = $request->input('warrentyCondition');
                } else {
                    $item->warrenty_type = null;
                    $item->warrenty_end_date = null;
                    $item->warrenty_details = null;
                }

                $item->color = $request->input('item_color');
                $item->part_of = $request->input('item_part_of');
                $item->model_no = $request->input('item_model_no');

                //existing image remove
                if($item->item_images != '') {
                    foreach ($item->item_images as $image) {
                        unlink('uploads/ItemImages/'.$image);
                    }
                }

                // image upload
                $images = $request->files->get('itemImages');
                foreach ($images as $image)
                {
                    $extension = $image->getClientOriginalExtension();
                    $fileName = mt_rand(000000,111111).'_'.time().'.'.$extension;
                    $path = $image->move('uploads/ItemImages',$fileName);
                    $data[] = $fileName;
                }
                $item->item_images = $data;
                $item->save();
                return redirect()->back()->withErrors([
                    'success' => 'Successfully Item Updated.',
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::findOrfail($id);
        //Existing Image Deleted
        if($item->item_images != '') {
            foreach ($item->item_images as $image) {
                unlink('uploads/ItemImages/'.$image);
            }
        }

        $item->delete();
        return redirect()->back()->withErrors([
            'success' => 'Successfully Item Deleted.',
        ]);
    }
}
