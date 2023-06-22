<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donnateur extends Model
{
    use HasFactory;
    protected $filltable=[
        'id',
        'idUtilisateur'
    ];
    public  function dons(){
        return $this->hasMany(Dons::class);
    }
    public  function user(){
        return $this->belongsTo(User::class,'idUtilisateur');
    }
}
