<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    //
    public function heroes(){
        return $this->belongsToMany("App\Hero");
    }

    protected $fillable = ['name'];
}
