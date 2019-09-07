<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

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
        $user = Auth::user();
        return view('profile', ['user' => $user]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        if($request->has('delete_profile_picture')) {
            $user->photo = null;
        }
        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required',
            Rule::unique('users')->ignore($user->id),
            'telephone' => 'string|size:10',
            'profile_picture' => 'image'
        ]);
        if($request->hasFile('profile_picture')){
            if(!$request->profile_picture->isValid()) {
                return redirect()->bacK()->with('error', 'Uploaden van foto is mislukt.');
            }
            $path = $request->profile_picture->store('public/profile_pictures');
        }
        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "telephone" => $request->telephone,
            'photo' => $path ?? $user->photo
        ]);

        return redirect()->bacK()->with('success', 'Profiel aangepast.');
    }
}
