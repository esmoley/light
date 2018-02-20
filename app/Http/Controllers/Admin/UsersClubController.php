<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Admin\UserClub;
use Illuminate\Support\Facades\Auth;

class UsersClubController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return ;//auth()->user()->;
        $posts = UserClub::where('club_id',auth()->user()->club_id)->paginate(20);
        return view('admin.users_club.index')->with('posts',$posts);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users_club.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'username'=>'required'
        ]);
        $user = new UserClub;
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->club_id = auth()->user()->club_id;//$request->input('gamecenter_id');
        $user->save();
        return redirect('/users')->with('success',"User {$request->input('username')} Added");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = UserClub::where('club_id',auth()->user()->club_id)->take(1)->find($id);
        //if($post==null)$post = array();
        return view('admin.users_club.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = UserClub::where('club_id',auth()->user()->club_id)->take(1)->find($id);
        return view('admin.users_club.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'username'=>'required',
        ]);
        $user = UserClub::where('club_id',auth()->user()->club_id)->take(1)->find($id);
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->studentsid = $request->input('studentsid');
        if(trim($request->input('password')) !=""){
            $user->password = md5($request->input('password'));
        }
        $user->save();
        return redirect('/users')->with('success',"User {$request->input('username')} Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = UserClub::where('club_id',auth()->user()->club_id)->take(1)->find($id);
        $user->delete();
        return redirect('/users')->with('success',"User removed");
    }
}
