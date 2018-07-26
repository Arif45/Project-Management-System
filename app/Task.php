<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
     protected $fillable = [

        'name',
        'project_id',
        'user_id',
        'days',
        'hours',
        'department_id'

    ];

    public function user(){

    	return $this->belongsTo('App\User');
    }

     public function project(){

    	return $this->belongsTo('App\Project');
    }
     public function department(){

    	return $this->belongsTo('App\Department');
    }
     public function users(){

    	return $this->belongdToMany('App\User');
    }

      public function comments(){

        return $this->morphMany('App\Comment', 'commentable');
    }
}
