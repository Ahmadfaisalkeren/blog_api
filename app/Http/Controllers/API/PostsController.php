<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Posts\StorePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Services\PostsService;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    protected $postsService;

    public function __construct(PostsService $postsService)
    {
        $this->postsService = $postsService;
    }

    public function index()
    {
        $posts = $this->postsService->getPosts();

        return response()->json([
            'status' => 200,
            'message' => "Posts Data Fetched Successfully",
            'posts' => $posts,
        ], 200);
    }

    public function publishedPosts()
    {
        $posts = $this->postsService->publishedPosts();

        return response()->json([
            'status' => 200,
            'message' => "Published Posts Fetched Successfully",
            'posts' => $posts,
        ], 200);
    }

    public function store(StorePostRequest $request)
    {
        $post = $this->postsService->storePost($request->validated());

        return response()->json([
            'status' => 200,
            'message' => 'Post Stored Successfully',
            'post' => $post,
        ], 200);
    }

    public function show($slug)
    {
        $post = $this->postsService->getPostBySlug($slug);

        return response()->json([
            'status' => 200,
            'message' => 'Post Fetched Successfully',
            'post' => $post,
        ], 200);
    }

    public function edit(string $postId)
    {
        $post = $this->postsService->getPostById($postId);

        return response()->json([
            'status' => 200,
            'message' => 'Post Fetched Successfully',
            'post' => $post,
        ], 200);
    }

    public function update(string $postId, UpdatePostRequest $request)
    {
        $post = $this->postsService->updatePost($postId, $request->validated());

        return response()->json([
            'status' => 200,
            'message' => 'Post Updated Successfully',
            'post' => $post,
        ], 200);
    }

    public function destroy(string $postId)
    {
        $post = $this->postsService->deletePost($postId);

        return response()->json([
            'status' => 200,
            'message' => 'Post Deleted Successfully',
            'post' => $post,
        ], 200);
    }

    public function upload(Request $request)
    {
        $imagePath = $this->postsService->upload($request->file('image'));

        return response()->json([
            'status' => 200,
            'message' => "Image uploaded successfully",
            'image_path' => $imagePath,
        ], 200);
    }
}
