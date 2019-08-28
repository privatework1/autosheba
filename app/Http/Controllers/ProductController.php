<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Category;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
      $this->middleware('auth')->except('logout');
    }

    public function index()
    {
        $allProduct = Product::orderBy('id', 'DESC')->get();
        return view('admin.pages.product.index')->with('allProduct', $allProduct);
    }

    public function addProduct()
    {
        $allCategory = Category::orderBy('id', 'DESC')->get();
        return view('admin.pages.product.addproduct')->with('allCategory', $allCategory);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            "product_name.required" => "Product Name is Required.",
            "product_category.required" => "Product Category is Required.",
            "product_price.required" => "Produce Price is Required.",
        ];
      
        // validate the form data
        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'product_category' => 'required',
            'product_price' => 'required',
        ], $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            if($request->files->get('productImages') == "") { 
                $product = new Product;
                $productCode = mt_rand(00000000,11111111);
                $product->product_code = $productCode;
                $product->product_name = $request->input('product_name');
                $product->product_category = $request->input('product_category');
                $product->product_subcategory = $request->input('product_subcategory');
                $product->product_price = $request->input('product_price');
                $product->product_details = $request->input('product_details');
                $product->save();
                return redirect()->back()->withErrors([
                    'success' => 'New Product Added.',
                ]);
            } else {
                $product = new Product;
                $productCode = mt_rand(00000000,11111111);
                $product->product_code = $productCode;
                $product->product_name = $request->input('product_name');
                $product->product_category = $request->input('product_category');
                $product->product_subcategory = $request->input('product_subcategory');
                $product->product_price = $request->input('product_price');
                $product->product_details = $request->input('product_details');

                // image upload
                $images = $request->files->get('productImages');
                foreach ($images as $image)
                {
                    $extension = $image->getClientOriginalExtension();
                    $fileName = mt_rand(000000,111111).'_'.time().'.'.$extension;
                    $path = $image->move('uploads/ProductImage',$fileName);
                    $data[] = $fileName;
                }
                $product->product_images = $data;
                $product->save();
                return redirect()->back()->withErrors([
                    'success' => 'New Product Added With Images.',
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
        $product = Product::findOrfail($id);
        return view('admin.pages.product.edit')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrfail($id);
        $allCategory = Category::orderBy('created_at', 'DESC')->get();
        return view('admin.pages.product.edit')->with('product', $product)->with('allCategory', $allCategory);
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
            "product_name.required" => "Product Name is Required.",
            "product_category.required" => "Product Category is Required.",
            "product_price.required" => "Produce Price is Required.",
        ];
      
        // validate the form data
        $validator = Validator::make($request->all(), [
            'product_name' => 'required',
            'product_category' => 'required',
            'product_price' => 'required',
        ], $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            if($request->files->get('productImages') == "") { 
                $product = Product::findOrfail($id);
                $productCode = mt_rand(00000000,11111111);
                $product->product_code = $productCode;
                $product->product_name = $request->input('product_name');
                $product->product_category = $request->input('product_category');
                $product->product_price = $request->input('product_price');
                $product->product_details = $request->input('product_details');
                $product->save();
                return redirect()->back()->withErrors([
                    'success' => 'Successfully Product Updated.',
                ]);
            } else {
                $product = Product::findOrfail($id);
                $productCode = mt_rand(00000000,11111111);
                $product->product_code = $productCode;
                $product->product_name = $request->input('product_name');
                $product->product_category = $request->input('product_category');
                $product->product_price = $request->input('product_price');
                $product->product_details = $request->input('product_details');
                // Existing Image Remove
                if($product->product_images != '') {
                    foreach ($product->product_images as $image) {
                      unlink('uploads/ProductImage/'.$image);
                    }
                }
                // image upload
                $images = $request->files->get('productImages');
                foreach ($images as $image)
                {
                    $extension = $image->getClientOriginalExtension();
                    $fileName = mt_rand(000000,111111).'_'.time().'.'.$extension;
                    $path = $image->move('uploads/ProductImage',$fileName);
                    $data[] = $fileName;
                }
                $product->product_images = $data;
                $product->save();
                return redirect()->back()->withErrors([
                    'success' => 'Successfully Product Updated With Images.',
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
        $product = Product::findOrfail($id);
        //Existing Image Deleted
        if($product->product_images != '') {
            foreach ($product->product_images as $image) {
              unlink('uploads/ProductImage/'.$image);
            }
        }
        $product->delete();
        return redirect()->back()->withErrors([
            'success' => 'Successfully Product Deleted.',
        ]);
    }
}
