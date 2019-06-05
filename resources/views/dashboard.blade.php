@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <a href="/lsapp/public/posts/create" class="btn btn-primary">Create Post</a> 
                    <h3>Your blog posts</h3>
                    @if (count($posts) > 0)
                        
                   
                    <table class="table table-striped">
                        <tr>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                        </tr>

                      
                            @foreach ($posts as $post)
                            <tr>
                        <td>{{$post->title}}</td>
                        <td><a href="/lsapp/public/posts/{{{$post->id}}}/edit" class="btn btn-default">Edit</a></td>
                         <td>
                                <form action="/lsapp/public/posts/{{{$post->id}}}" method="POST" class="pull-right">
                                    {{ method_field('DELETE') }}
                                    @csrf <!-- {{ csrf_field() }} -->
                                    <button type="submit" class="btn btn-danger">DELETE</button></form>     
                        </td>   
                    </tr>
                            @endforeach
                       
                    </table>
                    @else <p>You have no Posts</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
