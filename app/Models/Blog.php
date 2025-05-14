<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BlogCategory;
use App\Models\BlogPostImage;
use App\Models\BlogPostView;

class Blog extends Model
{
    use SoftDeletes;

    protected $table = 'blog_post';
    protected $fillable = ['title', 'description', 'author_user_id'];

    public function categories()
    {
        return $this->belongsToMany(BlogCategory::class, 'blog_posts_join_categories', 'post_id', 'category_id');
    }

    public function images()
    {
        return $this->hasMany(BlogPostImage::class, 'post_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'author_user_id');
    }

    // Обновляем просмотры поста
    public function views()
    {
        return $this->hasMany(BlogPostView::class, 'post_id'); 
    }

    // Метод для подсчёта уникальных просмотров
    public function getViewsCountAttribute()
    {
        return $this->views()->count();
    }
}
