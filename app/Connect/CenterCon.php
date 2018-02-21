<?php

namespace App\Connect;

use Illuminate\Database\Eloquent\Model;
use App\Center;

class CenterCon extends Model
{
    public $id;
    function __construct($request,$respond){
        if(!$center = $this->pair_center($request->username_connect,$request->password_connect))return $respond->error("wrong center pair");
        $this->id = $center->id;
    }
    private function pair_center($username,$password){
        $result = Center::where([
            ['username_connect',$username],
            ['password_connect',$password]
            ])->first();
        return $result;
    }
}
