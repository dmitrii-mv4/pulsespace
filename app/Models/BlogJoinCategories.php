<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogJoinCategories extends Model
{
    use SoftDeletes;

    protected $table = 'blog_posts_join_categories';
    protected $guarded = false;
}
