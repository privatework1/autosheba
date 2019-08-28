<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomFooter;

class CustomFooterController extends Controller
{
   public function addCustomFooter(){
       return view('admin.pages.custom.add_custom');
   }
    public function createCustomFooter(Request $request){
        $customfooter=new CustomFooter();
        $customfooter->description=base64_encode($request->description);
        $customfooter->youtube_link=$request->youtube_link;
        $customfooter->facebook_link=$request->facebook_link;
        $customfooter->twitter_link=$request->twitter_link;
        $customfooter->linkedin_link=$request->linkedin_link;
        $customfooter->save();
    }
    
    public function manageCustomFooter(){
        $footers=CustomFooter::all();
        $footer=$footers[0];
        return view('admin.pages.custom.index',compact('footer'));
        
    }
    
    public function editCustomFooter($id){
        $editcustom=CustomFooter::find($id);
        return view('admin.pages.custom.add_custom',compact('editcustom'));
        
    }

    public function updateCustomFooter(Request $request,$id){
        $customfooter=CustomFooter::find($id);
        $customfooter->description=base64_encode($request->description);
        $customfooter->youtube_link=$request->youtube_link;
        $customfooter->facebook_link=$request->facebook_link;
        $customfooter->twitter_link=$request->twitter_link;
        $customfooter->instagram_link=$request->instagram_link;
        $customfooter->save();
       return redirect('/customsiteList');

    }
}
