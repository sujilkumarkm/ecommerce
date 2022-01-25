<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class NewsletterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function newsLetter()
    {
    	$newsltr = DB::table('newsletters')->get();
    	return view('admin.coupon.newsltr',compact('newsltr'));
    }
    public function DeleteNewsltr($id)
    {
    	DB::table('newsletters')->where('id',$id)->delete();
        $notification=array(
                'messege'=>'Subscription Removed Successfully',
                'alert-type'=>'warning'
                 );
             return Redirect()->back()->with($notification); 
    }


}
