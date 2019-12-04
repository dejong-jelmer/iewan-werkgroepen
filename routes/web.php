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

Route::get('login', function(){
    return view('auth.login');
})->name('show-login')->middleware('guest');
Route::post('login', 'Auth\LoginController@login')
    ->name('login')->middleware('guest');
Route::post('logout', 'Auth\LoginController@logout')
    ->name('logout')->middleware('auth');

Route::middleware('guest')->group(function(){
    Route::get('inschrijven/{key}', 'BinderController@showIntakeForm')
        ->name('show-intake-form');
    Route::get('formulier-verlopen', 'BinderController@showFormExpired')
        ->name('show-form-expired');
    Route::post('inschrijven/{key}', 'BinderController@createNewIntake')
        ->name('post-send-intake-form');
});

Route::middleware('auth')->group(function(){
    Route::get('/', 'DashboardController@showDashboard')
        ->name('dashboard');
    Route::get('/werkgroepen/{workgroup}', 'WorkgroupController@showWorkgroup')
        ->name('workgroup');
    Route::get('profiel', 'UserController@showProfile')
        ->name('profile');
    Route::get('/bewoners', 'UserController@showUsers')
        ->name('users');
    Route::get('/bewoners/{user_name}', 'UserController@showUser')
        ->name('user');
    Route::post('bewoners/{user_name}/aanpassen', 'UserController@editProfile')
        ->name('edit-user');
    Route::get('bestanden', 'FileController@showFiles')
        ->name('files');
    Route::post('bestanden/uploaden', 'FileController@uploadFile')
        ->name('file-upload');
    Route::get('bestanden/download/{file_id}', 'FileController@downloadFile')
        ->name('file-download');
    Route::get('/forum', 'ForumController@showForum')
        ->name('forum');
    Route::get('/forum/posts/{post_id}', 'ForumController@showPost')
        ->name('forum-posts');
    Route::post('/forum/posts/create', 'ForumController@createPost')
        ->name('create-post');
    Route::post('/forum/posts/{post_id}/edit', 'ForumController@editPost')
        ->name('edit-post');
    Route::get('/forum/posts/{post_id}/delete', 'ForumController@deletePost')
        ->name('delete-post');
    Route::post('/forum/posts/{post_id}/response', 'ForumController@createPostResponse')
        ->name('create-post-response');

    Route::get('klapper', 'BinderController@showForms')
        ->name('binder');
    Route::get('klapper/{binder_id}', 'BinderController@showForm')
        ->name('binder-form');

    Route::get('klapper/formulier/bewerken', 'BinderController@showEditForm')
        ->name('show-edit-binder-form');
     Route::post('klapper/formulier-bewerken', 'BinderController@editForm')
        ->name('post-edit-binder-form');
     Route::get('klapper/formulier-versturen', 'BinderController@showSendForm')
        ->name('show-send-binder-form');
    Route::post('klapper/formulier-versturen', 'BinderController@sendForm')
        ->name('post-send-binder-form');
    Route::get('klapper/formulier/{form_id}/vrijgeven', 'BinderController@releaseForm')
        ->name('release-form');




    Route::post('/werkgroep/aanvraag/{workgroup_id}', 'WorkgroupController@joinWorkgroup')
        ->name('join-workgroup');
    Route::post('/werkgroep/verlaten/{workgroup_id}', 'WorkgroupController@leaveWorkgroup')
        ->name('leave-workgroup');
    Route::get('/werkgroep/aanvraag/accepteren', 'WorkgroupController@acceptUserApplication')
        ->name('workgroup-accept-application');
    Route::get('/werkgroep/aanvraag/wijgeren', 'WorkgroupController@declineUserApplication')
        ->name('workgroup-decline-application');
    Route::get('/werkgroep/nieuw', 'WorkgroupController@showNewWorkgroup')
        ->name('new-workgroup');

});
