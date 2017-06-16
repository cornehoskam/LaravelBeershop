<?php

namespace App\Http\Controllers\Admin;

use App\order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\product;
use DB;
class OrderController extends Controller
{
    public function index()
    {
        $orders = array();
        $order_ids = DB::table('orders')
            ->select('order_id')
            ->groupBy('order_id')
            ->get();
        foreach($order_ids as $order_id){
            $order = order::where('order_id', '=', $order_id->order_id)->first();
            $order->products = array();
            $product_ids = DB::table('orders')
                            ->select('product_id', 'product_amount')
                            ->where('order_id', $order->order_id)
                            ->get();
            foreach($product_ids as $product_id){
                $product = product::find($product_id->product_id);
                $product->amount = $product_id->product_amount;
                $order->products = array_merge($order->products,array($product));
            }
            array_push($orders, $order);
        }
        return view('admin/orders', compact('orders'));
    }

   public function delete(Request $request){

       if ($request->has('delete')) {
           $ids = $request->input('delete');
           foreach($ids as $id) {
               order::where("order_id", "=", $id)->delete();
           }
       }
       return OrderController::index()->withErrors(['success', 'Order is deleted']);
   }
}

