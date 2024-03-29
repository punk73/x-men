@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Daftar Superhero</div>

                <div class="panel-body">
                    {{-- use jquery datatable --}}
                    <table class="table" id="hero_table">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Nama</td>
                                <td>Jenis Kelamin</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($model as $key => $value)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$value->name}}</td>
                                <td>{{$value->jenis_kelamin}}</td>
                                <td>
                                    <a href="./{{$value->id}}" class="btn btn-info">View Detail</a>
                                    <button class="btn btn-danger hapus" data-id="{{$value->id}}">Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <form id="form-hapus-hero" action="" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                    </form>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Add Hero
                    </button>
                    <a href="./skills" class="btn btn-info">Show Skills</a>
                    <a href="./marry" class="btn btn-warning">Show Simulasi Pernikahan</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Hero</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="./" method="post" id="form-add-hero">
            {{ csrf_field() }}
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input required type="text" name="name" id="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select required class="form-control " name="jenis_kelamin" id="jenis_kelamin">
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button id="btn-save"  class="btn btn-primary">Save changes</button>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>
@endsection

@section('javascript')
<script src="{{ asset('js/index.js') }}"></script>
@endsection