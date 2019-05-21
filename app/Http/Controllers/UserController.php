<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUser(Request $request, $user_id)
    {
        $user = User::find($user_id);
        return view('user.index', compact('user'));
    }
    public function showUsers()
    {
        $users = User::get();
        return view('user.users', compact('users'));
    }

    public function showProfile()
    {
        return view('user.profile', ['user' => Auth::user()]);
    }

    public function updateProfile(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:users|email',
            'telephone' => 'string|size:10'
        ]);
        if($validator->fails()) {
            return redirect()->route('user-profile')->withErrors($validator)->withInput();
        }
    }
}
