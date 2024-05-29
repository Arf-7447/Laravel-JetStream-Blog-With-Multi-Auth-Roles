<?php

use Illuminate\Support\Facades\Route;
// Admin Controller
use App\Http\Controllers\Admin\ManageUserController;
// Author Controller
use App\Http\Controllers\Author\PostController;
use App\Http\Controllers\Author\AllPostController;
// User Controller
use App\Http\Controllers\User\ArticleController;

Route::get('/', function () {
    return view('home');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    // Add Routes Over Here
    Route::get('/dashboard', function () {
        return view('dashboard', ['title' => 'Dashboard']);
    })->name('dashboard');

    Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
    // Testing Page
    // Route::get('/users', function () {
    //     return view('admin.users.index', ['title' => 'List Of Users']);
    // })->name('users.index');

    Route::resource('users', ManageUserController::class)->parameters(['users' => 'user:slug']);
    });

    Route::group(['middleware' => 'role:author', 'prefix' => 'author', 'as' => 'author.'], function() {
    // Testing Page
    /*
    Route::get('/posts', function () {
        return view('author.posts.index', ['title' => 'List Of Posts']);
    })->name('posts.index');
    */

    // Posts By Author
    Route::resource('posts', PostController::class)->parameters(['posts' => 'post:slug']);
    Route::get('/posts/categories/{categories:slug}', [PostController::class, 'show_by_categories'])->name('posts.show-category');
    Route::get('/posts/campus/{campus:slug}', [PostController::class, 'show_by_campus'])->name('posts.show-campus');

    // All Posts
    Route::resource('all-posts', AllPostController::class)->parameters(['all-posts' => 'post:slug']);
    Route::get('/all-posts/authors/{author:slug}', [AllPostController::class, 'show_by_author'])->name('all-posts.show-author');
    Route::get('/all-posts/categories/{categories:slug}', [AllPostController::class, 'show_by_categories'])->name('all-posts.show-category');
    Route::get('/all-posts/campus/{campus:slug}', [AllPostController::class, 'show_by_campus'])->name('all-posts.show-campus');
    });

    Route::group(['middleware' => 'role:user', 'prefix' => 'user', 'as' => 'user.'], function() {
    Route::get('/blogs', function () {
        return view('user.blogs.index', ['title' => 'List Of Blogs']);
    })->name('blogs.index');

    // Articles
    Route::resource('articles', ArticleController::class)->parameters(['articles' => 'post:slug']);
    Route::get('/articles/authors/{author:slug}', [ArticleController::class, 'show_by_author'])->name('articles.show-author');
    Route::get('/articles/categories/{categories:slug}', [ArticleController::class, 'show_by_categories'])->name('articles.show-category');
    Route::get('/articles/campus/{campus:slug}', [ArticleController::class, 'show_by_campus'])->name('articles.show-campus');
    });
});
