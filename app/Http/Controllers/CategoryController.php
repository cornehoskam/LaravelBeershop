<?php

namespace App\Http\Controllers;

use App\categorie;
use App\product;
use App\sub_categorie;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategoryPage($id)
    {

        $cat = categorie::find($id);
        $subcat = sub_categorie::where('parent_category', $id)->get();
        $products = product::where('parent_category', $id)->get();
        return view('category', compact('cat', 'subcat', 'products'));
    }
}
