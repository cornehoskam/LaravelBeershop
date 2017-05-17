<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\product;

class ProductController extends Controller
{
    public function index()
    {
        $products = product::all();

        return view('admin/products', compact('products'));
    }
}
