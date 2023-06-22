<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $filltable=[
        'id',
        'nom',


    ];
    public function projets(){
        return $this->hasMany(Projet::class,'idProjet');
    }
}
