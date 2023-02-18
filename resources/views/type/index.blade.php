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
                    <input name="libelle" type="text" required class="form-control col-md-8">
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
                <form action="{{route('types.store')}}" class="align-middle" method="post">
                    @csrf
                    <input type="text" hidden value="" id="id">
                    <div class="mt-3">
                        <label for="" class="col-md-4 h6 pt-1">Libelle</label>
                        <input id="libelle" name="libelle" type="text" value="" onchange="" required class="form-control col-md-8">
                    </div>
                    <div class="text-center">
                        <button type="submit" disabled class="btn btn-primary mt-2 btn-sm">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="w-50">
        <table class="table table-bordered">
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
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection