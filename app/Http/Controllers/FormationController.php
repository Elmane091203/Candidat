<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Formation;
use App\Models\Referentiel;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    public int $contenue = 0;
    //
    
    public function acceuil()
    {
        $candidats = Candidat::all();
        $formations = Formation::all();
        $referentiels = Referentiel::all();
        return view("layouts.app", ['contenu' => $this->contenue, 'candidats' => $candidats, 'formations' => $formations, 'referentiels' => $referentiels]);
    }
    public function store(Request $request)
    {
        $input = $request->all();
        Formation::create($input);
        toastr()->success('Formation ajoutée avec success! ');
        return view('formations.index',['formations'=>Formation::all()]);
    }
    public function update(Request $request)
    {
        $input = $request->all();
        $f =Formation::find($input['id']);
        $f->update($input);
        toastr()->info('Formation modifiée avec success! ');
        return redirect('/formations')->with(['formations'=>Formation::all()]);
    }
    public function destroy(Request $request)
    {
        $input = $request->all();
        $f =Formation::find($input['id']);
        $f->delete();
        toastr()->warning('Formation supprimée avec success! ');
        return redirect('/formations')->with(['formations'=>Formation::all()]);
    }

    public function index()
    {
        return view('formations.index',['formations'=>Formation::all()]);
    }
    
}
