<?php

namespace App\Http\Controllers;

use App\Models\Picture;
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

    public function editPost(Post $post)
    {
        // dd($post);
        $pictures = Picture::where('post_id', $post->id)->get();
        return view('admin.editPost',compact('post','pictures'));
    }

    public function deletePost(Post $post)
    {
        $post->delete();
        return back()->with('success', 'post Deleted');
    }

   
}
