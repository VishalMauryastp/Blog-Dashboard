<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postData = Post::all();
        // dd($postData);
        return view('post.index', compact('postData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->isEnable = $request->input('isEnable', true);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $post->image = $imagePath;
        }

        $post->save();

        return redirect()->route('blogs.create')->with('success', 'Blog post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->isEnable = $request->input('isEnable', true);

        if ($request->hasFile('image')) {
            // Delete old image if it exists
            if ($post->image) {
                \Storage::disk('public')->delete($post->image);
            }
            $imagePath = $request->file('image')->store('images', 'public');
            $post->image = $imagePath;
        }

        $post->save();

        return redirect()->route('blogs.index')->with('success', 'Blog post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $post = Post::findOrFail($id);

        // Delete the image if it exists
        if ($post->image) {
            \Storage::disk('public')->delete($post->image);
        }

        // Delete the post record
        $post->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog post deleted successfully!');
    }
    public function updateEnable(Request $request, $id)
    {
        // $request->validate([
        //     'isEnable' => 'required|boolean',
        // ]);

        // $post = Post::findOrFail($id);
        // $post->isEnable = $request->input('isEnable');
        // $post->save();
        // return response()->json(['success' => true]);
        $post = Post::findOrFail($id);

        // Update the 'isEnable' status based on whether 'isEnable' is present in the request
        $post->isEnable = $request->has('isEnable') ? 1 : 0;
        $post->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Post status updated successfully.');
    }
}
