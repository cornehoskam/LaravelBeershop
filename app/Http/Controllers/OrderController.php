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
        app('App\Http\Controllers\CartController')->delete($cart);

        return view('paymentPage');
    }

    public function createOrUpdate()
    {
        $order = order::updateOrCreate(
//            ['id' => $request->input('id')],
//            ['name' => $request->input('name'),
//                'price' => $request->input('price'),
//                'alcohol_contents' => $request->input('alcohol_contents'),
//                'contents_ml' => $request->input('contents_ml'),
//                'parent_category' => $request->input('parent_category'),
//                'parent_sub_category' => $request->input('parent_sub_category'),
//                'description' => $request->input('description'),
//                'image_url' => $filename]
        );
    }
}
