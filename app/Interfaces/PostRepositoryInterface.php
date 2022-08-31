<?php

namespace App\Interfaces;

use App\Models\Post;
use Illuminate\Pagination\LengthAwarePaginator;

interface PostRepositoryInterface
{
    public function all(): LengthAwarePaginator;
    public function find(Post $post);
    public function create(array $details): Post;
    public function update(Post $post, array $details);
    public function delete(Post $post): ?bool;
    public function forceDelete(Post $post);
}
