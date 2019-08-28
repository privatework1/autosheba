<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Brand;
use Illuminate\Http\Request;
use App\Category;
use App\SubCategory;
use App\Product;
use App\Item;
use Cart;
use Auth;
use App\CustomFooter;
use Session;
use DB;


class SiteController extends Controller
{
  public function index(Request $request)
  {

    $finalorders=DB::Table('orders')->where('order_status',1)->where('delivery_process',1)->get();

    $sliders=Banner::where('type','=','slider')->get();
  
    $banners=Banner::where('type','=','banner')->get();
    $allCategory = Category::orderBy('created_at', 'DESC')->get();
    $brands = Brand::orderBy('created_at', 'DESC')->get();
    $allSubCategory = SubCategory::orderBy('created_at', 'DESC')->get();
    $items = Item::orderBy('created_at', 'DESC')->limit('3')->get();

    return view('site.pages.index')->with('items', $items)->with('allCategory', $allCategory)->with('allSubCategory', $allSubCategory)->with('brands',$brands)->with('sliders',$sliders)->with('finalorders',$finalorders)->with('banners',$banners);
  
  }

  public function itemdetails($id) 
  {
    $allCategory = Category::orderBy('created_at', 'DESC')->get();
    $allSubCategory = SubCategory::orderBy('created_at', 'DESC')->get();
    $item = Item::findOrfail($id);
   
    if($item->item_size!=""){
      $sizes=explode(",",$item->item_size);

    }
    else{
      $sizes=[];
    }


  


    return view('site.pages.itemdetails')->with('allCategory', $allCategory)->with('item', $item)->with('allSubCategory', $allSubCategory)->with('sizes',$sizes);
  }

  public function orderConfirm() {
//    if(Auth::guard('customer')->user()!=''){
//      $cartProducts = Cart::Content();
//      return view('site.pages.order_confirm')->with('cartProducts', $cartProducts);
//    }
//    else{
//      return redirect('/register/customers');
//    }
    if(Session::get('customerId')!=''){
      return redirect('/payment');
    }
    else{
      return redirect('/login/customers');
    }


  }

  public function searchItems(Request $request) {
    $entity = trim($request->input('searchEntity'));

    $allSearchEntity = Item::where('item_name', 'LIKE', '%'.$entity.'%')->get();
    return view('site.pages.searchResult')->with('allSearchEntity', $allSearchEntity);
  }

  public function categoryItems($category) {
    $allCategory = Category::orderBy('created_at', 'DESC')->get();
    $brands = Brand::orderBy('created_at', 'DESC')->get();
    $findCategory = Category::where('category_name', $category)->first();
    $findCategoryItem = Item::where('item_category', $findCategory['id'])->get();
    return view('site.pages.categoryBaseItem')->with('findCategoryItem', $findCategoryItem)->with('categoryName', $category)->with('allCategory',$allCategory)->with('brands',$brands);;

  }

  public function subCategoryItems($category, $subcategory) {
    $allCategory = Category::orderBy('created_at', 'DESC')->get();
    $brands = Brand::orderBy('created_at', 'DESC')->get();
    $findCategory = Category::where('category_name', $category)->first();
    $findSubCategory = SubCategory::where('category_id', $findCategory->id)->where('subcategory_name', $subcategory)->first();
    $findSubCategoryItem = Item::where('item_subcategory', $findSubCategory->id)->get();
    return view('site.pages.subCategoryBaseItem')->with('findSubCategoryItem', $findSubCategoryItem)->with('categoryName', $category)->with('subCategoryName', $subcategory)->with('allCategory',$allCategory)->with('brands',$brands);
  }


  public function searchsubCategoryItems($subcategory) {

    $allCategory = Category::orderBy('created_at', 'DESC')->get();
    $brands = Brand::orderBy('created_at', 'DESC')->get();
    $findCategoryId = SubCategory::where('subcategory_name', $subcategory)->pluck('category_id')->first();
    $findCategory = Category::where('id', $findCategoryId)->first();

    $findSubCategory = SubCategory::where('subcategory_name', $subcategory)->first();
    $findSubCategoryItem = Item::where('item_subcategory', $findSubCategory->id)->get();
    return view('site.pages.subCategoryBaseItem')->with('findSubCategoryItem', $findSubCategoryItem)->with('subCategoryName', $subcategory)->with('allCategory',$allCategory)->with('brands',$brands)->with('findCategory',$findCategory);
  }

  public function brandItems($brand){
    $allCategory = Category::orderBy('created_at', 'DESC')->get();
    $brands = Brand::orderBy('created_at', 'DESC')->get();
    $findbrand = Brand::where('brand_name', $brand)->first();
    $findbrandItem = Item::where('item_brand', $findbrand['id'])->get();
    return view('site.pages.brandBaseItem')->with('findbrandItem', $findbrandItem)->with('allCategory',$allCategory)->with('brands',$brands);;

  }






}
