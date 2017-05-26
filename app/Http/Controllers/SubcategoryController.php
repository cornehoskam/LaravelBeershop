<?php

namespace App\Http\Controllers;

use App\categorie;
use Illuminate\Http\Request;
use App\product;
use App\sub_categorie;

class SubcategoryController extends Controller
{
    public function getCategoryPage($id)
    {
        $cat = sub_categorie::find($id);
        $parentcat = categorie::find($cat->parent_category);
        $products = product::where('parent_sub_category', $id)->get();
        $empty = $products->isEmpty();
        return view('subcategory', compact('cat', 'products', 'parentcat', 'empty'));
    }
}
