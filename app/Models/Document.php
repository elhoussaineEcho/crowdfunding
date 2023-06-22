<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

 class  Document extends Model
{
    use HasFactory;
    protected $filltable=[
        'id',
        'taille',
        'path',
        'idProjet'


    ];
    public function projet(){
        return $this->belongsTo(Projet::class,'idProjet');
    }
}
