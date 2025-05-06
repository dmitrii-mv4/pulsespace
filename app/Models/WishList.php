<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WishList extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'wisheslist_lists';
    protected $guarded = ['description']; 

    public function user_create()
    {
        //return $this->belongsTo(WishList::class, 'user_id', 'id');
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function wishes()
    // {
    //     return $this->belongsToMany(Wish::class, 'wish_bind_lists')
    //         ->where('wishes.user_id', request()->route('user')->id) // Фильтр по владельцу страницы
    //         ->whereNull('wish_bind_lists.deleted_at');
    // }

    public function wishes()
    {
        return $this->belongsToMany(Wish::class, 'wisheslist_wish_join_lists', 'list_id', 'wish_id');
    }

    public function getRouteKeyName()
    {
        return 'url'; // Указываем использовать поле url для маршрутов
    }
}
