<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    //
    public function skills(){
        return $this->belongsToMany('App\Skill');
    }
}
