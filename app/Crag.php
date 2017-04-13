<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crag extends Model
{
    public function users(){
        return $this->hasOne('App\User','id', 'user_id');
    }

    public function rocks(){
        return $this->hasOne('App\Rock','id', 'rock_id');
    }

}