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
    // @todo: find a way to know the forumpost created by user and find a way to link replies to it
    public function newForumPostReplies()
    {
        return 2;
    }
    // @todo: reacties op forumberichten toevoegen
    public function notifications()
    {
        $notifications = 0;
        $notifications += $this->newForumPostReplies();
        $notifications += $this->newBinderForms();
        $notifications += $this->newWorkgroupApplications();
        return $notifications;
    }
}
