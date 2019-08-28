<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Brand;
use Session;

class VendorBrandController extends Controller
{
    public function __construct()
    {
        if(Session::get('vendorId')==""){}
        return redirect('/');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('created_at', 'DESC')->get();
        return view('vendor.pages.brand.index')->with('brands', $brands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.pages.brand.create');
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
            "brand_name.required" => "Brand Name is Required.",
        ];

        // validate the form data
        $validator = Validator::make($request->all(), [
            'brand_name' => 'required',
        ], $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            if($request->files->get('brandImages') == "") {
                $brand = new Brand;
                $brand->vendor_id=Session::get('vendorId');
                $brand->brand_name = $request->input('brand_name');
                $brand->brand_details = $request->input('brand_details');
                $brand->save();
                return redirect()->back()->withErrors([
                    'success' => 'New Brand Added.',
                ]);
            } else {
                $brand = new Brand;
                $brand->vendor_id=Session::get('vendorId');
                $brand->brand_name = $request->input('brand_name');
                $brand->brand_details = $request->input('brand_details');

                // image upload
                $images = $request->files->get('brandImages');
                foreach ($images as $image)
                {
                    $extension = $image->getClientOriginalExtension();
                    $fileName = mt_rand(000000,111111).'_'.time().'.'.$extension;
                    $path = $image->move('uploads/BrandImages',$fileName);
                    $data[] = $fileName;
                }
                $brand->brand_images = $data;
                $brand->save();
                return redirect()->back()->withErrors([
                    'success' => 'New Brand Added.',
                ]);
            }
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
        $brand = Brand::findOrfail($id);
        return view('vendor.pages.brand.view')->with('brand', $brand);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::findOrfail($id);
        return view('vendor.pages.brand.edit')->with('brand', $brand);
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
            "brand_name.required" => "Brand Name is Required.",
        ];

        // validate the form data
        $validator = Validator::make($request->all(), [
            'brand_name' => 'required',
        ], $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            if($request->files->get('brandImages') == "") {
                $brand = Brand::findOrfail($id);
                $brand->brand_name = $request->input('brand_name');
                $brand->brand_details = $request->input('brand_details');
                $brand->save();
                return redirect()->back()->withErrors([
                    'success' => 'Successfully Brand Updated.',
                ]);
            } else {
                $brand = Brand::findOrfail($id);
                $brand->brand_name = $request->input('brand_name');
                $brand->brand_details = $request->input('brand_details');

                // Existing Image Remove
                if($brand->brand_images != '') {
                    foreach ($brand->brand_images as $image) {
                        unlink('uploads/BrandImages/'.$image);
                    }
                }

                // image upload
                $images = $request->files->get('brandImages');
                foreach ($images as $image)
                {
                    $extension = $image->getClientOriginalExtension();
                    $fileName = mt_rand(000000,111111).'_'.time().'.'.$extension;
                    $path = $image->move('uploads/BrandImages',$fileName);
                    $data[] = $fileName;
                }
                $brand->brand_images = $data;
                $brand->save();
                return redirect()->back()->withErrors([
                    'success' => 'Successfully Brand Updated.',
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
        $brand = Brand::findOrfail($id);
        //Existing Image Deleted
        if($brand->brand_images != '') {
            foreach ($brand->brand_images as $image) {
                unlink('uploads/BrandImages/'.$image);
            }
        }
        $brand->delete();
        return redirect()->back()->withErrors([
            'success' => 'Successfully Brand Deleted.',
        ]);
    }
}
