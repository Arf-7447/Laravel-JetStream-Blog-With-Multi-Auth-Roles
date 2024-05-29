<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Campus extends Model
{
    use HasFactory;
    protected $table='campus';
    protected $id='id';
    protected $fillable=[
        'name',
        'slug'
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Posts::class, 'campus_id');
    }
}
