<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function addInfo(Request $request){
        $required = array ('firstName', 'lastName', 'city', 'address', 'postalCode');
        $empty = array();
        $error = false;

        foreach ( $required as $field ) {
            if (empty ( $request->input($field) )) {
                array_push($empty,$field);
                $error = true;
            }
        }
        if($error == true){
            return back()->withErrors(['error', "One or more required fields were left empty: ". join(', ', $empty)]);
        }
        else{
        $user = User::updateOrCreate(
            ['id' => $request->input('id')],
            ['firstName' => $request->input('firstName'),
                'lastName' => $request->input('lastName'),
                'city' => $request->input('city'),
                'address' => $request->input('address'),
                'postalCode' => $request->input('postalCode')]
        );
        return app('App\Http\Controllers\OrderController')->index();}
    }

}
