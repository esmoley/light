<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class UserClub extends Model
{
    protected $table = 'users_club';

    public $primaryKey = "id";

    public $timestamps = true;

    public function center(){
        return $this->belongsTo("App\Center");
    }
}
