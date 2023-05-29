<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        // Get all posts from the database
        $posts = Post::all();

        // Return the view with the posts data
        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        // Display the form to create a new post
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Validate the input data from the form
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            // Add more validation rules for other fields if needed
        ]);

        // Create a new post with the validated data
        $post = Post::create($validatedData);

        // Redirect to the post's details page or any other appropriate route
        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    public function show($id)
    {
        // Find the post by its ID
        $post = Post::findOrFail($id);

        // Return the view with the post data
        return view('posts.show', ['post' => $post]);
    }

    public function edit($id)
    {
        // Find the post by its ID
        $post = Post::findOrFail($id);

        // Display the form to edit an existing post
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, $id)
    {
        // Validate the input data from the form
        $validatedData = $request->validate([
            'title' => 'required',
            'content' => 'required',
            // Add more validation rules for other fields if needed
        ]);

        // Find the post by its ID
        $post = Post::findOrFail($id);

        // Update the post with the validated data
        $post->update($validatedData);

        // Redirect to the post's details page or any other appropriate route
        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    public function destroy($id)
    {
        // Find the post by its ID
        $post = Post::findOrFail($id);

        // Delete the post
        $post->delete();

        // Redirect to the post listing or any other appropriate route
        return redirect()->route('posts.index');
    }
}
