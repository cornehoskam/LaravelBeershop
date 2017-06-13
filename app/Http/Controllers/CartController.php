<?php

namespace App\Http\Controllers;

use App\categorie;
use App\product;
use App\cart;
use App\sub_categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{

    public function index()
    {
        $cart = cart::where('user_id', Auth::user()->id)->get();
        foreach($cart as $cartitem){
            $cartitem->product = product::find($cartitem->product_id);
        }
        return view('cart', compact('cart'));
    }

    public function addToCart(Request $request){
        $user = Auth::user()->id;
        $product =  $request->input('product_id');
        $oldItem = cart::where('product_id', $product)
                        ->where('user_id', $user)
                        ->first();
        $amount = $request->input('amount');
        if($oldItem != null)
        {
            $amount += $oldItem->amount;
        }
        $cartItem = cart::updateOrCreate(
            ['product_id' => $product, 'user_id' => $user],
            ['amount' => $amount]
        );
       return CartController::index();
        }
}
