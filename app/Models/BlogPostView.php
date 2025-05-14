<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPostView extends Model
{
    use SoftDeletes;

    protected $table = 'blog_post_views';
    protected $fillable = ['post_id', 'ip_address'];
}
