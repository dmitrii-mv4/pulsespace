<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPostView extends Model
{
    protected $table = 'blog_post_views';
    protected $fillable = ['post_id', 'ip_address'];
}
