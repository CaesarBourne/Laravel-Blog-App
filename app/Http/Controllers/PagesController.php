<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index(){
        return view( "pages.index");
    }

    public function about(){
        $title = "The good man";
        return view( "pages.about")->with( "title",$title);
    }

    public function services(){
        $data = array("title" =>"Services", "languages"=> ["Android Dev", "php","laravel","node.js"]);
        return view( "pages.services")->with($data);
    }
}
