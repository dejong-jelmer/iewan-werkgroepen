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
        'name', 'email', 'password',
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
        return $this->belongsToMany('App\Workgroup');
    }

    public function inWorkgroup(\App\Workgroup $workgroup)
    {
        return (bool) $this->workgroups()->where('workgroups.id', $workgroup->id)->count();
    }

    public function messages()
    {
        return $this->belongsToMany('App\Message', 'message_receiver')->withPivot('read');
    }
    public function sendMessages()
    {
        return $this->belongsToMany('App\Message', 'message_sender');
    }

    public function forumPosts()
    {
        return $this->belongsToMany('App\forumPost', 'forum_user');
    }

    public function newForumPosts()
    {
        return $this->forumPosts()->count();
    }

    public function readMessages()
    {
        return $this->messages()->wherePivot('read', true)->get();
    }
    public function unReadMessages()
    {
        return $this->messages()->wherePivot('read', false)->get();
    }

    public function newMessages()
    {
        return $this->unReadMessages()->count();
    }

    public function isUnreadMessage($message_id)
    {
        return (bool) $this->unReadMessages()->where('id', $message_id)->count();
    }
    public function binderForms()
    {
        return $this->belongsToMany('App\BinderForm', 'binder_user');
    }
    public function newBinderForms()
    {
        return $this->binderForms()->count();
    }

    public function workgroupMessages(\App\Workgroup $workgroup)
    {
        $workgroup = $this->workgroups()->where('workgroup_id', $workgroup->id)->first();
        if(!empty($workgroup)) {
            return $workgroup->messages;
        }
        return null;
    }

    public function unRepliedWorkgroupMessages(\App\Workgroup $workgroup)
    {
        $workgroup = $this->workgroups()->where('workgroups.id', $workgroup->id)->first();
        if(count($workgroup->messages)) {
            return $workgroup->messages()->where('replied', false)->count();
        }
        return null;
    }
}
