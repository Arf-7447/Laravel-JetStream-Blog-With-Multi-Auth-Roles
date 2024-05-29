<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Posts;
use App\Models\Campus;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('user-manages')) {
            abort(403, 'Unauthorized action.');
        }
        // Get all posts by author auth
        $posts = Posts::all();
        $title = ' Articles : ' . count($posts);
        return view('user.articles.index', compact('title', 'posts')); // Pass both variables to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Posts $post)
    {
        if (Gate::denies('user-manages')) {
            abort(403, 'Unauthorized action.');
        }

        $title = 'Details Article';
        return view('user.articles.show', compact('title', 'post'));
    }

    public function show_by_author(User $author)
    {
        if (Gate::denies('user-manages')) {
            abort(403, 'Unauthorized action.');
        }
        $title = ' Articles By '. $author->name . ' : '.count($author->posts);
            // Filter posts author
        $posts = $author->posts;

            // Filter posts by the authenticated author
        // $posts = $categories->posts()->where('author_id', Auth::user()->id)->get();
        return view('user.articles.show-author', compact('title', 'posts'));
    }

    public function show_by_categories(Categories $categories)
    {
        if (Gate::denies('user-manages')) {
            abort(403, 'Unauthorized action.');
        }
        $title = ' Articles In ' . $categories->name .' : '.count($categories->posts);
            // Filter posts Categories
        $posts = $categories->posts;

            // Filter posts by the authenticated user
        // $posts = $categories->posts()->where('author_id', Auth::user()->id)->get();
        return view('user.articles.show-category', compact('title', 'posts'));
    }

    // Show all posts by campus
    public function show_by_campus(Campus $campus)
    {
        if (Gate::denies('user-manages')) {
            abort(403, 'Unauthorized action.');
        }
        $title = 'Articles From ' . $campus->name . ' : '.count($campus->posts);
            // Filter posts Campus
        $posts = $campus->posts;

            // Filter posts by the authenticated user
        // $posts = $campus->posts()->where('author_id', Auth::user()->id)->get();
        return view('user.articles.show-campus', compact('title', 'posts'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Posts $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Posts $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $post)
    {
        //
    }
}
