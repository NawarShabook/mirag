<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except(['index' ,'show']);
        // $this->middleware('auth')->only(['show' ,'index']);
        // $this->middleware('auth');
        $this->middleware(['isAdmin'])->except(['index','show']);

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::latest()->get();
        return view('posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posts=Post::latest()->get();
        return view('posts.create',compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $newImageName = time() . '_' . $image->getClientOriginalName();
            $imagePath = $image->storeAs('uploads/posts', $newImageName, 'public'); // Use Laravel's storage system
        }

        // Create post using mass assignment
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => isset($imagePath) ? 'storage/' . $imagePath : null, // Use public storage path
        ]);

        return redirect()->back()->with('success','تمت العملية بنجاح');
}


    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        try {
            // Handle image upload if provided
            if ($request->hasFile('image')) {
                if ($post->image && File::exists(public_path($post->image))) {
                    File::delete(public_path($post->image));
                }
                $image = $request->file('image');
                $newImageName = time() . '_' . $image->getClientOriginalName();
                $imagePath = $image->storeAs('uploads/posts', $newImageName, 'public'); // Use Laravel's storage system
                $post->image = 'storage/' . $imagePath; // Save the public storage path
                $post->save();
            }

            // Update post attributes
            $post->update([
                'title' => $request->title,
                'content' => $request->content,
            ]);

            return redirect()->route('posts.create')->with('success','تمت العملية بنجاح');
        } catch (\Throwable $th) {
            return redirect()->route('posts.create')->with('errors',$th->getMessage());
        }

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Check if the image exists and delete it
        if ($post->image && File::exists(public_path($post->image))) {
            File::delete(public_path($post->image));
        }

        // Delete the post
        $post->delete();

        return redirect()->back()->with('success', 'Post deleted successfully.');
    }

}
