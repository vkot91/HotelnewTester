<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Illuminate\Support\Facades\Gate;
use Image;

class UserController extends Controller
{
//    public function index()
//    {
//        if (! Gate::allows('user_access')) {
//            return abort(401);
//        }
//
//
//        $users = User::all();
//
//        return view('admin.users.index', compact('users'));
//    }
    public function profile()
    {
        return view('profile',array('user'=>Auth::user()));
    }
    public function update_avatar(Request $request)
    {
if($request->hasFile('avatar'))
{
    $avatar = $request->file('avatar');
    $filename = time(). '.' . $avatar->getClientOriginalExtension();
    Image::make($avatar) ->resize(300,300)->save(public_path('/images/avatars/' .$filename));
    $user = Auth::user();
    $user->avatar = $filename;
    $user->save();
}
        return view('profile',array('user'=>Auth::user()));

    }
}
