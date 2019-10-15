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

    public function editProfile(Request $request)
    {
        $user = Auth::user();
        if($request->has('delete_profile_picture')) {
            $user->avatar = null;
        }
        $request->validate([
            // 'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            Rule::unique('users')->ignore($user->id),
            'telephone' => 'string|size:10',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // dd($request->file('avatar'));
        if($request->hasFile('avatar')){
            if(!$request->avatar->isValid()) {
                return redirect()->bacK()->with('error', 'Uploaden van foto is mislukt.');
            }
            // $img = $this->resize_image($request->avatar, 48, 48);
            $path = $request->avatar->store('public/avatars');
            // $img = \Illuminate\Support\Facades\Storage::get($path);
            // dd($request->avatar->hashName());

            // $avatar = \Image::make($request->avatar);
            // $avatar->resize(200, 200);
            // dd(new \Illuminate\Http\File($avatar));
            // \Illuminate\Support\Facades\Storage::putFile('public/avatars', new \Illuminate\Http\File($request->avatar), $request->avatar->hashName());
            // // dd($img);
            // dd();
            $avatar = $avatar->save('img/'.$request->avatar->hashName());
            // dd($path);
            // $avatar = $img->store('public/avatars');

        }
        $user->update([
            // "name" => $request->name,
            "email" => $request->email,
            "telephone" => $request->telephone,
            'avatar' => $avatar->basename ?? $user->avatar
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
