@extends('layouts.app')
@section('content')
@if(count($post)>0)
    <h1>Edit User {{$post->username}}</h1>
    {!! Form::open(['action' => ['UsersClubController@update',$post->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('username','Username*')}}
            {{Form::text('username',$post->username,['class'=>'form-control','placeholder' => 'Username'])}}
        </div>
        <div class="form-group">
            {{Form::label('email','Email')}}
            {{Form::text('email',$post->email,['class'=>'form-control','placeholder' => 'Email'])}}
        </div>
        <div class="form-group">
            {{Form::label('password','Password')}}
            {{Form::text('password','',['class'=>'form-control','placeholder' => 'Password'])}}
        </div>
        <div class="form-group">
                {{Form::label('studentsid','Students id')}}
                {{Form::text('studentsid','',['class'=>'form-control','placeholder' => 'Students id'])}}
            </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@else
<h1>User is not found</h1>
@endif
@endsection
