<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
    	'title',
    	'body',
    	'link',
    	    	
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function comments()
    {
    	return $this->hasMany('App\Comment');
    }

}

