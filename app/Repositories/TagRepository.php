<?php

namespace App\Repositories;

use App\Interfaces\TagRepositoryInterface;
use App\Models\Post;
use App\Models\Tags;
use Illuminate\Pagination\LengthAwarePaginator;

class TagRepository implements TagRepositoryInterface
{

    private Tags $tag;

    public function __construct(Tags $tags)
    {
        $this->tag = $tags;
    }

    public function all(): LengthAwarePaginator
    {
        return $this->tag->paginate();
    }

    public function find(Tags $tag): Tags
    {
        return $tag;
    }

    public function create(array $details): Tags
    {
        return $this->tag->create($details);
    }

    public function update(Tags $tag, array $details): bool
    {
        return $tag->update($details);
    }

    public function delete(Tags $tag): ?bool
    {
        return $tag->delete();
    }

    public function forceDelete(Tags $tag)
    {
        $tag->forceDelete();
    }
}
