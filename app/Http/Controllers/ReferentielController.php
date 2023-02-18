<?php

namespace App\Http\Controllers;

use App\Models\Referentiel;
use App\Models\Type;
use Illuminate\Http\Request;

class ReferentielController extends Controller
{
    //
    public function index()
    {
        return view('referentiels.index',['referentiels'=>Referentiel::all(),'types'=>Type::all()] );
    }
    public function store(Request $request)
    {
        $input = $request->all();
        Referentiel::create($input);
        toastr()->success('Referentiel ajouté avec success! ');
        return view('referentiels.index',['referentiels'=>Referentiel::all(),'types'=>Type::all()] );

    }
}
