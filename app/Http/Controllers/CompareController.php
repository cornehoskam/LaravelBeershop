<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function getOptionsPage()
    {
        $allProducts = product::all();
        $dropdownProducts = array();
        foreach($allProducts as $product)
        {
            $dropdownProducts[$product->id] = str_replace('_', ' ', $product->name);
        }
        return view('compareOptions', compact('dropdownProducts'));
    }

    public function getDetails()
    {
        $productOne = product::where('id', $_POST['productOne'])->first();
        $productTwo = product::where('id', $_POST['productTwo'])->first();
        return view('compareDetails', compact('productOne', 'productTwo'));
    }
}
