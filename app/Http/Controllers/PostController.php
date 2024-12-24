<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
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

        return redirect()->back()->with('success', '');
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
        // Handle image upload if provided
        if ($request->hasFile('image')) {
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

        return redirect()->route('posts.create');
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
