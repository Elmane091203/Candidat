<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use Illuminate\Http\Request;

class CandidatController extends Controller
{
    //
    public function index()
    {
        return view('candidats.index', ['candidats' => Candidat::all()]);
    }
    public function store(Request $request)
    {
        $input = $request->all();
        Candidat::create($input);
        toastr()->success('Candidat(e) ajouté(e) avec success! ');
        return view('candidats.index', ['candidats' => Candidat::all()]);
    }
    public function update(Request $request)
    {
        $input = $request->all();
        $c = Candidat::find($input['id']);
        $c->nom = $input['nom'];
        $c->prenom = $input['prenom'];
        $c->email = $input['email'];
        $c->niveau_etude = $input['niveau_etude'];
        $c->age = $input['age'];
        $c->sexe = $input['sexe'];
        $c->save();
        toastr()->info('Candidat(e) modifié(e) avec success! ');
        return redirect('/candidats')->with(['candidats' => Candidat::all()]);
    }
    public function destroy(Request $request)
    {
        $input = $request->all();
        $c = Candidat::find($input['id']);
        $c->delete();
        toastr()->error('Candidat(e) supprimé(e) avec success! ');
        return redirect('/candidats')->with(['candidats' => Candidat::all()]);
    }
    
}
