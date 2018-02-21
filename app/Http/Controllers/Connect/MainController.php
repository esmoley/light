<?php

namespace App\Http\Controllers\Connect;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
      public function store(Request $request){
        $respond = new \App\Connect\Respond;
        $center_con = new \App\Connect\CenterCon($request,$respond);
        $computer_con = new \App\Connect\ComputerCon($request,$respond,$center_con);
        $user_con = new \App\Connect\UserClubCon($request,$respond,$center_con,$computer_con);
    }
    
    
}
