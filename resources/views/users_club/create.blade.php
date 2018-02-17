@extends('layouts.app')
@section('content')
    <h1>Create new User</h1>
    {!! Form::open(['action' => 'UsersClubController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('username','*Username')}}
            {{Form::text('username','',['class'=>'form-control','placeholder' => 'Username'])}}
        </div>
        <div class="form-group">
            {{Form::label('email','Email')}}
            {{Form::text('email','',['class'=>'form-control','placeholder' => 'Email'])}}
        </div>
        <div class="form-group">
            {{Form::label('password','Password')}}
            {{Form::text('password','',['class'=>'form-control','placeholder' => 'Password'])}}
        </div>
        <div class="form-group">
            {{Form::label('studentsid','Students id')}}
            {{Form::text('studentsid','',['class'=>'form-control','placeholder' => 'Students id'])}}
        </div>
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
