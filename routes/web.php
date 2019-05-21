<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function(){
    return view('auth.login');
})
    ->name('login')->middleware('guest');
Route::post('/login', 'Auth\LoginController@login')
    ->name('login');
Route::post('/logout', 'Auth\LoginController@logout')
    ->name('logout');

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', 'DashboardController@showDashboard')
        ->name('dashboard');
    Route::get('/werkgroep/{workgroup_id}', 'WorkgroupController@showWorkgroup')
        ->name('workgroup');
    Route::get('/leden/{user_id}', 'UserController@showUser')
        ->name('user');
    Route::get('gebruiker/profiel', 'UserController@showProfile')
        ->name('user-profile');
    Route::post('gebruiker/profiel/aanpassen', 'UserController@updateProfile')
        ->name('user-profile-post');
    Route::get('/forum', 'ForumController@showForum')
        ->name('forum');
    Route::post('/forum/posts', 'ForumController@createForumPost')
        ->name('forum-post-create');
    Route::get('/forum/posts/{post_id}', 'ForumController@showForumPost')
        ->name('forum-posts');
    Route::post('/forum/response/{post_id}', 'ForumController@createForumResponse')
        ->name('user-forum-respone');

    Route::get('/klapper', 'BinderController@showBinderForms')
        ->name('binder-forms');
    Route::get('/klapper/{binderform_id}', 'BinderController@showBinderForm')
        ->name('binder-form');

    Route::get('/bericht-aan/{user_id}', 'MessageController@showCreateMessage')
        ->name('send-user-message');
    Route::post('/bericht-aan/{user_id}', 'MessageController@createMessage')
        ->name('send-message');
    Route::post('/bericht-aan/{user_id}/antwoord-op/{message_id}', 'MessageController@createMessage')
        ->name('send-message-response');
    Route::get('/gebruiker/berichten', 'MessageController@showUserMessages')
        ->name('show-user-messages');
    Route::get('gebruiker/berichten/verstuurd', 'MessageController@showSendUserMessages')
        ->name('show-user-send-messages');
    Route::get('/gebruiker/berichten/{message_id}', 'MessageController@showUserMessage')
        ->name('show-user-message');
    Route::post('/gebruiker/berichten/{message_id}/delete', 'MessageController@deleteUserMessage')
        ->name('delete-user-message');
    Route::get('/gebruikers', 'UserController@showUsers')
        ->name('users');

    Route::get('/werkgroep/{workgroup_id}/berichten', 'MessageController@showWorkgroupMessages')
        ->name('show-workgroup-messages');
    Route::get('/werkgroep/{workgroup_id}/berichten/{message_id}', 'MessageController@showWorkgroupMessage')
        ->name('show-workgroup-message');
    Route::post('/bericht-aan-werkgroep/{workgroup_id}', 'MessageController@createMessage')
        ->name('send-workgroup-message');

    Route::post('/werkgroep/aansluiten/{workgroup_id}', 'WorkgroupController@joinWorkgroup')
        ->name('join-workgroup');
    Route::post('/werkgroep/verlaten/{workgroup_id}', 'WorkgroupController@leaveWorkgroup')
        ->name('leave-workgroup');
    Route::get('/werkgroep/{workgroup_id}/leden', 'WorkgroupController@showWorkgroupMembers')
        ->name('workgroup-members');

});
