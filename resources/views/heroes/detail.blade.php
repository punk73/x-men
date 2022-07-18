@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Detail Superhero</div>

                <div class="panel-body">
                    <h3>Task #2 Detail Superhero: {{$model->name}}</h3>
                    
                    <form action="./{{$model->id}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <button class="btn btn-info mb-1">Edit</button>
                        
                        <table class="table" id="hero_table" style="margin-top: 5px">
                            <tbody>
                                <tr>
                                    <td>ID</td>
                                    <td>{{$model->id}}</td>
                                </tr>
                                <tr>
                                    <td>name</td>
                                    <td>
                                        <input required name="name" value="{{$model->name}}" type="text" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>
                                        <select required name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                            <option @if($model->jenis_kelamin == 'laki-laki')
                                                selected
                                            @endif value="laki-laki">Laki-laki</option>
                                            <option @if($model->jenis_kelamin == 'perempuan')
                                                selected
                                            @endif value="perempuan">Perempuan</option>
                                        </select>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Skills</div>

                <div class="panel-body">
                    {{-- use jquery datatable --}}
                    <table class="table" id="hero_table">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Skill</td>
                                <td><button class="btn btn-info">Tambah Skill</button></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($model->skills as $key => $skill)
                            <tr>
                                <td>
                                    {{$key + 1}}
                                </td>
                                <td>
                                    {{$skill->name}}
                                </td>
                                <td>
                                    <button class="btn btn-danger">Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection