<?php

namespace App\Http\Controllers;

use App\Models\Picture;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function updatePost(Post $post)
    {
        $attributes = request()->validate([
            'title' => ['required'],
            'body' => ['required']
        ]);
        $attributes['user_id'] = $post->user->id;

        $pictures = Picture::where('post_id', $post->id)->get();

        $existingPictures =[];


        foreach ($pictures as $picture) {
            $existingPictures[] = $picture;
        }
        // add new image
        $newPictures = [];
        if (request()->hasFile('new_images')) {
            $images = request()->file('new_images');
            foreach ($images as $image) {
                $filename = $image->store('public/images');
                $post->pictures()->create([
                    'url' => substr($filename, 7),
                    'post_id' => $post->id,
                ]);
            }
        }
        $allPictures = array_merge($existingPictures, $newPictures);
        $post->pictures()->saveMany($allPictures);

        $post->update($attributes);
        return back()->with('success', 'successfully Updated');
    }

    public function deletePost(Post $post)
    {
        $post->delete();
        return redirect('/admin');
    }

    public function deletePostPicture(Post $post)
    {
        $pictures = Picture::where('post_id', $post->id)->get();



        foreach ($pictures as $picture) {
            // check if the user requested to delete this picture
            if (request()->has('delete_picture_' . $picture->id)) {
                Storage::delete($picture->url);
                $picture->delete();
            }
        }
        return back();
    }

    public function deleteUser(User $user)
    {
        $user->delete();
        return back()->with('success', 'User Deleted');
    }
}
