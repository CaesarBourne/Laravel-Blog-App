@extends('layouts.app')

@section('content')

<a href="/lsapp/public/posts" class="btn btn-default">Go Back</a>
<h1>{{$post->title}}</h1>

<div>
    {{$post->body}}
</div>

<hr>
<small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
<hr>

@if (!Auth::guest())
@if (Auth::user()->id == $post->user_id)
<a href="/lsapp/public/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>

<form action="/lsapp/public/posts/{{{$post->id}}}" method="POST" class="pull-right">
{{ method_field('DELETE') }}
@csrf <!-- {{ csrf_field() }} -->
<button type="submit" class="btn btn-danger">DELETE</button></form>
@endif
@endif
@endsection