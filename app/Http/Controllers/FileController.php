<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\ProductController as ProductController;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;
use Illuminate\Http\Request;
use Session;
use File;

class FileController extends Controller {
    public function upload(Request $request) {
        // getting all of the post data
        $file = array('image' => Input::file('image_url'));
        // setting up rules
        $rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);
        if(Input::hasFile('image_url')) {
            $image_type = Input::file('image_url')->getClientOriginalExtension(); // getting image extension
            if(!in_array(strtolower($image_type) , array("gif" , "jpg", "jpeg" ,"png" , "bmp")))
            {
                // send back to the page with the input data and errors
                return app('App\Http\Controllers\Admin\ProductController')->index()->withErrors(['error', 'the uploaded file is not an image']);
            } else {
                // checking file is valid.
                if (Input::file('image_url')->isValid()) {
                    $destinationPath = 'assets/products/'; // upload path
                    $fileName = 'product_' . $request->input('id') .'.'.  $image_type; // renameing image
                    File::delete($destinationPath.$fileName);
                    Input::file('image_url')->move($destinationPath, $fileName); // uploading file to given path
                    // sending back with message
                   return app('App\Http\Controllers\Admin\ProductController')->createOrUpdate($request, $fileName);
                } else {
                    // sending back with error message.
                    return app('App\Http\Controllers\Admin\ProductController')->index()->withErrors(['error', 'uploaded file is not valid']);
                }
            }
        }
        else{
            if($request->input('image_default')== null){
            return Redirect::back()->withErrors(['error', 'No image file was provided']);}
            return app('App\Http\Controllers\Admin\ProductController')->createOrUpdate($request, $request->input('image_default'));
        }
    }
}
