<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Input;
use Validator;
use Redirect;
use Illuminate\Http\Request;
use Session;

class FileController extends Controller {
    public function upload(Request $request) {
        // getting all of the post data
        $file = array('image' => Input::file('image'));
        // setting up rules
        $rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
        // doing the validation, passing post data, rules and the messages
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            // send back to the page with the input data and errors
            return Redirect::to('products')->withInput()->withErrors($validator);
        }
        else {
            // checking file is valid.
            if (Input::file('image')->isValid()) {
                $destinationPath = 'assets/products/'; // upload path
                $extension = Input::file('image')->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                Input::file('image')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                Session::flash('success', 'Upload successfully');
                app('App\Http\Controllers\Admin\ProductController')->createOrUpdate($request, $fileName);
                return  app('App\Http\Controllers\Admin\ProductController')->index();
            }
            else {
                // sending back with error message.
                Session::flash('error', 'uploaded file is not valid');

            }
        }
    }
}
