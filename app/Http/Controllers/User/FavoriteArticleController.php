<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Posts;
use App\Models\Campus;
use App\Models\Post_like;
use App\Models\Categories;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class FavoriteArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Gate::denies('user-manages')) {
            abort(403, 'Unauthorized action.');
        }
        // Get all post likes by the authenticated user
        // pluck used for getting only the post_id
        $post_likes = Post_like::where('user_id', Auth::user()->id)->pluck('post_id');

        // Get all posts liked by the authenticated user
        $posts = Posts::whereIn('id', $post_likes)->get();
        if($posts->count() > 0) {
            $title = 'Your Favorite Articles : ' . $posts->count();
        }else{
            $title = 'No Favorite Articles Found';
        }
        // $title = 'Your Favorites Articles : ' . $posts->count();
        return view('user.favorites.index', compact('title', 'posts'));
    }

    public function like($slug)
    {
        // Find the post by slug
        $post = Posts::where('slug', $slug)->firstOrFail();
        // Create a new like
        $like = new Post_like;
        $like->post_id = $post->id;
        $like->user_id = Auth::user()->id;
        $like->save();

        return redirect()->back();
    }

    public function unlike($slug)
    {
        // Find the post by slug
        $post = Posts::where('slug', $slug)->firstOrFail();
        // Find the like and delete it
        $like = Post_like::where('post_id', $post->id)->where('user_id', Auth::user()->id)->first();
        if ($like) {
            $like->delete();
        }
        return redirect()->back();
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
        $liked = Post_like::where('post_id', $post->id)->where('user_id', Auth::user()->id)->first();
        $like = Post_like::where('post_id', $post->id)->count();
        $title = 'Details Favorite Article';
        // return $like;
        return view('user.favorites.show', compact('title', 'post', 'like', 'liked'));
    }

    public function show_by_author(User $author)
    {
        if (Gate::denies('user-manages')) {
            abort(403, 'Unauthorized action.');
        }
        // Get the IDs of the posts liked by the authenticated user
        $liked_post_ids = Post_like::where('user_id', Auth::user()->id)->pluck('post_id');
        // Get the posts authored by the specified user and liked by the authenticated user
        $posts = Posts::where('author_id', $author->id)
            ->whereIn('id', $liked_post_ids)
            ->get();
        // Count the posts authored by the user
        $title = 'Articles Favorited By ' . $author->name . ' : ' . $posts->count();
        return view('user.favorites.show-author', compact('title', 'posts'));
    }


    public function show_by_categories(Categories $categories)
    {
        if (Gate::denies('user-manages')) {
            abort(403, 'Unauthorized action.');
        }
        // Get the IDs of the posts liked by the authenticated user
        $liked_post_ids = Post_like::where('user_id', Auth::user()->id)->pluck('post_id');
        // Get the posts in the specified category and liked by the authenticated user
        $posts = $categories->posts()->whereIn('id', $liked_post_ids)->get();
        // Set the title
        $title = 'Articles Favorited In ' . $categories->name . ' : ' . $posts->count();
        return view('user.favorites.show-category', compact('title', 'posts'));
    }


    // Show all posts by campus
    public function show_by_campus(Campus $campus)
    {
        if (Gate::denies('user-manages')) {
            abort(403, 'Unauthorized action.');
        }
        // Get the IDs of the posts liked by the authenticated user
        $liked_post_ids = Post_like::where('user_id', Auth::user()->id)->pluck('post_id');
        // Get the posts from the specified campus and liked by the authenticated user
        $posts = $campus->posts()->whereIn('id', $liked_post_ids)->get();
        // Set the title
        $title = 'Articles Favorited From ' . $campus->name . ' : ' . $posts->count();
        return view('user.favorites.show-campus', compact('title', 'posts'));
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
