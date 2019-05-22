<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Illuminate\Http\File;
use Illuminate\Http\Request;
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
        $fileUrl = Storage::disk('local')->url(Auth::user()->photo);
        // $userImg = Storage::get(url($fileUrl));
        return view('user.profile', ['user' => Auth::user()]);
    }

    public function updateProfile(Request $request)
    {
        $validator = $request->validate([
            // 'name' => 'required|max:255',
            // 'email' => 'required|unique:users|email',
            // 'telephone' => 'string|size:10',
            'profile_picture' => 'image'
        ]);
        // if($validator->fails()) {
        //     return redirect()->route('user-profile')->withErrors($validator)->withInput();
        // }
        $file = $request->file('profile_picture');
        $path = Storage::putFile('user_photos', new File($file));

        $user = Auth::user();
        $user->photo = $path;
        $user->save();
        // $user->update([
        //     "name" => $request->name,
        //     "email" => $request->email,
        //     "telephone" => $request->telephone,
        //     'photo' => $path
        // ]);

        return redirect()->bacK()->with('success', 'Profiel aangepast.');
        // Storage::putFile('local')->put($user->name . '.jpg', $request->profile_picture);
    }
}
