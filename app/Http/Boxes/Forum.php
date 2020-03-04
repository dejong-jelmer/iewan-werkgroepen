<?php
namespace App\Http\Boxes;
use Auth;

class Forum extends Boxes
{
    public function forumPosts()
    {
        return Auth::user()->forumPosts()->paginate(2);
    }

}
