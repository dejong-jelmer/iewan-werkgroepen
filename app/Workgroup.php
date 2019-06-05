<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workgroup extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function unReadMessages()
    {
        return $this->messages()->wherePivot('read', false)->get();
    }

    public function newMessages()
    {
        return $this->unReadMessages()->count();
    }

    public function role()
    {
        return $this->hasOne('App\WorkgroupRole');
    }

    public function hasRole($role)
    {
        return (bool) $this->role()->where('role',$role)->get()->count();
    }

    public static function getByRole($role)
    {
        $workgroups = \App\Workgroup::get();
        return $workgroups->filter(function($workgroup) use ($role){
            return $workgroup->role()->where('role', $role)->first();
        })->first();
    }

    public function binderForms()
    {
        return $this->belongsToMany('App\BinderForm', 'binder_workgroup');
    }
    public function unReleasedForms()
    {
        return $this->binderForms()->get();
    }

}
