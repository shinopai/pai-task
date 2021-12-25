<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /**
     * define table that belongs to this model
     */
    protected $table = 'projects';

    /**
     * columns that fillable
     */
    protected $fillable = [
        'project_name', 'user_id'
    ];

    /**
     * relation
     */
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function tasks(){
        return $this->hasMany('App\Task');
    }
}
