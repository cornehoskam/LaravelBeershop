<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\sub_categorie;

class SubcategoryController extends Controller
{
    public function getCategoryPage($id)
    {

        $cat = sub_categorie::find($id);
        $products = product::where('parent_sub_category', $id)->get();
        return view('subcategory', compact('cat', 'products'));
    }
}
