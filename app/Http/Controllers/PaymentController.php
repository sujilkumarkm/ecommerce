<?php

namespace App\Http\Controllers;
use Cart;
use Session;


use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function PaymentPage()
    {
    	$cart = Cart::Content();
    	return view('pages.payment',compact('cart'));
    }
}
