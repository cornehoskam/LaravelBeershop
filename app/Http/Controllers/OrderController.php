<?php

namespace App\Http\Controllers;

use App\order;
use Illuminate\Http\Request;
use Auth;
use App\cart;
use App\product;
use App\User;

class OrderController extends Controller
{

    public function index(){
       $user = User::find(Auth::user()->id) ;
        $cart = cart::where('user_id', $user->id)->get();
        foreach($cart as $cartitem){
            $cartitem->product = product::find($cartitem->product_id);
        }
       return view('placeOrder', compact('user','cart'));
    }

    public function details()
    {
        $user = User::find(Auth::user()->id) ;
        return view('orderDetails', compact('user'));
    }

    public function payment(){
        $user = User::find(Auth::user()->id) ;
        $cart = cart::where('user_id', $user->id)->pluck('id')->toArray();
        OrderController::create($cart);
        app('App\Http\Controllers\CartController')->delete($cart);
        return view('paymentPage');
    }

    public function create($cart)
    {
        $alreadyExists = true;
        while($alreadyExists){
            $order_id = rand(0,10000);

            $alreadyExists = order::where('order_id', $order_id)->exists();
        }
        foreach($cart as $cartItem){
            $order = new order;
            $order->user_id = Auth::user()->id;
            $order->cart_id = $cartItem;
            $order->order_id = $order_id;
            $order->status = "Waiting for Payment";
            $order->save();
        }
    }
}
