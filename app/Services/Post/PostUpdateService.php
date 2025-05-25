<?php

namespace App\Services\Post;

use App\Models\Post;

class PostUpdateService
{
    public function execute(Post $post, array $data)
    {
        $post->update([
            'title' => $data['title'],
            'content' => $data['content'],
            'category_id' => $data['category_id'],
            'image' => $data['image']
        ]);
        $post->rubrics()->sync($data['rubrics']);
    }
}
