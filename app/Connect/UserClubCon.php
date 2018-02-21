<?php

namespace App\Connect;

use Illuminate\Database\Eloquent\Model;
use App\Admin\UserClub;

class UserClubCon extends Model
{
    function __construct($request,$respond,$center_con,$computer_con){
        if($request->login){
            $user_club = $this->user_pair($request,$center_con->id);
            $computer_con->UserComputerCheck($user_club->id,$respond);
        }
    }
    private function user_pair($request,$club_id){
        if(!$request->username||!$request->password)return false;
        return UserClub::where([
            ['club_id',$club_id],
            ['username',$request->username],
            ['password',$request->password],
        ])->first();
    }
}
