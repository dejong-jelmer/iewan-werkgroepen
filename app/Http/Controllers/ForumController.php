<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Forumpost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Requests\StoreForumPost;

class ForumController extends Controller
{
    public function showForum()
    {
        $posts = Forumpost::orderBy('created_at', 'desc')->where('forumposts.post_id','0')->paginate(10);
        return view('forum', compact('posts'));
    }
    public function createPost(StoreForumPost $request)
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
    public function editPost(Request $request, $post_id)
    {
        $request->validate([
            'body' => 'required'
        ]);
        $post = Forumpost::find($post_id);
        if(Gate::allows('edit-post', $post)) {
            $post->update(['body' => $request->body]);
        }

        return redirect()->back()->with('success', 'Bericht aangepast.');
    }

    public function deletePost($post_id)
    {
        $post = Forumpost::find($post_id);
        if(Gate::allows('delete-post', $post)) {
            $post->delete();
        }
        return redirect()->route('forum')->with('success', 'Bericht verwijderd.');
    }

    public function showPost(Request $request, $post_id)
    {
        $post = Forumpost::find($post_id);
        Auth::user()->forumPosts()->detach($post);
        $isEdit = ($request->get('edit') == 'true') && (Gate::allows('edit-post', $post));
        // set new responses for this user post back to false
        foreach (Auth::user()->posts as $userPost) {
            foreach($userPost->responses as $response) {
                $response->where('post_id', $post->id)->update(['new' => false]);
            }
        }
        return view('forum.forum-post', compact('post','isEdit'));
    }

    public function createPostResponse(Request $request, $post_id)
    {
        $post = Forumpost::find($post_id);
        $response = Forumpost::create($request->only('body'));
        $post->responses()->save($response);
        $response->user()->associate(Auth::user());
        $response->new = true;
        $response->save();

        return redirect()->route('forum-posts', ['post_id' => $post->id]);
    }
}
