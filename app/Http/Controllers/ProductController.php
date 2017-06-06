<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProductPage($productname)
    {
        $product = product::where('name', $productname)->first();
        if($product != null)
        {
            return view('product', compact('product'));
        }
        else
        {
            return view('errors.404');
        }
    }
}
