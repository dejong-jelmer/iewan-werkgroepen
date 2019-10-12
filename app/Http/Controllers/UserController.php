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
        return view('user.index', compact('user'));
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
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if($request->hasFile('profile_picture')){
            if(!$request->profile_picture->isValid()) {
                return redirect()->bacK()->with('error', 'Uploaden van foto is mislukt.');
            }
            $img = $this->resize_image($request->profile_picture, 48, 48);
            dd($img);
            $path = $request->profile_picture->store('public/profile_pictures');
            $avatar = $img->store('public/profile_pictures/avatars');

        }
        $user->update([
            "name" => $request->name,
            "email" => $request->email,
            "telephone" => $request->telephone,
            'photo' => $path ?? $user->photo,
            'avatar' => $avatar ?? $user->avatar
        ]);

        return redirect()->bacK()->with('success', 'Profiel aangepast.');
    }

    private function resize_image($file, $w, $h, $crop=FALSE) {
        list($width, $height) = getimagesize($file);
        $r = $width / $height;
        if ($crop) {
            if ($width > $height) {
                $width = ceil($width-($width*abs($r-$w/$h)));
            } else {
                $height = ceil($height-($height*abs($r-$w/$h)));
            }
            $newwidth = $w;
            $newheight = $h;
        } else {
            if ($w/$h > $r) {
                $newwidth = $h*$r;
                $newheight = $h;
            } else {
                $newheight = $w/$r;
                $newwidth = $w;
            }
        }
        $src = imagecreatefromjpeg($file);
        $dst = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

        return $dst;
    }
}
