<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BinderForm extends Model
{
    protected $fillable = ['id', 'key', 'name','fields'];

    public function workgroups()
    {
        return $this->belongsToMany('App\Workgroup', binder_workgroup);
    }
}
