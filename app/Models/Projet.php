<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;
use Illuminate\Database\Eloquent\Builder;

class Projet extends Model
{
    use HasFactory;
    protected $filltable=[
         'id',
         'titre',
         'description',
         'dateFinale',
         'budget',
         'path_description',
         'total',
         'idCategorie',
         'idPorteur'

    ];
    protected $searchable=[
        'titre',
        'description',
         'budget',
         'datefinal',
         'porteur.localisation',
         'porteur.user.nom',
         'porteur.user.prenom',
         'porteur.user.ville',
         'porteur.user.email',
         'categorie.nom'
        
          

    ];
    public function commentaire(){
        return $this->hasMany(Commentaire::class,'idProjet');
    }
    public function porteur(){
        return $this->belongsTo(Porteur::class,'idPorteur');
    }
    public function documents(){
        return $this->hasMany(Document::class);
    }
    public function dons(){
        return $this->hasMany(Dons::class,'id');
    }
  
    public function categorie(){
        return $this->belongsTo(Categorie::class,'idCategorie');
    }
    public function scopeSearch(Builder $builder,String $search='' ){
        foreach($this->searchable as $seachable){
            if(str_contains( $seachable ,'.')){
                $relation=Str::beforeLast( $seachable,'.');
                $col=Str::afterLast( $seachable,'.');
                $builder->orWhereRelation($relation,$col,'like',"%$search%");
                continue;
            }
            $builder->orWhere( $seachable,'like',"%$search%");
        }
        return $builder;
    }
}
