<?php

namespace App\Connect;

use Illuminate\Database\Eloquent\Model;
use App\Admin\Computer;
use App\Enums;
class ComputerCon extends Model
{
    private $computer;
    function __construct($request,$respond,$center_con){
        if(!$this->mac($request))return $respond->error(ErrorCode::WRONG_MAC);
        echo "ok";
        if(!$this->computer = $this->getComputer($request,$center_con->id))return $respond->error(ErrorCode::COMPUTER_ERROR);
        $this->computer->save();
    }
    private function mac($request){
        if(!$request->mac || strlen($request->mac)<6){
            return false;
        }
        return true;
    }
    private function getComputer($request,$club_id){
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
    function UserComputerCheck($current_user_id,$respond){
        if(Computer::where([
            ['club_id',$this->computer->club_id],
            ['current_user_id',$current_user_id],
            ['mac','!=',$this->computer->mac],
        ])->first())return $respond->error(ErrorCode::ANOTHER_PC_LOGGED_IN);;
    }
}
