@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Simulasi Pernikahan</div>
                <div class="panel-body">
                    <h3>Task #3 Simulasi Jika Superhero Menikah</h3>
                    <form action="" method="get" class="form">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Suami</td>
                                    <td>
                                        <div class="form-group">
                                            <select name="suami" id="suami" class="form-control">
                                                @foreach($calon_suami as $key => $value)
                                                    <option @if(isset($suami) && $suami == $value->id)
                                                        selected
                                                    @endif value="{{$value->id}}">{{$value->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>istri</td>
                                    <td>
                                        <div class="form-group">
                                            <select name="istri" id="istri" class="form-control">
                                                @foreach($calon_istri as $key => $value)
                                                    <option @if(isset($istri) && $istri == $value->id)
                                                        selected
                                                    @endif value="{{$value->id}}">{{$value->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <button class="btn btn-success">Process</button>
                        <a href="./marry" class="btn btn-danger">Clear</a>
                        <a href="./" class="btn btn-warning">Heroes</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
    
    @if(isset($suami) && isset($istri))
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Simulasi Pernikahan</div>
                <div class="panel-body">
                    <h3>Maka Anaknya Kemungkinan Akan Memiliki Skill Berikut:</h3>
                     <table class="table">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Skill</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($skills as $key => $skill)    
                                <tr>
                                    <td>
                                        {{$key+1}}
                                    </td>
                                    <td>
                                        {{$skill->name}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                     </table>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection

@section('javascript')
<script>

</script>
@endsection