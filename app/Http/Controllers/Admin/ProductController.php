<?php

namespace App\Http\Controllers\Admin;

use App\categorie;
use App\sub_categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\product;
use App\Http\Controllers\FileController;
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
       return ProductController::index();
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
       $required = array ('name','price', 'alcohol_contents','contents_ml','parent_category');
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
           return ProductController::showProduct(null,$request,"One or more required fields were left empty: ". join(', ', $empty));
       }
       else{
       $product = product::updateOrCreate(
           ['id' => $request->input('id')],
           ['name' => $request->input('name'),
               'price' => $request->input('price'),
               'alcohol_contents' => $request->input('alcohol_contents'),
               'contents_ml' => $request->input('contents_ml'),
               'parent_category' => $request->input('parent_category'),
               'parent_sub_category' => $request->input('parent_sub_category'),
               'description' => $request->input('description'),
               'image_url' => $filename]
       );
           return ProductController::index();
   }}
}

