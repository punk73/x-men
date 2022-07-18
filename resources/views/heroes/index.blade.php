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
<script src="{{ asset('js/index.js') }}"></script>
@endsection