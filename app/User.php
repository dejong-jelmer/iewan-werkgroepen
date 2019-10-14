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
    /**
     * return boolean true if user is in workgroup with given workgroup id
     * @param  int $workgroup_id workgroup id
     * @return boolean
     */
    public function inWorkgroup($workgroup_id)
    {
        return (bool) $this->activeWorkgroups()->wherePivot('workgroup_id', $workgroup_id)->count();
    }
     /**
     * return boolean true if user has applied for workgroup with given workgroup id
     * @param  int $workgroup_id workgroup id
     * @return boolean
     */
    public function hasAppliedForWorkgroup($workgroup_id)
    {
        return (bool) $this->workgroups()->wherePivot('workgroup_id', $workgroup_id)->wherePivot('active', false)->count();
    }
    /**
     * return boolean true if user has a workgroup within the given role array
     * @param  mixed  $roles string or array with workgroup role
     * @return boolean
     */
    public function hasWorkgroupRole($roles)
    {
        $roles = !is_array($roles) ? [ $roles ] : $roles;
        return (bool) $this->activeWorkgroups->first(function($workgroup) use ($roles){
            return in_array($workgroup->role->role, $roles);
        });
    }
    /**
     * return the count of the new applicant of all the workgroups
     * this user is an active member of
     * @return int number of new workgroup applicants (user_workgroup.active = 0)
     */
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
    // general forum posts made by any user, and not allready been seen by this user
    public function forumPosts()
    {
        return $this->belongsToMany('App\ForumPost', 'forum_user');
    }
    // count of number of formpost
    public function newForumPosts()
    {
        return $this->forumPosts()->count();
    }
    // new binderforms, and not allready been seen by this user
    public function binderForms()
    {
        return $this->belongsToMany('App\BinderForm', 'binder_user');
    }
    // count of number of binderforms
    public function newBinderForms()
    {
        return $this->binderForms()->count();
    }
    /**
     * count of the responses to the forumpost made by this user
     * @return int
     */
    public function newPostResponses()
    {
        $responses = 0;
        foreach($this->posts as $post) {
            $responses += $post->responses()->where('new', true)->count();
        }
        return $responses;
    }
    /**
     * number of notifications for this user
     * @return int
     */
    public function notifications()
    {
        $notifications = 0;
        $notifications += $this->newPostResponses();
        $notifications += $this->newBinderForms();
        $notifications += $this->newWorkgroupApplications();
        return $notifications;
    }
    /**
     * Check if user is member of webgroep
     * @return boolean
     */
    public function isWebgroepMember()
    {
        return (bool) $this->activeWorkgroups->first(function($workgroup) {
            return $workgroup->role->role == 'webgroep';
        });
    }
}
