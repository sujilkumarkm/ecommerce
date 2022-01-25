<?php

namespace App\Http\Controllers\Admin;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use Carbon;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');   
    }
    public function BlogCatList()
    {
    	$blogcat = DB::table('post_category')->get();
    	return view('admin.blog.category.index', compact('blogcat'));
    }
    public function StoreBlog(Request $request)
    {
    	$validateData = $request->validate([
    		'category_name_en'=> 'required|max:255',
    		'category_name_in'=> 'required|max:255',
    	]);

    	$data = array();
    	$data['category_name_en'] = $request->category_name_en;
    	$data['category_name_in'] = $request->category_name_in;
    	DB::table('post_category')->insert($data);
    	$notification=array(
             'message' => 'category Inserted Successfully' ,
             'alert-type' => 'success' 
             );
             return Redirect()->back()->with($notification);

    }
    public function EditBlog($id)
    {
    	$editblogcat = DB::table('post_category')->where('id',$id)->get();
    	return view('admin.blog.category.edit',compact('editblogcat'));
    }
    public function UpdateBlog(Request $request, $id)
    {
    	$data = array();
    	$data['category_name_en'] = $request->category_name_en;
    	$data['category_name_in'] = $request->category_name_in;
    	DB::table('post_category')->where('id',$id)->update($data);
    	$notification=array(
             'message' => 'category Updated Successfully' ,
             'alert-type' => 'success' 
             );
             return Redirect()->back()->with($notification);
    }
    public function DeleteBlog($id)
    {
    	DB::table('post_category')->where('id',$id)->delete();
    	$notification=array(
             'message' => 'category Updated Successfully' ,
             'alert-type' => 'warning' 
             );
             return Redirect()->route('add.blog.category_list')->with($notification);
    }
    public function index()
    {
    	$post = DB::table('posts')
    	->join('post_category','posts.category_id','post_category.id')
    	->select('posts.*','post_category.category_name_en')->get();
    	return view('admin.blog.index',compact('post'));
    	// return response()->json($post);
    }
    public function CreatePost(Request $request)
    {
    	$blogcategory = DB::table('post_category')->get();
    	return view('admin.blog.create',compact('blogcategory'));

    }
    public function StorePost(Request $request)
    {
    	
    	$data = array();
    	$data['category_id'] = $request->category_id;
    	$data['post_title_en'] = $request->post_title_en;
    	$data['post_title_in'] = $request->post_title_in;
    	$data['post_image'] = $request->post_image;
    	$data['details_en'] = $request->details_en;
    	$data['details_in'] = $request->details_in;
    	// dd($data);
    	$image_one = $request->post_image;
    	$image_one_name = hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
    		Image::make($image_one)->resize(400,200)->save('public/media/post/'.$image_one_name);
    	$data['post_image'] = 'public/media/post/'.$image_one_name;
    	$post = DB::table('posts')->insert($data);
    	$notification=array(
             'message' => 'Post category Inserted Successfully' ,
             'alert-type' => 'success' 
             );
             return Redirect()->route('add.blog.post')->with($notification);
    }
    public function DeletePost($id)
    {
        $post = DB::table('posts')->where('id',$id)->first();
        $image = $post->post_image;
        DB::table('posts')->where('id',$id)->delete();
        unlink($image); 
        $notification=array(
                'messege'=>'New Subcriber Added Successfully',
                'alert-type'=>'success'
                 );
        return Redirect()->route('add.blog.post')->with($notification);
    }
    public function EditPost($id)
    {
        $data = DB::table('posts')->where('id',$id)->first();
        return view('admin.blog.edit',compact('data'));
    }
    public function UpdatePost(Request $request, $id)
    {
        $data = array();
        $data['category_id'] = $request->category_id;
        $data['post_title_en'] = $request->post_title_en;
        $data['post_title_in'] = $request->post_title_in;
        
        $data['details_en'] = $request->details_en;
        $data['details_in'] = $request->details_in;

        $data['post_image'] = $request->post_image;
        $image = $request->post_image;
        $oldlogo = $request->old_image;
        $brand_name = $request->brand_name;
        //dd ($oldlogo);
        if ($image)
        {  
            $image_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('public/media/post/'.$image_name);
            //dd($image_name);
            $data['post_image'] = 'public/media/post/'.$image_name;
            $brand = DB::table('posts')->where('id',$id)->update($data);
            unlink($oldlogo);
            $notification=array(
             'message' => 'Image updated Successfully' ,
             'alert-type' => 'success'
             );
              return Redirect()->route('add.blog.post')->with($notification);
        }
        else
        {
            $updateDetails = [
                            'category_id' => $request->get('category_id'),
                            'post_title_en' => $request->get('post_title_en'),
                            'post_title_in' => $request->get('post_title_in'),
                            'details_en' => $request->get('details_en'),
                            'details_in' => $request->get('details_in'),
                            'updated_at' => now()
                            ];

                DB::table('posts')->where('id', $id)
                ->update($updateDetails);
                $notification=array(
             'message' => 'Update finished keeping same image' ,
             'alert-type' => 'warning'
             
             ); 
            return Redirect()->route('add.blog.post')->with($notification);
        }
    }
}
