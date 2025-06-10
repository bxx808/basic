<?php

namespace App\Services\Post;

use App\Models\Post;
use Illuminate\Pagination\LengthAwarePaginator;

class PostPaginateService
{
    public function execute(array $data): LengthAwarePaginator
    {
        $query = Post::query();
        if (isset($data['category-id'])) {
            $query->where('category_id', $data['category-id']);
        }
        if (isset($data['title'])) {
            $query->where('title', 'like', "%{$data['title']}%");
        }
        return $query->paginate(3);
    }
}
