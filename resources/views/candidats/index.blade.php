@extends('layouts.app')
@section('content')
<div class="container mt-1">
    <div class="d-flex justify-content-between">
        <div style="max-height: 500px; overflow: scroll;">
            <div class="card-head p-2 bg-dark text-light h4 text-center">Listes de tous les candidats</div>
            <div class="card p-2">
                <a href="#ajout" class="btn btn-primary col-md-5 btn-sm mb-1">Ajouter un candidat</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Pernom</th>
                            <th>Email</th>
                            <th>Age</th>
                            <th>Niveau Etude</th>
                            <th>Sexe</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($candidats as $c)
                        <tr>
                            <td>{{$c->id}}</td>
                            <td>{{$c->nom}}</td>
                            <td>{{$c->prenom}}</td>
                            <td>{{$c->email}}</td>
                            <td>{{$c->age}}</td>
                            <td>{{$c->niveau_etude}}</td>
                            <td>{{$c->sexe}}</td>
                            <td class="col-md-1">
                                <a class="btn btn-sm bg-info" onclick="edit({{$c}})"> ✏️ </a>
                                <a class="btn btn-sm bg-danger" onclick="delet({{$c}})" data-toggle="modal" data-target="#delete"> 🗑️ </a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card" id="modif" hidden style="max-height: 500px; overflow: scroll;">
            <div class="h4 text-center bg-secondary p-2 text-white">Formulaire de modification de Candidat</div>
            <div class="card-body">
                <form action="{{route('candidats.update',['candidat'=>50])}}" class="align-middle" method="post">
                    @csrf
                    @method('PUT')
                    <input type="text" name="id" hidden id="idC">
                    <div class="row mt-3">
                        <label for="" class="text-left pt-1">Nom</label>
                        <input name="nom" pattern="[\p{L}\s]+" title="Ce champ ne peut contenir que des  lettres et espaces" id="nomC" required type="text" class="form-control col-md-8">
                    </div>
                    <div class="row mt-3">
                        <label for="" class="text-left pt-1">Prenom</label>
                        <input name="prenom" pattern="[\p{L}\s]+" title="Ce champ ne peut contenir que des  lettres et espaces" id="prenomC" required type="text" class="form-control col-md-8">
                    </div>
                    <div class="row mt-3">
                        <label for="" class="text-left pt-1">Email</label>
                        <input name="email" id="emailC" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}"    title="Saisir votre adresse email  " type="email" class="form-control col-md-8">
                    </div>
                    <div class="row mt-3">
                        <label for="" class="text-left pt-1">Age</label>
                        <input name="age" id="ageC" max="35" min="18" type="number" class="form-control col-md-8">
                    </div>
                    <div class="row mt-3">
                        <label for="" class="text-left pt-1">Niveau d'Etude</label>
                        <select required name="niveau_etude" id="niveau_etudeC" class="form-control col-md-8">
                            <option default value="">Niveau d'Etude</option>
                            <option value="Terminale">Terminale</option>
                            <option value="Licence">Licence</option>
                            <option value="Master">Master</option>
                            <option value="Doctorat">Doctorat</option>
                        </select>
                    </div>
                    <div class="row mt-3">
                        <label for="" class="text-left pt-1">Sexe</label>
                        <select required name="sexe" id="sexeC" class="form-control col-md-8">
                            <option default value="">Sexe</option>
                            <option value="Homme">Homme</option>
                            <option value="Femme">Femme</option>
                        </select>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" id="btn" class="btn btn-info btn-lg mt-2">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card col-md-8 offset-md-2 mb-3" id="ajout">
        <div class="h4 text-center bg-primary p-2 text-white">Formulaire d'ajout de Candidat</div>
        <div class="card-body">
            <form action="{{route('candidats.store')}}" class="align-middle" method="post">
                @csrf
                <div class="row mt-3">
                    <label for="" class="col-md-4 h5 text-left pt-1">Nom</label>
                    <input name="nom" pattern="[\p{L}\s]+" title="Ce champ ne peut contenir que des  lettres et espaces" required type="text" class="form-control col-md-8">
                </div>
                <div class="row mt-3">
                    <label for="" class="col-md-4 h5 text-left pt-1">Prenom</label>
                    <input name="prenom" pattern="[\p{L}\s]+" title="Ce champ ne peut contenir que des  lettres et espaces" required type="text" class="form-control col-md-8">
                </div>
                <div class="row mt-3">
                    <label for="" class="col-md-4 h5 text-left pt-1">Email</label>
                    <input name="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}"    title="Saisissez votre adresse email" required type="email" class="form-control col-md-8">
                </div>
                <div class="row mt-3">
                    <label for="" class="col-md-4 h5 text-left pt-1">Age</label>
                    <input name="age" max="35" min="18" type="number" class="form-control col-md-8">
                </div>
                <div class="row mt-3">
                    <label for="" class="col-md-4 h5 text-left pt-1">Niveau d'Etude</label>
                    <select required name="niveau_etude" class="form-control col-md-8">
                        <option default value="">Niveau d'Etude</option>
                        <option value="Terminale">Terminale</option>
                        <option value="Licence">Licence</option>
                        <option value="Master">Master</option>
                        <option value="Doctorat">Doctorat</option>
                    </select>
                </div>
                <div class="row mt-3">
                    <label for="" class="col-md-4 h5 text-left pt-1">Sexe</label>
                    <select required name="sexe" class="form-control col-md-8">
                        <option default value="">Sexe</option>
                        <option value="Homme">Homme</option>
                        <option value="Femme">Femme</option>
                    </select>
                </div>
                <div class="col-md-12 text-center">
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
            <form action="{{route('candidats.destroy',['candidat'=>50])}}" method="post">
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
        document.getElementById('idC').value = c.id;
        document.getElementById('nomC').value = c.nom;
        document.getElementById('prenomC').value = c.prenom;
        document.getElementById('emailC').value = c.email;
        document.getElementById('ageC').value = c.age;
        document.getElementById('niveau_etudeC').value = c.niveau_etude;
        document.getElementById('sexeC').value = c.sexe;
    }
    
    function delet(c) {
        document.getElementById('idS').value = c.id;
    }
</script>

@endsection