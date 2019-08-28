<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use Image;
use DB;

class BannerController extends Controller
{
    public function addBanner(){
        return view('admin.pages.banner.add_banner');
    }

    public function createBanner(Request $request){

        $image = $request->file('image');
        $banner=new Banner();

        $imageName =time().$image->getClientOriginalName();
        $directory ='uploads/banners/';
        $imageUrl = $directory.$imageName;
        Image::make($image)->resize(200, 200)->save($imageUrl);

        $banner->title=$request->title;
        $banner->type=$request->type;
        $banner->description=$request->description;
        $banner->banner_image=$imageUrl;
        $banner->save();

       if($request->active_image!=""){
          $up_id= DB::table('banners')->where('id',$banner->id)->update(['active_image'=>1]);
          $alldata=DB::table('banners')->where('id','!=',$banner->id)->update(['active_image'=>0]);

       }
        return redirect()->back()->withErrors([
            'success' => 'New Data Added.',
        ]);

    }
    
    public function manageBanner(){
        $banners=Banner::all();
        return view('admin.pages.banner.index',compact('banners'));
    }
    
    public function editBanner($id){
        $editbanner=Banner::find($id);
        return view('admin.pages.banner.add_banner',compact('editbanner'));
        
    }
    public function updateBanner(Request $request,$id){
        $banner=Banner::find($id);
        if(!empty($request->file('image'))){
            if ($banner->banner_image!=""){
                unlink($banner->banner_image);
            }
            $image = $request->file('image');
            $imageName =time().$image->getClientOriginalName();
            $directory ='uploads/banners/';
            $imageUrl = $directory.$imageName;
            Image::make($image)->resize(200, 200)->save($imageUrl);

        }
        else{
            $imageUrl=$banner->banner_image;
        }
        $banner->title=$request->title;
        $banner->type=$request->type;
        $banner->description=$request->description;
        $banner->banner_image=$imageUrl;
        $banner->save();
        if($request->active_image!=""){
            $up_id= DB::table('banners')->where('id',$banner->id)->update(['active_image'=>1]);
            $alldata=DB::table('banners')->where('id','!=',$banner->id)->update(['active_image'=>0]);

        }

        return redirect()->back()->withErrors([
            'success' => 'Data Updated.',
        ]);

    }

    public function deleteBanner($id){
        $banner=Banner::find($id);
        if ($banner->banner_image!=""){
            unlink($banner->banner_image);
            $banner->delete();
            return redirect()->back()->withErrors([
                'success' => 'Data Deleted.',
            ]);
        }
    }

}
