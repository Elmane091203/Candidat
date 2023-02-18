<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    //
    public function index()
    {
        return view('type.index',['types'=>Type::all()]);
    }
    public function store(Request $request)
    {
        $input = $request->all();
        Type::create($input);
        toastr()->success('Type ajouté avec success! ');
        return view('type.index',['types'=>Type::all()]);
    }
    public function update(Request $request)
    {
        $input = $request->all();
        $type = Type::find($input['id']);
        $type->update($input);
        toastr()->info('Type modifié avec success! ');
        return view('type.index',['types'=>Type::all()]);
    }
    public function delete(Request $request)
    {
        $id = $request->all();
        $type = Type::find($id);
        $type->delete();
        toastr()->warning('Type modifié avec success! ');
        return view('type.index',['types'=>Type::all()]);
    }
}
