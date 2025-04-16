<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wish extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['id', 'title', 'price', 'user_id', 'link_buy', 'old_image', 'image', 'description', 'done', 'lists']; 

    public function user_create()
    {
        return $this->belongsTo(Wish::class, 'user_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lists()
    {
        return $this->belongsToMany(WishList::class, 'wish_bind_lists', 'wish_id', 'list_id');
    }

    // public function lists()
    // {
    //     return $this->belongsToMany(WishList::class, 'wish_bind_lists')
    //         ->withTimestamps()
    //         ->whereNull('wish_bind_lists.deleted_at');
    // }

    public function list()
    {
        return $this->belongsTo(WishList::class, 'list_id');
    }
}
