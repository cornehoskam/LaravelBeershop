<?php

namespace App\Http\Controllers;

use App\categorie;
use Illuminate\Http\Request;
use App\product;
use App\sub_categorie;

class SubcategoryController extends Controller
{
    public function getCategoryPage($catname, $subcatname)
    {
        $cat = sub_categorie::where('name', $subcatname)->first();
        if ($cat != null) {
            $parentcat = categorie::find($cat->parent_category);
            $products = product::where('parent_sub_category', $cat->id)->get();
            $empty = $products->isEmpty();
            return view('subcategory', compact('cat', 'products', 'parentcat', 'empty'));
        }
        else
        {
            return view('errors.404');
        }
    }
}
