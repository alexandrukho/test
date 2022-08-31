<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Interfaces\TagRepositoryInterface;
use App\Models\Tags;
use App\Repositories\TagRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TagController extends Controller
{
    private TagRepository $tagRepository;

    public function __construct(TagRepositoryInterface $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function index(): JsonResponse
    {
        $tags = $this->tagRepository->all();
        return response()->json([
            'success' => true,
            'data' => $tags
        ]);
    }

    public function store(StoreTagRequest $request):JsonResponse
    {
        $tag = $this->tagRepository->create($request->all());
        return response()->json([
            'success' => true,
            'data' => $tag
        ]);
    }

    public function show(Tags $tag): Tags
    {
        return $tag;
    }

    public function update(UpdateTagRequest $request, Tags $tag): JsonResponse
    {
        $result = $this->tagRepository->update($tag, $request->all());
        return response()->json([
            'success' => $result,
            'data' => $tag
        ]);
    }

    public function destroy(Tags $tag): JsonResponse
    {
        $result = $this->tagRepository->delete($tag);
        return response()->json([
            'success' => $result,
            'data' => $tag
        ]);
    }
}
