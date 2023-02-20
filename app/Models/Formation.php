<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable=[
        'nom',
        'duree',
        'description',
        'is_started',
        'date_debut',
    ];
    public function Referentiel()
    {
        return $this->belongsToMany(Referentiel::class,'formation_referentiels');
    }
    public function Candidat()
    {
        return $this->belongsToMany(Candidat::class,'candidat__formations');
    }
}
