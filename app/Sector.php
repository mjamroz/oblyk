<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sector extends Model
{
    public function user(){
        return $this->hasOne('App\User','id', 'user_id');
    }

    public function crag(){
        return $this->hasOne('App\Crag','id', 'crag_id');
    }

}