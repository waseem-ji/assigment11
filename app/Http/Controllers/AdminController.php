<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $posts_count = Post::count();
        $posts = Post::paginate(5);

        $users_count = User::count();
        $users= User::paginate(3);
        return view('admin.panel', compact('posts', 'posts_count', 'users_count' , 'users'));
    }

    public function editUser(User $user)
    {
        // dd($user);
        return view('admin.editUser' , compact('user'));
    }

    
}
