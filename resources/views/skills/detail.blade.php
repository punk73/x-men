@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Detail Skills</div>

                <div class="panel-body">
                    <h3>Task #2 Detail Skills: {{$model->name}}</h3>
                    
                    <form action="./{{$model->id}}" method="post">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <button class="btn btn-info mb-1">Edit</button>
                        <button type="button" class="btn btn-danger" data-id="{{$model->id}}" id="btn-hapus">Hapus</button>
                        
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
                                
                            </tbody>
                        </table>
                    </form>

                    <form action="./{{$model->id}}" method="POST" id="form-delete-hero">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Heroes</div>

                <div class="panel-body">
                    {{-- use jquery datatable --}}
                    <table class="table" id="hero_table">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Name</td>
                                <td><button class="btn btn-info">Tambah Skill</button></td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($model->heroes as $key => $skill)
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

@section('javascript')
    <script>
        $(document).ready(function(){
            $('#btn-hapus').on('click', function(){
                if(confirm("Yakin ingin menghapus ?")){
                    document.getElementById('form-delete-hero').submit();
                }
            })
        })
    </script>
@endsection