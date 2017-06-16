<?php

namespace App\Http\Controllers\Admin;

use App\categorie;
use App\sub_categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\product;
use File;
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
               $imageName = product::find($id)->image_url;
               File::delete(public_path().'/assets/products/'.$imageName);
               product::where("id", "=", $id)->delete();
           }
       }
       return ProductController::index()->withErrors(['success', 'Product is deleted']);
   }

   public function showProduct($id=null, Request $request=null){

       if($id==null){

           $product = $request;
       }
       else {
           $product = product::find($id);
       }
       $categories = categorie::all();
       $sub_categories = sub_categorie::all();
       return view('admin/product', compact(['product','categories','sub_categories']));
   }

   public function createOrUpdate(Request $request, $filename){
       $required = array ('name','price', 'alcohol_contents','contents_ml','parent_category', 'description');
       $empty = array();
       $error = false;

       foreach ( $required as $field ) {
            if (empty ( $request->input($field) )) {
                array_push($empty,$field);
                $error = true;
               }
            }
       if($error == true){
           $request->merge(array('image_url' => $filename));
           return ProductController::showProduct($request->input('id'),$request)->withErrors(['error', "One or more required fields were left empty: ". join(', ', $empty)]);
       }
       else{
           $newName = str_replace(" ", "_", $request->input('name'));
       $product = product::updateOrCreate(
           ['name' => $newName],
           [   'price' => $request->input('price'),
               'alcohol_contents' => $request->input('alcohol_contents'),
               'contents_ml' => $request->input('contents_ml'),
               'parent_category' => $request->input('parent_category'),
               'parent_sub_category' => $request->input('parent_sub_category'),
               'description' => $request->input('description'),
               'image_url' => $filename]
       );
       if($request->input('id') == 0){
           $extension = explode(".", $product->image_url);
           $product->image_url = "product_".$product->id.".".$extension[1];
           $product->save();
           File::move(public_path().'/assets/products/product_0.'.$extension[1], public_path().'/assets/products/product_'.$product->id.'.'.$extension[1]);
       }
           return ProductController::index();
   }}
}

