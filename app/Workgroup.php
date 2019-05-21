<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workgroup extends Model
{
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    // @ToDo: read kan weg want we gaan in user naar hasManyThrough
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

}
