@extends('admin.layouts.app')
@section('content')

<a href='/users' class="btn btn-default">Back</a>
@if(count($post)>0)
    <h1>User {{$post->username}}</h1>
    <small>Written on {{$post->created_at}}</small>
    <div>
        <h4>Email: {{$post->email}}</h4>
        <h4>Time: {{$post->time_left}}</h4>
    </div>
    <a href="/users/{{$post->id}}/edit" class="btn btn-default">Edit</a>
    {!!Form::open(['action'=>['Admin\UsersClubController@destroy',$post->id],'method'=>'POST','class' => 'pull-right'])!!}
        {{Form::hidden('_method','DELETE')}}
        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
    {!!Form::close()!!}
@else
    <h1>User is not found</h1>
@endif
@endsection
