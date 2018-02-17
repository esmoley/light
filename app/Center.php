<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    protected $table = 'centers';
    
    public $primaryKey = "id";

    public $timestamps = true;
    public function usersclub(){
        return $this->hasMany('App\UserClub');
    }
    public function computers(){
        return $this->hasMany('App\Computer');
    }
}
