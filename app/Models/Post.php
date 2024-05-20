<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Post extends Model
{
    use HasFactory, HasApiTokens, HasUuids;

    protected $table = 'posts';
    protected $fillable = [
        'title',
        'slug',
        'author',
        'post_date',
        'status',
        'content',
        'image',
    ];
}
