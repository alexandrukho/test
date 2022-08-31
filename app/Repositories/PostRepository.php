<?php

namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;
use App\Models\PostTranslation;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PostRepository implements PostRepositoryInterface
{

    /**
     * @var Post
     */
    private Post $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function all(): LengthAwarePaginator
    {
        return $this->post->orderBy('created_at', 'desc')->paginate();
    }

    public function find(Post $post): Post
    {
        return $post;
    }

    public function create(array $details): Post
    {
        $post = $this->post->create([]);
        $post->translations()->create($details);
        return $post;
    }

    public function update(Post $post, array $details): bool
    {
        return $post->translations()->where('language_id', $details['language_id'])->update($details);
    }

    public function delete(Post $post, int $id = null): ?bool
    {
        if (!is_null($id)) {
            return $post->translations()->where('language_id', $id)->delete();
        } else {
            $post->translations()->delete();
            return $post->delete();
        }
    }

    public function forceDelete(Post $post): void
    {
        $post->forceDelete();
    }
}
