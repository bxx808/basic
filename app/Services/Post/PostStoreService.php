<?php

namespace App\Services\Post;

use App\Models\Post;

class PostStoreService
{
    public function execute(array $data)
    {
        $post = Post::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'category_id' => $data['category_id'],
            'image' => $data['image']
        ]);
        $post->rubrics()->attach($data['rubrics']);
    }
}
