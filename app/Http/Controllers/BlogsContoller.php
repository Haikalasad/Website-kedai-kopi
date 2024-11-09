<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogsContoller extends Controller
{
    public function index(){
        $blogs = Blog::all();
        return view('blog',compact('blogs')); 
    }
}
