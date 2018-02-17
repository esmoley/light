<?php

namespace App\Http\Controllers\_con;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Center;
use App\Computer;
use App\UserClub;

class MainController extends Controller
{
    private $respond;
    private $security;
    
    public function store(Request $request){
        $this->respond = new \App\_con\Respond;
        $this->security = new \App\_con\Security($request);
        
        if(!$this->security->mac())return $this->respond->error("wrong_mac");

        $club_id = $this->get_club_id($request->username_connect,$request->password_connect);if(!$club_id)return;
        $computer = $this->getComputer($request,$club_id);if(!$computer){ return;};
        if($request->login)$this->userLogin($request,$club_id);
        $computer->save();
    }
    function userLogin($request,$club_id){
        if(!$request->username||!$request->password)return false;
    }
    function getUser($request,$club_id){
        return UserClub::where([
            ['club_id',$club_id],
            ['username',$request->username],
            ['password',$request->password],
        ])->first();
    }
    
    function getComputer($request,$club_id){
        $computer = Computer::where([
            ['club_id',$club_id],
            ['mac',$request->mac],
        ])->first();
        if(!$computer){
            $computer = new Computer;
            $computer->mac = $request->mac;
            $computer->club_id = $club_id;
            if($request->pc_name)$computer->title = $request->pc_name;
        }
        $computer->ip = $_SERVER['REMOTE_ADDR'];
        if(is_numeric($request->status))$computer->status = $request->status;
        return $computer;//->save();
    }
    function get_club_id($username,$password){
        $result = Center::where([
            ['username_connect',$username],
            ['password_connect',$password]
            ])->value('id');
        return $result;
    }
}
