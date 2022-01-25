<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
    	$pro_data = DB::table('products')
    	->join('categories','products.category_id','categories.id')
    	->join('brands','products.brand_id', 'brands.id')
    	->select('products.*','categories.category_name','brands.brand_name')
    	->get();

    	// return response()->json($pro_data);
    	return view('admin.product.index',compact('pro_data'));

    }
    public function create()
    {
    	$category = DB::table('categories')->get();
    	$brand = DB::table('brands')->get();
    	$subcat = DB::table('subcategories')->get();
    	return view('admin.product.create',compact('category','brand','subcat'));
    }
    public function getSubcat($category_id)
    {
    	//dd($category_id);
    	$cat = DB::table('subcategories')->where('category_id',$category_id)->get();
    	return json_encode($cat);


    }
    public function Store(Request $request)
    {
    	$data = array();
    	$data['product_name'] = $request->product_name;
    	$data['product_code'] = $request->product_code;
    	$data['discount_price'] = $request->discount_price;
    	$data['product_quantity'] = $request->product_quantity;
      $data['discount_price'] = $request->discount_price;
    	$data['category_id'] = $request->category_id;
    	$data['subcategory_id'] = $request->subcategory_id;
    	$data['brand_id'] = $request->brand_id;
    	$data['product_size'] = $request->product_size;
    	$data['product_color'] = $request->product_color;
    	$data['selling_price'] = $request->selling_price;
    	$data['product_detail'] = $request->product_detail;
    	$data['video_link'] = $request->video_link;
    	$data['main_slider'] = $request->main_slider;
    	$data['hot_deal'] = $request->hot_deal;
    	$data['best_rated'] = $request->best_rated;
    	$data['trend'] = $request->trend;
    	$data['mid_slider'] = $request->mid_slider;
    	$data['hot_new'] = $request->hot_new;
      $data['buyone'] = $request->buyone;
    	$data['status'] = 1;

    	$image_one = $request->image_one;
    	$image_two = $request->image_two;
    	$image_three = $request->image_three;

    	// return response()->json($data);   test of json 
    	if ($image_one && $image_two && $image_three) 
    	{
    		$image_one_name = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
    		Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
    		$data['image_one'] = 'public/media/product/'.$image_one_name;
  
    		$image_two_name = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
    		Image::make($image_two)->resize(300,300)->save('public/media/product/'.$image_two_name);
    		$data['image_two'] = 'public/media/product/'.$image_two_name;

    		$image_three_name = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
    		Image::make($image_three)->resize(300,300)->save('public/media/product/'.$image_three_name);
    		$data['image_three'] = 'public/media/product/'.$image_three_name;

    		$product = DB::table('products')->insert($data);
    		$notification=array(
             'message' => 'Product Inserted Successfully' ,
             'alert-type' => 'success'
             );
             return Redirect()->back()->with($notification);


    	}

    }
    public function Inactive($id)
    {
		DB::table('products')->where('id',$id)->update(['status'=>0]);
		$notification=array(
             'message' => 'Product switched to innactive state' ,
             'alert-type' => 'warning'
             );
             return Redirect()->back()->with($notification);
    }
    public function Active($id)
    {
    	DB::table('products')->where('id',$id)->update(['status'=>1]);
		$notification=array(
             'message' => 'Product switched to active state' ,
             'alert-type' => 'success'
             );
             return Redirect()->back()->with($notification);
    }
    public function DeleteProduct($id)
    {
    	$product = DB::table('products')->where('id',$id)->first();
    	$image1 = $product->image_one;
    	$image2 = $product->image_two;
    	$image3 = $product->image_three;


    	// dd($image2);
    	unlink($image1);
    	unlink($image2);
    	unlink($image3);

    	DB::table('products')->where('id',$id)->delete();

    	$notification=array(
             'message' => 'Product Successfully deleted' ,
             'alert-type' => 'success'
             );
             return Redirect()->back()->with($notification);
    }
    public function ViewProduct($id)
    {
    	$view_data = DB::table('products')
	    	->join('categories','products.category_id','categories.id')
	    	->join('subcategories','products.subcategory_id','subcategories.id')
	    	->join('brands','products.brand_id', 'brands.id')
	    	->select('products.*','categories.category_name','brands.brand_name',
	    	'subcategories.subcategory_name')
    	->where('products.id',$id)->first();

    	// return response()->json($view_data);
    	return view('admin.product.show',compact('view_data'));
    }
    public function EditProduct(Request $request, $id)
    {
	    	$edit_data = DB::table('products')
		    	->join('categories','products.category_id','categories.id')
		    	->join('subcategories','products.subcategory_id','subcategories.id')
		    	->join('brands','products.brand_id', 'brands.id')
		    	->select('products.*','categories.category_name','brands.brand_name',
		    	'subcategories.subcategory_name')
	    	->where('products.id',$id)->first();

    	   // return response()->json($view_data);
    	   	return view('admin.product.edit',compact('edit_data'));
    }
    public function UpdateProductWithoutPhoto(Request $request,$id)
    {
    	$data = array();
    	$data['product_name'] = $request->product_name;
    	$data['product_code'] = $request->product_code;
    	$data['discount_price'] = $request->discount_price;
    	$data['product_quantity'] = $request->product_quantity;
    	$data['category_id'] = $request->category_id;
    	$data['subcategory_id'] = $request->subcategory_id;
    	$data['brand_id'] = $request->brand_id;
    	$data['product_size'] = $request->product_size;
    	$data['product_color'] = $request->product_color;
    	$data['selling_price'] = $request->selling_price;
    	$data['product_detail'] = $request->product_detail;
    	$data['video_link'] = $request->video_link;
    	$data['main_slider'] = $request->main_slider;
    	$data['hot_deal'] = $request->hot_deal;
    	$data['best_rated'] = $request->best_rated;
    	$data['trend'] = $request->trend;
    	$data['mid_slider'] = $request->mid_slider;
    	$data['hot_new'] = $request->hot_new;
      $data['buyone'] = $request->buyone;
    	$data['status'] = 1;
    	//dd($data);
    	//return response()->json($data);
    	$update = DB::table('products')->where('id',$id)->update($data);
    	if($update)
    	{
    		$notification=array(
             'message' => 'Product Updated Successfully' ,
             'alert-type' => 'success'
             );
             return Redirect()->route('all.product')->with($notification);
        }
        else
        {	
        	$notification=array(
        	'message' => 'Ohh .... Nothing to Update' ,
            'alert-type' => 'warning'
            );
            return Redirect()->route('all.product')->with($notification);
        }	
    }
    public function UpdateProductWithPhoto(Request $request,$id)
    {
    	$old_one = $request->old_one;
    	$old_two = $request->old_two;
    	$old_three = $request->old_three;

        $data = array();

        $image_one = $request->file('image_one');
        $image_two = $request->file('image_two');
        $image_three = $request->file('image_three');
        //dd($image);
        if ($request->has('image_one')) 
    	{
    		
    	    $image_one_name = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
    		Image::make($image_one)->resize(300,300)->save('public/media/product/'.$image_one_name);
    		$data['image_one'] = 'public/media/product/'.$image_one_name;
    		$product = DB::table('products')->where('id',$id)->update($data);
  			unlink($old_one);
  			$notification=array(
             'message' => 'Image 1 updated Successfully' ,
             'alert-type' => 'success'
             );
             return Redirect()->back()->with($notification);
  		}
  		if ($request->has('image_two')) 
    	{
    		$image_two_name = hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
    		Image::make($image_two)->resize(300,300)->save('public/media/product/'.$image_two_name);
    		$data['image_two'] = 'public/media/product/'.$image_two_name;
    		$product = DB::table('products')->where('id',$id)->update($data);
  			unlink($old_two);
  			$notification=array(
             'message' => 'Image 2 updated Successfully' ,
             'alert-type' => 'success'
             );
             return Redirect()->back()->with($notification);
         }
    	 if ($request->has('image_three')) 
    	 {
    		$image_three_name = hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
    		Image::make($image_three)->resize(300,300)->save('public/media/product/'.$image_three_name);
    		$data['image_three'] = 'public/media/product/'.$image_three_name;
    		$product = DB::table('products')->where('id',$id)->update($data);
  			unlink($old_three);
  			$notification=array(
             'message' => 'Image 3 updated Successfully' ,
             'alert-type' => 'success'
             );
             return Redirect()->back()->with($notification);
         }
          $notification=array(
          'message' => 'Nothing to update' ,
          'alert-type' => 'success');
         return Redirect()->route('all.product')->with($notification);
    }
}
