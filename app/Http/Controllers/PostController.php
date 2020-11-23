<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware("auth")->except(['index', 'show']);
    }

    public function index()
    {
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        
        return view('posts.index', [
            'posts' => $posts
        ]);
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
    public function store()
    {
        $validator = validator(request()->all(), [
            "title" => "required",
            "body" => "required",
            "image" => "required",
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $imageName = date('YmdHis') . "." . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images/posts'), $imageName);

        $post = new Post();
        $post->title = request()->title;
        $post->body = request()->body;
        $post->image = $imageName;
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        return view('posts.detail', [
            'post' => $post
        ]);
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
        return view('posts.edit', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        if (request()->image) {
            $imageName = date('YmdHis') . "." . request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images/posts'), $imageName);
        }
        $post = Post::find($id);
        $post->title = request()->title;
        $post->body = request()->body;
        $post->image = empty($imageName) ? $post->image : $imageName;
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect("/posts/$id");

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('posts');
    }
}