<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Candidat_Formation;
use App\Models\Formation;
use App\Models\Formation_Referentiel;
use App\Models\Referentiel;
use Illuminate\Http\Request;

class RelationShipController extends Controller
{
    //
    public function index()
    {
        $referentiels = Referentiel::all()->where('validite','=','1');
        $formations = Formation::all();
        $candidats = Candidat::all();
        // relation table
        $formationR = Formation_Referentiel::all();
        $candidatF = Candidat_Formation::all();
        return view('relationship.index')->with(['referentiels'=>$referentiels,'formations'=>$formations,'candidats'=>$candidats,'formationR'=>$formationR,'candidatF'=>$candidatF]);
    }

    public function storeF(Request $request)
    {
        $input = $request->all();
        $pivot = new Formation_Referentiel();
        $pivot->formation_id = $input['formationr'];
        $pivot->referentiel_id = $input['referentiel'];
        $pivot->save();
        $formati = Formation::find($input['formationr']);
        $formati->is_started = 1;
        $formati->update();
        $referentiels = Referentiel::all()->where('validite','=','1');
        $formations = Formation::all();
        $candidats = Candidat::all();
        // relation table
        $formationR = Formation_Referentiel::all();
        $candidatF = Candidat_Formation::all();
        return redirect('/relations')->with(['referentiels'=>$referentiels,'formations'=>$formations,'candidats'=>$candidats,'formationR'=>$formationR,'candidatF'=>$candidatF]);
    }
    public function storeC(Request $request)
    {
        $input = $request->all();
        $pivot = new Candidat_Formation();
        $pivot->formation_id = $input['formation'];
        $pivot->candidat_id = $input['candidat'];
        $pivot->save();
        $referentiels = Referentiel::all()->where('validite','=','1');
        $formations = Formation::all();
        $candidats = Candidat::all();
        // relation table
        $formationR = Formation_Referentiel::all();
        $candidatF = Candidat_Formation::all();
        return redirect('/relations')->with(['referentiels'=>$referentiels,'formations'=>$formations,'candidats'=>$candidats,'formationR'=>$formationR,'candidatF'=>$candidatF]);
    }
}
