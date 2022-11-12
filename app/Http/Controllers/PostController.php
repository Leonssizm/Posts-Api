<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\StorePostRequest;

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

    public function store(Request $request): JsonResponse
    {
        $post = new Post();
        $post->title=$request->title;
        $post->body=$request->body;

        $result = $post->save();

        if ($result) {
            return response()->json(['post'=>$post], 200);
        } else {
            return ['Result'=>'Something went wrong'];
        }
    }
}
