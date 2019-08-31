<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Category;
use Illuminate\Support\str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.posts.create')->with([
          'categories'=>$categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
          'title' => 'required|unique:posts|max:255',
          'author' => 'required',
          'content' => 'required',
          'category_id'=> 'required'
        ]);


        $dati = $request->all();
        $dati['slug'] = str::slug($dati['title']);
        $newpost = new Post();
        $newpost->fill($dati);
        $newpost->save();

        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($post_id)
    {
        $post = Post::find($post_id);
        $categories = Category::all();
        if(empty($post)){
          abort(404);
        }
        return view('admin.posts.show', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($post_id)
    {
      $post = Post::find($post_id);
      if(empty($post)){
        abort(404);
      }
      return view('admin.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post_id)
    {
      $validatedData = $request->validate([
        'title' => 'required|unique:posts|max:255',
        'author' => 'required',
        'content' => 'required',
        // 'category_id'=> 'required'
      ]);

      $dati = $request->all();
      $post = Post::find($post_id);
      $post->update($dati);

      return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post_id)
    {
      $post = Post::find($post_id);
      $post->delete();
      return redirect()->route('admin.posts.index');
    }
}
