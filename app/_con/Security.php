<?php

namespace App\_con;

use Illuminate\Database\Eloquent\Model;

class Security extends Model
{
    private $request;
    function __construct($request){
        $this->request = $request;
    }
    function mac(){
        if(!$this->request->mac || strlen($this->request->mac)<6){
            return false;
        }
        return true;
    }
}
