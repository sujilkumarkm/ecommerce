<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Category;
use DB;
class CategoryController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function  Category()
    {
        // echo "hello category";
        $category = Category::all();
        return view('admin.category.category',compact('category')) ;
    }
    public function StoreCategory(Request $request)
    {
        $validateData = $request->validate([

            'category_name' => 'required|unique:categories|max:255',

         ]);

            // $data=array();
            // $data['category_name'] = $request->category_name;
            // DB::table('categories')->insert($data);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->save();

            $notification=array(
                'messege'=>'Category Successfully Added',
                'alert-type'=>'success'
                 );
             return Redirect()->back()->with($notification); 
    }
    public function DeleteCategory($id)
    {
        DB::table('categories')->where('id',$id)->delete();
        $notification=array(
                'messege'=>'Category deleted Successfully',
                'alert-type'=>'success'
                 );
             return Redirect()->back()->with($notification); 
    }
    public function EditCategory($id)
    {
        $category = DB::table('categories')->where('id', $id)->first();
        return view('admin.category.edit_category',compact('category'));

    }
    public function UpdateCategory(Request $request, $id)
    {   
         $validateData = $request->validate([

            'category_name' => 'required|max:255',

         ]);
         $data=array();
         $data['category_name'] = $request->category_name;
         $updates=DB::table('categories')->where('id',$id)->update($data);


        if($updates)
        {
            $notification=array(
                'message' => 'Category updated Successfully' ,
                'alert-type' => 'success'
            );
            return Redirect()->route('categories')->with($notification);
        }else
        {    $notification=array(
             'message' => 'Nothing to update' ,
             'alert-type' => 'error'
             );
             return Redirect()->route('categories')->with($notification);

        }
    }
}
