<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['name', 'path', 'type', 'size', 'ext', 'workgroup_id'];

    public function workgroup()
    {
        return $this->belongsTo('App\Workgroup');
    }
}
