<?php

namespace App\Connect;

use Illuminate\Database\Eloquent\Model;
use App\Admin\UserClub;
use App\Enums\ErrorCode;

class UserClubCon extends Model
{
    function __construct($request,$respond,$center_con,$computer_con){
        if($request->login){
            if(!$user_club = $this->user_pair($request,$center_con->id))$respond->error(ErrorCode::BAD_USER_PAIR);
            if(!$computer_con->UserComputerCheck($user_club->id,$respond))$respond->error(ErrorCode::ANOTHER_PC_LOGGED_IN);
        }else{
            if(!$user_club = $this->user_name($request,$center_con->id))$respond->error(ErrorCode::BAD_USER);
        }
        $respond->add("user",$user_club->username);
        //$respond->add("user",$user_club->username);
    }
    private function user_pair($request,$club_id){
        if(!$request->username||!$request->password)return false;
        return UserClub::where([
            ['club_id',$club_id],
            ['username',$request->username],
            ['password',$request->password],
        ])->first();
    }
    private function user_name($request,$club_id){
        if(!$request->user)return false;
        return UserClub::where([
            ['club_id',$club_id],
            ['username',$request->user],
        ])->first();
    }
}
