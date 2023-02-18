@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <div class="card mt-4 col-md-8 offset-md-2">
        <div class="h4 text-center bg-primary p-2 text-white">Formulaire d'ajout de Referentiel</div>
        <div class="card-body">
            <form action="{{route('referentiels.store')}}" class="align-middle" method="post">
                @csrf
                <div class="mt-3">
                    <label for="" class="col-xd-2 h5 pt-1">Libelle</label>
                    <input name="libelle" required type="text" class=" col-xd-2 form-control">
                </div>
                <div class="mt-3">
                    <label for="" class="col-xd-2 h5 pt-1">Validite</label>
                    <select required name="validite" id="" class="form-control">
                        <option default value="">Choissez la validite</option>
                        <option value="True">Valide</option>
                        <option value="False">Non Valide</option>
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
@endsection