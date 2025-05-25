<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\PostStoreRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Rubric;
use App\Services\Post\PostStoreService;
use App\Services\Post\PostUpdateService;

class PostController extends Controller
{
    private PostStoreService $postStoreService;
    private PostUpdateService $postUpdateService;
    public function __construct(
        PostStoreService $postStoreService,
        PostUpdateService $postUpdateService
    )
    {
        $this->postStoreService = $postStoreService;
        $this->postUpdateService = $postUpdateService;
    }

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
        $this->postUpdateService->execute($post, $data);
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
        $this->postStoreService->execute($data);
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
