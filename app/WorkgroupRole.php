<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkgroupRole extends Model
{
    protected $table = 'workgroup_role';
    protected $fillable = ['role'];

    public function workgroup()
    {
        return $this->belongsTo('App\workgroup');
    }
}
