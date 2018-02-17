@extends('layouts.app')
@section('content')
    <h1>Users</h1>
    <a href="/users/create" class="btn btn-primary">Create User</a>
    @if(count($posts)>0)
        @foreach($posts as $post)
        <div class="well well-sm">
            <h3><a href="/users/{{$post->id}}">{{$post->username}}</a></h3>
            <small>Created {{$post->created_at}}</small>
        </div>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No users yet</p>
    @endif
@endsection
