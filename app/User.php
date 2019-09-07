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
        return $this->belongsToMany('App\Workgroup')->withPivot('application');
    }

    public function activeWorkgroups()
    {
        return $this->workgroups()->wherePivot('application', false);
    }

    public function inWorkgroup($workgroupId)
    {
        return (bool) $this->activeWorkgroups()->wherePivot('workgroup_id', $workgroupId)->count();
    }
    public function hasApplied($workgroupId)
    {
        return (bool) $this->workgroups()->wherePivot('workgroup_id', $workgroupId)->wherePivot('application', true)->count();
    }
    public function hasWorkgroupRole($role)
    {
        return (bool) $this->activeWorkgroups->first(function($workgroup) use ($role){
            return $workgroup->role->role == ucfirst(strtolower($role));
        });
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
}
