@extends('layouts.app')

@section('content')
<h3>{{$title}}</h3>
@if (count($languages) > 0)
<ul class="list-group">
@foreach (  $languages as $language)
   <li class="list-group-item">{{$language}}</li>
@endforeach
</ul>
@endif
 @endsection