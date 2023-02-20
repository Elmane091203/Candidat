@extends('layouts.app')
@section('content')
<div class="container">

    <div class="d-flex justify-content-between">
        <div class="w-auto">
            <div class="card-head p-2 mt-4 mb-2 bg-dark text-light h4 text-center">Listes de toutes les formations</div>
            <div class="card p-2">
                <a href="#ajout" class="btn btn-primary mb-1">Ajouter une formation</a>
                <div style="max-height: 350px; overflow: scroll;">
                <table class="table table-bordered">
                    <thead>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Duree</th>
                        <th>Description</th>
                        <th>Etat</th>
                        <th>Date debut</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($formations as $f)
                        <tr>
                            <td>{{$f->id}}</td>
                            <td>{{$f->nom}}</td>
                            <td>{{$f->duree}}</td>
                            <td>{{$f->description}}</td>
                            <td>{{($f->is_started==1)?"En cours":"En attente"}}</td>
                            <td>{{$f->date_debut}}</td>
                            <td>
                                <a class="btn btn-sm bg-info" onclick="edit({{$f}})"> ✏️ </a>
                                <a class="btn btn-sm bg-danger" onclick="delet({{$f}})" data-toggle="modal" data-target="#delete"> 🗑️ </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <div class="card" id="modif" hidden style="max-height: 500px; overflow: scroll;">
            <div class="h4 text-center bg-secondary p-2 text-white">Formulaire de modification de Formation</div>
            <div class="card-body">
                <form action="{{route('formations.update',['formation'=>50])}}" class="align-middle mt-0" method="post">
                    @csrf
                    @method('PUT')
                    <input type="text" name="id" hidden id="id">
                    <div class="row mt-3">
                        <label for="" class="col-md-4 h5 text-left pt-1">Nom</label>
                        <input name="nom" id="nom" required type="text" class="form-control col-md-8">
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4 h5 text-left pt-1">Duree</label>
                        <input name="duree" id="duree" required type="number" min="1" class="form-control col-md-8">
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4 h5 text-left pt-1">Description</label>
                        <textarea name="description" id="description" required cols="30" rows="1" class="form-control col-md-8"></textarea>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="col-md-4 h5 text-left pt-1">Date de debut</label>
                        <input name="date_debut" id="date_debut" required type="datetime-local" class="form-control col-md-8">
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" id="btn" class="btn btn-info btn-lg mt-2">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card col-md-8 mt-2 offset-md-2" id="ajout">
        <div class="h4 text-center bg-primary p-2 text-white">Formulaire d'ajout de Formation</div>
        <div class="card-body">
            <form action="{{route('formations.store')}}" class="align-middle" method="post">
                @csrf
                <div class="row mt-3">
                    <label for="" class="col-md-4 h5 text-left pt-1">Nom</label>
                    <input name="nom" required type="text" class="form-control col-md-8">
                </div>
                <div class="row mt-3">
                    <label for="" class="col-md-4 h5 text-left pt-1">Duree</label>
                    <input name="duree" required type="number" min="1" class="form-control col-md-8">
                </div>
                <div class="row mt-3">
                    <label for="" class="col-md-4 h5 text-left pt-1">Description</label>
                    <textarea name="description" required cols="30" rows="1" class="form-control col-md-8"></textarea>
                </div>
                <div class="row mt-3">
                    <label for="" class="col-md-4 h5 text-left pt-1">Date de debut</label>
                    <input name="date_debut" required type="datetime-local" class="form-control col-md-8">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg mt-2">Enregistrer</button>
                </div>
            </form>
        </div>
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
            <form action="{{route('formations.destroy',['formation'=>50])}}" method="post">
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
        document.getElementById('modif').removeAttribute('hidden')
        document.getElementById('id').value = c.id;
        document.getElementById('nom').value = c.nom;
        document.getElementById('duree').value = c.duree;
        document.getElementById('description').value = c.description;
        document.getElementById('date_debut').value = c.date_debut;
    }

    function delet(c) {
        document.getElementById('idS').value = c.id;
    }
</script>
@endsection