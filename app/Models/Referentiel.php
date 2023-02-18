<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referentiel extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable=[
        'libelle',
        'validite',
        'horaire',
        'type_id'
    ];
    public function Types()
    {
        return $this->hasMany(Type::class);
    }
    public function Formation()
    {
        return $this->belongsTo(Formation_Referentiel::class);
    }
}
