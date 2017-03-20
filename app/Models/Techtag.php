<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Techtag extends Model
{
    public function questions()
    {
        return $this->belongsToMany('App\Models\Question', 'questions_techtags');
    }
}
