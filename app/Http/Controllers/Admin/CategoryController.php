<?php

namespace App\Http\Controllers\Admin;

use App\categorie;
use App\product;
use App\sub_categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class CategoryController extends Controller
{
    public function index()
    {
        $categories = categorie::all();
        return view('admin/categories', compact('categories'));
    }

   public function delete(Request $request){

       if ($request->has('delete')) {
           $ids = $request->input('delete');
           foreach($ids as $id) {
              $products = product::where("parent_category", "=", $id)->get();
              $subcats = sub_categorie::where("parent_category", "=", $id)->get();
              foreach($products as $product){
                  $product->parent_category = null;
               }
               foreach($subcats as $subcat){
                   $subcat->parent_category = null;
               }
               categorie::where("id", "=", $id)->delete();
           }
       }
       return CategoryController::index()->withErrors(['success', 'Category is deleted']);;
   }

   public function showCategory($id=null){
       $category = categorie::find($id);
       $sub_categories = sub_categorie::where('parent_category', $id)->get();
       return view('admin/category', compact(['category','sub_categories']));
   }

   public function createOrUpdate(Request $request){
       $required = array ('name');
       $empty = array();
       $error = false;

       foreach ( $required as $field ) {
            if (empty ( $request->input($field) )) {
                array_push($empty,$field);
                $error = true;
               }
            }
       if($error == true){
           return CategoryController::showCategory(null)->withErrors(['error', "One or more required fields were left empty: ". join(', ', $empty)]);
       }
       else{
       $category = categorie::updateOrCreate(
           ['id' => $request->input('id')],
           ['name' => $request->input('name')]
       );
           return CategoryController::index();
   }}
}

