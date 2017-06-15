<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchProduct()
    {
        $secondStatement = "%".$_POST['query']."%";
        $products = product::where('name', 'LIKE', $secondStatement)->get();
        return view('searchProducts', compact('products'));
    }
}
