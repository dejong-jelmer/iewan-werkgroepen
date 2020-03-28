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
    public function showUser(Request $request, $user_name)
    {
        $user = User::where('name', $user_name)->first();
        return view('profile', compact('user'));
    }
    public function showUsers()
    {
        $users = User::get();
        return view('users', compact('users'));
    }

    public function showProfile()
    {
        $user = Auth::user();
        return view('profile', ['user' => $user]);
    }

    public function editProfile(Request $request, $user_name)
    {
        $user = User::byName($user_name)->first();

        if($request->has('delete_profile_picture')) {
            Storage::delete([$user->avatar, $user->photo]);
            $user->avatar = null;
            $user->photo = null;
        }
        $request->validate([
            'name' => 'required|min:3|max:255', Rule::unique('users')->ignore($user->id),
            'email' => 'required|email', Rule::unique('users')->ignore($user->id),
            'telephone' => 'string|between:10,15',
            'bio' => 'string',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->hasFile('avatar')){
            if(!$request->avatar->isValid()) {
                return redirect()->back()->with('error', 'Uploaden van foto is mislukt.');
            }
            $picture = $request->file('avatar');
            $avatar = \Image::make($picture)->resize(48, 48, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('jpg', 75);

            $photo = \Image::make($picture)->resize(400, null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('jpg', 75);

            Storage::put(
                $photo_path = 'public/photos/' . ($hash = hash('crc32', $user->id)) . '.jpg',
                $photo->getEncoded()
            );
            Storage::put(
                $avatar_path = 'public/avatars/' . $hash . '.jpg',
                $avatar->getEncoded()
            );
        }
        $user->update([
            "name" => strtolower($request->name) ?? $user->name,
            "email" => $request->email ?? $user->email,
            "telephone" => $request->telephone ?? $user->telephone,
            "bio" => $request->bio ?? $user->bio,
            'avatar' => $avatar_path ?? $user->avatar,
            'photo' => $photo_path ?? $user->photo
        ]);

        return redirect()->route('user', ['user_name' => $user->name])->with('success', 'Profiel aangepast.');
    }
}
