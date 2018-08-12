<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    protected $fillable = [
        'id', 'title', 'slug',
        'excerpt', 'content',
        'published_at', 'published'];

    public function getPublishedPosts() {
        $posts = $this->latest('published_at')->published()->get();
        return $posts;
    }

    public function getUnPublishedPosts()
    {
        return $this->latest('published_at')->unPublished()->get();
    }

    public function scopePublished($query) {
        $query
            ->where('published_at', '>=', Carbon::now())
            ->where('published', '=', 1);
    }

    public function scopeUnPublished($query) {
        $query
            ->where('published_at', '<=', Carbon::now())
            ->orWhere('published', '=', 0);
    }
}
