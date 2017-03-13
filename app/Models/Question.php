<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function techtags()
    {
        return $this->belongsToMany('App\Models\Techtag','questions_techtags');
    }
    public function operating()
    {
        return $this->hasMany('App\Models\Operating');
    }
}
