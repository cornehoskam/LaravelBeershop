<?php

namespace App\Http\Controllers\Admin;

use App\categorie;
use App\product;
use App\sub_categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class SubcategoryController extends Controller
{
   public function delete($id){
       sub_categorie::where("id", "=", $id)->delete();
       return CategoryController::showCategory($request->input('parent_id'))->withErrors(['success', 'Sub category is deleted']);;
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
           return CategoryController::showCategory($request->input('parent_id'))->withErrors(['error', "One or more required fields were left empty: ". join(', ', $empty)]);
       }
       else{
       $subcategory = sub_categorie::updateOrCreate(
           ['id' => $request->input('id')],
           ['name' => $request->input('name')]
       );
           return CategoryController::showCategory($request->input('parent_id'));
   }}
}

