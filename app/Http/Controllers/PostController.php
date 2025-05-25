<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostToRubric;
use App\Models\Rubric;
use Illuminate\Http\Request;

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

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string|min:4|required',
            'content' => 'string',
            'category_id' => 'integer|exists:categories,id',
            'rubrics' => 'array|exists:rubrics,id',
            'image' => 'string'
        ]);
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

    public function store()
    {
        $data = request()->validate([
            'title' => 'string|min:4|required',
            'content' => 'string',
            'category_id' => 'integer|exists:categories,id',
            'rubrics' => 'array|exists:rubrics,id',
            'image' => 'string'
        ]);
//        $rubrics = $data['rubrics'];
//        unset($data['rubrics']);
        $post = Post::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'category_id' => $data['category_id'],
            'image' => $data['image']
        ]);
//        foreach ($data['rubrics'] as $rubric) {
//            PostToRubric::firstOrCreate([
//                'post_id' => $post->id,
//                'rubric_id' => $rubric
//            ]);
//        }
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
