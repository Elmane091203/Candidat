<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat_Formation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable=[
        'candidat_id',
        'formation_id'
    ];
    public function Candidats()
    {
        return $this->belongsToMany(Candidat::class);
    }
    public function Formations()
    {
        return $this->belongsToMany(Formation::class);
    }
}
