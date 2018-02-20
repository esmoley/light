<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    protected $table = 'computers';
    
    public $primaryKey = "id";

    public $timestamps = true;

    public function center(){
        return $this->belongsTo("App\Center");
    }
}
