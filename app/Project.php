<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [

        'name',
        'description',
        'department_id',
        'user_id',
        'days',

    ];

     public function users(){

    	return $this->belongsToMany('App\User');
    }

     
     public function department(){

    	return $this->belongsTo('App\Department');
    }

    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }
}
