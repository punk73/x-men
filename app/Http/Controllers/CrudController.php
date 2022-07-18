<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Console\Presets\React;

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

    public function delete($id) {
        $model = (new $this->model)->find($id);

        if (!$model) {
            abort(404, "Data Not Found");
        }

        $model->delete();

        return redirect()->route($this->to)->with('message', "data deleted!");

    }

    public function store(Request $request){

        $model = (new $this->model);

        $cols = $this->columns;
        foreach ($cols as $col) {
            # code...
            $model->{$col} = $request->{$col};
        }

        $model->save();

        return back()->with("message", "Success Add data!");        
    }

    public function combo(Request $request) {
        // return $request->all();
        $val = $request->q;

        $model = (new $this->model)->where(function($q) use($val) {
            if($val) {
                $q->where('name', 'like', "%$val%");
            }
        })->select(['id', 'name as text'])
            ->get();

        return [
            'success' => true,
            'results' => $model
        ];
    }

    public function attach($id, Request $request) {
        
        $values = $request->values;
        $model  = (new $request->model);
        $src = (new $request->src)->find($id);

        if(!$src) {
            abort(404);
        }

        $ids = [];
        foreach ($values as $key => $value) {
            # code...
            if(is_numeric($value)) {
                // ids
                $ids[] = $value;
            }else{
                $res = $model->firstOrCreate([
                    'name' => $value
                ]);

                $ids[] = $res->id;
            }
        }

        $relationsName = $model->getTable();
        $src->{$relationsName}()->attach($ids);

        return back()->with('message', "great!");
    }

    public function detach($id,Request $request) {
        // return $request->all();

        $model  = (new $request->model);
        $src = (new $request->src)->find($id);

        if (!$src) {
            abort(404);
        }

        $relationsName = $model->getTable();
        $src->{$relationsName}()->detach($request->id);

        return back()->with('message', "great!");
    }

}
