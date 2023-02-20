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
    public function update(Request $request)
    {
        $input = $request->all();
        $r =Referentiel::find($input['id']);
        $r->libelle = $input['libelle'];
        $r->validite = $input['validite'];
        $r->horaire = $input['horaire'];
        $r->type_id = $input['type_id'];
        $r->update();
        toastr()->info('Referentiel modifié avec success! ');
        return redirect('/referentiels')->with(['referentiels'=>Referentiel::all(),'types'=>Type::all()] );
        
    }
    public function destroy(Request $request)
    {
        $input = $request->all();
        $r =Referentiel::find($input['id'] );
        $r->delete();
        toastr()->warning('Referentiel spprimé avec success! ');
        return redirect('/referentiels')->with(['referentiels'=>Referentiel::all(),'types'=>Type::all()] );

    }
}
