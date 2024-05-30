<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Arr;

class Posts extends Model
{
    use HasFactory;
    protected $table='posts';
    protected $id='id';
    protected $fillable=[
        'slug',
        'title',
        'image_path',
        'author_id',
        'categories_id',
        'campus_id',
        'body'
    ];
    public static function find($slug):array
    {
        // return Arr::first(static::all(), function ($post) use ($slug) {
        //     return $post['slug'] === $slug;
        // });
        $post = Arr::first(static::all(), fn($post) => $post['slug'] === $slug);
        if(!$post){
            abort(404);
        }
        return $post;
        // return Arr::first(static::all(), fn($post) => $post['slug'] === $slug);
    }

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Categories::class, 'categories_id');
    }

    public function campus(): BelongsTo
    {
        return $this->belongsTo(Campus::class, 'campus_id');
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function likes(): BelongsTo
{
    return $this->belongsTo(Post_like::class, 'post_id');
}

}
