<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Category;
use App\SubCategory;
use App\CategoryType;
use Response;
use Session;

class VendorSubcategoryController extends Controller
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
        $subcategories = SubCategory::orderBy('created_at', 'DESC')->get();
        return view('vendor.pages.subCategory.index')->with('subcategories', $subcategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCategory = Category::orderBy('created_at', 'DESC')->get();
        return view('vendor.pages.subCategory.create')->with('allCategory', $allCategory);
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
            "category.required" => "Category is Required.",
            "subcategory_name.required" => "Subcategory name is Required.",
        ];

        // validate the form data
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'subcategory_name' => 'required',
        ], $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $subcategory = new SubCategory;
            $subcategory->vendor_id=Session::get('vendorId');
            $subcategory->category_id = $request->input('category');
            $subcategory->subcategory_name = $request->input('subcategory_name');
            $subcategory->subcategory_details = $request->input('subcategory_details');
            $subcategory->save();
            return redirect()->back()->withErrors([
                'success' => 'New Subcategory Created.',
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
        $subcategory = SubCategory::find($id);
        $category = Category::where('id', $subcategory->category_id)->first();
        return view('vendor.pages.subCategory.view')->with('subcategory', $subcategory)->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $allCategory = Category::orderBy('created_at', 'DESC')->get();
        $subcategory = SubCategory::find($id);
        return view('vendor.pages.subCategory.edit')->with('subcategory', $subcategory)->with('allCategory', $allCategory);
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
            "category.required" => "Category is Required.",
            "subcategory_name.required" => "Subcategory name is Required.",
        ];

        // validate the form data
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'subcategory_name' => 'required',
        ], $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $subcategory = SubCategory::find($id);
            $subcategory->category_id = $request->input('category');
            $subcategory->subcategory_name = $request->input('subcategory_name');
            $subcategory->subcategory_details = $request->input('subcategory_details');
            $subcategory->save();
            return redirect()->back()->withErrors([
                'success' => 'Successfully Sub-Category Updated.',
            ]);
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
        $subcategory = SubCategory::find($id);
        $subcategory->delete();
        return redirect()->back()->withErrors([
            'success' => 'Successfully Sub-Category Deleted.',
        ]);
    }

    public function loadSubCategory($category_name)
    {
        $category = Category::where('category_name', $category_name)->first();
        $subcategories = SubCategory::where('category_id', $category->id)->get();
        if(count($subcategories)>0) {
            return response()->json($subcategories);
        } else {
            $msg = "OKK";
            return response()->json(array('msg'=> $msg), 200);
        }

    }

    public function loadItemSubCategoryWithItemType($category_id)
    {
        $category = Category::find($category_id);
        $categoryType = CategoryType::where('id', $category->category_type)->first();
        $subcategories = SubCategory::where('category_id', $category_id)->get();
        return response()->json(['subcategories' => $subcategories, 'categoryType' => $categoryType]);
    }

}
