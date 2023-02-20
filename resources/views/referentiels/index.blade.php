@extends('layouts.app')
@section('content')
<div class="container mt-2">
    <div class="d-flex justify-content-between">
        <div style="max-height: 500px; overflow: scroll;" class="w-50">
            <div class="card-head p-2 bg-dark text-light h4 text-center">Listes de tous les referentiels</div>
            <div class="card p-2">
                <a href="#ajout" class="btn btn-primary col-md-5 btn-sm mb-1">Ajouter un referentiel</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Libelle</th>
                            <th>Validite</th>
                            <th>Horaire</th>
                            <th>Types</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($referentiels as $c)
                        <tr>
                            <td>{{$c->id}}</td>
                            <td>{{$c->libelle}}</td>
                            <td>{{$c->validite==1?"Valide":"Non Valide"}}</td>
                            <td>{{$c->horaire}}</td>
                            <td>@foreach($types as $t)
                                @if($t->id==$c->type_id)
                                {{$t->libelle}}
                                @break
                                @endif
                                @endforeach
                            </td>
                            <td>
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
            <div class="h4 text-center bg-secondary p-2 text-white">Formulaire de modification de Referentiel</div>
            <div class="card-body">
                <form action="{{route('referentiels.update',['referentiel'=>50])}}" class="align-middle mt-0" method="post">
                    @csrf
                    @method('PUT')
                    <input type="text" name="id" hidden id="idR">
                    <div class="">
                        <label for="" class="col-xd-2 h5 pt-1">Libelle</label>
                        <input name="libelle" id="libelle" pattern="[\p{L}\s]+" title="Ce champ ne peut contenir que des  lettres et espaces" required type="text" class=" col-xd-2 form-control">
                    </div>
                    <div class="mt-3">
                        <label for="" class="col-xd-2 h5 pt-1">Validite</label>
                        <select required name="validite" id="validite" class="form-control">
                            <option default value="">Choissez la validite</option>
                            <option value="1">Valide</option>
                            <option value="0">Non Valide</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="" class="col-xd-2 h5 pt-1">Type</label>
                        <select required name="type_id" id="type_id" class="form-control">
                            <option default value="">Choissez le type</option>
                            @foreach($types as $t)
                            <option value="{{$t->id}}">{{$t->libelle}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="" class="col-xd-2 h5 pt-1">Horaire</label>
                        <input name="horaire" id="horaire" min="0" type="number" required class=" col-xd-2 form-control">
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" id="btn" class="btn btn-info btn-lg mt-2">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="ajout" class="card mt-4 col-md-8 offset-md-2">
        <div class="h4 text-center bg-primary p-2 text-white">Formulaire d'ajout de Referentiel</div>
        <div class="card-body">
            <form action="{{route('referentiels.store')}}" class="align-middle" method="post">
                @csrf
                <div class="mt-3">
                    <label for="" class="col-xd-2 h5 pt-1">Libelle</label>
                    <input name="libelle"  pattern="[\p{L}\s]+" title="Ce champ ne peut contenir que des  lettres et espaces" required type="text" class=" col-xd-2 form-control">
                </div>
                <div class="mt-3">
                    <label for="" class="col-xd-2 h5 pt-1">Validite</label>
                    <select required name="validite" id="" class="form-control">
                        <option default value="">Choissez la validite</option>
                        <option value="1">Valide</option>
                        <option value="0">Non Valide</option>
                    </select>
                </div>
                <div class="mt-3">
                    <label for="" class="col-xd-2 h5 pt-1">Type</label>
                    <select required name="type_id" id="" class="form-control">
                        <option default value="">Choissez le type</option>
                        @foreach($types as $t)
                        <option value="{{$t->id}}">{{$t->libelle}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mt-3">
                    <label for="" class="col-xd-2 h5 pt-1">Horaire</label>
                    <input name="horaire" min="0" type="number" required class=" col-xd-2 form-control">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-lg">Enregistrer</button>
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
            <form action="{{route('referentiels.destroy',['referentiel'=>54])}}" method="post">
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
        document.getElementById('idR').value = c.id;
        document.getElementById('libelle').value = c.libelle;
        document.getElementById('validite').value = c.validite;
        document.getElementById('type_id').value = c.type_id;
        document.getElementById('horaire').value = c.horaire;
    }

    function delet(c) {
        document.getElementById('idS').value = c.id;
    }
</script>

@endsection