@extends('layouts.app')
@section('content')
<div class="container bg-light">
    <div class="p-2 d-flex justify-content-lg-between">
        <div class="w-auto">
            <div class="card">
                <div class="h6 text-center bg-secondary p-2 text-white">Formulaire d'ajout d'une formation à un Referentiel</div>
                <div class="card-body">
                    <form action="{{route('relations.storeF')}}" class="align-middle" method="post">
                        @csrf
                        <div class="">
                            <label for="" class="col-md-4 h6 pt-1">Formation</label>
                            <select name="formationr" id="formationr" class="form-control" required>
                                <option default value="">Sélectionnez une formation</option>
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="" class="col-md-4 h6 pt-1">Referentiel</label>
                            <select name="referentiel" id="referentiel" class="form-control" required>
                                <option default value="">Sélectionnez un referentiel</option>
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-2 btn-sm">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="w-auto">
            <div class="card">
                <div class="h6 text-center bg-secondary p-2 text-white">Formulaire d'ajout d'un candidat à une formation</div>
                <div class="card-body">
                    <form action="{{route('relations.storeC')}}" class="align-middle" method="post">
                        @csrf
                        <div class="">
                            <label for="" class="col-md-4 h6 pt-1">Candidat</label>
                            <select name="candidat" id="candidat" class="form-control" required>
                                <option default value="">Sélectionnez un candidat</option>
                            </select>
                        </div>
                        <div class="mt-3">
                            <label for="" class="col-md-4 h6 pt-1">Formation</label>
                            <select name="formation" id="formation" class="form-control" required>
                                <option default value="">Sélectionnez une formation</option>
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success mt-2 btn-sm">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container p-2">
        <div class="card p-2 mb-2">
            <div class="card-head p-2 bg-dark text-light h4 text-center">Listes des candidats avec formations</div>
            <div class="card p-2" style="max-height: 300px; overflow-y: scroll;">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Formation</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($candidatF as $c)
                        <tr>
                            <td>{{$c->id}}</td>
                            <td>@foreach($candidats as $ct)
                                @if($c->candidat_id == $ct->id)
                                {{$ct->nom." ".$ct->prenom}}
                                @break
                                @endif
                                @endforeach
                            </td>
                            <td>@foreach($formations as $f)
                                @if($c->formation_id == $f->id)
                                {{$f->nom}}
                                @break
                                @endif
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card p-2 mb-2">
            <div class="card-head p-2 bg-dark text-light h4 text-center">Listes des formations avec referentiels</div>
            <div class="card p-2" style="max-height: 300px; overflow-y: scroll;">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Formation</th>
                            <th>Referentiel</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($formationR as $f)
                        <tr>
                            <td>{{$f->id}}</td>
                            <td>@foreach($formations as $fo)
                                @if($f->formation_id == $fo->id)
                                {{$fo->nom}}
                                @break
                                @endif
                                @endforeach
                            </td>
                            <td>@foreach($referentiels as $r)
                                @if($f->referentiel_id == $r->id)
                                {{$r->libelle}}
                                @break
                                @endif
                                @endforeach
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('build/assets/jquery-3.6.0.js') }}"></script>
<script src="{{ asset('build/assets/bootstrap.js') }}"></script>

