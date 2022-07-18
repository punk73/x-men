<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class CrudController extends Controller
{
    //

    protected $model;

    public function index(Request $request)
    {
        // return $this->model;
        $model = (new $this->model)->get();
        $view  = (new $this->model)->getTable() . ".index";
        
        return view( $view, ['model' => $model]);
    }


}
