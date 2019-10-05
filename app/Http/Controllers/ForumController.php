<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Forumpost;
use App\Http\Requests\StoreForumPost;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function showForum()
    {
        $posts = Forumpost::orderBy('created_at', 'desc')->where('forumposts.post_id','0')->Paginate(2);
        return view('dashboard.forum', compact('posts'));




    }
    public function createForumPost(StoreForumPost $request)
    {
        $validated = $request->validated();
        $post = Forumpost::create($validated);
        $post->user()->associate(Auth::user());
        $post->save();
        $users = User::get();
        $users->each(function($user) use ($post) {
            $user->forumPosts()->save($post);
            $user->save();
        });

        return redirect()->route('forum')->with('success', 'Bericht aangemaakt.');
    }

    public function showForumPost($post_id)
    {
        $post = Forumpost::find($post_id);
        Auth::user()->forumPosts()->detach($post);
        return view('dashboard.forum-post', compact('post'));
    }

    public function createForumResponse(Request $request, $post_id)
    {
        $post = Forumpost::find($post_id);
        $response = Forumpost::create($request->only('body'));
        $post->responses()->save($response);
        $response->user()->associate(Auth::user());
        $response->save();

        return redirect()->route('forum-posts', ['post_id' => $post->id]);
    }
}
