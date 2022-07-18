<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkillController extends CrudController
{
    //logic is on CrudController
    protected $model = "App\\Skill";
    protected $columns = ['name'];
    protected $to = "skill_index";

    
}
