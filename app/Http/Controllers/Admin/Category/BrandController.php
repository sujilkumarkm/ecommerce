<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Brand;
use DB;
use Image;

class BrandController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function brand()
    {
        // echo "hello category";
        $brand = Brand::all();
        return view('admin.category.brand',compact('brand'));
    }
    public function StoreBrand(Request $request)
    {
        $validateData = $request->validate([
            'brand_name' => 'required|unique:brands|max:55' ,
        ]);
    	

        $data = array();

        $data['brand_name'] = $request->brand_name;

        $image = $request->file('brand_image');
        //dd($image);
        if($image)
        {
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext; //20_5_4_6.jpg
            $upload_path = 'public/media/brand/';

            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
           
            $data['brand_logo'] = $image_url;
            $brand = DB::table('brands')->insert($data);
            $notification=array(
             'message' => 'Brand Inserted Successfully' ,
             'alert-type' => 'success'
             );
             return Redirect()->back()->with($notification);
        }
        else
        {
            $brand = DB::table('brands')->insert($data);
            $notification=array(
             'message' => 'Nothing to update' ,
             'alert-type' => 'error'
             );
             return Redirect()->back()->with($notification);
             $notification=array(
                'messege'=>'Brand deleted Successfully',
                'alert-type'=>'success'
                 );
             return Redirect()->back()->with($notification); 
        }
    }
    public function DeleteBrand($id)
    {
    	$data = DB::table('brands')->where('id',$id)->first();
    	$image = $data->brand_logo;
    	unlink($image);
    	$brand=DB::table('brands')->where('id',$id)->delete(); 
        $notification=array(
                'messege'=>'Brand deleted Successfully',
                'alert-type'=>'success'
                 );
             return Redirect()->back()->with($notification); 
    }
    public function EditBrand($id)
    {
    	$brand = DB::table('brands')->where('id', $id)->first();
        return view('admin.category.edit_brand',compact('brand'));
    }
    public function UpdateBrand(Request $request,$id)
    {
    	
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_logo'] = $request->brand_logo;

        $image = $request->brand_image;
        $oldlogo = $request->old_logo;
        $brand_name = $request->brand_name;
        //dd ($oldlogo);
        if ($image)
        {  
            $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('public/media/brand/'.$image_name);
            //dd($image_name);
            $data['brand_logo'] = 'public/media/brand/'.$image_name;
            $brand = DB::table('brands')->where('id',$id)->update($data);
            unlink($oldlogo);
            $notification=array(
             'message' => 'Image updated Successfully' ,
             'alert-type' => 'success'
             );
              return Redirect()->route('brands')->with($notification);
        }
        else
        {
            $brand = DB::table('brands')->where('id',$id)->update(array('brand_name' => $brand_name));
            $notification=array(
             'message' => 'Nothing to update' ,
             'alert-type' => 'error'
             
             ); 
            return Redirect()->route('brands')->with($notification);
        }
    }
}
