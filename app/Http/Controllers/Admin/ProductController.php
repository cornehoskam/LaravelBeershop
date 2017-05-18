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

   public function showProduct($id=null){
      $product = product::find($id);
       return view('admin/product', compact('product'));
   }

   public function createOrUpdate(Request $request){
       $product = product::updateOrCreate(
           ['id' => $request->input('id')],
           ['name' => $request->input('name'),
               'price' => $request->input('price'),
               'alcohol_contents' => $request->input('alcohol'),
               'contents_ml' => $request->input('contents'),
               'parent_category' => $request->input('category'),
               'description' => $request->input('description'),
               'image_url' => 'null']                               //todo image uploading
       );

   }
}

