<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Question extends Model
{
    protected $datas = ['created_at'];
    protected $fillable = ['title','content'];
    public function techtags()
    {
        return $this->belongsToMany('App\Models\Techtag','questions_techtags');
    }
    public function operating()
    {
        return $this->hasMany('App\Models\Operating');
    }
    public function getCreatedAtAttribute($date)
    {
        return Carbon::parse($date)->diffForHumans();
    }
}
