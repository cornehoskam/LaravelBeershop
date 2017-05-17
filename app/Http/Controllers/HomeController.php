<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $product = Product::inRandomOrder()->first();
        return view('home', compact('product'));
    }
}
