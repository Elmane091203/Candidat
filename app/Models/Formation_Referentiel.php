<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formation_Referentiel extends Model
{
    use HasFactory;
    protected $table = 'formation_referentiels';
    public $timestamps = false;
    protected $fillable=[
        'formation_id',
        'referentiel_id'
    ];
    public function Referentiels()
    {
        return $this->hasMany(Referentiel::class);
    }
    public function Formations()
    {
        return $this->hasMany(Formation::class);
    }
}
