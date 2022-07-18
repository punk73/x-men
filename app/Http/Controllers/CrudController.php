<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class CrudController extends Controller
{
    //

    protected $model;
    protected $columns;

    public function __construct()
    {
        $this->view = (new $this->model)->getTable();
    }

    public function index(Request $request)
    {
        // return $this->model;
        $model = (new $this->model)->get();
        $view  = $this->view;
        
        return view( $view. ".index", ['model' => $model]);
    }

    public function show($id, Request $request){
        $model = (new $this->model)->find($id);

        if(!$model) {
            abort(404, "Data Not Found");
        }

        return view($this->view. ".detail", ['model' => $model]);
    }

    public function update($id,Request $request) {
        
        $model = (new $this->model)->find($id);

        if (!$model) {
            abort(404, "Data Not Found");
        }

        $cols = $this->columns;
        foreach ($cols as $col) {
            # code...
            $model->{$col} = $request->{$col};
        }

        $model->save();

        return back()->with("message", "Success update!");
    }

}
