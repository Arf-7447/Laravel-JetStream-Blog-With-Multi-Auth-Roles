<?php

namespace App\Http\Controllers\Author;

use App\Models\User;
use App\Models\Posts;
use App\Models\Campus;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('author-manages')) {
            abort(403, 'Unauthorized action.');
        }

        // Get all posts by author auth
        $posts = Posts::where('author_id',Auth::user()->id)->get();
        $title = ' Articles Stored By You : '. count($posts);
        return view('author.posts.index', compact('title', 'posts')); // Pass both variables to the view

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Gate::denies('author-manages')) {
            abort(403, 'Unauthorized action.');
        }

        $posts = Posts::all();
        $title = 'Create Article';
        $campus = Campus::all();
        $categories = Categories::all();
        return view('author.posts.create', compact('title', 'posts', 'campus', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'campus_id' => 'required',
            'categories_id' => 'required',
            'image_path' => 'image|file|max:2048',
            'body' => 'required',
        ]);

        if($request->file('image_path')) {
            $validatedData['image_path'] = $request->file('image_path')->store('post-images');
        }

        // Generate the slug
        Posts::create([
            'slug' => Str::slug($request->title, '-'),
            'title' => $request->title,
            // ganti Dengan Auth
            'author_id' => Auth::user()->id,
            'campus_id' => $request->campus_id,
            'categories_id' => $request->categories_id,
            'image_path' => $validatedData['image_path']??null,
            'body' => $request->body,
        ]);

        // Redirect to the post's index page with a success message
        return redirect()->route('author.posts.index')->with('status', 'Post Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Posts $post)
    {
        if (Gate::denies('author-manages')) {
            abort(403, 'Unauthorized action.');
        }

        $title = 'Details Article';
        return view('author.posts.show', compact('title', 'post'));
    }

    // Show all posts by categories
    public function show_by_categories(Categories $categories)
    {
        if (Gate::denies('author-manages')) {
            abort(403, 'Unauthorized action.');
        }
        $title = 'Articles In ' . $categories->name.' By You : '. count($categories->posts);
            // Filter posts Categories
        // $posts = $categories->posts;

            // Filter posts by the authenticated user
        $posts = $categories->posts()->where('author_id', Auth::user()->id)->get();
        return view('author.posts.show-category', compact('title', 'posts'));
    }



    // Show all posts by campus
    public function show_by_campus(Campus $campus)
    {
        if (Gate::denies('author-manages')) {
            abort(403, 'Unauthorized action.');
        }
        $title = 'Articles From ' . $campus->name . ' : '. count($campus->posts);
            // Filter posts Campus
        // $posts = $campus->posts;

            // Filter posts by the authenticated user
        $posts = $campus->posts()->where('author_id', Auth::user()->id)->get();
        return view('author.posts.show-campus', compact('title', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Posts $post)
    {
        $title = 'Edit This Article';
        $campus = Campus::all();
        $categories = Categories::all();
        return view('author.posts.edit', compact('title', 'post', 'campus', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Posts $post)
    {
        // Validate the request
        $request->validate([
            'title' => 'required|max:255|unique:posts,title,' . $post->id,
            'campus_id' => 'required',
            'categories_id' => 'required',
            'image_path' => 'image|file|max:2048',
            'body' => 'required',
        ]);

        if($request->file('image_path')) {
            if($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validatedData['image_path'] = $request->file('image_path')->store('post-images');
        }

        // Update the post
        $post->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title, '-'), // Update the slug based on the updated title
            'campus_id' => $request->campus_id,
            'categories_id' => $request->categories_id,
            'image_path' => $validatedData['image_path'] ?? null,
            'body' => $request->body,
        ]);

        return redirect()->route('author.posts.index')->with('status', 'Post Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $post)
    {
        Posts::destroy($post->id);
        return redirect()->route('author.posts.index')->with('status', 'Post Deleted Successfully!');
    }
}
