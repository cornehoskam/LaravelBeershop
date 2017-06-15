<?php

namespace App\Http\Controllers\Admin;

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

      public function changeRights($id){

       $user = User::find($id);
          $user->isAdmin = !$user->isAdmin;
          $user->save();
           return UserController::index()->withErrors(['success', 'User is saved']);
   }

}

