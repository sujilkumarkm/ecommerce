<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SubCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function subcategories()
    {
    	$category = DB::table('categories') -> get();
    	$subcat = DB::table('subcategories')
    	->join('categories','subcategories.category_id','categories.id')
    	->select('subcategories.*','categories.category_name')
    	->get();
    	return view('admin.category.subcategory', compact('category','subcat'));
    }
    public function StoreSubCat(Request $request)
    {
    	$validateData = $request->validate([

            'category_id' => 'required',
            'subcategory_name' => 'required'
         ]);
    	$data=array();
    	$data['category_id'] = $request->category_id;
    	$data['subcategory_name'] = $request->subcategory_name;
    	DB::table('subcategories')->insert($data);
    	$notification=array(
                'message' => 'Subcategory inserted Successfully' ,
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);

    }
    public function DeleteSubCat($id)
    {
    	DB::table('subcategories')->where('id',$id)->delete();
        $notification=array(
                'messege'=>'Subcategory deleted Successfully',
                'alert-type'=>'success'
                 );
             return Redirect()->back()->with($notification);
    }
    public function EditSubCat(Request $request, $id)
    {
    	$subcat = DB::table('subcategories')->where('id', $id)->first();
    	$category = DB::table('categories')->get();
        return view('admin.category.edit_subcategory',compact('subcat','category'));
    }
    public function UpdateSubCat(Request $request, $id)
    {
    	$validateData = $request->validate([

            'category_id' => 'required',
            'subcategory_name' => 'required'
         ]);
    	$data=array();
    	$data['category_id'] = $request->category_id;
    	$data['subcategory_name'] = $request->subcategory_name;
    	DB::table('subcategories')->where('id',$id)->update($data);
    	$notification=array(
                'message' => 'Subcategory updated Successfully' ,
                'alert-type' => 'success'
            );
            return Redirect()->route('sub.categories')->with($notification);
    }
}