<script>
    $(document).ready(function() {
        var candidat = document.getElementById('candidat');
        var formation = document.getElementById('formationr');
        <?php


        foreach ($candidats as $value) {
        ?>
            var newOption = document.createElement("option");
            newOption.text = <?= "'" . $value->nom . " " . $value->prenom .  "'" ?>;
            newOption.value = <?= $value->id ?>;
            candidat.appendChild((newOption));
        <?php
        }
        ?>
        <?php
        foreach ($formations as $value) {
        ?>
            var newOption = document.createElement("option");
            newOption.text = <?= "'" . $value->nom . "'" ?>;
            newOption.value = <?= $value->id ?>;
            formation.appendChild((newOption));
        <?php
        }
        ?>
    });
    $('#candidat').on('change', function() {

        var formation = document.getElementById('formation');
        var id = document.getElementById('candidat').value;
        fo = []
        formation.innerHTML = "<option default value=''>Sélectionnez une formation</option>";
        <?php
        if (count($formations) != 0) {
            for ($i = 0; $i < count($candidats); $i++) { ?>
                if (id == <?= $candidats[$i]->id ?>)
                    c = <?= $candidats[$i]->formations ?>;
            <?php
            }
            ?>
            c.forEach(f => {
                <?php
                for ($j = 0; $j < count($formations); $j++) { ?>
                    if (<?= $formations[$j]->id ?> != f.id) {

                        if (<?= count($formations[$j]->candidat) ?> == 0) {
                            fo.push(<?= $formations[$j] ?>);
                            console.log(fo);
                        } else {
                            <?php foreach ($formations[$j]->candidat as $key) {
                            ?>
                                if (<?= $key->id ?> != id && verif(c, <?= $formations[$j]->id ?>)) {
                                    fo.push(<?= $formations[$j] ?>);
                                    console.log(fo);
                                }

                            <?php } ?>
                        }
                    }
                <?php
                }
                ?>
            });

            console.log(fo);
            fo = Array.from(new Set(fo));
            fo = supprimerDoublons(fo);
            console.log(fo);
            fo.forEach(element => {
                var newOption = document.createElement("option");
                newOption.text = element.nom;
                newOption.value = element.id;
                formation.appendChild((newOption));

            });
        <?php } ?>
    });
    $('#formationr').on('change', function() {

        var referentiel = document.getElementById('referentiel');
        var id = document.getElementById('formationr').value;
        fo = []
        referentiel.innerHTML = "<option default value=''>Sélectionnez un referentiel</option>";
        <?php
        if (count($referentiels) != 0) {
            for ($i = 0; $i < count($formations); $i++) { ?>
                if (id == <?= $formations[$i]->id ?>)
                    c = <?= $formations[$i]->referentiel ?>;
            <?php
            }
            ?>
            if (c.length == 0) {
                fo=(<?= $referentiels ?>);
            } else {
                c.forEach(f => {
                    <?php
                    for ($j = 0; $j < count($referentiels); $j++) { ?>
                        if (<?= $referentiels[$j]->id ?> != f.id) {

                            if (<?= count($referentiels[$j]->formation) ?> == 0) {
                                fo.push(<?= $referentiels[$j] ?>);
                                console.log(fo);
                            } else {
                                <?php foreach ($referentiels[$j]->formation as $key) {
                                ?>
                                    if (<?= $key->id ?> != id && verif(c, <?= $referentiels[$j]->id ?>)) {
                                        fo.push(<?= $referentiels[$j] ?>);
                                        console.log(fo);
                                    }

                                <?php } ?>
                            }
                        }
                    <?php
                    }
                    ?>
                });
            }
            console.log(fo);
            fo = Array.from(new Set(fo));
            fo = supprimerDoublons(fo);
            console.log(fo);
            fo.forEach(element => {
                var newOption = document.createElement("option");
                newOption.text = element.libelle;
                newOption.value = element.id;
                referentiel.appendChild((newOption));

            });
        <?php } ?>

    });


    function verif(list, id) {
        const tableau = [];
        let estPresent = false;
        for (let i = 0; i < list.length; i++) {
            tableau.push(list.id);
        }

        for (let i = 0; i < tableau.length; i++) {
            if (tableau[i] === id) {
                estPresent = true;
                break;
            }
        }
    }

    function supprimerDoublons(tableau) {
        let obj = {};

        for (let i = 0; i < tableau.length; i++) {
            let str = JSON.stringify(tableau[i]);
            obj[str] = true;
        }

        let resultat = Object.keys(obj).map(function(str) {
            return JSON.parse(str);
        });

        return resultat;
    }
</script>
@endsection