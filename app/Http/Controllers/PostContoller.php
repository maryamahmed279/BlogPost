<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostContoller extends Controller
{
    function index()
    {
        //get data from database
        $posts =Post::all();
        return view('posts.showposts',compact('posts'));
    }
    function create()
    {
        return view('posts.creatposts');
    }
     public function store(Request $request)
    {
        $request->validate([
            'title'   => 'required|string|max:100',
            'content' => 'required|string|max:250',
        ]);
        Post::create([
            'title'   => $request->title,
            'content' => $request->content,
            'user_id' => Auth::id(), // <- THIS ensures the post is linked to the logged in user
        ]);

        return redirect()->route('posts')->with('success', 'Post created successfully!');
    }
    public function edit(Post $post)//the edit page
    {
        Gate::authorize('update', $post);
        return view('posts.editpost',compact('post'));
    }
    public function update(Request $r,Post $post)
    {
        Gate::authorize('update', $post);
        $data=$r->validate([
          'title'   => 'required|string|max:100',
            'content' => 'required|string',
        ]);
        $post->update($data);
        return redirect()->route('posts')->with('success', 'post updated successfully.');
    }
    public function show(Post $post)
    {
        return view('posts.post',compact('post'));
    }
    public function delete(Post $post)
    {
        Gate::authorize('delete', $post);
        $post->delete();
        return redirect()->route('posts')->with('success', 'post deleted successfully.');
       
    }
}
