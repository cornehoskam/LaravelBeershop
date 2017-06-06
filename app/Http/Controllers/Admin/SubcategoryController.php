<?php

namespace App\Http\Controllers\Admin;

use App\sub_categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class SubcategoryController extends Controller
{
   public function delete($id){
       $parent_id = sub_categorie::find($id)->parent_category;
      sub_categorie::where("id", "=", $id)->delete();
      return app('App\Http\Controllers\Admin\Categorycontroller')->showCategory($parent_id)->withErrors(['success', 'Sub category is deleted']);;
   }

   public function createOrUpdate(Request $request){

       $names = $request->input('name');

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
           return app('App\Http\Controllers\Admin\Categorycontroller')->withErrors(['error', "One or more required fields were left empty: ". join(', ', $empty)]);
       }
       else{
           foreach($names as $name){
       $subcategory = sub_categorie::updateOrCreate(
           ['id' => array_search($name,$names)],
           ['name' => $name]
       );}
           $parent_id = sub_categorie::find(array_search($name,$names))->parent_category;
           return app('App\Http\Controllers\Admin\Categorycontroller')->showCategory($parent_id)->withErrors(['success', 'Sub category is edited']);
   }}
}

