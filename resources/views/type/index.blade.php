@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="card col-md-8 offset-md-2">
        <div class="h4 text-center bg-primary p-2 text-white">Formulaire d'ajout de Type</div>
        <div class="card-body">
            <form action="{{route('types.store')}}" class="align-middle" method="post">
                @csrf
                <div class="mt-3">
                    <label for="" class="col-md-4 h5 pt-1">Libelle</label>
                    <input name="libelle"  pattern="[\p{L}\s]+" title="Ce champ ne peut contenir que des  lettres et espaces" type="text" required class="form-control col-md-8">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="p-2 d-flex justify-content-lg-between">
    <div class="w-25">
        <div class="card">
            <div class="h6 text-center bg-secondary p-2 text-white">Formulaire de modification de Type</div>
            <div class="card-body">
                <form action="{{route('types.update',['type'=>50])}}" class="align-middle" method="post">
                    @csrf
                    @method('PUT')
                    <input type="text" name="id" hidden value="" id="id">
                    <div class="mt-3">
                        <label for="" class="col-md-4 h6 pt-1">Libelle</label>
                        <input id="libelle" pattern="[\p{L}\s]+" title="Ce champ ne peut contenir que des  lettres et espaces" name="libelle" type="text" value="" onchange="" required class="form-control col-md-8">
                    </div>
                    <div class="text-center">
                        <button type="submit" id="modif" disabled class="btn btn-primary mt-2 btn-sm">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="w-50">
        <table class="table table-bordered text-center">
            <thead class="bg-secondary text-white">
                <tr>
                    <td>ID</td>
                    <td>Libelle</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($types as $t)
                <tr>
                    <td>{{$t->id}}</td>
                    <td>{{$t->libelle}}</td>
                    <td>
                        <a class="btn btn-sm bg-info" onclick="edit({{$t}})"> ✏️ </a>
                        <a class="btn btn-sm bg-danger" onclick="delet({{$t}})" data-toggle="modal" data-target="#delete"> 🗑️ </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-white bg-danger">
                <h5 class="modal-title" id="exampleModalLabel">Suppression</h5>
                <button type="button" class="close bg-secondary text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('types.destroy',['type'=>50])}}" method="post">
                @csrf
                @method('delete')
                <div class="modal-body">
                    <h5 class="text-center">Cette action est irreversible!</h5>
                    <input hidden type="text" name="id" id="idS">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('build/assets/jquery-3.6.0.js') }}"></script>
<script src="{{ asset('build/assets/bootstrap.js') }}"></script>

<script>
    function edit(c) {
        document.getElementById('modif').removeAttribute('disabled')
        document.getElementById('id').value = c.id;
        document.getElementById('libelle').value = c.libelle;
    }

    function delet(c) {
        document.getElementById('idS').value = c.id;
    }
</script>
@endsection