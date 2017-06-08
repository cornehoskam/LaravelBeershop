<?php

namespace App\Http\Controllers\Admin;

use App\categorie;
use App\sub_categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
class UserController extends Controller
{
    public function index()
    {
        $users = User::where("id", "!=", Auth::id())->get();
        return view('admin/users', compact('users'));
    }

    public function delete(Request $request){

        if ($request->has('delete')) {
            $ids = $request->input('delete');
            foreach($ids as $id) {
                User::where("id", "=", $id)->delete();
            }
        }
        return UserController::index()->withErrors(['success', 'User is deleted']);;
    }

      public function createOrUpdate(Request $request, $filename){

       $product = product::updateOrCreate(
           ['id' => $request->input('id')],
           ['isAdmin' => $request->input('name')]
       );
           return UserController::index()->withErrors(["succes","User is saved"]);
   }
}

