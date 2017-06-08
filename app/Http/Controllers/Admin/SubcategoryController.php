<?php

namespace App\Http\Controllers\Admin;

use App\sub_categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;
class SubcategoryController extends Controller
{
    public function showSubCategory($id){
        $parent_id = $id;
        return view('admin/subcategory', compact('parent_id'));
    }

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
            if(is_array($request->input($field))){
                foreach($request->input($field) as $singleField){
                    if(empty($singleField)){
                        array_push($empty,$field);
                        $error = true;
                    }
                }
            }
            else{
            if (empty ( $request->input($field) )) {
                array_push($empty,$field);
                $error = true;
            }}
        }
        if($error == true){
            return back()->withErrors(['error', "One or more required fields were left empty: ". join(', ', $empty)]);
        }
        else{
            if(is_array($names)) {
                foreach ($names as $name) {
                    $subcategory = sub_categorie::updateOrCreate(
                        ['id' => array_search($name, $names)],
                        ['name' => $name]
                    );
                }
                $parent_id = sub_categorie::find(array_search($name, $names))->parent_category;
                return app('App\Http\Controllers\Admin\Categorycontroller')->showCategory($parent_id)->withErrors(['success', 'Sub category is edited']);
            }
            else{
                $subcategory = new sub_categorie();
                $subcategory->name = $names;
                $subcategory->parent_category = $request->input('parent_id');
                $subcategory->save();
                return app('App\Http\Controllers\Admin\Categorycontroller')->showCategory($request->input('parent_id'))->withErrors(['success', 'Sub category is added']);
            }
        }}
}

