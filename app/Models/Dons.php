<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dons extends Model
{
    use HasFactory;
    public function donnateur(){
        return $this->belongsTo(Donnateur::class);
    }
}
