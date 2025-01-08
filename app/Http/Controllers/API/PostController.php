<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except(['index' ,'show']);
        // $this->middleware('auth')->only(['show' ,'index']);
        // $this->middleware('auth:sanctum');
        // $this->middleware(['isAdmin'])->except(['index','show']);

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return $posts;
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            return Post::findOrFail($id);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Not found',
                'errors' => 'Not found',
            ], 404);
        }

    }
}
