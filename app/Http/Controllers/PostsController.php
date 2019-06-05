<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */

     /*
     *create new controller instance
     * @return void todo 
     */

     public function __construct(){

          $this->middleware("auth", ["except" => ["index", "show"]]);
     }

    public function index()
    {
        //USE THE RAW DATABASE SQL
        // $posts = DB::select("SELECT * FROM posts");
        // $posts =  Post::all();
        //order posts by a parameter
        //get individual post
        // return Post::where("title", "Post two")->get();
        //limit number of dispays
        //$posts =  Post::orderBy( "title", "desc")->take(1)->get();
        //  $posts =  Post::orderBy( "title", "desc")->get();
        $posts =  Post::orderBy( "created_at", "desc")->paginate(10);
        return view("posts.index")->with("posts", $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            "title" => "required",
            "body" => "required"
        ]);
        
        $post = new Post();
        $post->title = $request->input("title");
        $post->body = $request->input("body");
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect("/posts")->with("success", "Posts Created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
       $post = Post::find($id);
       return view("posts.show")->with("post", $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        //if th currently logged in user from the globall auth function is not equal to the 
        //useer_id column on the table 
        if(auth()->user()-> id !== $post->user_id){
            return redirect("/posts")->with("error", "Unauthorised Page");    
        }
        return view("posts.edit")->with("post", $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            "title" => "required",
            "body" => "required"
        ]);
        
        $post = Post::find($id);
        $post->title = $request->input("title");
        $post->body = $request->input("body");
        $post->save();

        return redirect("/posts")->with("success", "Post Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        if(auth()->user()-> id !== $post->user_id){
            return redirect("/posts")->with("error", "Unauthorised Page");    
        }
        $post->delete();
        return redirect("/posts")->with("success", "Post Removed");
    }
}
