<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Session;
use DB;

class CouponController extends Controller
{
	public function Coupon(Request $request)
    {
        $coupon = $request->coupon;
        $check = DB::table('coupons')->where('coupon',$coupon)->first();
        if($check)
        {
            Session::put('coupon',[

                'name' => $check->coupon,
                'discount' => $check->discount,
                'balance' => Cart::Subtotal()-$check->discount,

                ]);

                $notification=array(
                'messege'=>'Coupon applied successfully',
                'alert-type'=>'success'
                 );
               return Redirect()->back()->with($notification);

            

        }
        else
        {
            $notification=array(
                'messege'=>'Invalid coupon',
                'alert-type'=>'warning'
                 );
               return Redirect()->back()->with($notification);
        }
    }
    public function removeCoupon()
    {
    	Session::forget('coupon');
    	 $notification=array(
                'messege'=>'Coupon removed successfully',
                'alert-type'=>'warning'
                 );
               return Redirect()->back()->with($notification);
    }
}
