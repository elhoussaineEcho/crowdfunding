<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Porteur extends Model
{
    use HasFactory;
    protected $filltable=[
        'id',
        'cni',
        'localisation',
        'idUtilisateur'
    ];
    public function projets(){
        return $this->hasMany(Projet::class,'idProjet');
    }
    public function user(){
        return $this->belongsTo(User::class,'idUtilisateur');
    }
}
