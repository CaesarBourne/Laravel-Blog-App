@extends('layouts.app')

@section('content')

<h1>Create Posts</h1>

<form action="/lsapp/public/posts" method="POST">
      
    <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" class="form-control" placeholder="Title">
    </div>
    {{-- <div id="toolbar">
                <button class="ql-bold">Bold</button>
                <button class="ql-italic">Italic</button>
              </div> --}}
    <div class="form-group" id="summernote">
            
            <label for="body">Body:</label>
            <input  name="about" type="hidden">
            <div id="editor-container">
                   
            <textarea name="about"    cols="30" rows="10"
             class="form-control" placeholder="Body Text" class="form-control quill-editor"></textarea>
        </div>
     
    </div>
    
    <input  type="submit" class="btn btn-primary" >
</form>

@endsection