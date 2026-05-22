<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Override;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'content'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}