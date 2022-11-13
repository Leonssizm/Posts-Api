<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    public function index(): JsonResponse
    {
        $posts = Post::all();

        return response()->json(['posts'=>$posts], 200);
    }


    public function get(Post $post): JsonResponse
    {
        return response()->json(['post'=>$post], 200);
    }


    public function store(StorePostRequest $request): JsonResponse
    {
        $post = Post::create([
            "title"=>$request->title,
            "body"=>$request->body
        ]);

        return response()->json(['post'=>$post], 201);
    }

    public function update(UpdatePostRequest $request, Post $post): JsonResponse
    {
        $post->update([
            "title"=>$request->title,
            "body"=>$request->body
        ]);


        return response()->json(status: 204);
    }


    public function destroy(Post $post): JsonResponse
    {
        $post->delete();
        return response()->json(status: 204);
    }
}
