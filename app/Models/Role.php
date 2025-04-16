<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'roles'; // привязать к таблице
    protected $guarded = false; // разрешить любой запрос на добавление в БД

    public function users()
    {
        return $this->hasMany(User::class, 'id_role', 'id');
    }
}
