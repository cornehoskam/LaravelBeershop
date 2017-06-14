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

    public function delete($ids){
            foreach($ids as $id) {
                cart::where("id", "=", $id)->delete();
            }
    }

    public function addToCart(Request $request){
        $user = Auth::user()->id;
        $product =  $request->input('product_id');
        $oldItem = cart::where('product_id', $product)
                        ->where('user_id', $user)
                        ->first();
        $amount = $request->input('amount');
        if ($request->has('delete')) {
            CartController::delete(array($oldItem->id));
            return CartController::index();
        }
        else if ($request->has('remove')) {
            if($oldItem->amount > 1){
            $amount = $oldItem->amount -1;}
            else{
                CartController::delete(array($oldItem->id));
                return CartController::index();
            }
        }
        else if ($request->has('add')) {
            $amount = $oldItem->amount +1;
        }
        else if($oldItem != null)
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
