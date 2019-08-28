<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Category;
use App\CategoryType;
use App\Company;
use App\Product;
use Response;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = array(
            'categories' => Category::all()->count(),
            'companies' => Company::all()->count(),
            'products' => Product::all()->count(),
        );
        return view('admin.pages.index')->with($data);
    }

    public function loadCategoryTypeForm()
    {
      $returnHTML = view('admin.pages.categoryType.loadCategoryTypeForm')->render();
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
        $categoryType->category_type = $request->input('category_type');
        $categoryType->save();
        $response = array(
          'id' => $categoryType->id,
          'category_type' => $request->input('category_type'),
        );
        return Response::json($response);
      }
    }
}
