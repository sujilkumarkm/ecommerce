<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Model\Admin\Product;
class FrontController extends Controller
{
    public function StoreNewsltr(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required|unique:newsletters|max:55' ,
        ]);
        $data = array();
        $data['email'] = $request->email;
         $data['created_at'] = now();
        DB::table('newsletters')->insert($data);
        $notification=array(
                'messege'=>'New Subcriber Added Successfully',
                'alert-type'=>'success'
                 );
             return Redirect()->back()->with($notification); 
    }

    public function index()
    {
        $slider = DB::table('products')
                    ->join('brands','products.brand_id','=','brands.id')
                    ->select('products.*','brands.brand_name')
                    ->where('main_slider',1)->orderBy('id','DESC')
                    ->first();
        $featured = DB::table('products')
                    ->where('status',1)->orderBy('id','DESC')
                    ->limit(10)->get();
        $trend = DB::table('products')
                    ->where('trend',1)->orderBy('id','DESC')
                    ->limit(10)->get();
         $best = DB::table('products')
                    ->where('best_rated',1)->orderBy('id','DESC')
                    ->limit(10)->get();
                    
          $hot = DB::table('products')
                    ->join('brands','products.brand_id','=','brands.id')
                    ->select('products.*','brands.brand_name')
                    ->where('status',1)->where('hot_deal',1)->orderBy('id','DESC')
                    ->limit(3)->get();
          $mid = DB::table('products')
                    ->join('brands','products.brand_id','=','brands.id')
                    ->select('products.*','brands.brand_name')
                    ->where('status',1)->where('mid_slider',1)->orderBy('id','DESC')
                    ->first();           
          $cat =    DB::table('products')
                    ->join('categories','products.category_id','=','categories.id')
                    ->join('brands','products.brand_id','=','brands.id')
                    ->select('products.*','brands.brand_name','categories.category_name')
                    ->where('products.mid_slider',1)->orderBy('id','DESC')
                    ->limit(3)->get();
        $cat_list =  DB::table('categories')->first(); //->skip(1) also be used to get from second data



        $cat_prod =  DB::table('products')->where('category_id',$cat_list->id)->where('status',1)->limit(10         )->orderBy('id', 'DESC')->get();
        $cat_li1 =  DB::table('categories')->skip(1)->first(); // also be used to get from second data

           

        $cat_pr1 =  DB::table('products')->where('category_id',$cat_li1->id)->where('status',1)->limit(10         )->orderBy('id', 'DESC')->get();

        $buy = DB::table('products')
                    ->join('brands','products.brand_id','=','brands.id')
                    ->select('products.*','brands.brand_name')
                    ->where('status',1)->where('buyone',1)->orderBy('id','DESC')
                    ->limit(6)->get();


                    // Returning View to index Page
                    return view('pages.index',compact('slider','featured','trend',
                                'best','hot','mid','cat','cat_list','cat_prod','cat_li1','cat_pr1','buy'));           
    }
}
