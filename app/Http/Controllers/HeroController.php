<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hero;

class HeroController extends CrudController
{
    //logic is on CrudController
    protected $model = "App\\Hero";
    protected $columns = ['name','jenis_kelamin'];

}
