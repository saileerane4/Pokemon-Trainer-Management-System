<?php

namespace App;

use App\User;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    public $table = 'pokemon';
    public function users()
    {
      return $this->belongsToMany('App\User');
    }
}
