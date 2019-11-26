<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Will return an array of all the posts information that we have stored in the Posts Model or Posts table inside lsapp database.
        // Syntax is eloquent ORM - object relational mapper command, but regular SQL can be used as well
        // $posts = Post::all();
        // We could also get the posts by specific parameter and order by it
        // The clause / parameter is always followed by ->get()
        // $posts = Post::orderBy('title', 'asc')->get();
        // You can limit the number of post returned by chaining take() before get()
        // $posts = Post::orderBy('title', 'desc')->take(1)->get();
        // To use pagination, simply chain paginate() to the query
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        // In the view simply add the {{$posts->links()}} to display the pagination
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Used for validation of form
        // Second parameter is an array of input values we want to always be provided to us by the user
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        // Create Post using Tinker
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        // Create a redirect with success message that we created in the inc/messages.blade.php
        return redirect('/posts')->with('success', 'Post created');
    }

    /**
     * Display the specified resource / post in this example.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post', $post);
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        // Find Post, it's already created, we need to simply update it
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        // Create a redirect with success message that we created in the inc/messages.blade.php
        return redirect('/posts')->with('success', 'Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the post by its id and delete it
        $post = Post::find($id);
        $post->delete();

        return redirect('/posts')->with('success', 'Post removed');
    }
}
