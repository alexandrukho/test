<?php

namespace App\Interfaces;

use App\Models\Tags;

interface TagRepositoryInterface
{
    public function all();
    public function find(Tags $tag);
    public function create(array $details);
    public function update(Tags $tag, array $details): bool;
    public function delete(Tags $tag): ?bool;
    public function forceDelete(Tags $tag);
}
