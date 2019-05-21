<?php

namespace App\Http\Controllers;

use Auth;
use App\Workgroup;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        // We don't want the responses (messages that have a message_id the belong to)
        // and only the unread messages
        $messages = Auth::user()->messages()->wherePivot('read', 0)->orderBy('created_at', 'desc')->paginate(10);
        $forumPosts = Auth::user()->forumPosts()->paginate(10);
        $binderForms = Auth::user()->binderForms()->paginate(10);
        return view('dashboard.dashboard', [
            'messages' => $messages,
            'forumPosts' => $forumPosts,
            'binderForms' => $binderForms
        ]);
    }
}
