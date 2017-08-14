<?php

namespace App;
use App\Pokemon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{


  public $table = 'users';
    /**
     * The attributes that are mass assignable.select * from pokemondb.pokemon_user;select * from pokemondb.pokemon_user;
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

     public function pokemon()
     {
       return $this->belongsToMany('App\Pokemon');
     }

}
