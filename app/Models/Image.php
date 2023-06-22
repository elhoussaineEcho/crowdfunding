<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Document
{
    use HasFactory;
    protected $filltable=[
        'id',
         'idDocument',
         'path',
         'taitle'
    ];
    public function projet(){
        return $this->belongsTo(Projet::class);
    }
}
