@extends('layouts.app')

@section('content')

<h1>Edit Post</h1>
            <!-- Create the toolbar container -->
            <div id="toolbar">
                        <button class="ql-bold">Bold</button>
                        <button class="ql-italic">Italic</button>
                      </div>
<form action="/lsapp/public/posts/{{{$post->id}}}" method="POST">
         {{ method_field('PUT') }}
        @csrf <!-- {{ csrf_field() }} -->
    <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{$post->title}}">
    </div>
    <div class="form-group" id="editor">

            <label for="body">Body:</label>
            <textarea name="body" value= id="editor"  cols="30" rows="10"  
             name="body" class="form-control"  >{{$post->body}}</textarea>
    </div>
    <input  type="submit" class="btn btn-primary" >
   
</form>
<script>
                var editor = new Quill('#editor', {
                      modules: { toolbar: '#toolbar' },
                      theme: 'snow'
                    });
                  </script>

@endsection