<div class="d-flex justify-content-lg-between mb-0">
    <div class="sticky-top w-25 h-25 bg-secondary">
        <div class="pt-2 pl-2 pr-2 pb-3 bg-dark mb-0 text-center h3 h-25">
            <a class="nav-link active  text-light" aria-current="page" href="/">Tableau de bord</a>
        </div>
        <div class="d-flex flex-column h-75  mb-0 align-items-left pb-4">
            <a href="{{ route('candidats.formations')}}" class=" m-2 btn btn-light text-info">Nombre de candidats/formation</a>
            <a href="{{ route('formations.referentiels')}}" class=" m-2 btn btn-light text-warning">Nombre de formations/referentiel</a>
            <a href="{{ route('candidats.sexe')}}" class=" m-2 btn btn-light text-info">Repartition Totale des candidats/sexe</a>
            <a href="{{ route('formations.types')}}" class=" m-2 btn btn-light text-warning">Repartition des formations/types</a>
            <a href="{{ route('candidats.age')}}" class=" m-2 btn btn-light text-info">Graphe Representant la tranche d'âge</a>
            <a href="{{ route('formations.stats')}}" class=" m-2 btn btn-light text-warning">Statistiques des formations</a>
        </div>
    </div>
    <div class="w-75 m-0 p-0">
        <ul class="nav bg-secondary sticky-top p-2 justify-content-lg-between">
            <li class="nav-item text-white">
                <a class="nav-link active  text-white" aria-current="page" href="/">Acceuil</a>
            </li>
            <ul class="nav bg-secondary sticky-top justify-content-end">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('candidats.index')}}">Candidats</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('formations.index')}}">Formations</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('referentiels.index')}}">Referentiels</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('types.index')}}">Types</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('relations.index')}}">Relation</a>
                </li>
            </ul>
        </ul>
        <div>
            @if(isset($contenu))
            <div class="container mt-4">
                <div class="card-head p-2 mb-2 bg-dark text-light h4 text-center">Listes de tous les candidats</div>
                <div class="card p-2">
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($candidats as $c)
                            <tr>
                                <td>{{$c->id}}</td>
                                <td>{{$c->nom}}</td>
                                <td>{{$c->prenom}}</td>
                                <td>{{$c->email}}</td>
                                <td>{{$c->age}}</td>
                                <td>{{$c->niveau_etude}}</td>
                                <td>{{$c->sexe}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-head p-2 mt-4 mb-2 bg-dark text-light h4 text-center">Listes de toutes les formations</div>
                <div class="card p-2">
                    <table class="table table-bordered">
                        <thead>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Duree</th>
                            <th>Description</th>
                            <th>Commencé</th>
                            <th>Date debut</th>
                        </thead>
                        <tbody>
                            @foreach($formations as $formation)
                            <tr></tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-head p-2 mt-4 mb-2 bg-dark text-light h4 text-center">Listes de tous les referentiels</div>
                <div class="card p-2">
                    <table class="table table-bordered">
                        <thead>
                            <th>ID</th>
                            <th>Libelle</th>
                            <th>Priorite</th>
                            <th>Duree</th>
                        </thead>
                        <tbody>
                            @foreach($referentiels as $referentiel)
                            <tr></tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        </div>
        @yield('content')
    </div>
</div>