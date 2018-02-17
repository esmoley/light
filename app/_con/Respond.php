<?php

namespace App\_con;

use Illuminate\Database\Eloquent\Model;

class Respond extends Model
{
    public $data = array();
    public function add($key,$value='true'){
        $this->data[$key] = $value;
    }
    public function error($value){
        print json_encode (array("error"=>$value));
    }
    public function show(){
        print json_encode ($this->data);
    }
}
