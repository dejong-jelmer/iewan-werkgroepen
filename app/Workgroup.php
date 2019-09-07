<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workgroup extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User')->withPivot('application');
    }
    public function activeUsers()
    {
        return $this->users()->where('application', false);
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

    public function applicants()
    {
        return $this->users()->wherePivot('application', true);
    }

    public function numberOfApplicants()
    {
        return $this->applicants()->count();
    }

}
