<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\product;

class ProductController extends Controller
{
    public function index()
    {
        $products = product::all();

        return view('admin/products', compact('products'));
    }

   public function delete(Request $request){

       if ($request->has('delete')) {
           $ids = $request->input('delete');
           foreach($ids as $id) {
               product::where("id", "=", $id)->delete();
           }
       }
       return ProductController::index();
   }
}

