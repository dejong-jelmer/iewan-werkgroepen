<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = ['title', 'body'];

    public function receiver()
    {
        return $this->belongsToMany('App\User', 'message_receiver')->withPivot('read');
    }

    public function workgroup()
    {
        return $this->belongsTo('App\Workgroup');
    }

    public function senders()
    {
        return $this->belongsToMany('App\User', 'message_sender');
    }

    public function sender()
    {
        return $this->senders()->first();
    }

    public function responseTo()
    {
        return $this->belongsTo('App\Message', 'message_id');
    }
    public function responses()
    {
        return $this->hasMany('App\Message', 'message_id');
    }

    public function isWorkgroupMessage()
    {
        return (bool) $this->workgroup()->count();
    }

}
