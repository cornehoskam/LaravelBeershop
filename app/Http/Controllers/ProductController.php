<?php

namespace App\Http\Controllers;

use App\categorie;
use App\product;
use App\sub_categorie;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProductPage($productname)
    {
        $product = product::where('name', $productname)->first();
        if($product != null)
        {
            $cat = categorie::where('id', $product->parent_category)->first();
            $subcat = sub_categorie::where('id', $product->parent_sub_category)->first();
            return view('product', compact('product', 'cat', 'subcat'));
        }
        else
        {
            return view('errors.404');
        }
    }
}
