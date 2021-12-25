<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * define table that belongs to this model
     */
    protected $table = 'tasks';

    /**
     * columns that fillable
     */
    protected $fillable = [
        'subject', 'state', 'user_id', 'project_id'
    ];

    /**
     * relation
     */
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function project(){
        return $this->belongsTo('App\Project');
    }
}
