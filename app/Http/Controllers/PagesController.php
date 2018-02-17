<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "admin";
        return view('index')->with('title',$title);
    }
    public function users()
    {
        $data = ['title' => "users","services"=>['user1','user2','user3']];
        //return view('users_club')->with($data);
    }
    public function computers()
    {
        $data = ['title' => "computers","services"=>['pc1','pc2','pc3']];
        return view('computers')->with($data);;
    }
}
