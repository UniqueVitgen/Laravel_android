<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'id', 'name'];

    public function getAll() {
        $jobs = $this->all();
        return $jobs;
    }

    public function androids()
    {
        return $this->belongsToMany('App\Models\Job', 'android_skill', 'skill_id', 'android_id');
    }
}
