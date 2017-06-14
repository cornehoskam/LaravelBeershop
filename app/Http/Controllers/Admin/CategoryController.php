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
           return CategoryController::showCategory( $request->input('id'))->withErrors(['error', "One or more required fields were left empty: ". join(', ', $empty)]);
       }
       else{
           $newName = str_replace(" ", "_", $request->input('name'));
       $category = categorie::updateOrCreate(
           ['id' => $request->input('id')],
           ['name' =>$newName]
       );
           return CategoryController::index();
   }}
}

