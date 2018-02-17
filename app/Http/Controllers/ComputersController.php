<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Computer;
use Illuminate\Support\Facades\Auth;

class ComputersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Computer::where('club_id',auth()->user()->club_id)->paginate(25);
        return view('computers.index')->with('posts',$posts);
    }
    public function create()
    {
        return redirect('/computers');
    }
    
    public function store(Request $request){
        return redirect('/computers');
    }

    public function show($id){
        return redirect("/computers/{$id}/edit");
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Computer::where('club_id',auth()->user()->club_id)->take(1)->find($id);
        return view('computers.edit')->with('post',$post);
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
        $user = Computer::where('club_id',auth()->user()->club_id)->take(1)->find($id);
        $user->title = $request->input('title');
        $user->enabled = $request->has('enabled');
        $user->save();
        return redirect('/computers')->with('success',"Computer {$request->input('title')} Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        redirect('/computers');
    }
}
