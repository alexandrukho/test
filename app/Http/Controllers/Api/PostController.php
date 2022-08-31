<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DeletePostRequest;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    private PostRepository $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $posts = $this->postRepository->all();

        return response()->json([
            'data' => $posts
        ]);
    }

    public function store(StorePostRequest $request): JsonResponse
    {
        $post = $this->postRepository->create($request->all());

        return response()->json([
            "data" => $post
        ]);
    }

    public function show(Post $post): JsonResponse
    {
        $post = $this->postRepository->find($post);

        return response()->json([
            "data" => $post
        ]);

    }

    public function update(UpdatePostRequest $request, Post $post): JsonResponse
    {
        $this->postRepository->update($post, $request->all());

        return response()->json([
            "data" => $post
        ]);
    }



    /**
     * @param Post $post
     * @return JsonResponse
     */
    public function destroy(DeletePostRequest $request, Post $post): JsonResponse
    {
        $this->postRepository->delete($post, $request->language_id);

        return response()->json([
            "data" => $post
        ]);
    }
}
