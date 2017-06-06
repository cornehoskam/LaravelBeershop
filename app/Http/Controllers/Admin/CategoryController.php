<?php

namespace App\Http\Controllers\Admin;

use App\categorie;
use App\sub_categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\product;
use App\Http\Controllers\FileController;
use File;
class CategoryController extends Controller
{
    public function index()
    {
        $categories = categorie::all();
        return view('admin/categories', compact('categories'));
    }

   public function showProduct($id){


       $category = categorie::find($id);
       $sub_categories = sub_categorie::where('parent_category', $id);
       return view('admin/category', compact(['category','sub_categories']));
   }

}

