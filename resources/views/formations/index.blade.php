@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card-head p-2 mt-4 mb-2 bg-dark text-light h4 text-center">Listes de toutes les formations</div>
    <div class="card p-2">
        <a href="#ajout" class="btn btn-primary col-md-2 mb-1">Ajouter une formation</a>
        <table class="table table-bordered">
            <thead>
                <th>ID</th>
                <th>Nom</th>
                <th>Duree</th>
                <th>Description</th>
                <th>Etat</th>
                <th>Date debut</th>
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
                </tr>
                @endforeach
            </tbody>
        </table>
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
@endsection