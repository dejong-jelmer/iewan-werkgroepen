<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Workgroup;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        // $forumPosts = Auth::user()->forumPosts()->paginate(2);
        $binderForms = Auth::user()->binderForms()->paginate(2);
        return view('dashboard', [
            // 'forumPosts' => $forumPosts,
            'binderForms' => $binderForms
        ]);
    }
}
