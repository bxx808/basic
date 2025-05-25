<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\PostStoreRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Rubric;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('post.index', [
            'posts' => $posts

        ]);
    }

    public function create()
    {
        $categories = Category::all();
        $rubrics = Rubric::all();
        return view('post.create', [
            'categories' => $categories,
            'rubrics' => $rubrics
        ]);
    }

    public function update(PostStoreRequest $request, Post $post)
    {
        $data = $request->validated();
        $post->update([
            'title' => $data['title'],
            'content' => $data['content'],
            'category_id' => $data['category_id'],
            'image' => $data['image']
        ]);
        $post->rubrics()->sync($data['rubrics']);
        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

    public function store(PostStoreRequest $request)
    {
        $data = $request->validated();
        $post = Post::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'category_id' => $data['category_id'],
            'image' => $data['image']
        ]);
        $post->rubrics()->attach($data['rubrics']);
        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', [
            'post' => $post
        ]);
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $rubrics = Rubric::all();
        return view('post.edit', [
            'post' => $post,
            'categories' => $categories,
            'rubrics' => $rubrics
        ]);
    }

}
