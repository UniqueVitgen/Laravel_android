<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'id', 'name', 'description',
        'complexity_level'];

    public function getAll() {
        $jobs = $this->all();
        return $jobs;
    }


    public function androids()
    {
        return $this->hasMany('App\Models\Android');
    }
}
