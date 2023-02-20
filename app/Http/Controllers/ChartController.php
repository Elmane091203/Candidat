<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Formation;
use App\Models\Type;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    //
    public function age()
    {
        $data = Candidat::all();
        return view('dashboard.age', compact('data'));
    }
    public function formationC()
    {
        $data = Formation::all();
        return view('dashboard.tcandidat', compact('data'));
    }
    public function sexe()
    {
        $data = Candidat::all();
        return view('dashboard.candidat', compact('data'));
    }
    public function formationt()
    {
        $data = Type::all();
        return view('dashboard.tformations', compact('data'));
    }
    public function formationr()
    {
        $data = Formation::all();
        return view('dashboard.sformation', compact('data'));
    }
    public function statistique()
    {
        $data = Formation::all();
        return view('dashboard.formations', compact('data'));
    }
}
