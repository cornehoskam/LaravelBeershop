<?php

namespace App\Http\Controllers;

use App\categorie;
use App\product;
use App\sub_categorie;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategoryPage($catname)
    {

        $cat = categorie::where('name', $catname)->first();
        if($cat != null) //Does the category exist?
        {
            $subcat = sub_categorie::where('parent_category', $cat->id)->get();
            $products = product::where('parent_category', $cat->id)->get();
            $empty = $products->isEmpty();
            return view('category', compact('cat', 'subcat', 'products', 'empty'));
        }
        else
        {
            return view('errors.404');
        }
    }
}
