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
                                <td><button class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Tambah Hero</button></td>
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
                                    <button data-id="{{$skill->id}}" class="btn btn-danger delete_skill">Hapus</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <form id="detach_skill" action="./{{$model->id}}/heroes" method="post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}

                        <input type="hidden" name="src" id="src" value="App\Skill">
                        <input type="hidden" name="model" id="model" value="App\Hero">
                        <input type="hidden" name="id" id="id">
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Hero</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="./{{$model->id}}/heroes" method="post" id="form-add-hero">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="skills">Skills</label>
                        <select multiple required class="form-control" name="values[]" id="skills-select">
                            
                        </select>
                    </div>

                    <input type="hidden" name="model" value="App\Hero">
                    <input type="hidden" name="src" value="App\Skill">
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#btn-hapus').on('click', function(){
                if(confirm("Yakin ingin menghapus ?")){
                    document.getElementById('form-delete-hero').submit();
                }
            })
        })

        $("#skills-select").select2({
            // tags : true, //ini ga bisa taggable karena butuh jenis kelamin
            ajax: {
                url: '../combo',
                dataType: 'json'
            },
            maximum : 100,
            placeholder: "Select a heroes",
        });

        $(".delete_skill").click(function() {
            let id = $(this).data('id');
            // alert(id)
            $('#id').val(id);
            $('#detach_skill').submit();
        })
    </script>
@endsection