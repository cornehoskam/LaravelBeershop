<?php

namespace App\Http\Controllers\Admin;

use App\order;
use App\sub_categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\product;
use App\Http\Controllers\FileController;
use File;
class OrderController extends Controller
{
    public function index()
    {
        $orders = order::all();
        foreach($orders as $order){
            $order->product = product::find($order->product_id);
        }
        return view('admin/orders', compact('orders'));
    }

   public function delete(Request $request){

       if ($request->has('delete')) {
           $ids = $request->input('delete');
           foreach($ids as $id) {
               order::where("id", "=", $id)->delete();
           }
       }
       return OrderController::index()->withErrors(['success', 'Order is deleted']);
   }
}

