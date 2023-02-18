<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable=[
        'nom',
        'prenom',
        'email',
        'age',
        'niveau_etude',
        'sexe'
    ];
    public function Referentiel()
    {
        return $this->belongsTo(Candidat_Formation::class);
    }
}
