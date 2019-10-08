<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'telephone', 'photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function workgroups()
    {
        return $this->belongsToMany('App\Workgroup')->withPivot('active');
    }

    public function activeWorkgroups()
    {
        return $this->workgroups()->wherePivot('active', true);
    }

    public function inWorkgroup($workgroup_id)
    {
        return (bool) $this->activeWorkgroups()->wherePivot('workgroup_id', $workgroup_id)->count();
    }
    public function hasAppliedForWorkgroup($workgroup_id)
    {
        return (bool) $this->workgroups()->wherePivot('workgroup_id', $workgroup_id)->wherePivot('active', false)->count();
    }
    public function hasWorkgroupRole($role)
    {
        return (bool) $this->activeWorkgroups->first(function($workgroup) use ($role){
            return $workgroup->role->role == strtolower($role);
        });
    }

    public function newWorkgroupApplications()
    {
        $applicants = 0;
        $workgroups = $this->activeWorkgroups()->get();
        foreach ($workgroups as $workgroup) {
            $applicants += $workgroup->numberOfApplicants();
        }
        return $applicants;
    }
    // posts made by user
    public function posts()
    {
        return $this->hasMany('App\ForumPost', 'user_id');
    }
    // general forum posts made by any user, and nor read by this user
    public function forumPosts()
    {
        return $this->belongsToMany('App\ForumPost', 'forum_user');
    }

    public function newForumPosts()
    {
        return $this->forumPosts()->count();
    }

    public function binderForms()
    {
        return $this->belongsToMany('App\BinderForm', 'binder_user');
    }
    public function newBinderForms()
    {
        return $this->binderForms()->count();
    }
    // count of the responses to the forumpost made by this user
    public function newPostResponses()
    {
        $responses = 0;
        foreach($this->posts as $post) {
            $responses += $post->responses()->where('new', true)->count();
        }
        return $responses;
    }

    public function notifications()
    {
        $notifications = 0;
        $notifications += $this->newPostResponses();
        $notifications += $this->newBinderForms();
        $notifications += $this->newWorkgroupApplications();
        return $notifications;
    }
}
