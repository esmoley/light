@extends('layouts.app')
@section('content')
@if(count($post)>0)
    <h1>Edit Computer {{$post->title}}</h1>
    {!! Form::open(['action' => ['ComputersController@update',$post->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title','Title')}}
            {{Form::text('title',$post->title,['class'=>'form-control','placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('enabled','Enabled')}}
            {{Form::checkbox('enabled',$post->enabled,$post->enabled)}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@else
<h1>Computer is not found</h1>
@endif
@endsection
