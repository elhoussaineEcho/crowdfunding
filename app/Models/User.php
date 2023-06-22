<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Hash;
use Cache;

class User extends Authenticatable 
{
    use HasApiTokens, HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
     protected $fillable = [
        'prenom',
        'email',
        'nom',
        'ville',
        'image',
        'password',
        'pays',
        'role',
        'last_seen',
      
   
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function setPasswordAttribute($value)
   {
    $this->attributes['password'] = $value;
   }
   public function getPasswordAttribute(){
    return $this->attributes['password'];
   }
    public function interactions(){
        return $this->hasMany(Interaction::class,'idInteraction');}
     public function porteur(){
        return $this->hasOne(Porteur::class,'idUtilisateur');
     }  
     public function donnateur(){
        return $this->hasOne(Donnateur::class,'idUtilisateur');
     } 
     public function isOnline(){
        return Cache::has('user-is-online'.$this->id);
     }  
    }

