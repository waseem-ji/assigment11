<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {   

        $posts_count = Post::count();
        $posts = Post::paginate(5);
        
        return view('admin.panel',compact('posts','posts_count'));
    }

   
}
