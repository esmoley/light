@extends('layouts.app')
@section('content')
    <h1>Computers</h1>
    @if(count($posts)>0)
        @foreach($posts as $post)
        <div class="well well-sm">
            <h3><a href="/computers/{{$post->id}}/edit">{{$post->title}}</a></h3>
        </div>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No Computers yet</p>
    @endif
@endsection
