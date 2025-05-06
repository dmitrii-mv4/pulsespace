<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class BlogPostImage  extends Model
{
    use SoftDeletes;

    protected $table = 'blog_post_images';
    protected $fillable = ['path', 'order'];

    // Добавляем автоудаление файлов при удалении записи
    protected static function booted()
    {
        static::deleted(function ($image) {
            if ($image->forceDeleting) {
                Storage::disk('blog')->delete($image->path);
            }
        });
    }
}
