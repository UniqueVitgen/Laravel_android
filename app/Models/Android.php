<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Android extends Model
{
    protected $fillable = [
        'id', 'name',
        'reliability',
        'status',
        'job_id',
        'avatar'
        ];

    public function getAll() {
        $jobs = $this->all();
        return $jobs;
    }

    public function job()
    {
        return $this->belongsTo('App\Models\Job', 'job_id');
    }

    public function skills()
    {
        return $this->belongsToMany('App\Models\Skill', 'android_skill', 'android_id', 'skill_id');
    }
}
