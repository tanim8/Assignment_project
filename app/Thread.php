<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    //
    protected $table = 'threads';
    protected $guarded = ['created_at', 'updated_at'];

    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
