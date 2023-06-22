<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    /**
 * The attributes that should be cast.
 *
 * @var array
 */
protected $fillable = [
    'id',
    'notifiable_id'

];

}
