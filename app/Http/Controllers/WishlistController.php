<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class WishlistController extends Controller
{
    public function addWishlist($id)
    {
    	$userid = Auth::id();
    	$check = DB::table('wishlists')->where('user_id',$userid)->where('product_id', $id)->first();
    	$data = array(

    	'user_id' => $userid,
    	'product_id' => $id,

    	);

    	if (Auth::check()) {
    		if ($check) {
    			return \Response::json(['error'=> 'Product already present in wishlist']);
    		}else
    		{
    			DB::table('wishlists')->insert($data);
    			return \Response::json(['success'=> 'Product successfully added to wishlist']);
    		}
    	}else
    	{
    		return \Response::json(['error'=> 'Login first to make wishlist']);
    	}
    }
}
