<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Category;
use App\CategoryType;
use Session;
use App\Vendor;
use Response;
class VendorCategoryController extends Controller
{
    public function __construct()
    {
        if(Session::get('vendorId')==""){
            return redirect('/');
        }
    }

    public function loadCategoryTypeForm()
    {
        $returnHTML = view('vendor.pages.categoryType.loadCategoryTypeForm1')->render();
        return response()->json(array('success' => true, 'html'=>$returnHTML));
    }


    public function saveCategoryType(Request $request)
    {
        $messages = [
            "category_type.required" => "Category Type is Required.",
            "category_type.unique" => "Category Type is Already Exists.",
        ];

        // validate the form data
        $validator = Validator::make($request->all(), [
            'category_type' => 'required|unique:category_types,category_type',
        ], $messages);
        if ($validator->fails()) {
            return response()->json([
                'success' => 'false',
                'errors'  => $validator->errors()->all(),
            ], 400);
        } else {
            $categoryType = new CategoryType;
           
            $categoryType->vendor_id=Session::get('vendorId');
            $categoryType->category_type = $request->input('category_type');
            $categoryType->save();

            return back();
        }
    }







    public function index()
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();
        return view('vendor.pages.category.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCategoryType = CategoryType::orderBy('created_at', 'DESC')->get();
        return view('vendor.pages.category.create')->with('allCategoryType', $allCategoryType);
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
            "category_name.required" => "Category name is Required.",
        ];

        // validate the form data
        $validator = Validator::make($request->all(),[
            'category_name' => 'required',
        ], $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else{
            $category = new Category;
            $category->vendor_id=Session::get('vendorId');
            $category->category_name = $request->input('category_name');
            $category->category_type = $request->input('category_type');
            $category->category_details = $request->input('category_details');
            $category->save();
            return redirect()->back()->withErrors([
                'success' => 'New Category Created.',
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
        $category = Category::find($id);
        $categoryType = CategoryType::where('id', $category->category_type)->first();
        return view('vendor.pages.category.view')->with('category', $category)->with('categoryType', $categoryType);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $allCategoryType = CategoryType::orderBy('created_at', 'DESC')->get();
        return view('vendor.pages.category.edit')->with('category', $category)->with('allCategoryType', $allCategoryType);
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
            "category_name.required" => "Category name is Required.",
        ];

        // validate the form data
        $validator = Validator::make($request->all(), [
            'category_name' => 'required',
        ], $messages);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else{
            $category = Category::find($id);
            $category->category_name = $request->input('category_name');
            $category->category_type = $request->input('category_type');
            $category->category_details = $request->input('category_details');
            $category->save();
            return redirect()->back()->withErrors([
                'success' => 'Category Successfully Updated.',]);
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
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->withErrors([
            'success' => 'Successfully Category Deleted.',
        ]);
    }
}
