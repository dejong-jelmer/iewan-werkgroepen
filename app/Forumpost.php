<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forumpost extends Model
{
    protected $fillable = ['title', 'body', 'new'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function responses()
    {
        return $this->hasMany('App\Forumpost', 'post_id');
    }
}
